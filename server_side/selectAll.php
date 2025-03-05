<?php
require_once 'dbconnection.php';

class SelectAll {
    protected $conn;

    //automatically run and connect database
    public function __construct() {
        $db = new Connect();
        $this->conn = $db->getConnection();
    }

    // Select all enrollees
    public function selectAllEnrollees() {
        try {
            $sql = "SELECT * FROM enrollee";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } 
        catch (PDOException $e) {
            die("Selection Failed : " . $e->getMessage());
        }
    }

    //select all registrations
    public function selectAllRegistrations() {
        try { 
            $sql = "SELECT * FROM registrations";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } 
        catch (PDOException $e) {
            die("Selection Failed : " . $e->getMessage());
        }
    }

    //select all users
    public function selectAllUsers() {
        try {
            $sql = "SELECT * FROM users";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } 
        catch (PDOException $e) {
            die("Selection Failed : " . $e->getMessage());
        }
    }
}
?>