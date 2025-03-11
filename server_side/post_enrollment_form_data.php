<?php
require_once 'enrollment_form.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enrollment_form = new EnrollmentForm();

    // EDUCATIONAL INFORMATION
    $School_Year_Start = $_POST['start-year'];
    $School_Year_End = $_POST['end-year'];
    $If_LRNN_Returning = $_POST['LRN'];
    $Enrolling_Grade_Level = $_POST['grades-tbe'];
    $Last_Grade_Level = $_POST['last-grade'];
    $Last_Year_Attended = $_POST['last-year'];
    $enrollment_form->educational_information($School_Year_Start, $School_Year_End, $If_LRNN_Returning, $Enrolling_Grade_Level, $Last_Grade_Level, $Last_Year_Attended);

    // EDUCATIONAL BACKGROUND
    $Last_School_Attended = $_POST['lschool'];
    $School_Id = $_POST['lschoolID'];
    $School_Address = $_POST['lschoolAddress'];
    $School_Type = $_POST['educational-choice'];
    $Initial_School_Choice = $_POST['fschool'];
    $Initial_School_Id = $_POST['fschoolID'];
    $Initial_School_Address = $_POST['fschoolAddress'];
    $enrollment_form->educational_background($Last_School_Attended, $School_Id, $School_Address, $School_Type, $Initial_School_Choice, $Initial_School_Id, $Initial_School_Address);

    //  DISABILITY INFORMATION
    $Have_Special_Condition = $_POST['sn'];
    $Special_Condition = $_POST['boolsn'];
    $Have_Assistive_Tech = $_POST['at'];
    $Assistive_Tech = $_POST['atdevice'];
    $enrollment_form->disabled_student($Have_Special_Condition, $Have_Assistive_Tech, $Special_Condition, $Assistive_Tech);

    //  EROLLEE ADDRESS
    $House_Number = $_POST['House_Number'];
    $Subd_Name = $_POST['Subdivision_Name'];
    $Brgy_Name = $_POST['Barangay_Name'];
    $Municipality_Name = $_POST['Municipality_Name'];
    $Province_Name = $_POST['Province_Name'];
    $Region = $_POST['Region'];
    $enrollment_form->enrollee_address($House_Number, $Subd_Name, $Brgy_Name, $Municipality_Name, $Province_Name, $Region);

    // ENROLLEE PARENTS INFORMATION
    $Father_First_Name = $_POST['Father_First_Name'];
    $Father_Last_Name = $_POST['Father_Last_Name'];
    $Father_Middle_Name = $_POST['Father_Middle_Name'];
    $Parent_Type = "Father";
    $Father_Educational_Attainment = $_POST['Father_Educational_Attainment'];
    $Father_Contact_Number = $_POST['Father_Contact_Number'];
    $Father_Email = $_POST['Father_Email'];
    $If_4Ps = $_POST['If_4Ps'];
    $enrollment_form->father_information($Father_First_Name, $Father_Last_Name, $Father_Middle_Name, $Parent_Type, 
    $Father_Educational_Attainment, $Father_Contact_Number, $Father_Email, $If_4Ps);


    $Mother_First_Name = $_POST['Mother_First_Name'];
    $Mother_Last_Name = $_POST['Mother_Last_Name'];
    $Mother_Middle_Name = $_POST['Mother_Middle_Name'];
    $Parent_Type = "Mother";
    $Mother_Educational_Attainment = $_POST['Mother_Educational_Attainment'];
    $Mother_Contact_Number = $_POST['Mother_Contact_Number'];
    $Mother_Email = $_POST['Mother_Email'];
    $If_4Ps = $_POST['If_4Ps'];
    $enrollment_form->mother_information($Mother_First_Name, $Mother_Last_Name, $Mother_Middle_Name, $Parent_Type, 
    $Mother_Educational_Attainment, $Mother_Contact_Number, $Mother_Email, $If_4Ps);


    $Guardian_First_Name = $_POST['Guardian_First_Name'];
    $Guardian_Last_Name = $_POST['Guardian_Last_Name'];
    $Guardian_Middle_Name = $_POST['Guardian_Middle_Name'];
    $Parent_Type = "Guardian";
    $Guardian_Educational_Attainment = $_POST['Guardian_Educational_Attainment'];
    $Guardian_Contact_Number = $_POST['Guardian_Contact_Number'];
    $Guardian_Email = $_POST['Guardian_Email'];
    $If_4Ps = $_POST['If_4Ps'];
    $enrollment_form->guardian_information($Guardian_First_Name, $Guardian_Last_Name, $Guardian_Middle_Name, $Parent_Type, 
    $Guardian_Educational_Attainment, $Guardian_Contact_Number, $Guardian_Email, $If_4Ps);

    // ENROLLEE INFORMATION
    $Learner_Reference_Number = $_POST['boolLRN'];
    $Psa_Number = $_POST['PSA-number'];
    $Birth_Date = $_POST['boolLRN'];
    $Sex = $_POST['boolLRN'];
    $Religion = $_POST['boolLRN'];
    $Native_Language = $_POST['boolLRN'];
    $If_Cultural = $_POST['boolLRN'];
    $Cultural_Group = $_POST['boolLRN'];
    $Enrollment_Status = $_POST['boolLRN'];

}

?>