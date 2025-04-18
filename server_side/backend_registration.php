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
        try {
        $sql_insert_registers = "INSERT INTO registrations(First_Name, Last_Name, Middle_Name, Contact_Number)
                                VALUES (:First_Name, :Last_Name, :Middle_Name, :Contact_Number)";
        $insert_register = $this->conn->prepare($sql_insert_registers);
        $insert_register->bindParam(':First_Name', $First_Name);
        $insert_register->bindParam(':Last_Name', $Last_Name);
        $insert_register->bindParam(':Middle_Name', $Middle_Name);
        $insert_register->bindParam(':Contact_Number', $Contact_Number);
        
        if ($sql_insert_register->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $insert_register->errorInfo()[2];
        }
        $Registration_Id = $this->conn->lastInsertId();
            
            // Insert into users table
            $sql_insert_password = "INSERT INTO users(Registration_Id, Password)
                                    VALUES (:Registration_Id, :Password)";
            $insert_password = $this->conn->prepare($sql_insert_password);
            $insert_password->bindParam(':Registration_Id', $Registration_Id);
            $insert_password->bindParam(':Password', $hashed_password);
            
            if (!$insert_password->execute()) {
                throw new Exception("Failed to insert user data");
            }
            $this->conn->commit();
            return [
                'success' => true,
                'message' => 'Registration successful! Your password has been sent to your mobile number.'
            ];
            
        } catch (Exception $e) {
            $this->conn->rollBack();
            return [
                'success' => false,
                'message' => 'Registration failed: ' . $e->getMessage()
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