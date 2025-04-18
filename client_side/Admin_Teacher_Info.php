<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSIS-Admin Teacher Info</title> 
    <?php
        include '../client_side/admin_base_designs.php';
    ?>
    <link rel="stylesheet" href="../css/Admin_Teacher_Info.css">
</head>
<body>
    <div class="main-content">
        <div class="content">
            <div class="teacher-info-start">
                <div class="header">
                    <div class="header-left">
                        <h2> Teacher Information </h2>
                    </div>
                    <div class="header-middle">
                        <p class="teacher-info">Personal Information and Position</p>
                        <p class="add-teacher">Add Teacher</p>
                    </div>
                    <div class="header-right">
                        <p class="teacher-status">Status</p>
                        <p class="status">Active</p>
                        <button class="button">Edit</button>
                    </div>
                </div>
                <div class="menu-content">
                    <div class="profile-menu">
                        <div class="profile-pic">
                            <img src="../imgs/sample-teacher.png" alt="Teacher">
                        </div>
                        <div class="profile-name">
                            <p class="profile-top">Teacher Name</p>
                            <p class="profile-bottom">Marion J. Park</p>
                        </div>
                        <div class="profile-email">
                            <p class="profile-top">Email</p>
                            <p class="profile-bottom">jeonpark@gmail.com</p>
                        </div>
                        <div class="profile-contact">
                            <p class="profile-top">Contact Number</p>
                            <p class="profile-bottom">+63 935 487 7747</p>
                        </div>
                        <div class="profile-address">
                            <p class="profile-top">Address</p>
                            <p class="profile-bottom">Providence Tower 3000, Unit 2112, Leon Guinto St., Malate, Manila</p>
                        </div>
                    </div>
                    <div class="profile-content">
                        <p class="position">Current Postion</p>
                        <p class="advisory">Class Advisory</p>
                        <table class="profile-info">
                            <tr>
                                <th>Section</th>
                                <th>Grade Level</th>
                                <th>Total Number of Students</th>
                            </tr>
                            <tr>
                                <td>Mahogany</td>
                                <td>Grade 1</td>
                                <td>22</td>
                            </tr>
                        </table>
                        <p class="subject-handled">Subject(s) Handled</p>
                        <table class="profile-info">
                            <tr>
                                <th>Subject</th>
                                <th>Grade Level</th>
                                <th>Section</th>
                                <th>Total Number of Students</th>
                            </tr>
                            <tr>
                                <td>English</td>
                                <td>Grade 3</td>
                                <td>Narra</td>
                                <td>23</td>
                            </tr>
                            <tr>
                                <td>Math</td>
                                <td>Grade 1</td>
                                <td>Mahogany</td>
                                <td>22</td>
                            </tr>
                            <tr>
                                <td>Science</td>
                                <td>Grade 2</td>
                                <td>Acacia</td>
                                <td>25</td>
                            </tr>
                        </table>
                    </div>
                </div>            
            </div>
        </div>
    </div>
</body>
</html>