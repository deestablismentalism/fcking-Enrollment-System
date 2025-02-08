
<link rel="stylesheet" href="../css/Admin_Base_Designs.css">
    <link rel="stylesheet" href="../css/reset.css">
    <script src="../js/User_Base_Designs.js"></script>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-wrapper">
            <div class="sidebar-title">
                <span class="SSIS">SSIS</span>
                <button class="menu-btn" onclick="menu()"><img src="../imgs/justify.svg" class="menu-btn"></button>
            </div>

            <div class="menu-wrappper">
                <!--DASHBOARD-->
                <div class="menu border-100sb" id="dashboard">
                    <img src="../imgs/easel.svg" class="bi">
                    <span id="dashboard-spn" class="menu-title">
                        <a href="">Dashboard</a>
                    </span>
                </div>

                <div class="menu border-100sb" id="students">
                    <img src>
                    <span id="students-spn" class="menu-title">Students</span>
                    <button class="students-btn" onclick=""><img src="../imgs/chevron-down.svg" class ="bi-chevron-down"></button>
                    <ul class="students-ul">
                        <li>
                            <a href="" class="MasterList"></a>
                        </li>
                        <li>
                            <a href="" class="studentInfo"></a>
                        </li>
                    </ul>
                </div>
                <div class="menu border-100sb" id="teachers">
                    <img src>
                    <span id="teachers-spn" class="menu-title">Teachers</span>
                    <button class="teachers-btn" onclick=""><img src="../imgs/chevron-down.svg" class ="bi-chevron-down"></button>
                    <ul class="teachers-ul">
                        <li>
                            <a href="" class="allTeachers"></a>
                        </li>
                        <li>
                            <a href="" class="teachers"></a>
                        </li>
                    </ul>
                </div>

                <div class="menu border-100sb" id="enrolls">
                    <img src="" alt="">
                    <span id="enrolls-spn" class="menu-title">Enrolls</span>
                    <button class="enrolls-btn" onclick=""><img src="../imgs/chevron-down.svg" class ="bi-chevron-down"></button>
                    <ul class="enrolls-ul">
                        <li>
                            <a href="" class="pending"></a>
                        </li>
                        <li>
                            <a href="" class="toFollow"></a>
                        </li>
                    </ul>
                </div>
                <!--COMMENT MUNA TO
                <div class="menu" id="subjects">
                    <img src="" alt="">
                    <span id="subjects-spn" class="menu-title">Subjects</span>
                </div>
                -->
            </div>
        </div>
    </div>

    <div class="main-content">

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
