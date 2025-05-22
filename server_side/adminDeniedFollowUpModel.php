<?php

require_once '../server_side/dbconnection.php';

class AdminDeniedFollowUpModel {
    protected $conn;
    protected $Data;
    const FOLLOWUP = 4;
    const DENIED = 2;



    //automatically run and connect database
    public function __construct() {
        $db = new Connect();
        $this->conn = $db->getConnection();
        $this->Data = $this->getDeniedAndFollowUpStudents();
    }

    public function getDeniedAndFollowUpStudents() {
        $sql_get_data = "SELECT * FROM `enrollee` WHERE Enrollment_Status IN (4,2)";
        $get_get_data = $this->conn->prepare($sql_get_data);
        $get_get_data->execute();
        $result = $get_get_data->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function displayDeniedAndFollowUpStudents() {
        $students = $this->Data;
        foreach($students as $row) {
            $status = ($row['Enrollment_Status'] == self::DENIED) ? "DENIED" : "FOLLOW UP";
            $studentMiddleInitial = !empty($rows['Student_Middle_Name']) ? substr($rows['Student_Middle_Name'], 0, 1) . "." : "";
            $fullName = $row['Student_First_Name'] . ' ' . $studentMiddleInitial . ' ' . $row['Student_Last_Name'];
            echo '<tr>
                <td>' .htmlspecialchars($row['Learner_Reference_Number']). '</td>
                <td>' .htmlspecialchars($fullName). '</td>
                <td>' .htmlspecialchars($row['Age']). '</td>
                <td>' .htmlspecialchars($row['Birth_Date']). '</td>
                <td>' . $status . '</td>
                <td> <button id="' . $row['Enrollee_Id'] . '" data-id="' . $row['Enrollee_Id'] . '">View Reason</button> </td>
            </tr>';
        }
    }

    public function getTransaction() {
        $sql_get_transaction = "SELECT * FROM `enrollment_transactions` WHERE Enrollee_Id = ";
    }
}
?>