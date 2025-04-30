<?php
    declare(strict_types=1);

require_once __DIR__ . '/dbconnection.php';
require_once __DIR__ . '/getEnrolleesModel.php';

class AdminEnrollmentStatusView {
    protected $conn;
    protected $getEnrollees;

    public function __construct(){
        $db = new Connect();
        $this->conn = $db->getConnection();
        $this->getEnrollees = new getEnrollees();
    }

    public function displayCount() {
        try {
            $count = $this->getEnrollees->countEnrollees();
            echo "<h2>" . htmlspecialchars($count) . "</h2>";
        }
        catch(PDOException $e) {
            die("Query Failed: " . $e->getMessage());
        }
    }
    public function displayEnrollees() {
    
        try {
    
            $data = $this->getEnrollees->getEnrollees();
            foreach($data as $rows) {   
                $enrollmentStatus = "";
                $parentMiddleInitial = substr($rows['Middle_Name'], 0, 1) . ".";
                $studentMiddleInitial = substr($rows['Student_Middle_Name'], 0, 1) . ".";
                if ($rows['Enrollment_Status'] == 1) {
                    $enrollmentStatus = "Enrolled";
                }
                else if ($rows['Enrollment_Status'] == 2) {
                    $enrollmentStatus = "Denied";
                }
                else {
                    $enrollmentStatus = "Pending";
                }
                echo '<tr class="enrollee-row"> 
                        <td>' . htmlspecialchars($rows['Learner_Reference_Number']) . '</td>
    
                        <td>' .htmlspecialchars($rows['Student_Last_Name']) . ', ' 
                        .htmlspecialchars($rows['Student_First_Name']) . ' ' 
                        .htmlspecialchars($studentMiddleInitial) . '</td>
                        <td>' . htmlspecialchars($rows['Last_Grade_Level']) . '</td>
                        <td>' . htmlspecialchars($rows['Last_Name']) . ', ' . htmlspecialchars($rows['First_Name']) . ' ' 
                               .htmlspecialchars($parentMiddleInitial) . '</td> 
                        <td>' 
                        . htmlspecialchars($rows['Contact_Number']) . 
                        '</td>
                        <td>'
                            . $enrollmentStatus.'
                        </td>
                        <td> <a href="Admin_Enrollment_Access_Status.php?s='.urlencode($rows['Enrollee_Id']).'" class="view-button"> View Info </a> </td>
                        </tr>';
            }
        }
        catch(PDOException $e) {
            die("Query Failed: " . $e->getMessage());
        }
    }
    
}
