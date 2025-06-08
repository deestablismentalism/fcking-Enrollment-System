<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/admin_dashboard.css"> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script src="../js/dashboard-json-fetcher.js" defer></script>
    <?php
        include '../adminPages/admin_base_designs.php'; 
    ?>

        <!--START OF THE MAIN CONTENT-->
        <div class="content">
                
            <div class="enrollee-data-wrapper">
                <div class="dashboard-hyperlinks">
                    <a href="Admin_All_Enrollees.php" class="all-hyperlinks-wrapper"> 
                        <div class="all-enrollees-count">
                            <h1 class="data-link-title"> All Enrollees </h1>
                            <?php 
                                include_once __DIR__.'/../server_side/models/DashboardModel.php';
                                $dashboard = new DashboardModel();
                                $total_enrollees = $dashboard->TotalEnrollees();
                            ?>
                            <span id="total-enrollees" class="total-count"><?php echo $total_enrollees; ?></span> 
                        </div>
                    </a>
                    <a href="Admin_All_Students.php" class="all-hyperlinks-wrapper">
                        <div class="all-students-count">
                            <h1 class="data-link-title"> All Students </h1>
                            <?php 
                                $total_students = $dashboard->countTotalStudents();
                            ?>
                            <span id="total-students" class="total-count"><?php echo $total_students; ?></span>
                        </div>
                    </a>
                    <a href="Admin_Denied_FollowUp.php" class="all-hyperlinks-wrapper">
                        <div class="all-denied-follow-up-count">
                            <h1 class="data-link-title"> Denied Follow Up </h1>
                            <?php
                                $total_denied_follow_up = $dashboard->TotalDeniedFollowUp();
                            ?>
                            <span id="total-denied-follow-up" class="total-count"><?php echo $total_denied_follow_up; ?></span>
                        </div>
                    </a>
                </div>
                <h1 class="data-title"> Enrollee data</h1>
                <div class="card-container">
                <!--Enrolled-->
                <p class="chart-loading" id="enrollee-pie-chart-loading"> Waiting for the data to load...</p>
                <div class="card card-1" id="pie-chart-container">
                    <canvas id="enrollee-pie-chart" ></canvas>
                </div>
                <!--Pending Enrollees-->
                <p class="chart-loading" id="enrollee-grade-level-distribution-loading"> Waiting for the data to load...</p>
                <div class="card card-2" id="grade-level-distribution-container">
                    <canvas id="enrollee-grade-level-distribution">canvas>
                </div>
                <!--To Follow Up-->
                <p class="chart-loading" id="enrollee-biological-sex-loading"> Waiting for the data to load...</p>
                <div class="card card-3" id="biological-sex-container">
                     <canvas id="enrollee-biological-sex"></canvas>
                </div>
                </div>
                <div class="students-data-wrapper">
                    <h1 class="data-title"> Student data</h1>
                        <div class="card-container">

                            <p class="chart-loading" id="student-pie-chart-loading"> Waiting for the data to load...</p>
                            <div class="card card-4" id="student-pie-chart-container">
                                <canvas id="student-pie-chart"></canvas>
                            </div>
                            <p class="chart-loading" id="student-grade-level-distribution-loading"> Waiting for the data to load...</p>
                            <div class="card card-5" id="student-grade-level-distribution-container">
                                <canvas id="student-grade-level-distribution"></canvas>
                            </div>
                            <p class="chart-loading" id="student-biological-sex-loading"> Waiting for the data to load...</p>
                            <div class="card card-6" id="student-biological-sex-container">
                                <canvas id="student-biological-sex"></canvas>
                            </div>
                        </div>
                </div>
            </div>
                <div class="big-card-wrapper">
                <!--PENDING ENROLLMENTS BIG-->
                <div class="pending-enrollments-wrapper">
                    <h3 class="big-card-title"><a href="Admin_Enrollment_Pending.php"> View All Pending Enrollees</a></h3>
                    <table class="pending-enrollments-table">
                        <tr>
                            <th>LRN</th>
                            <th>Name</th>
                            <th>Level</th>
                        </tr>
                        <?php
                            include_once '../server_side/admin/DashboardView.php';
                            $dashboard = new DashboardView();
                            $dashboard->displayPendingEnrolleesInformation();
                        ?>
                    </table>
               </div>
               <div class="quick-actions-wrapper">
                <div class="quick-action-card">
                    <h3>Quick Actions</h3>
                    <ul>
                        <li><a href="Admin_Subjects.php"> Add a subject</a></li>
                        <li><a href="Admin_Sections.php"> Add a section</a></li>
                        <li><a href="Admin_Schedules.php"> Create schedules</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
    