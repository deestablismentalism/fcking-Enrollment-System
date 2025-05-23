<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Denied Follow Up</title> 
    <link rel="stylesheet" href="../css/adminDeniedFollowUpModel.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php
        include '../adminPages/admin_base_designs.php'; 
        include '../server_side/adminDeniedFollowUpView.php';
    ?>
        <div class="header-left">
            <h2> Follow-Up & Denied </h2>
        </div>
      <!--START OF THE MAIN CONTENT-->
      <div class="content">
        <div class="table">
            <?php 
                $view = new AdminDeniedFollowUpView();
                $view->displayDeniedAndFollowUpStudents();
            ?>
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
</html>
