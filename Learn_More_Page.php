<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/Learn_More_Page.css">
    <title>SSIS-Learn More Page</title>
</head>
<body>
    <div class = "header">
        <?php
            include './Landing_Header.php';
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
                        <img src="./imgs/students.jpg" alt="Image 1" class="image">
                        <div class="text-container">
                            <h3>Our Beloved School</h3>
                            <p>Lucena South II Elementary School is dedicated to improving teaching and learning through 
                                continuous teacher training and the use of innovative strategies. The school promotes student 
                                engagement by integrating technology and learner-centered approaches. It remains committed to creating 
                                a supportive, inclusive environment that fosters academic growth and excellence.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="learn-more-content">
                    <div class="image-text-container">
                        <img src="./imgs/teacher.jpg" alt="Image 1" class="image">
                        <div class="text-container">
                            <h3>Our Teachers</h3>
                            <p>Our dedicated teachers are committed to providing quality education and support to all students.
                              They go beyond teaching basic subjects by instilling confidence in their students, encouraging them to 
                              believe in their abilities. Through everyday lessons and meaningful guidance, 
                              they shape future leaders with strong values and a sense of responsibility. These educators 
                              create a supportive environment where children feel empowered to strive for excellence in everything they do.</p>
                        </div>
                    </div>
                </div>
                <div class="learn-more-content">
                    <div class="image-text-container">
                        <img src="./imgs/grad.jpg" alt="Image 1" class="image">
                        <div class="text-container">
                            <h3>History</h3>
                            <p>Lucena South II Elementary School was established in 1963 and has since played a vital 
                                role in providing quality education in Lucena City. Over the decades, it has evolved to 
                                meet the growing needs of learners and the demands of modern education.
                        </div>
                    </div>
                </div>
                <div class="learn-more-content">
                    <div class="image-text-container">
                        <img src="./imgs/planting.jpg" alt="Image 1" class="image">
                        <div class="text-container">
                             <h3>Community</h3>
                            <p>The school thrives through the strong support of its local community. Parents, stakeholders, 
                                and nearby organizations actively participate in school programs, fostering a collaborative and 
                                nurturing learning environment.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
             <div class="container">
            <div class="card" style="background-image: image('./imgs/crumpled-paper.jpg');">
            <h3>Our Mission</h3>
            <p>To protect and promote the right of every Filipino to quality, 
            equitable, culture-based, and complete basic education where:<br>
<br>
                Students learn in a child-friendly, gender-sensitive, safe, and motivating environment.<br>
                Teachers facilitate learning and constantly nurture every learner.
                Administrators and staff, as stewards of the institution, 
                ensure an enabling and supportive environment for effective learning to happen.
                Family, community, and other stakeholders are actively engaged and <br>
                share responsibility for developing life-long learners.
            </div>
            <div class="card">
            <h3>Our Vision</h3>
            <p>We dream of Filipinos<br>
                who passionately love their country<br>
                and whose values and competencies<br>
                enable them to realize their full potential<br>
                and contribute meaningfully to building the nation.<br>
<br>
                As a learner-centered public institution,<br>
                the Department of Education<br>
                continuously improves itself<br>
                to better serve its stakeholders.</p>
            </div>
            <div class="card">
            <h3>Our Values</h3>
            <p>Maka-Diyos, <br>
                Maka-tao, <br>
                Makakalikasan, <br>
                Makabansa</p>
            </div>
        </div>
    </div>

<footer>
    
    <?php include 'userPages/contact-form.html'; ?>
    
    <!-- Rest of your footer content -->
</footer>

</body>
</html>