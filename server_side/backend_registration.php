<?php
    require_once 'dbconnection.php';

class Registration {
    protected $conn;
    
    //automatically run and connect database
    public function __construct() {
        $db = new Connect();
        $this->conn = $db->getConnection();
    }
    
    public function register($First_Name, $Last_Name, $Middle_Name, $Contact_Number) {
        $sql_insert_registers = "INSERT INTO registrations(First_Name, Last_Name, Middle_Name, Contact_Number)
                                VALUES (:First_Name, :Last_Name, :Middle_Name, :Contact_Number)";
        $insert_register = $this->conn->prepare($sql_insert_registers);
        $insert_register->bindParam(':First_Name', $First_Name);
        $insert_register->bindParam(':Last_Name', $Last_Name);
        $insert_register->bindParam(':Middle_Name', $Middle_Name);
        $insert_register->bindParam(':Contact_Number', $Contact_Number);
        
        if ($insert_register->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $insert_register->errorInfo()[2];
        }
    }
}
?>