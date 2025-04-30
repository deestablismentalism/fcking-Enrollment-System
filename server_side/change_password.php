<?php
require_once 'dbconnection.php';
session_start();    

class ChangePassword {
    protected $conn;
    
    //automatically run and connect database
    public function __construct() {
        $db = new Connect();
        $this->conn = $db->getConnection();
    }

    public function change_password($user_password, $user_new_password, $user_new_password_confirm) {
        
        $sql_find_information = "SELECT users.*, registrations.* FROM users 
                                    JOIN registrations ON users.Registration_Id = registrations.Registration_Id
                                    WHERE users. = :Contact_Number;";
        $find_information = $this->conn->prepare($sql_find_information);
        $find_information->bindparam(':Contact_Number', $User_Typed_Phone_Number);
        if ($find_information->execute()) {
            $result = $find_information->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                $User_Password = $result['Password'];
                $User_Password = trim($User_Password);
                $User_Typed_Password = trim($User_Typed_Password);
                if (password_verify($User_Typed_Password, $User_Password)) {

                    $_SESSION['User_Id'] = $result['User_Id'];
                    $_SESSION['Registration_Id'] = $result['Registration_Id'];
                    $_SESSION['First_Name'] = $result['First_Name'];
                    $_SESSION['Last_Name'] = $result['Last_Name'];
                    $_SESSION['Middle_Name'] = $result['Middle_Name'];
                    $_SESSION['Contact_Number'] = $result['Contact_Number'];

                    //replace with change location and add session shit
                    header("Location: ../client_side/Parent_LogIn.php");
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