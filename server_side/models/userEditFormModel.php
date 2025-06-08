<?php
require_once __DIR__ . '/../core/dbconnection.php';

class userEditFormModel {
    private $conn;

    public function __construct() {
        $db = new Connect();
        $this->conn = $db->getConnection();
    }
    
    public function getEnrolleeData($enrolleeId) {
        try {
            // First get the enrollee's basic information
            $sql = "SELECT e.*,
                    ei.If_LRN_Returning,
                    ei.Enrolling_Grade_Level,
                    ei.Last_Grade_Level,
                    ei.Last_Year_Attended,
                    eb.*,
                    ea.*,
                    ds.*,
                    pd.filename as psa_image_filename,
                    pd.directory as psa_image_path
                FROM enrollee AS e
                JOIN educational_information AS ei ON e.Educational_Information_ID = ei.Educational_Information_ID
                JOIN educational_background AS eb ON e.Educational_Background_ID = eb.Educational_Background_ID
                JOIN enrollee_address AS ea ON e.Enrollee_Address_ID = ea.Enrollee_Address_ID
                JOIN disabled_student AS ds ON e.Disabled_Student_ID = ds.Disabled_Student_ID
                LEFT JOIN Psa_directory AS pd ON e.Psa_Image_Id = pd.Psa_Image_Id
                WHERE e.Enrollee_ID = :enrolleeId";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':enrolleeId', $enrolleeId);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$result) {
                return null;
            }

            // Get parent information
            $parentSql = "SELECT pi.*, ep.Relationship
                         FROM enrollee_parents ep
                         JOIN parent_information pi ON ep.Parent_Id = pi.Parent_Id
                         WHERE ep.Enrollee_Id = :enrolleeId";
            
            $parentStmt = $this->conn->prepare($parentSql);
            $parentStmt->bindParam(':enrolleeId', $enrolleeId);
            $parentStmt->execute();
            $parents = $parentStmt->fetchAll(PDO::FETCH_ASSOC);

            // Organize parent information by relationship
            $parentInfo = [];
            foreach ($parents as $parent) {
                $relationship = strtolower($parent['Relationship']);
                $parentInfo[$relationship] = [
                    'first_name' => $parent['First_Name'],
                    'middle_name' => $parent['Middle_Name'],
                    'last_name' => $parent['Last_Name'],
                    'educational_attainment' => $parent['Educational_Attainment'],
                    'contact_number' => $parent['Contact_Number'],
                    'if_4ps' => $parent['If_4Ps']
                ];
            }

            // Add parent information to result
            $result['parent_information'] = $parentInfo;
            
            return $result;
        }
        catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function setResubmitStatus($enrolleeId) {
        try {
            $sql = "UPDATE enrollment_transactions SET Is_Resubmitted = 1 WHERE Enrollee_ID = :enrolleeId";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':enrolleeId', $enrolleeId);
            $stmt->execute();
            return ['success' => true, 'message' => 'Resubmit status updated successfully'];
            }
        catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function updateEnrolleeData($enrolleeId, $data) {
        try {
            $this->conn->beginTransaction();

            // 1. Update enrollee table
            $enrolleeSQL = "UPDATE enrollee SET 
                Student_First_Name = :firstName,
                Student_Last_Name = :lastName,
                Student_Middle_Name = :middleName,
                Student_Extension = :extension,
                Learner_Reference_Number = :lrn,
                Psa_Number = :psa,
                Age = :age,
                Birth_Date = :birthdate,
                Sex = :sex,
                Religion = :religion,
                Native_Language = :nativeLanguage,
                If_Cultural = :ifCultural,
                Cultural_Group = :culturalGroup,
                Student_Email = :email
                WHERE Enrollee_ID = :enrolleeId";

            $enrolleeStmt = $this->conn->prepare($enrolleeSQL);
            $enrolleeStmt->execute([
                ':firstName' => $data['first_name'],
                ':lastName' => $data['last_name'],
                ':middleName' => $data['middle_name'],
                ':extension' => $data['extension'],
                ':lrn' => $data['lrn'],
                ':psa' => $data['psa'],
                ':age' => $data['age'],
                ':birthdate' => $data['birthdate'],
                ':sex' => $data['sex'],
                ':religion' => $data['religion'],
                ':nativeLanguage' => $data['native_language'],
                ':ifCultural' => $data['belongs_in_cultural_group'],
                ':culturalGroup' => $data['cultural_group'],
                ':email' => $data['email_address'],
                ':enrolleeId' => $enrolleeId
            ]);

            // 2. Update educational_information table
            $eduInfoSQL = "UPDATE educational_information ei 
                JOIN enrollee e ON e.Educational_Information_ID = ei.Educational_Information_ID
                SET 
                ei.Enrolling_Grade_Level = :enrollingGrade,
                ei.Last_Grade_Level = :lastGrade,
                ei.Last_Year_Attended = :lastYear
                WHERE e.Enrollee_ID = :enrolleeId";

            $eduInfoStmt = $this->conn->prepare($eduInfoSQL);
            $eduInfoStmt->execute([
                ':enrollingGrade' => $data['enrolling_grade_level'],
                ':lastGrade' => $data['last_grade_level'],
                ':lastYear' => $data['last_year_attended'],
                ':enrolleeId' => $enrolleeId
            ]);

            // 3. Update educational_background table
            $eduBgSQL = "UPDATE educational_background eb 
                JOIN enrollee e ON e.Educational_Background_ID = eb.Educational_Background_ID
                SET 
                eb.Last_School_Attended = :lastSchool,
                eb.School_Id = :schoolId,
                eb.School_Address = :schoolAddress,
                eb.School_Type = :schoolType
                WHERE e.Enrollee_ID = :enrolleeId";

            $eduBgStmt = $this->conn->prepare($eduBgSQL);
            $eduBgStmt->execute([
                ':lastSchool' => $data['last_school_attended'],
                ':schoolId' => $data['school_id'],
                ':schoolAddress' => $data['school_address'],
                ':schoolType' => $data['school_type'],
                ':enrolleeId' => $enrolleeId
            ]);

            // 4. Update enrollee_address table
            $addressSQL = "UPDATE enrollee_address ea 
                JOIN enrollee e ON e.Enrollee_Address_ID = ea.Enrollee_Address_ID
                SET 
                ea.Region_Code = :region,
                ea.Region = :regionName,
                ea.Province_Code = :province,
                ea.Province_Name = :provinceName,
                ea.Municipality_Code = :municipality,
                ea.Municipality_Name = :municipalityName,
                ea.Brgy_Code = :barangay,
                ea.Brgy_Name = :barangayName,
                ea.Subd_Name = :subdivision,
                ea.House_Number = :houseNumber
                WHERE e.Enrollee_ID = :enrolleeId";

            $addressStmt = $this->conn->prepare($addressSQL);
            $addressStmt->execute([
                ':region' => $data['region'],
                ':regionName' => $data['region_name'],
                ':province' => $data['province'],
                ':provinceName' => $data['province_name'],
                ':municipality' => $data['city-municipality'],
                ':municipalityName' => $data['city_municipality_name'],
                ':barangay' => $data['barangay'],
                ':barangayName' => $data['barangay_name'],
                ':subdivision' => $data['subdivision'],
                ':houseNumber' => $data['house_number'],
                ':enrolleeId' => $enrolleeId
            ]);

            // 5. Update disabled_student table
            $disabledSQL = "UPDATE disabled_student ds 
                JOIN enrollee e ON e.Disabled_Student_ID = ds.Disabled_Student_ID
                SET 
                ds.Have_Special_Condition = :hasSpecialCondition,
                ds.Special_Condition = :specialCondition,
                ds.Have_Assistive_Tech = :hasAssistiveTech,
                ds.Assistive_Tech = :assistiveTech
                WHERE e.Enrollee_ID = :enrolleeId";

            $disabledStmt = $this->conn->prepare($disabledSQL);
            $disabledStmt->execute([
                ':hasSpecialCondition' => $data['has_a_special_condition'],
                ':specialCondition' => $data['special_condition'],
                ':hasAssistiveTech' => $data['has_assistive_technology'],
                ':assistiveTech' => $data['assistive_technology'],
                ':enrolleeId' => $enrolleeId
            ]);

            // Update parent information
            foreach (['father', 'mother', 'guardian'] as $relationship) {
                if (isset($data['parent_information'][$relationship])) {
                    $parentInfo = $data['parent_information'][$relationship];
                    $parentSQL = "UPDATE parent_information pi
                                JOIN enrollee_parents ep ON pi.Parent_Id = ep.Parent_Id
                                SET 
                                pi.First_Name = :firstName,
                                pi.Middle_Name = :middleName,
                                pi.Last_Name = :lastName,
                                pi.Educational_Attainment = :educationalAttainment,
                                pi.Contact_Number = :contactNumber,
                                pi.If_4Ps = :if4ps
                                WHERE ep.Enrollee_Id = :enrolleeId 
                                AND ep.Relationship = :relationship";

                    $parentStmt = $this->conn->prepare($parentSQL);
                    $parentStmt->execute([
                        ':firstName' => $parentInfo['first_name'],
                        ':middleName' => $parentInfo['middle_name'],
                        ':lastName' => $parentInfo['last_name'],
                        ':educationalAttainment' => $parentInfo['educational_attainment'],
                        ':contactNumber' => $parentInfo['contact_number'],
                        ':if4ps' => $parentInfo['if_4ps'],
                        ':enrolleeId' => $enrolleeId,
                        ':relationship' => ucfirst($relationship)
                    ]);
                }
            }
            $this->conn->commit();
            $this->setResubmitStatus($enrolleeId);
            return ['success' => true, 'message' => 'Enrollment data updated successfully'];

        } catch (PDOException $e) {
            $this->conn->rollBack();
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function getPSAImageData($enrolleeId) {
        try {
            $sql = "SELECT pd.filename, pd.directory as filepath
                    FROM enrollee e
                    JOIN Psa_directory pd ON e.Psa_Image_Id = pd.Psa_Image_Id
                    WHERE e.Enrollee_Id = :enrolleeId";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':enrolleeId', $enrolleeId);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }
}
