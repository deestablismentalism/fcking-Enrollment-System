<html>
    <head>  
    <?php include_once "./User_Base_Designs.php";?>
    <body>
        <h1> Enrollment Forms Submitted </h1>
        <table> 
            <?php
                include_once __DIR__ . '/../server_side/userEnrolleesView.php';
                $enrollee = new displayEnrollmentForms();
                $enrollee->displaySubmittedForms();
            ?>
        </table>
    </body>
</html>