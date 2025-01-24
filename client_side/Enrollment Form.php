<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/Enrollment Form.css">
</head>
<body>
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li> 
                <a href="" class="Enrollment_Form">Enrollment Form</a>
            </li>
            <li> 
                <a href="" class="Enrollment_Status">Enrollment Status</a>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <!--HEADER-->
        <div class="header-wrapper">
            <div class="header-title">
                <p class="header-title">
                    Welcome to South II Student Information System
                </p>
            </div>
        </div>
        <!--END OF HEADER-->

        <div class="content">
            <div class="content-title">
                <p class="title">Learner's Enrollment Form</p>
            </div>
            <div class="content-wrapper">
                <form action="">
                        
                    <!--ANTAS AT IMPORMASYON NG PAARALAN-->
                    <div class="previous-school">
                        <div class="previous-school-title">
                          <span>ANTAS NG IMPORMASYON NG PAARALAN</span>
                        </div>
                        <div class="taong-panuruan">
                            <p class="dfont">Taong Panuruan</p>
                            <input type="text" name="" id="" class="texbox">
                        </div>
                        <div class="learner-radio">
                            <p class="dfont">I-check lamang naaangkop</p>
                            <input type="radio" id="No-LRN" name="learner" value="No-LRN" class="radio">
                            <label for="No-LRN">Walang LRN</label>
                            <input type="radio" id="With-LRN" name="learner" value="With-LRN" class="radio">
                            <label for="With-LRN">Mayroong LRN</label>
                            <input type="radio" id="Returning" name="learner" value="Returning" class="radio">
                            <label for="Returning">Returning (Balik Aral)</label>
                        </div>
                        <div class="baitang">

                        </div>
                        <div class="huling-paaralan"></div>
                        <div class="nais-paaralan"></div>
                    </div>

                    <!--IMPORMASYON NG STUDYANTE-->
                    <div class="student-information"></div>

                    <!--PARA SA MGA MAG-AARAL NA MAY KAPANSANAN-->
                    <div class="student-disability"></div>
                
                    <!--TAGAPAGALAGA-->
                    <div class="address"></div>

                    <!--IMPORMASYON NG MAGULANG/TAGAPAGALAGA-->
                    <div class="parents-guardian-information"></div>

                    <!--4PS, IMAGES AND SUBMIT BUTTON-->            
                    <div class="confirmation"></div>
                </form>
            </div>
        </div>                    
    </div>
</body>
</html>