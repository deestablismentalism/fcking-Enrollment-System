
    <link rel="stylesheet" href="../css/User_Base_Design.css">
    <link rel="stylesheet" href="../css/reset.css">
    <script src="../js/User_Base_Designs.js"></script>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-wrapper">
            <div class="sidebar-title">
                <span class="SSIS">SSIS</span>
                <button class="menu-btn" onclick="menu()"><img src="../imgs/bar.svg" class="menu-btn"></button>
            </div>

            <div class="menu-wrappper">
                <!--DASHBOARD-->
                <div class="menu border-100sb" id="dashboard">
                    <img src="../imgs/easel.svg" class="bi">
                    <span id="dashboard-spn" class="menu-title">Dashboard</span>
                    <button class="dashboard-btn" onclick="dashboarddrop()"><img src="../imgs/chevron-down.svg" class ="bi-chevron-down"></button>
                    <ul class="dashboard-ul">
                        <li>
                            <a href="" class="eForm">Enrollment Form</a>
                        </li>
                        <li>
                            <a href="" class="eStat">Enrollment Status</a>
                        </li>
                    </ul>
                </div>

                <!--SUBJECTS-->
                <div class="menu border-100sb" id="subjects">
                    <img src="../imgs/book.svg" class="bi">
                    <span class="menu-title">Subjects</span>
                    <button class="subjects-btn" onclick="subjectsdrop()"><img src="../imgs/chevron-down.svg" class ="bi-chevron-down"></button>
                    <ul class="subjects-ul">
                            <li>
                            <a href="All_Subjects.html" class="allSubj">All subjects</a>
                            </li>
                            <li>
                                <a href="" class="viewGrades">View Grades</a>
                            </li>
                    </ul>
                </div>
                
                <!--TEACHERS-->
                <div class="menu border-100sb" id="teachers">
                    <img src="../imgs/people-fill.svg" class="bi bi-person">
                    <span class="menu-title">Teachers</span>
                    <button class="teachers-btn" onclick="teachersdrop()"><img src="../imgs/chevron-down.svg" class ="bi-chevron-down"></button>
                    <ul class="teachers-ul">
                        <li>
                            <a href="" class="">Prof. Dr. Eng. Jearard David</a>
                            <a href="" class="">Prof. Dr. Eng. Jearard David</a>
                            <a href="" class="">Prof. Dr. Eng. Jearard David</a>
                            <a href="" class="">Prof. Dr. Eng. Jearard David</a>
                            <a href="" class="">Prof. Dr. Eng. Jearard David</a>
                            <a href="" class="">Prof. Dr. Eng. Jearard David</a>
                            <a href="" class="">Prof. Dr. Eng. Jearard David</a>
                            <a href="" class="">Prof. Dr. Eng. Jearard David</a>
                            <a href="" class="">Prof. Dr. Eng. Jearard David</a>
                            <a href="" class="">Prof. Dr. Eng. Jearard David</a>
                            <a href="" class="">Prof. Dr. Eng. Jearard David</a>
                        </li>
                </div>
                <!--MISSION AND VISION-->
                <div class="menu border-100sb" id="mv">
                    <img src="../imgs/check2-circle.svg" class="bi">
                    <a href=""><span class="menu-title">Mission & Vision</span></a>
                </div>  
                <!--Comment muna to-->
                <!--ANNOUNCEMENTS
                <div class="menu border-100sb" id="announcements">
                    <i class="bi bi-megaphone"></i>
                    <a href="" id="announcements"><span class="menu-title">Announcements</span></a>
                </div>-->
            </div>
        </div>
    </div>

    <div class="main-content">

        <!--MOBILE VERSION HEADER KUPAL KA KASI EH-->
        <div class="mobile-header-wrapper">
            <div class="bar-btn-mob"></div>
            <div class="title-search-mob">
                <h6 class="title-mob"> Welcome to South II Student Information System </h6>
                <input type="text" name="search" placeholder="Search here...">
            </div>
            <div class="user-btn-mob"></div>
        </div>

        <!--HEADER-->
        <div class="header-wrapper">
            <div class="header-title">
                <p class="header-title">
                    Welcome to South II Student Information System
                </p>
            </div>
        
            <div class="searchbox-wrapper">
                <input type="search" name="" id="" class="searchbox" placeholder="Search here..">
            </div>
            <div class="account">
                <button id="user-profile"><img src="../imgs/check2-circle.svg" alt=""></button>
                <div class="account-settings-wrapper">
                    <p class="username">David jearard</p>
                    <p class="account-type">user</p>
                </div>
                <div class="account-settings-btn">
                    <button class="account-btn" onclick="accountDrop()"><img src="../imgs/chevron-down-black.svg" id="account-drop" alt=""></button>
                    <div class="account-settings-btn-content-wrapper">
                        <div class="user-info-wrapper border-100sb">
                            <img src="../imgs/check2-circle.svg" alt="">
                            <div class="user-name">
                                <p class="username">David jearard</p>
                                <p class="account-type">user</p>
                            </div>
                        </div>
                        <div class="account-link-wrapper">
                            <a href=""><img src="" alt="">Edit Profile</a><br>
                            <a href=""><img src="" alt="">Update Password</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--END OF HEADER-->
        <!-- MOBILE VERISON SIDEBAR-->
        <div class="mobile-sidebar-wrapper">
            <!-- DASHBOARD MOBILE -->
             <div class="dashboard-mob">
                <p class="dashboard-title"> Dashboard </p>
            </div>
            <!-- SUBJECTS MOBILE -->
             <div class="subjects-mob">
                <p class="subjects-title"> Subjects </p>
             </div>
            <!-- TEACHERS MOBILE -->
             <div class="teachers-mob">
                <p class="teachers-title"> Teachers </p>
             </div>
            <!-- MISSION VISSION MOBILE -->
             <div class="mission-vision-mob">
                <p class="mission-vision-title"> Mission & Vision </p>
             </div>
         </div>
