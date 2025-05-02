<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSIS-Admin Enrollment Access</title>
    <link rel="stylesheet" href="../css/Admin_Enrollment_Access.css">
    <link rel="stylesheet" href="../css/admin_base_designs.css">
    <?php 
        include_once './admin_base_designs.php';
    ?>
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
                            require_once __DIR__ . '/../server_side/enrollmentStatusView.php';
                            $enrollmentStatusView = new AdminEnrollmentStatusView();
                            $enrollmentStatusView->displayCount();
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
                                <th> Display Enrollment Information</th>
                            </tr>
                                <?php      
                                require_once __DIR__ . '/../server_side/enrollmentStatusView.php';
                                $enrollmentStatusView = new AdminEnrollmentStatusView();
                                $enrollmentStatusView->displayEnrollees();
                                ?>
                        </table>
                    </div>
                    <div id="enrolleeModal" class="modal">
                        <div class="modal-content">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
    <script src="../js/enrollee-popUp.js" defer></script>
</body>    
</html>