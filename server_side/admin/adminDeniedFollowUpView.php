<?php
require_once __DIR__ . '/../models/adminDeniedFollowUpModel.php';

class AdminDeniedFollowUpView {
    protected $conn;
    protected $Model;
    private const DENIED = 2;
    private const FOLLOWUP = 4;

    public function stringEquivalent(int $value): string {
        switch($value) {
            case self::DENIED:
                return "denied";
            case self::FOLLOWUP:
                return "to-follow";
            default:
                return "Unknown";
        }
    }
    public function __construct() {
        $db = new Connect();
        $this->conn = $db->getConnection();
        $this->Model = new AdminDeniedFollowUpModel();
    }

    public function displayDeniedAndFollowUpStudents() {
        $data = $this->Model->getDeniedAndFollowUpStudents();
        foreach($data as $row) {
            $lrn = !empty($row['Learner_Reference_Number']) ?  $row['Learner_Reference_Number'] :"No LRN";
            $status = $this->stringEquivalent($row['Enrollment_Status']);
            $viewSubmission = $row['Is_Resubmitted'] == 1 ? "<button id='" .$row['Enrollee_Id']."' data-id='" .$row['Enrollee_Id']."' class='view-resubmission'>View Resubmission</button>" : "";
            $studentMiddleInitial = !empty($row['Student_Middle_Name']) ? substr($row['Student_Middle_Name'], 0, 1) . "." : "";
            $fullName = $row['Student_Last_Name'] . ', ' . $row['Student_First_Name'] . ' ' .  $studentMiddleInitial;
            $staffMiddleInitial = !empty($row['Staff_Middle_Name']) ? substr($row['Staff_Middle_Name'], 0, 1) . "." : "";
            $staffName = $row['Staff_Last_Name'] . ', ' . $row['Staff_First_Name'] . ' ' . $staffMiddleInitial;
            echo '<tr class="denied-followup-row">
                <td>' . $lrn . '</td>
                <td>' . $fullName . '</td>
                <td>' .$staffName.'</td>
                <td>' .$row['Transaction_Code'].'</td>
                <td>' .$status.'</td>
                <td>' .$row['Created_At'].'</td>
                <td> ' .$viewSubmission. ' <button id="' .$row['Enrollee_Id'].'" data-id="' .$row['Enrollee_Id'].'">View Reason</button> </td>
            </tr>';
        }
    }
}

?>