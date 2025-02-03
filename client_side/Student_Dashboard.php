<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
    <?php
        include '../client_side/User_Base_Designs.php';
    ?>
    <link rel="stylesheet" href="../css/Student_Dashboard.css">
</head>
<body>
    <div class="main-content">
        <div class="content">
        <!--START OF MAIN CONTENT-->
            <div class="user-homepage">
                <div class="student-dashboard">
                    <h2 class="class-sched"> Class Schedule </h2> <br>
                    <table class="sched">
                        <tr>
                            <th> Subject </th>
                            <th> Time </th>
                            <th> Teacher </th>
                        </tr>
                        <tr>
                            <td> Math </td>
                            <td> 7:00 AM - 8:00 AM </td>
                            <td> Kenneth Alojado </td>
                        </tr>
                        <tr>
                            <td> English </td>
                            <td> 8:00 AM - 9:00 AM</td>
                            <td> Lovely Jane Dela Cruz</td>
                        </tr>
                        <tr>
                            <td> Science </td>
                            <td> 9:00 AM - 10:00 AM </td>
                            <td> Jearard David </td>
                        </tr>
                        <tr>
                            <td> Recess </td>
                            <td> 10:00 AM - 10:30 AM</td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td> Araling Panlipunan </td>
                            <td> 10:30 AM - 11:30 AM</td>
                            <td> Nemesio Benedict Llorin III </td>
                        </tr>
                        <tr>
                            <td> Lunch </td>
                            <td> 11:30 AM - 1:00 PM</td>
                            <td> </td>
                        </tr>
                    </table>
                </div>
                <div class="student-dashboard">
                    <h2 class="announcements-title"> Announcements </h2> <br>
                    <div class="announcement-image border-75-announcement"> 
                        <img src="imgs/temp-announcement.png" alt="announcement"> 
                    </div>
                    <div class="annoucentment-content">
                        <p class="announcement"> Lorem ipsum dolor - Tamet, consectetur adipiscing elit, 
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat....</p>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</body>
</html>