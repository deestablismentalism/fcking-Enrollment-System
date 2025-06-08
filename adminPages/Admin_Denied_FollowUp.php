<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Denied Follow Up</title> 
    <link rel="stylesheet" href="../css/admin_denied_followup.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php
        include '../adminPages/admin_base_designs.php'; 
        require_once __DIR__ . '/../server_side/admin/adminDeniedFollowUpView.php';
    ?>
        <div class="header-left">
            <h2> Denied and To Follow </h2>
        </div>
      <!--START OF THE MAIN CONTENT-->
      <div class="content">
        <div class="table">
            <table class="enrollments">
                <thead> 
                    <th>LRN</th>
                    <th>Full Name</th>
                    <th>Handled By</th>
                    <th>Transaction Code</th>
                    <th>Enrollment Status</th>
                    <th>Handled At</th>
                    <th>Objection Description</th>
                </thead>
                <tbody>
                    <?php 
                        $view = new AdminDeniedFollowUpView();
                        $view->displayDeniedAndFollowUpStudents();
                    ?>
                </tbody>
            </table>
        </div>
        <div id="reasonModal" style="display:none; position:fixed; top:10%; left:50%; transform:translateX(-50%); background:white; padding:20px; border:1px solid #ccc; z-index:999;">
        <h3>Enrollee Reasons</h3>
        <div id="modalContent"></div>
        <button onclick="$('#reasonModal').hide()">Close</button>
        </div>
      </div>
  </div>
</body>
<script src = "../js/Denied-FollowUp-PopUp.js"></script>
<script src = "../js/admin-denied-followup.js"></script>
</html>
