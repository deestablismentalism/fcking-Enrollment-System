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
    <link rel="stylesheet" href="../css/Learn_More_Page.css">
    <title>SSIS-Learn More Page</title>
</head>
<body>
    <div class = "header">
        <?php
            include '../userPages/Landing_Header.php';
        ?>
        <div class="page-title border-100-title">
            <p class = "title border-75-underline"> Learn More </p>
        </div>
    </div>
    <div class="main-content">
        <div class="learn-more-section">
            <p class="learn-more-text">Take an Insight of Our Proudly to Present School</p>
            <div class="learn-more-container">
                <div class="learn-more-content">
                    <div class="image-text-container">
                        <img src="../imgs/temp-announcement.png" alt="Image 1" class="image">
                        <div class="text-container">
                            <h3>Our Teachers</h3>
                            <p>Our dedicated teachers are committed to providing quality education and support to all students.</p>
                        </div>
                    </div>
                </div>
                <div class="learn-more-content">
                    <div class="image-text-container">
                        <img src="../imgs/temp-announcement.png" alt="Image 1" class="image">
                        <div class="text-container">
                            <h3>Our Teachers</h3>
                            <p>Our dedicated teachers are committed to providing quality education and support to all students.</p>
                        </div>
                    </div>
                </div>
                <div class="learn-more-content">
                    <div class="image-text-container">
                        <img src="../imgs/temp-announcement.png" alt="Image 1" class="image">
                        <div class="text-container">
                            <h3>Our Teachers</h3>
                            <p>Our dedicated teachers are committed to providing quality education and support to all students.</p>
                        </div>
                    </div>
                </div>
                <div class="learn-more-content">
                    <div class="image-text-container">
                        <img src="../imgs/temp-announcement.png" alt="Image 1" class="image">
                        <div class="text-container">
                            <h3>Our Teachers</h3>
                            <p>Our dedicated teachers are committed to providing quality education and support to all students.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="about-section">
                <h2>About Us</h2>
                <p>Welcome to Lucena South II Elementary School! We are dedicated to providing a nurturing and inclusive environment for all students.</p>
                <p>Our mission is to foster a love for learning and help each child reach their full potential.</p>
            </div>
            <div class="mission-section">
                <h2>Our Mission</h2>
                <p>To provide quality education that empowers students to become responsible and productive citizens.</p>
            </div>
            <div class="vision-section">
                <h2>Our Vision</h2>
                <p>To be a leading institution in education, known for excellence and innovation.</p>
            </div>
        </div>
    </div>
</body>
</html>