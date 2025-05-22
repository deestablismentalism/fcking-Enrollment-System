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
                <h1 class="data-title"> Enrollees </h1>
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
                    <h1 class="data-title"> Students </h1>
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
                        </tr>
                        <?php
                            include_once '../server_side/DashboardView.php';
                            $dashboard = new DashboardView();
                            $dashboard->displayPendingEnrolleesInformation();
                        ?>
                    </table>
                <!--Post Announcments BIG-->
                <!-- <div class="post-announcement-wrapper">
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
                </div> -->
            </div>
        </div>
    </div>
</body>
</html>
    