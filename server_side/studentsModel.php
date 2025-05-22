<?php
declare(strict_types=1);

require_once __DIR__ .'/../server_side/dbconnection.php';

class studentsModel {
    protected $conn;

    public function __construct() {
        $db = new Connect();
        $this->conn = $db->getConnection();
    }
    public function getEnrollingGradeLevel($id) {
        $sql = "SELECT Enrolling_Grade_Level FROM enrollee 
        INNER JOIN educational_information AS ei ON enrollee.Educational_Information_Id = ei.Educational_Information_Id
        WHERE Enrollee_Id = :id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['Enrolling_Grade_Level'];
    }
    public function insertEnrolleeToStudent($enrolleeId) {
        try {
            $this->conn->beginTransaction();
            $gradeLevel = $this->getEnrollingGradeLevel($enrolleeId);
            $sql = "INSERT INTO students(Enrollee_Id, Grade_Level_Id) VALUES(:enrollee_id, :grade_level)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':enrollee_id', $enrolleeId);
            $stmt->bindParam(':grade_level', $gradeLevel);

            if($stmt->execute()) {
                $this->conn->commit();
                return ['success'=> true, 'message'=> 'query executed'];
            }
            else {
                $this->conn->rollBack();
                return ['success'=> false, 'message'=> 'query failed'];
            }
            
        }
        catch(PDOException $e) {
            $this->conn->rollBack();
            return ['query'=> false, 'message'=> $e->getMessage()];
        }
    }
    public function getAllStudents() {
        try {
            $sql = "SELECT  e.Enrollee_Id,
                            e.Student_First_Name,
                            e.Student_Middle_Name,
                            e.Student_Last_Name,
                            e.Learner_Reference_Number,
                            g.Grade_Level,
                            se.Section_Name,
                            e.Student_Email,
                            s.Student_Status
                    FROM students AS s
                    LEFT JOIN enrollee AS e ON s.Enrollee_Id = e.Enrollee_Id
                    LEFT JOIN grade_level AS g ON s.Grade_Level_Id = g.Grade_Level_Id
                    LEFT JOIN sections AS se ON s.Section_Id = se.Section_Id
                    ORDER BY FIELD(g.Grade_Level, 
                    'Kinder I', 'Kinder II', 'Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5', 'Grade 6');";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
        catch(PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
    public function getStudentById($id) {
        try {
            $sql = "SELECT s.Student_Id, s.Enrollee_Id, s.Grade_Level_Id, s.Section_Id, s.Student_Status,
                            e.Student_First_Name, e.Student_Middle_Name, e.Student_Last_Name, 
                            e.Learner_Reference_Number, e.Student_Email,
                            g.Grade_Level, se.Section_Name
                    FROM students AS s
                    LEFT JOIN enrollee AS e ON s.Enrollee_Id = e.Enrollee_Id
                    LEFT JOIN grade_level AS g ON s.Grade_Level_Id = g.Grade_Level_Id
                    LEFT JOIN sections AS se ON s.Section_Id = se.Section_Id
                    WHERE s.Enrollee_Id = :id";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e) {
            return false;
        }
    }
    public function updateStudent($data) {
        try {
            $this->conn->beginTransaction();
            
            // Extract values
            $studentId = $data['student_id'];
            $enrolleeId = $data['enrollee_id'];
            $firstName = $data['first_name'];
            $middleName = $data['middle_name'];
            $lastName = $data['last_name'];
            $lrn = $data['lrn'];
            $email = $data['email'];
            $gradeLevel = $data['grade_level'];
            $section = !empty($data['section']) ? $data['section'] : null;
            $status = $data['status'];
            
            // Update enrollee table
            $sql = "UPDATE enrollee 
                    SET Student_First_Name = :first_name,
                        Student_Middle_Name = :middle_name,
                        Student_Last_Name = :last_name,
                        Learner_Reference_Number = :lrn,
                        Student_Email = :email
                    WHERE Enrollee_Id = :enrollee_id";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':first_name', $firstName);
            $stmt->bindParam(':middle_name', $middleName);
            $stmt->bindParam(':last_name', $lastName);
            $stmt->bindParam(':lrn', $lrn);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':enrollee_id', $enrolleeId, PDO::PARAM_INT);
            $stmt->execute();
            
            // Update students table
            $sql = "UPDATE students 
                    SET Grade_Level_Id = :grade_level,
                        Section_Id = :section,
                        Student_Status = :status
                    WHERE Student_Id = :student_id";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':grade_level', $gradeLevel, PDO::PARAM_INT);
            $stmt->bindParam(':section', $section, $section === null ? PDO::PARAM_NULL : PDO::PARAM_INT);
            $stmt->bindParam(':status', $status, PDO::PARAM_INT);
            $stmt->bindParam(':student_id', $studentId, PDO::PARAM_INT);
            $stmt->execute();
            
            $this->conn->commit();
            return ['success' => true, 'message' => 'Student updated successfully'];
        }
        catch(PDOException $e) {
            $this->conn->rollBack();
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
    public function getAllGradeLevels() {
        try {
            $sql = "SELECT * FROM grade_level ORDER BY Grade_Level_Id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e) {
            return [];
        }
    }
    public function getSectionsByGradeLevel($gradeLevelId) {
        try {
            $sql = "SELECT * FROM sections WHERE Grade_Level_Id = :grade_level_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':grade_level_id', $gradeLevelId, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e) {
            return [];
        }
    }
}