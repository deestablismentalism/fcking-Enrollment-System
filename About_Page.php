<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/About_Page.css">
    <title>SSIS-About Page</title>
</head>
<body>
    <div class = "header">
        <?php
            include './Landing_Header.php';
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
                    <img src="./imgs/studs.jpg" alt="Image 1">
                </div>
                <div class="item" tabindex="0">
                    <img src="./imgs/painting.jpg" alt="Image 1">
                </div>
                <div class="item" tabindex="0">
                    <img src="./imgs/quiz.jpg" alt="Image 1">
                </div>
                <div class="item" tabindex="0">
                    <img src="./imgs/planting.jpg" alt="Image 1">
                </div>
                <div class="item" tabindex="0">
                    <img src="./imgs/grad.jpg" alt="Image 1">
                </div>
                <div class="item" tabindex="0">
                    <img src="./imgs/boyscout.jpg" alt="Image 1">
                </div>
                <div class="item" tabindex="0">
                    <img src="./imgs//painting.jpg" alt="Image 1">
                </div>
                <div class="item" tabindex="0">
                    <img src="./imgs/studs.jpg" alt="Image 1">
                </div>
                <div class="item" tabindex="0">
                    <img src="./imgs/planting.jpg" alt="Image 1">
                </div>
                <div class="item" tabindex="0">
                    <img src="./imgs/grad.jpg" alt="Image 1">
                </div>
            </div>
        </div>

        <div class="container">
            <div class="card">
            <div class="icon">
                <img src="https://img.icons8.com/ios-filled/50/000000/rocket.png" alt="Mission Icon" />
            </div>
            <h3>Our Mission</h3>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur excepteur sint occaecat.</p>
            </div>
            <div class="card">
            <div class="icon">
                <img src="https://img.icons8.com/ios-filled/50/000000/visible.png" alt="Vision Icon" />
            </div>
            <h3>Our Vision</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim.</p>
            </div>
            <div class="card">
            <div class="icon">
                <img src="https://img.icons8.com/ios-filled/50/000000/star.png" alt="Values Icon" />
            </div>
            <h3>Our Values</h3>
            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit.</p>
            </div>
        </div>

          <section class="hero">
    <div class="hero-text" data-aos="fade-right">
      <h5>Meet Our Leadership</h5>
      <h1>Dedicated Administration Guiding Our Educational Excellence</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ipsum sit nibh amet egestas egestas. Leo leo morbi massa sem faucibus nulla gravida vulputate adipiscing.</p>
      <div class="counters">
        <div class="counter">
          <span class="count" data-target="25">2</span><span>+</span>
          <p>Years of Excellence</p>
        </div>
        <div class="counter">
          <span class="count" data-target="45">0</span><span>+</span>
          <p>Faculty Members</p>
        </div>
        <div class="counter">
          <span class="count" data-target="98">0</span><span>%</span>
          <p>Student Success</p>
        </div>
      </div>
    </div>
    <div class="hero-image" data-aos="fade-left">
      <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&w=600&q=80" alt="Classroom" />
    </div>
  </section>

    <section class="team">
        <div class="team-grid">
        <!-- Generate 25 cards -->
        <!-- Use for loop or duplicate block in real use -->
        <!-- Here it's manually done for brevity -->
        <!-- Sample repeated cards with varying AOS effects -->
        <div class="team-card" data-aos="zoom-in">
            <div class="image-wrapper">
            <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Team Member" />
            </div>
            <h4>Dr. Michael Anderson</h4>
            <p class="position">Principal</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="team-card" data-aos="zoom-in" data-aos-delay="100">
            <div class="image-wrapper">
            <img src="https://randomuser.me/api/portraits/women/2.jpg" alt="Team Member" />
            </div>
            <h4>Dr. Sarah Johnson</h4>
            <p class="position">Vice Principal</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <!-- Duplicate and update index for more cards -->
        <!-- Paste this block and update content/images up to 25 total -->
        <!-- ... Repeat similar blocks up to 25 ... -->
        <!-- Final card sample -->
        <div class="team-card" data-aos="zoom-in" data-aos-delay="300">
            <div class="image-wrapper">
            <img src="https://randomuser.me/api/portraits/men/25.jpg" alt="Team Member" />
            </div>
            <h4>Robert Grey</h4>
            <p class="position">Security Chief</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        </div>
    </section>

    <script src="about.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
        duration: 1000,
        once: true
        });
    </script>

    </div>


</body>
</html>