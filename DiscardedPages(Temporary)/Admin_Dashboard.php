<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin_dashboard.css"> 
    <?php
        include './admin_base_designs.php'; 
    ?>

        <!--START OF THE MAIN CONTENT-->
        <div class="content">
            <div class="card-container">
                <!--Enrolled-->
                <div class="card card-1">
                    <div class="card-image border-50">
                        <img src="../imgs/student.svg" alt="">
                        <p class="card-text">Enrolled</p>   
                    </div>
                    <div class="number-div">
                        <p class="number">
                            1,300
                        </p>
                    </div>
                </div>
                <!--Pending Enrollees-->
                <div class="card card-2">
                    <div class="card-image border-50">
                        <img src="../imgs/student.svg" alt="">
                        <p class="card-text">Pending Enrollees</p>   
                    </div>
                    <div class="number-div">
                        <p class="number">
                            1300
                        </p>
                    </div>
                </div>
                <!--To Follow Up-->
                <div class="card card-3">
                    <div class="card-image border-50">
                        <img src="../imgs/student.svg" alt="">
                        <p class="card-text">To Follow up</p>   
                    </div>
                    <div class="number-div">
                        <p class="number">
                            1300
                        </p>
                    </div>
                </div>
                <!--Early Registration-->
                <div class="card card-4">
                    <div class="card-image border-50">
                        <img src="../imgs/student.svg" alt="">
                        <p class="card-text">Early Registration</p>   
                    </div>
                    <div class="number-div">
                        <p class="number">
                            1300
                        </p>
                    </div>
                </div>
            </div>
            <div class="big-card-wrapper">
                <!--PENDING ENROLLMENTS BIG-->
                <div class="pending-enrollments-wrapper">
                    <h3 class="big-card-title">Pending Enrollees</h3>
                    <table class="pending-enrollments-table">
                        <tr>
                            <th>LRN</th>
                            <th>Name</th>
                            <th>Level</th>
                            <th>Contact Number</th>
                        </tr>
                        <tr>
                            <td>Hi</td>
                            <td>Hi</td>
                            <td>Hi</td>
                            <td>Hi</td>
                        </tr>
                        <tr>
                            <td>Hi</td>
                            <td>Hi</td>
                            <td>Hi</td>
                            <td>Hi</td>
                        </tr>
                        <tr>
                            <td>Hi</td>
                            <td>Hi</td>
                            <td>Hi</td>
                            <td>Hi</td>
                        </tr>
                        <tr>
                            <td>Hi</td>
                            <td>Hi</td>
                            <td>Hi</td>
                            <td>Hi</td>
                        </tr>
                        <tr>
                            <td>Hi</td>
                            <td>Hi</td>
                            <td>Hi</td>
                            <td>Hi</td>
                        </tr>
                    </table>
                </div>
                <!--Post Announcments BIG-->
                <div class="post-announcement-wrapper">
                    <div class="big-card-header">
                        <h3 class="big-card-title post-announcements-title">
                            Post Announcements
                        </h3>
                        <button class="edit-btn">
                            Edit
                        </button>
                    </div>
                    <div class="img-container">
                        <img src="" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
    