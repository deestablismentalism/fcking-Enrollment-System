<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/User_Enrollees.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
    <?php
        include './User_Base_Designs.php'; 
    ?>
</head>
<body>
    <!--START OF THE MAIN CONTENT-->
    <div class="content">
        <div class="wrapper">
            <p class = "title"> Enrollment Forms Submitted </p> <br>
            <div class="table-container">
                <table id="user-enrollees-table"> 
                   <tbody> 
                        <?php
                        include_once __DIR__ . '/../server_side/users/userEnrolleesView.php';
                        $enrollee = new displayEnrollmentForms();
                        $enrollee->displaySubmittedForms();
                        ?>
                   </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="../js/user-enrollees.js"defer></script>
</html>