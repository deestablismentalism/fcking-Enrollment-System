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
    <link rel="stylesheet" href="../css/About_Page.css">
    <title>SSIS-About Page</title>
</head>
<body>
    <div class = "header">
        <?php
            include '../userPages/Landing_Header.php';
        ?>
        <div class="page-title border-100-title">
            <p class = "title border-75-underline"> About Us </p>
        </div>
    </div>
    <div class = "content">
        <p class = "content-text"> Take an Insight of Our Proudly to Present School </p>
        <div class="wrapper">
            <div class="items">
                <div class="item" tabindex="0">
                    <img src="../imgs/sample-teacher.png" alt="Image 1">
                </div>
                <div class="item" tabindex="0">
                    <img src="../imgs/sample-teacher.png" alt="Image 1">
                </div>
                <div class="item" tabindex="0">
                    <img src="../imgs/sample-teacher.png" alt="Image 1">
                </div>
                <div class="item" tabindex="0">
                    <img src="../imgs/sample-teacher.png" alt="Image 1">
                </div>
                <div class="item" tabindex="0">
                    <img src="../imgs/sample-teacher.png" alt="Image 1">
                </div>
                <div class="item" tabindex="0">
                    <img src="../imgs/sample-teacher.png" alt="Image 1">
                </div>
                <div class="item" tabindex="0">
                    <img src="../imgs/sample-teacher.png" alt="Image 1">
                </div>
                <div class="item" tabindex="0">
                    <img src="../imgs/sample-teacher.png" alt="Image 1">
                </div>
                <div class="item" tabindex="0">
                    <img src="../imgs/sample-teacher.png" alt="Image 1">
                </div>
                <div class="item" tabindex="0">
                    <img src="../imgs/sample-teacher.png" alt="Image 1">
                </div>
            </div>
        </div>
    </div>
</body>
</html>