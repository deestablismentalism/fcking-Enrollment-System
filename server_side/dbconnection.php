<?php
class Connect {
    protected $conn = null;
    protected $servername;
    protected $username;
    protected $password;
    protected $dbname;

    //automatically run and connect database when object is created
    public function __construct() {
        $this->initialize();
        $this->connect();
    }

    //initialze variables about database
    protected function initialize() {
        $this->servername = "mysql-ssis-test.alwaysdata.net";
        $this->username = "ssis-test";
        $this->password = "SSISdatabasetest123";
        $this->dbname = "ssis-test_database"; 
    }

    //connect to database
    protected function connect() {
        try {
            $this->conn = new PDO("mysql:host={$this->servername};dbname={$this->dbname};charset=utf8mb4", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } 
        
        catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    //function to call connection if needed
    public function getConnection() {
        if ($this->conn === null) {
            $this->connect();
        }
        return $this->conn;
    }
}
?>
