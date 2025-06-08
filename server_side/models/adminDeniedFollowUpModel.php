<?php

require_once __DIR__ .'/../core/dbconnection.php';

class AdminDeniedFollowUpModel {
    protected $conn;
    protected $Data;
    //automatically run and connect database
    public function __construct() {
        $db = new Connect();
        $this->conn = $db->getConnection();
        $this->Data = $this->getDeniedAndFollowUpStudents();
    }

    public function getDeniedAndFollowUpStudents() {
        $sql_get_data = "SELECT et.*,
                              e.Student_First_Name,
                              e.Student_Last_Name,
                              e.Student_Middle_Name,
                              e.Learner_Reference_Number,
                              e.Enrollment_Status,
                              s.Staff_First_Name,
                              s.Staff_Last_Name,
                              s.Staff_Middle_Name,
                              et.Created_At
                        FROM enrollment_transactions et
                        JOIN (
                              SELECT Enrollee_Id, MIN(Enrollment_Transaction_Id) AS LatestTransaction
                              FROM enrollment_transactions
                              GROUP BY Enrollee_Id
                              ) latest_et ON et.Enrollee_Id = latest_et.Enrollee_Id
                              AND et.Enrollment_Transaction_Id = latest_et.LatestTransaction
                        JOIN enrollee e ON et.Enrollee_Id = e.Enrollee_Id
                        JOIN staffs s ON et.Staff_Id = s.Staff_Id
                        WHERE e.Enrollment_Status IN (4, 2);";
        $get_get_data = $this->conn->prepare($sql_get_data);
        $get_get_data->execute();
        $result = $get_get_data->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getTransaction() {
        $sql_get_transaction = "SELECT * FROM `enrollment_transactions` WHERE Enrollee_Id = ";
    }
}
?>