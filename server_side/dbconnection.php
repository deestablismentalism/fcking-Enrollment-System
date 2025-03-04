<?php

class Connect {
    protected $conn = null;
    protected $servername;
    protected $username;
    protected $password;
    protected $dbname;

    public function __construct() {
        $this->initialize();
        $this->connect();
    }

    protected function initialize() {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "enrollment system"; 
    }

    protected function connect() {
        try {
            $this->conn = new PDO("mysql:host={$this->servername};dbname={$this->dbname};charset=utf8mb4", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } 
        
        catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function SelectAllEnrollee() {
        try {
            $sql = "SELECT * FROM enrollee";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } 
        
        catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    public function getConnection() {
        if ($this->conn === null) {
            $this->connect();
        }
        return $this->conn;
    }
}
?>
