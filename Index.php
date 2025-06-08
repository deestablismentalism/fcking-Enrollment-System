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
                <!-- Github -->

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

            <script
            src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"
            ></script>  
    </body>
</html>