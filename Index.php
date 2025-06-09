<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/Index.css">
        <title>SSIS-Home Page</title>
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        />
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css"
        rel="stylesheet"
        />
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        />
        <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        ></script>        
    </head>
    <body>
        <div class = "header">
            <?php
                include './Landing_Header.php';
            ?>
        </div>
        <div class = "main-content">
            <div class = "content">
                <!-- Slideshow container -->
                <div class="slideshow-container">

                    <!-- Full-width images with number and caption text -->
                     <div class="mySlides fade">
                        <img src="./imgs/bri.png  " alt="Image 01" style="width:100%">
                    </div>

                    <div class="mySlides fade">
                        <img src="./imgs/teacher.jpg" alt="Image 1" style="width:100%">
                    </div>

                    <div class="mySlides fade">
                        <img src="./imgs/womday.jpg" alt="Image 2" style="width:100%">
                    </div>

                    <div class="mySlides fade">
                        <img src="./imgs/grad.jpg" alt="Image 3" style="width:100%">
                    </div>
                    <div class="mySlides fade">
                        <img src="./imgs/boyscout.jpg" alt="Image 4" style="width:100%">
                    </div>
                    <div class="mySlides fade">
                        <img src="./imgs/planting.jpg" alt="Image 5" style="width:100%">
                    </div>

                    <!-- Next and previous buttons -->
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    </div>
                </div>
                <div class="border-100"></div>
                <div class="quote">
                    <img src = "./imgs/quote-educ.png" alt = "quote-educ">
                </div>
                <div class="quote">
                    <img src = "./imgs/quote-school.png" alt = "quote-school">
                </div>
            </div>

            <!-- calendaar events -->

             <div class="container">
        <div class="events-section">
            <div class="event-item">
                <div class="date-box">
                    <div class="date-number">15</div>
                    <div class="date-month">JUN</div>
                </div>
                <div class="event-details">
                    <div class="event-title">Annual Science Fair Exhibition</div>
                    <div class="event-meta">
                        <span>🕘 09:00 AM - 04:00 PM</span>
                        <span>📍 Main Campus Auditorium</span>
                    </div>
                    <div class="event-description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Proin gravida dolor sit amet lacus accumsan.
                    </div>
                </div>
            </div>

            <div class="event-item">
                <div class="date-box">
                    <div class="date-number">22</div>
                    <div class="date-month">JUN</div>
                </div>
                <div class="event-details">
                    <div class="event-title">Parent-Teacher Conference</div>
                    <div class="event-meta">
                        <span>🕘 01:00 PM - 06:00 PM</span>
                        <span>📍 Multiple Classrooms</span>
                    </div>
                    <div class="event-description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Proin sagittis nisl rhoncus mattis rhoncus.
                    </div>
                </div>
            </div>

            <div class="event-item">
                <div class="date-box">
                    <div class="date-number">30</div>
                    <div class="date-month">JUN</div>
                </div>
                <div class="event-details">
                    <div class="event-title">Summer Sports Tournament Final</div>
                    <div class="event-meta">
                        <span>🕘 02:30 PM - 05:30 PM</span>
                        <span>📍 Sports Complex</span>
                    </div>
                    <div class="event-description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                    </div>
                </div>
            </div>

            <div class="event-item">
                <div class="date-box">
                    <div class="date-number">05</div>
                    <div class="date-month">JUL</div>
                </div>
                <div class="event-details">
                    <div class="event-title">Graduation Ceremony Class of 2023</div>
                    <div class="event-meta">
                        <span>🕘 10:00 AM - 01:00 PM</span>
                        <span>📍 Central Auditorium</span>
                    </div>
                    <div class="event-description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in ipsum id orci porta dapibus. Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ante ipsum primis.
                    </div>
                </div>
            </div>
        </div>

        <div class="sidebar">
            <div class="sidebar-section">
                <h3 class="sidebar-title">Upcoming Events</h3>
                <div class="calendar">
                    <div class="calendar-header">June 2023</div>
                    <div class="calendar-grid">
                        <div class="calendar-day-header">Su</div>
                        <div class="calendar-day-header">Mo</div>
                        <div class="calendar-day-header">Tu</div>
                        <div class="calendar-day-header">We</div>
                        <div class="calendar-day-header">Th</div>
                        <div class="calendar-day-header">Fr</div>
                        <div class="calendar-day-header">Sa</div>
                        
                        <div class="calendar-day other-month">28</div>
                        <div class="calendar-day other-month">29</div>
                        <div class="calendar-day other-month">30</div>
                        <div class="calendar-day other-month">31</div>
                        <div class="calendar-day">1</div>
                        <div class="calendar-day">2</div>
                        <div class="calendar-day">3</div>
                        
                        <div class="calendar-day">4</div>
                        <div class="calendar-day">5</div>
                        <div class="calendar-day">6</div>
                        <div class="calendar-day">7</div>
                        <div class="calendar-day">8</div>
                        <div class="calendar-day today">9</div>
                        <div class="calendar-day">10</div>
                        
                        <div class="calendar-day">11</div>
                        <div class="calendar-day">12</div>
                        <div class="calendar-day">13</div>
                        <div class="calendar-day">14</div>
                        <div class="calendar-day event-day">15</div>
                        <div class="calendar-day">16</div>
                        <div class="calendar-day">17</div>
                        
                        <div class="calendar-day">18</div>
                        <div class="calendar-day">19</div>
                        <div class="calendar-day">20</div>
                        <div class="calendar-day">21</div>
                        <div class="calendar-day event-day">22</div>
                        <div class="calendar-day">23</div>
                        <div class="calendar-day">24</div>
                        
                        <div class="calendar-day">25</div>
                        <div class="calendar-day">26</div>
                        <div class="calendar-day">27</div>
                        <div class="calendar-day">28</div>
                        <div class="calendar-day">29</div>
                        <div class="calendar-day event-day">30</div>
                        <div class="calendar-day other-month">1</div>
                    </div>
                </div>
            </div>

            <div class="sidebar-section featured-event">
                <h3 class="sidebar-title">Featured Event</h3>
                <div class="featured-image">
                    🎨 Arts Festival Preview
                </div>
                <div class="featured-title">Annual Arts Festival</div>
                <div class="featured-date">📅 July 15-17, 2023</div>
                <div class="featured-description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis tortor risus consectetur adipiscing elit.
                </div>
            </div>
        </div>
    </div>


        <script src="./js/Home_Page.js"></script>
            <footer class="bg-body-tertiary text-center text-white">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Social media -->
                <section class="mb-4">
                <!-- Facebook -->
                <a
                    data-mdb-ripple-init class="btn text-white btn-floating m-1"
                    style="background-color: #3b5998;"
                    href="https://www.facebook.com/DepEdTayoLS2ES109732"
                    target="_blank"
                    role="button"
                    ><i class="fab fa-facebook-f"></i
                ></a>

                <!-- Google -->
                <a
                    data-mdb-ripple-init class="btn text-white btn-floating m-1"
                    style="background-color: #dd4b39;"
                    href="#!"
                    role="button"
                    ><i class="fab fa-google"></i
                ></a>

                <!-- Instagram -->
                <a
                    data-mdb-ripple-init class="btn text-white btn-floating m-1"
                    style="background-color: #ac2bac;"
                    href="https://www.facebook.com/messages/t/109885310803147"
                    role="button"
                    ><i class="fab fa-instagram"></i
                ></a>

                <!-- Messenger -->
                <a
                    data-mdb-ripple-init class="btn text-white btn-floating m-1"
                    style="background-color: #0082ca;"
                    href="https://www.facebook.com/messages/t/109885310803147"
                    role="button"
                    ><i class="fab fa-facebook-messenger"></i
                ></a>
                </section>
                <!-- Section: Social media -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                 <p>Copyright All Right Reserved &copy; 2025</p>
            </div>
            <!-- Copyright -->
            </footer>
            <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            ></script>

    </body>
</html>