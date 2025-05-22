<?php
include_once 'dbconnection.php';

class DashboardModel {
    protected $conn;

    function __construct() {
        $db = new Connect();
        $this->conn = $db->getConnection();
    }

    public function EnrolledStudents(){
        try {
            $sql_get_enrolled = "SELECT COUNT('Enrollee_Id') AS enrollee_count FROM enrollee WHERE Enrollment_Status = 1;";
            $get_enrolled = $this->conn->prepare($sql_get_enrolled);
            $get_enrolled->execute();
            $enrollee_count = $get_enrolled->fetch(PDO::FETCH_ASSOC);
            return $enrollee_count['enrollee_count'];
        }
        catch(PDOException  $e) {
            return['succes'=> false ,'message' => $e->getMessage()];
        }
    }
    public function PendingStudents(){
        try {
            $sql_get_pending = "SELECT COUNT('Enrollee_Id') AS enrollee_count FROM enrollee WHERE Enrollment_Status = 3;";
            $get_pending = $this->conn->prepare($sql_get_pending);
            $get_pending->execute();
            $pending_count = $get_pending->fetch(PDO::FETCH_ASSOC);
            return (int)$pending_count['enrollee_count'];
        }
        catch(PDOException $e) {
            return['success'=> false, 'message'=> $e->getMessagae()];
        }
    }

    public function FollowUpStudents() {
        try {
            $sql_get_to_follow = "SELECT COUNT('Enrollee_Id') AS enrollee_count FROM enrollee WHERE Enrollment_Status = 4;";
            $get_to_follow = $this->conn->prepare($sql_get_to_follow);
            $get_to_follow->execute();
            $to_follow_count = $get_to_follow->fetch(PDO::FETCH_ASSOC);
            return (int)$to_follow_count['enrollee_count'];
        }
        catch(PDOExcepion $e) {
            return['success' => false , 'message'=> $e->getMessage()];
        }
    }
    public function getKinderOneEnrollees() {
        try {
            $sql = "SELECT COUNT(Enrolling_Grade_Level) AS KinderOneTotal FROM enrollee JOIN educational_information ON enrollee.Educational_Information_Id = educational_information.Educational_Information_Id 
                    JOIN grade_level ON educational_information.Enrolling_Grade_Level = grade_level.Grade_Level_Id
                    WHERE grade_level.Grade_Level = 'Kinder I'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return (int)$result['KinderOneTotal'];
        }
        catch(PDOException $e) {
            return ['success'=> false, 'message' => $e->getMessage()];
        }
    }
    public function getKinderTwoEnrollees() {
        try {
            $sql = "SELECT COUNT(Enrolling_Grade_Level) AS KinderTwoTotal FROM enrollee JOIN educational_information ON enrollee.Educational_Information_Id = educational_information.Educational_Information_Id 
                    JOIN grade_level ON educational_information.Enrolling_Grade_Level = grade_level.Grade_Level_Id
                    WHERE grade_level.Grade_Level = 'Kinder II'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return (int)$result['KinderTwoTotal'];
        }
        catch(PDOException $e) {
            return ['success'=> false, 'message' => $e->getMessage()];
        }
    }
    public function getGradeOneEnrollees() {
        try {
            $sql = "SELECT COUNT(Enrolling_Grade_Level) AS GradeOneTotal FROM enrollee JOIN educational_information ON enrollee.Educational_Information_Id = educational_information.Educational_Information_Id 
                    JOIN grade_level ON educational_information.Enrolling_Grade_Level = grade_level.Grade_Level_Id
                    WHERE grade_level.Grade_Level = 'Grade 1'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return (int)$result['GradeOneTotal'];
        }
        catch(PDOException $e) {
            return ['success'=> false, 'message' => $e->getMessage()];
        }
    }
    public function getGradeTwoEnrollees() {
        try {
            $sql = "SELECT COUNT(Enrolling_Grade_Level) AS GradeTwoTotal FROM enrollee JOIN educational_information ON enrollee.Educational_Information_Id = educational_information.Educational_Information_Id 
                    JOIN grade_level ON educational_information.Enrolling_Grade_Level = grade_level.Grade_Level_Id
                    WHERE grade_level.Grade_Level = 'Grade 2'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return (int)$result['GradeTwoTotal'];
        }
        catch(PDOException $e) {
            return ['success'=> false, 'message' => $e->getMessage()];
        }
    }
    public function getGradeThreeEnrollees() {
        try {
            $sql = "SELECT COUNT(Enrolling_Grade_Level) AS GradeThreeTotal FROM enrollee JOIN educational_information ON enrollee.Educational_Information_Id = educational_information.Educational_Information_Id 
                    JOIN grade_level ON educational_information.Enrolling_Grade_Level = grade_level.Grade_Level_Id
                    WHERE grade_level.Grade_Level = 'Grade 3'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return (int)$result['GradeThreeTotal'];
        }
        catch(PDOException $e) {
            return ['success'=> false, 'message' => $e->getMessage()];
        }
    }
    public function getGradeFourEnrollees() {
        try {
            $sql = "SELECT COUNT(Enrolling_Grade_Level) AS GradeFourTotal FROM enrollee JOIN educational_information ON enrollee.Educational_Information_Id = educational_information.Educational_Information_Id 
                    JOIN grade_level ON educational_information.Enrolling_Grade_Level = grade_level.Grade_Level_Id
                    WHERE grade_level.Grade_Level = 'Grade 4'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return (int)$result['GradeFourTotal'];
        }
        catch(PDOException $e) {
            return ['success'=> false, 'message' => $e->getMessage()];
        }
    }
    public function getGradeFiveEnrollees() {
        try {
            $sql = "SELECT COUNT(Enrolling_Grade_Level) AS GradeFiveTotal FROM enrollee JOIN educational_information ON enrollee.Educational_Information_Id = educational_information.Educational_Information_Id 
                    JOIN grade_level ON educational_information.Enrolling_Grade_Level = grade_level.Grade_Level_Id
                    WHERE grade_level.Grade_Level = 'Grade 5'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return (int)$result['GradeFiveTotal'];
        }
        catch(PDOException $e) {
            return ['success'=> false, 'message' => $e->getMessage()];
        }
    }
    public function getGradeSixEnrollees() {
        try {
            $sql = "SELECT COUNT(Enrolling_Grade_Level) AS GradeSixTotal FROM enrollee JOIN educational_information ON enrollee.Educational_Information_Id = educational_information.Educational_Information_Id 
                    JOIN grade_level ON educational_information.Enrolling_Grade_Level = grade_level.Grade_Level_Id
                    WHERE grade_level.Grade_Level = 'Grade 6'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return (int)$result['GradeSixTotal'];
        }
        catch(PDOException $e) {
            return ['success'=> false, 'message' => $e->getMessage()];
        }
    }
    public function getMaleEnrollees() {
        try {
            $sql = "SELECT COUNT(Sex) AS MaleTotal FROM enrollee WHERE Sex = 'Male'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return (int)$result['MaleTotal'];
        }
        catch(PDOException $e) {
            return ['success'=> false, 'message'=> $e->getMessage()];
        }
    }
    public function getFemaleEnrollees() {
         try {
            $sql = "SELECT COUNT(Sex) AS FemaleTotal FROM enrollee WHERE Sex = 'Female'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return (int)$result['FemaleTotal'];
        }
        catch(PDOException $e) {
            return ['success'=> false, 'message'=> $e->getMessage()];
        }
    }
    public function PendingEnrolleesInformation() {
        $sql_get_pending_enrollees = "SELECT enrollee.Enrollee_Id,
                                        enrollee.Learner_Reference_Number,
                                        enrollee.Student_First_Name,
                                        enrollee.Student_Middle_Name,
                                        enrollee.Student_Last_Name,
                                        enrollee.Student_Extension,

                                        enrolling_level.Grade_Level AS E_Grade_Level
                                        FROM enrollee
                                        JOIN educational_information ON enrollee.Educational_Information_Id = educational_information.Educational_Information_Id
                                        INNER JOIN grade_level as enrolling_level ON enrolling_level.Grade_Level_Id = educational_information.Enrolling_Grade_Level
                                        WHERE Enrollment_Status = 3
                                        ORDER BY Enrollee_Id DESC
                                        LIMIT 5";
        $get_pending_enrollees = $this->conn->prepare($sql_get_pending_enrollees);
        $get_pending_enrollees->execute();
        $pending_enrollees = $get_pending_enrollees->fetchAll(PDO::FETCH_ASSOC);
        return $pending_enrollees;
    }
}

?>