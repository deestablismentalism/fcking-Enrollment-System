<?php
require_once 'enrollment_form.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enrollment_form = new EnrollmentForm();

    // EDUCATIONAL INFORMATION
    $School_Year_Start = $_POST['start-year'] ?? "";
    $School_Year_End = $_POST['end-year'] ?? "";
    $If_LRNN_Returning = $_POST['LRN'] ?? "";
    $Enrolling_Grade_Level = $_POST['grades-tbe'] ?? "";
    $Last_Grade_Level = $_POST['last-grade'] ?? "";
    $Last_Year_Attended = $_POST['last-year'] ?? "";

    // EDUCATIONAL BACKGROUND
    $Last_School_Attended = $_POST['lschool'] ?? "";
    $School_Id = $_POST['lschoolID'] ?? "";
    $School_Address = $_POST['lschoolAddress'] ?? "";
    $School_Type = $_POST['educational-choice'] ?? "";
    $Initial_School_Choice = $_POST['fschool'] ?? "";
    $Initial_School_Id = $_POST['fschoolID'] ?? "";
    $Initial_School_Address = $_POST['fschoolAddress'] ?? "";

    //  DISABILITY INFORMATION
    $Have_Special_Condition = $_POST['sn'] ?? "";
    $Special_Condition = $_POST['boolsn'] ?? "";
    $Have_Assistive_Tech = $_POST['at'] ?? "";
    $Assistive_Tech = $_POST['atdevice'] ?? "";

    //  EROLLEE ADDRESS
    $House_Number = $_POST['house-number'] ?? "";
    $Subd_Name = $_POST['division'] ?? "";
    $Brgy_Name = $_POST['barangay'] ?? "";
    $Municipality_Name = $_POST['city-municipality'] ?? "";
    $Province_Name = $_POST['province'] ?? "";
    $Region = $_POST['region'] ?? "";

    // ENROLLEE PARENTS INFORMATION
    $Father_First_Name = $_POST['Father-First-Name'] ?? "";
    $Father_Last_Name = $_POST['Father-Last-Name'] ?? "";
    $Father_Middle_Name = $_POST['Father-Middle-Name'] ?? "";
    $Father_Parent_Type = "Father";
    $Father_Educational_Attainment = $_POST['F-highest-education'] ?? "";
    $Father_Contact_Number = $_POST['F-Number'] ?? "";
    $FIf_4Ps = $_POST['fourPS'] ?? "";

    $Mother_First_Name = $_POST['Mother_First_Name'] ?? "";
    $Mother_Last_Name = $_POST['Mother_Last_Name'] ?? "";
    $Mother_Middle_Name = $_POST['Mother_Middle_Name'] ?? "";
    $Mother_Parent_Type = "Mother";
    $Mother_Educational_Attainment = $_POST['M-highest-education'] ?? "";
    $Mother_Contact_Number = $_POST['M-Number'] ?? "";
    $MIf_4Ps = $_POST['fourPS'] ?? "";


    $Guardian_First_Name = $_POST['Guardian_First_Name'] ?? "";
    $Guardian_Last_Name = $_POST['Guardian_Last_Name'] ?? "";
    $Guardian_Middle_Name = $_POST['Guardian_Middle_Name'] ?? "";
    $Guardian_Parent_Type = "Guardian";
    $Guardian_Educational_Attainment = $_POST['G-highest-education'] ?? "";
    $Guardian_Contact_Number = $_POST['G-Number'] ?? "";
    $GIf_4Ps = $_POST['fourPS'] ?? "";

    // ENROLLEE INFORMATION
    $Student_First_Name = $_POST['fname'] ?? "";
    $Student_Middle_Name = $_POST['mname'] ?? "";
    $Student_Last_Name = $_POST['lname'] ?? "";
    $Student_Extension = $_POST['extension'] ?? "";
    $Learner_Reference_Number = $_POST['boolLRN'] ?? "";
    $Psa_Number = $_POST['PSA-number'] ?? "";
    $Birth_Date = $_POST['bday'] ?? "";
    $Age = $_POST['age'] ?? "";
    $Sex = $_POST['gender'] ?? "";
    $Religion = $_POST['religion'] ?? "";
    $Native_Language = $_POST['language'] ?? "";
    $If_Cultural = $_POST['group'] ?? "";
    $Cultural_Group = $_POST['community'] ?? "";
    $Student_Email = $_POST['email'] ?? "";
    $Enrollment_Status = "3";

    //Bind all Information
    $enrollment_form->Insert_Enrollee($School_Year_Start, $School_Year_End, $If_LRNN_Returning, $Enrolling_Grade_Level, $Last_Grade_Level, $Last_Year_Attended,
    $Last_School_Attended, $School_Id, $School_Address, $School_Type, $Initial_School_Choice, $Initial_School_Id, $Initial_School_Address,
    $Have_Special_Condition, $Have_Assistive_Tech, $Special_Condition, $Assistive_Tech,
    $House_Number, $Subd_Name, $Brgy_Name, $Municipality_Name, $Province_Name, $Region,
    $Father_First_Name, $Father_Last_Name, $Father_Middle_Name, $Father_Parent_Type, $Father_Educational_Attainment, $Father_Contact_Number, $FIf_4Ps,
    $Mother_First_Name, $Mother_Last_Name, $Mother_Middle_Name, $Mother_Parent_Type, $Mother_Educational_Attainment, $Mother_Contact_Number, $MIf_4Ps,
    $Guardian_First_Name, $Guardian_Last_Name, $Guardian_Middle_Name, $Guardian_Parent_Type, $Guardian_Educational_Attainment, $Guardian_Contact_Number, $GIf_4Ps,
    $Student_First_Name, $Student_Middle_Name, $Student_Last_Name, $Student_Extension, $Learner_Reference_Number, $Psa_Number, $Birth_Date, $Age, $Sex, $Religion, 
    $Native_Language, $If_Cultural, $Cultural_Group, $Student_Email, $Enrollment_Status);
}

?>