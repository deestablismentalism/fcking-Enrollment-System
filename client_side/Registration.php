<!DOCTYPE html>
<html>

<head>
    <meta ssrset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/Registration.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <script src="../js/registration.js"></script>

</head>

<body>  
    <div class="main">
        <div class="header">
            <h2>Lucena South II Elementary School</h2>
        </div>

        <div id="logo-container">
            <img src="../imgs/R(1).png" 
            alt="School Logo" id="school-logo">
        </div>

        <div class="page-title">
          <h3>Registration</h3>
          <BR>
          <hr>
        </div>

        <div class="container">

            <!-- Registration form -->
            <form id="registration-form" action="../server_side/post_registration_form.php" method="post">
                <div class="user-details">
                    <!-- Input for users first name -->
                    <!-- <div class="input-box">
                        <span class="details">First Name</span>
                        <input type="text" placeholder="Ex: Juan Felipe" required>
                    </div> -->
                    <!-- Input for users last name -->
                    <div class="input-box">
                        <span class="details">Enrollee's Guardian First Name</span>
                        <input type="text" name="Guardian-First-Name" id="Guardian-First-Name" placeholder="Ex: Dela Cruz" required>
                    </div>
                    <!-- Input for guardian's first name -->
                    <div class="input-box">
                        <span class="details">Enrollee's Guardian Middle Name</span>
                        <input type="text" name="Guardian-Middle-Name" id="Guardian-Middle-Name"   placeholder="Ex: Juan Felipe" required>
                    </div>
                    <!-- Input for guardian's last name -->
                    <div class="input-box">
                        <span class="details">Enrollee's Guardian Last Name</span>
                        <input type="text" name="Guardian-Last-Name" id="Guardian-Last-Name" placeholder="Ex: Dela Cruz" required>
                    </div>
                    <!-- Input for guardians contact number -->
                    <div class="input-box cn">
                        <span class="details">Contact Number</span>
                        <input type="text" name="Contact-Number" id="Contact-Number" placeholder="Ex: 09xx xxx xxxx" required>
                    </div>  
                    <!-- Submit button -->                      
                    <div class="button">
                        <button type="submit" name="submit" class="btn">
                            Register
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- Create Account  -->     
        <p>Already have an existing account?
            <a href="#" class="register" style="text-decoration: none;">
                Sign In.
            </a>
        </p>
   </div>

    <!-- two Lines  -->  
    <div class="vlorange"></div>
    <div class="vlyellow"></div>

    <div id="img-container">
        <img src="../imgs/student.jpg" 
        alt="student" id="student">
    </div>

</body>
</html>
