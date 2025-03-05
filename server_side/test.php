<?php
require_once 'enrollment_form.php';

//create object from selectAll class

// //call selectAll functions 
// $enrollees = $selectAll->selectAllEnrollees();
// $registrations = $selectAll->selectAllRegistrations();
// $users = $selectAll->selectAllUsers();


// if ($enrollees) {
//     print_r($enrollees);
//     echo "Data found Successfully!";
// }

// if ($registrations) {
//     print_r($registrations);
//     echo "Data found Successfully!";
// }

// if ($users) {
//     print_r($users);
//     echo "Data found Successfully!";
// }


// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $enrollment_form = new EnrollmentForm();
//     // Collect form data
//     $School_Year_Start = $_POST['School_Year_Start'];
//     $School_Year_End = $_POST['School_Year_End'];
//     $If_LRNN_Returning = $_POST['If_LRNN_Returning'];
//     $Enrolling_Grade_Level = $_POST['Enrolling_Grade_Level'];
//     $Last_Grade_Level = $_POST['Last_Grade_Level'];
//     $Last_Year_Attended = $_POST['Last_Year_Attended'];

//     // Call function to insert data
//     $response = $enrollment_form->educational_information($School_Year_Start, $School_Year_End, $If_LRNN_Returning, $Enrolling_Grade_Level, $Last_Grade_Level, $Last_Year_Attended);

//     echo $response;
// }

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $enrollment_form = new EnrollmentForm();
//     // Collect form data
//     $Last_School_Attended = $_POST['Last_School_Attended'];
//     $School_Id = $_POST['School_Id'];
//     $School_Address = $_POST['School_Address'];
//     $School_Type = $_POST['School_Type'];
//     $Initial_School_Choice = $_POST['Initial_School_Choice'];
//     $Initial_School_Id = $_POST['Initial_School_Id'];
//     $Initial_School_Address = $_POST['Initial_School_Address'];
//     // Call function to insert data
//     $response = $enrollment_form->educational_background($Last_School_Attended, $School_Id, $School_Address, $School_Type, $Initial_School_Choice, $Initial_School_Id, $Initial_School_Address);

//     echo $response;
// }

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $enrollment_form = new EnrollmentForm();


//     // Collect form data
//     $Have_Special_Condition = $_POST['Have_Special_Condition'];
//     $Have_Assistive_Tech = $_POST['Have_Assistive_Tech'];
//     $Special_Condition = $_POST['Special_Condition'];
//     $Assistive_Tech = $_POST['Assistive_Tech'];
//     // Call function to insert data
//     $response = $enrollment_form->disabled_student($Have_Special_Condition, $Have_Assistive_Tech, $Special_Condition, $Assistive_Tech);

//     echo $response;
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enrollment_form = new EnrollmentForm();

    // Collect form data
    $House_Number = $_POST['House_Number'];
    $Subd_Name = $_POST['Subdivision_Name'];
    $Brgy_Name = $_POST['Barangay_Name'];
    $Municipality_Name = $_POST['Municipality_Name'];
    $Province_Name = $_POST['Province_Name'];
    $Region = $_POST['Region'];
    // Call function to insert data
    $response = $enrollment_form->enrollee_address($House_Number, $Subd_Name, $Brgy_Name, $Municipality_Name, $Province_Name, $Region);

    echo $response;
}

?>