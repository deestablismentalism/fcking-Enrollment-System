<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSIS-Admin Enrollment Access</title>
    <?php
include '../client_side/admin_base_designs.php';
require_once '../server_side/dbconnection.php';

class AdminEnrollmentAccess {
    protected $conn;

    // Constructor to automatically connect to the database
    public function __construct() {
        $db = new Connect();
        $this->conn = $db->getConnection();
    }

    // Method to fetch student information
    public function getStudentInfo() {
        $sql_student_info = "SELECT enrollee.Student_First_Name, enrollee.Student_Middle_Name, enrollee.Student_Last_Name, 
                            enrollee.Student_Extension, enrollee.Learner_Reference_Number, educational_information.Enrolling_Grade_Level 
                            FROM enrollee 
                            JOIN educational_information 
                            ON enrollee.Educational_Information_Id = educational_information.Educational_Information_Id;";
        
        $student_info = $this->conn->prepare($sql_student_info);
        $student_info->execute();

        return $student_info->fetchAll(PDO::FETCH_ASSOC);
    }   
}
    // Instantiate the class and fetch data
    $adminAccess = new AdminEnrollmentAccess();
    $results = $adminAccess->getStudentInfo();
?>
    <link rel="stylesheet" href="../css/Admin_Enrollment_Access.css">
</head>
<body>
    <div class="main-content">
        <div class="content">
            <div class="enrollment-start">
                <div class="enrollment-access">
                    <div class="header">
                        <div class="header-left">
                            <h2> Pending Enrollments </h2>
                        </div>
                        <div class="header-right">
                            <?php
                            // Display the number of rows in the table
                            echo "<h2>" . "450" . "</h2>";
                            ?>
                        </div>
                    </div>
                    <div class="menu-content">
                        <table class="enrollments">
                            <tr>
                                <th>Student LRN</th>
                                <th>Student Name</th>
                                <th>Grade Level</th>
                                <th>Guardian Name</th>
                                <th>Guardian Contact</th>
                                <th>Enrollment Form Status</th>
                                <th>Student Status</th>
                                <th>Edit Student</th>
                            </tr>
                                <?php      
                                // Loop through the results and display them in the table
                                foreach ($results as $row) {
                                    echo "<tr>";
                                    echo "<td>" . $row['Learner_Reference_Number'] . "</td>";
                                    echo "<td>" . $row['Student_First_Name'] . " " . $row['Student_Middle_Name'] . " " . $row['Student_Last_Name'] ." ". $row['Student_Extension'] . "</td>";
                                    echo "<td>" . $row['Enrolling_Grade_Level'] . "</td>";
                                    echo "<td> Sample Guardian Name </td>";
                                    echo "<td> Sample Guardian Contact </td>";
                                    echo "<td> Sample Enrollment Form Status </td>";
                                    echo "<td> Sample Student Status </td>";
                                    //to be linked to the admin_enrollment_access_status.php page and move it to that specific web page
                                    echo "<td><button class='edit-button'>Edit</button></td>"; 
                                    echo "</tr>";
                                }
                                ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>       
</body>    
