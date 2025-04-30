<?php
session_start();
if (!isset($_SESSION['User_Id']) || !isset($_SESSION['Registration_Id'])) {
    header("Location: ../client_side/login_form.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Home_Page.css">
    <title>SSIS-Home Page</title>
</head>
<body>
    <div class = "header">
        <?php
            include '../userPages/Landing_Header.php';
        ?>
    </div>
    <div class = "main-content">
        <div class = "content">
            <p> not sure what to put here yet </p>
            <p> carousel with pictures of the school, or picture of the principal? </p>
        </div>
    </div>
</body>
</html>