<?php
require_once 'dbconnection.php';

Class VerifyLogin {
    protected $conn;
    
    public function __construct() {
        $db = new Connect();
        $this->conn = $db->getConnection();
    }

    public function verify_login($User_Typed_Phone_Number, $User_Typed_Password) {
        $User_Password = null;
        
        $sql_find_information = "SELECT users.*, registrations.* FROM users 
                                    JOIN registrations ON users.Registration_Id = registrations.Registration_Id
                                    WHERE registrations.Contact_Number = :Contact_Number;";
        $find_information = $this->conn->prepare($sql_find_information);
        $find_information->bindparam(':Contact_Number', $User_Typed_Phone_Number);
        if ($find_information->execute()) {
            $result = $find_information->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                $User_Password = $result['Password'];
                $User_Password = trim($User_Password);
                $User_Typed_Password = trim($User_Typed_Password);
                if (password_verify($User_Typed_Password, $User_Password)) {

                    //replace with change location and add session shit
                    echo "Login successful!";
                }
                
                else {
                    //should still input an alert for the user to know the password was invalid
                    echo "Invalid password.";
                }
            } else {
                echo "User not found.";
            }
        }
    }
}

?>