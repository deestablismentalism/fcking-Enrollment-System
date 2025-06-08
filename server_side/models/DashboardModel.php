<?php
require_once __DIR__ . '/../core/dbconnection.php';

class DashboardModel {
    protected $conn;

    function __construct() {
        $db = new Connect();
        $this->conn = $db->getConnection();
    }
    public function TotalEnrollees() {
        try {
            $sql_get_total_enrollees = "SELECT COUNT('Enrollee_Id') AS enrollee_count FROM enrollee;";
            $get_total_enrollees = $this->conn->prepare($sql_get_total_enrollees);
            $get_total_enrollees->execute();
            $total_enrollees = $get_total_enrollees->fetch(PDO::FETCH_ASSOC);
            return (int)$total_enrollees['enrollee_count'];
        }
        catch(PDOException $e) {
            return['success'=> false, 'message'=> $e->getMessage()];
        }
    }
    public function TotalDeniedFollowUp() {
        try {
            $sql_get_total_denied_follow_up = "SELECT COUNT('Enrollee_Id') AS total_count FROM enrollment_transactions et JOIN (
                              SELECT Enrollee_Id, MIN(Enrollment_Transaction_Id) AS LatestTransaction
                              FROM enrollment_transactions
                              GROUP BY Enrollee_Id
                              ) latest_et ON et.Enrollee_Id = latest_et.Enrollee_Id
                              AND et.Enrollment_Transaction_Id = latest_et.LatestTransaction;";
            $get_total_denied_follow_up = $this->conn->prepare($sql_get_total_denied_follow_up);
            $get_total_denied_follow_up->execute();
            $total_denied_follow_up = $get_total_denied_follow_up->fetch(PDO::FETCH_ASSOC);
            return (int)$total_denied_follow_up['total_count'];
        }
        catch(PDOException $e) {
            return['success'=> false, 'message'=> $e->getMessage()];
        }
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
    public function DeniedStudents() {
        try {
            $sql_get_to_follow = "SELECT COUNT('Enrollee_Id') AS enrollee_count FROM enrollee WHERE Enrollment_Status = 2;";
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
    public function countTotalStudents() {
        try {
            $sql = "SELECT COUNT(Student_Id) AS TotalStudents FROM students;";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return (int)$result['TotalStudents'];
        }
        catch(PDOException $e) {
            return ['success'=> false, 'message'=> $e->getMessage()];
        }
    }
    public function countActiveStudents() {
        try {
            $sql = "SELECT COUNT(Student_Id) AS ActiveStudents FROM students WHERE Student_Status = 1;";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return (int)$result['ActiveStudents'];
        }
        catch(PDOException $e) {
            return ['success'=> false, 'message'=> $e->getMessage()];
        }
    }
    public function countInactiveStudents() {
        try {
            $sql = "SELECT COUNT(Student_Id) AS InactiveStudents FROM students WHERE Student_Status = 2;";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return (int)$result['InactiveStudents'];
        }
        catch(PDOException $e) {
            return ['success'=> false, 'message'=> $e->getMessage()];
        }
    }
    public function countDroppedStudents() {
        try {
            $sql = "SELECT COUNT(Student_Id) AS DroppedStudents FROM students WHERE Student_Status = 3;";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return (int)$result['DroppedStudents'];
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
    
    // New methods for student grade level distribution
    public function getKinderOneStudents() {
        try {
            $sql = "SELECT COUNT(Grade_Level_Id) AS KinderOneTotal FROM students 
                    WHERE Grade_Level_Id = 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return (int)$result['KinderOneTotal'];
        }
        catch(PDOException $e) {
            return ['success'=> false, 'message' => $e->getMessage()];
        }
    }
    
    public function getKinderTwoStudents() {
        try {
            $sql = "SELECT COUNT(Grade_Level_Id) AS KinderTwoTotal FROM students 
                    WHERE Grade_Level_Id = 2";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return (int)$result['KinderTwoTotal'];
        }
        catch(PDOException $e) {
            return ['success'=> false, 'message' => $e->getMessage()];
        }
    }
    
    public function getGradeOneStudents() {
        try {
            $sql = "SELECT COUNT(Grade_Level_Id) AS GradeOneTotal FROM students 
                    WHERE Grade_Level_Id = 3";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return (int)$result['GradeOneTotal'];
        }
        catch(PDOException $e) {
            return ['success'=> false, 'message' => $e->getMessage()];
        }
    }
    
    public function getGradeTwoStudents() {
        try {
            $sql = "SELECT COUNT(Grade_Level_Id) AS GradeTwoTotal FROM students 
                    WHERE Grade_Level_Id = 4";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return (int)$result['GradeTwoTotal'];
        }
        catch(PDOException $e) {
            return ['success'=> false, 'message' => $e->getMessage()];
        }
    }
    
    public function getGradeThreeStudents() {
        try {
            $sql = "SELECT COUNT(Grade_Level_Id) AS GradeThreeTotal FROM students 
                    WHERE Grade_Level_Id = 5";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return (int)$result['GradeThreeTotal'];
        }
        catch(PDOException $e) {
            return ['success'=> false, 'message' => $e->getMessage()];
        }
    }
    
    public function getGradeFourStudents() {
        try {
            $sql = "SELECT COUNT(Grade_Level_Id) AS GradeFourTotal FROM students 
                    WHERE Grade_Level_Id = 6";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return (int)$result['GradeFourTotal'];
        }
        catch(PDOException $e) {
            return ['success'=> false, 'message' => $e->getMessage()];
        }
    }
    
    public function getGradeFiveStudents() {
        try {
            $sql = "SELECT COUNT(Grade_Level_Id) AS GradeFiveTotal FROM students 
                    WHERE Grade_Level_Id = 7";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return (int)$result['GradeFiveTotal'];
        }
        catch(PDOException $e) {
            return ['success'=> false, 'message' => $e->getMessage()];
        }
    }
    
    public function getGradeSixStudents() {
        try {
            $sql = "SELECT COUNT(Grade_Level_Id) AS GradeSixTotal FROM students 
                    WHERE Grade_Level_Id = 8";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return (int)$result['GradeSixTotal'];
        }
        catch(PDOException $e) {
            return ['success'=> false, 'message' => $e->getMessage()];
        }
    }
    
    public function getMaleStudents() {
        try {
            $sql = "SELECT COUNT(enrollee.Sex) AS MaleTotal FROM students 
                    JOIN enrollee ON students.Enrollee_Id = enrollee.Enrollee_Id 
                    WHERE enrollee.Sex = 'Male'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return (int)$result['MaleTotal'];
        }
        catch(PDOException $e) {
            return ['success'=> false, 'message'=> $e->getMessage()];
        }
    }
    
    public function getFemaleStudents() {
        try {
            $sql = "SELECT COUNT(enrollee.Sex) AS FemaleTotal FROM students 
                    JOIN enrollee ON students.Enrollee_Id = enrollee.Enrollee_Id 
                    WHERE enrollee.Sex = 'Female'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return (int)$result['FemaleTotal'];
        }
        catch(PDOException $e) {
            return ['success'=> false, 'message'=> $e->getMessage()];
        }
    }
}

?>