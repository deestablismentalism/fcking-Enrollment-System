<?php
require_once 'dbconnection.php';
require_once 'phone_verification.php';

class Registration {
    protected $conn;
    protected $phone_verification;
    
    //automatically run and connect database
    public function __construct() {
        $db = new Connect();
        $this->conn = $db->getConnection();
        $this->phone_verification = new PhoneVerification();
    }
    
    public function register($First_Name, $Last_Name, $Middle_Name, $Contact_Number) {
        $this->conn->beginTransaction();
        try {
            // Validate phone number format
            $validated_phone = $this->phone_verification->validatePhoneNumber($Contact_Number);
            if (!$validated_phone) {
                throw new Exception("Invalid phone number format. Please use a valid Philippine mobile number.");
            }

            $sql_insert_registers = "INSERT INTO registrations(First_Name, Last_Name, Middle_Name, Contact_Number)
                                    VALUES (:First_Name, :Last_Name, :Middle_Name, :Contact_Number)";
            $insert_register = $this->conn->prepare($sql_insert_registers);
            $insert_register->bindParam(':First_Name', $First_Name);
            $insert_register->bindParam(':Last_Name', $Last_Name);
            $insert_register->bindParam(':Middle_Name', $Middle_Name);
            $insert_register->bindParam(':Contact_Number', $Contact_Number);
            
            if (!$insert_register->execute()) {
                throw new Exception("Failed to insert registration data");
            }
            $Registration_Id = $this->conn->lastInsertId();
            
            // Generate and hash password
            $password = $this->generatePassword();
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            // Insert into users table
            $sql_insert_password = "INSERT INTO users(Registration_Id, Password)
                                    VALUES (:Registration_Id, :Password)";
            $insert_password = $this->conn->prepare($sql_insert_password);
            $insert_password->bindParam(':Registration_Id', $Registration_Id);
            $insert_password->bindParam(':Password', $hashed_password);
            
            if (!$insert_password->execute()) {
                throw new Exception("Failed to insert user data");
            }

            // Send password via SMS
            $username = $First_Name . ' ' . $Last_Name;
            $sms_result = $this->phone_verification->sendPassword($validated_phone, $password, $username);
            
            if (!$sms_result['success']) {
                throw new Exception("Registration successful but failed to send password via SMS: " . $sms_result['error']);
            }

            $this->conn->commit();
            return [
                'success' => true,
                'message' => "Registration successful! Your password has been sent to your mobile number.",
                'sms_status' => $sms_result
            ];
        }
        
        catch (PDOException $e) {
            $this->conn->rollBack();
            if ($e->errorInfo[1] === 1062) {
                return [
                    'success' => false,
                    'message' => 'Registration failed: The number you entered is already registered',
                    'error' => 'duplicate_entry'
                ];
            }
            return [
                'success' => false,
                'message' => 'Database error: ' . $e->getMessage(),
                'error' => 'database'
            ];
        }
        
        catch (Exception $e) {
            $this->conn->rollBack();
            return [
                'success' => false,
                'message' => 'Registration failed: ' . $e->getMessage(),
                'error' => 'registration_error'
            ];
        }
    }
    
    private function generatePassword() {
        // Generate a random 8-character password
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $password = '';
        for ($i = 0; $i < 8; $i++) {    
            $password .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $password;
    }
}
?>