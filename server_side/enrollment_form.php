<?php
require_once 'dbconnection.php';

class EnrollmentForm {
    protected $conn;
    
    //automatically run and connect database
    public function __construct() {
        $db = new Connect();
        $this->conn = $db->getConnection();
    }
    
    // Insert educational information function
    public function educational_information($School_Year_Start, $School_Year_End, $If_LRNN_Returning, $Enrolling_Grade_Level, $Last_Grade_Level, $Last_Year_Attended) {
        try {
            $sql_educational_information = "INSERT INTO educational_information (School_Year_Start, School_Year_End, 
                                            If_LRNN_Returning, Enrolling_Grade_Level, Last_Grade_Level, Last_Year_Attended)
                                            VALUES (:School_Year_Start, :School_Year_End, :If_LRNN_Returning, :Enrolling_Grade_Level,
                                            :Last_Grade_Level, :Last_Year_Attended)";
            $insert_educational_information = $this->conn->prepare($sql_educational_information);
            $insert_educational_information->bindParam(':School_Year_Start', $School_Year_Start);
            $insert_educational_information->bindParam(':School_Year_End', $School_Year_End);
            $insert_educational_information->bindParam(':If_LRNN_Returning', $If_LRNN_Returning);
            $insert_educational_information->bindParam(':Enrolling_Grade_Level', $Enrolling_Grade_Level);
            $insert_educational_information->bindParam(':Last_Grade_Level', $Last_Grade_Level);
            $insert_educational_information->bindParam(':Last_Year_Attended', $Last_Year_Attended);
            $insert_educational_information->execute();
            if ($insert_educational_information->execute()) {
                return $this->conn->lastInsertId(); // Return the last inserted ID
            } else {
                return "Error: Failed to insert educational information.";
            }
        }
        catch (PDOException $e){
            return "Submission Failed: " . $e->getMessage();
        }
    }

    // Insert educational background function
    public function educational_background($Last_School_Attended, $School_Id, $School_Address, $School_Type, $Initial_School_Choice, $Initial_School_Id, $Initial_School_Address) {
        try {
            $sql_educational_background = "INSERT INTO educational_background (Last_School_Attended, School_Id, School_Address, 
                                        School_Type, Initial_School_Choice, Initial_School_Id, Initial_School_Address)
                                        VALUES (:Last_School_Attended, :School_Id, :School_Address, :School_Type, :Initial_School_Choice,
                                         :Initial_School_Id, :Initial_School_Address)";
            $insert_educational_background = $this->conn->prepare($sql_educational_background);
            $insert_educational_background->bindParam(':Last_School_Attended', $Last_School_Attended);
            $insert_educational_background->bindParam(':School_Id', $School_Id);
            $insert_educational_background->bindParam(':School_Address', $School_Address);
            $insert_educational_background->bindParam(':School_Type', $School_Type);
            $insert_educational_background->bindParam(':Initial_School_Choice', $Initial_School_Choice);
            $insert_educational_background->bindParam(':Initial_School_Id', $Initial_School_Id);
            $insert_educational_background->bindParam(':Initial_School_Address', $Initial_School_Address);
            if ($insert_educational_background->execute()) {
                return $this->conn->lastInsertId();
            } else {
                return "Error: Failed to insert educational background.";
            }
        } 
        catch (PDOException $e) {
            return "Submission Failed: " . $e->getMessage();
        }
    }

    // Insert student disabled student function
    public function disabled_student($Have_Special_Condition, $Have_Assistive_Tech, $Special_Condition, $Assistive_Tech) {
        try {
            $sql_disabled_student = "INSERT INTO disabled_student (Have_Special_Condition, Have_Assistive_Tech,
                                    Special_Condition, Assistive_Tech)
                                    VALUES (:Have_Special_Condition, :Have_Assistive_Tech, :Special_Condition, :Assistive_Tech)";
            $insert_disabled_student = $this->conn->prepare($sql_disabled_student);
            $insert_disabled_student->bindParam(':Have_Special_Condition', $Have_Special_Condition);
            $insert_disabled_student->bindParam(':Have_Assistive_Tech', $Have_Assistive_Tech);
            $insert_disabled_student->bindParam(':Special_Condition', $Special_Condition);
            $insert_disabled_student->bindParam(':Assistive_Tech', $Assistive_Tech);
            if ($insert_disabled_student->execute()) {
                return $this->conn->lastInsertId();
            } else {
                return "Error: Failed to insert disability information.";
            }
        } 
        catch (PDOException $e) {
            return "Submission Failed: " . $e->getMessage();
        } 
    }

    // Insert enrollee address function
    public function enrollee_address($House_Number, $Subd_Name, $Brgy_Name, $Municipality_Name, $Province_Name, $Region) {
        try {
            $sql_enrollee_address = "INSERT INTO enrollee_address (House_Number, Subd_Name, Brgy_Name, Municipality_Name, Province_Name, Region)
                                    VALUES (:House_Number, :Subd_Name, :Brgy_Name, :Municipality_Name, :Province_Name, :Region)";
            $insert_enrollee_address = $this->conn->prepare($sql_enrollee_address);
            $insert_enrollee_address->bindParam(':House_Number', $House_Number);
            $insert_enrollee_address->bindParam(':Subd_Name', $Subd_Name);
            $insert_enrollee_address->bindParam(':Brgy_Name', $Brgy_Name);
            $insert_enrollee_address->bindParam(':Municipality_Name', $Municipality_Name);
            $insert_enrollee_address->bindParam(':Province_Name', $Province_Name);
            $insert_enrollee_address->bindParam(':Region', $Region);

            if ($insert_enrollee_address->execute()) {
                return $this->conn->lastInsertId();
            } else {
                return "Error: Failed to enrollee address.";
            }
        }
        catch (PDOException $e) {
            return "Submission Failed: " . $e->getMessage();
        }
    }
    
    // Insert parent information function
    public function parent_information() {

    }

    // Insert images function
    public function images() {

    }

    // Insert enrollee function MAIN FUNCTION!!!!
    public function Insert_Enrollee() {
        
    }

}
?>