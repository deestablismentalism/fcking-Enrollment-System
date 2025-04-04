<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSIS-Admin Teacher Info</title> 
    <?php
        include '../client_side/admin_base_designs.php';
    ?>
    <link rel="stylesheet" href="../css/Admin_Enrollment_Access_Status.css">
</head>
<body>
    <div class="main-content">
        <div class="content">
            <div class="student-status-start">
                <div class="student">
                    <div class="status">
                        <button class="officially-enrolled">Officially Enrolled</button>
                        <button class="temporarily-enrolled">Temporarily Enrolled</button>
                        <button class="pending">Pending</button>
                        <button class="rejected">Rejected</button>
                    </div>
                    <div class="header">
                        <h2>Student Enrollment Form</h2>
                    </div>
                    <div class="enrollment-info-content">
                        <h2 class="school-info">ANTAS AT IMPORMASYON NG PAARALAN</h2>
                        <table class="school-info-table">
                            <tr>
                                <th class="question">Questions</th>
                                <th class="answer">Answers</th>
                            </tr>
                            <tr>
                                <td class="question">Taong Panuruan</td>
                                <td class="answer">2024-2025</td>
                            </tr>
                            <tr>
                                <td class="question">Baitang na nais ipatala</td>
                                <td class="answer">Grade 3</td>
                            </tr>
                            <tr>
                                <td class="question">Huling baitang na natapos</td>
                                <td class="answer">Grade 2</td>
                            </tr>
                            <tr>
                                <td class="question">Huling natapos na taon sa paaralan</td>
                                <td class="answer">2024</td>
                            </tr>
                            <tr>
                                <td class="question">LRN</td>
                                <td class="answer">Walang LRN</td>
                            </tr>
                            <tr>
                                <td class="question">Huling paaralang pinasukan</td>
                                <td class="answer">Kenji's Elementary School</td>
                            </tr>
                            <tr>
                                <td class="question">ID ng Paaralan</td>
                                <td class="answer">123456</td>
                            </tr>
                            <tr>
                                <td class="question">Adres ng Paaralan</td>
                                <td class="answer">1234 Kenji St., Kenji City</td>
                            </tr>
                            <tr>
                                <td class="question">Huling natapos na taon sa paaralan</td>
                                <td class="answer">Pmpubliko</td>
                            </tr>
                            <tr>
                                <td class="question">Paaralan kung saan nais i-enroll ang mag-aaral</td>
                                <td class="answer">South 2 Elementary School</td>
                            </tr>
                            <tr>
                                <td class="question">ID ng Paaralan</td>
                                <td class="answer">654321</td>
                            </tr>
                            <tr>
                                <td class="question">Adres ng Paaralan</td>
                                <td class="answer">Cotta, Lucena City</td>
                            </tr>
                        </table>

                        <h2 class="student-info">IMPORMASYON NG ESTUDYANTE</h2>
                        <table class="student-info-table">
                            <tr>
                                <th class="question">Questions</th>
                                <th class="answer">Answers</th>
                            </tr>
                            <tr>
                                <td class="question">Numero na nakalagay sa Sertipiko ng Kapanganakan (Birth Certificate) mula sa PSA (kung may dala na kopya)</td>
                                <td class="answer">123456789</td>
                            </tr>
                            <tr>
                                <td class="question">Learner Reference Number (LRN)</td>
                                <td class="answer">123456789</td>
                            </tr>
                            <tr>
                                <td class="question">Apelyido</td>
                                <td class="answer">David</td>
                            </tr>
                            <tr>
                                <td class="question">Pangalan</td>
                                <td class="answer">Jearard</td>
                            </tr>
                            <tr>
                                <td class="question">Gitnang Pangalan</td>
                                <td class="answer">-</td>
                            </tr>
                            <tr>
                                <td class="question">Extension (Jr., II, III)</td>
                                <td class="answer">-</td>
                            </tr>
                            <tr>
                                <td class="question">Petsa ng Kapanganakan (Buwan/Araw/Taon)</td>
                                <td class="answer">January 1, 2014</td>
                            </tr>
                            <tr>
                                <td class="question">Edad</td>
                                <td class="answer">8</td>
                            </tr>
                            <tr>
                                <td class="question">Kasarian</td>
                                <td class="answer">Lalaki</td>
                            </tr>
                            <tr>
                                <td class="question">Nabibilang sa katutubong grupo/ Komunidad ng Katutubong Kultura</td>
                                <td class="answer">Hindi</td>
                            </tr>
                            <tr>
                                <td class="question">Kung oo, saang grupo nabibilang</td>
                                <td class="answer">-</td>
                            </tr>
                            <tr>
                                <td class="question">Kinagisnang wika</td>
                                <td class="answer">Tagalog</td>
                            </tr>
                            <tr>
                                <td class="question">Relihiyon</td>
                                <td class="answer">Roman Catholic</td>
                            </tr>
                            <tr>
                                <td class="question">Email Address</td>
                                <td class="answer">david.00000@gmail.com</td>
                            </tr>
                            <tr>
                                <td class="question">Kabilang ba ang inyong pamilya sa 4Ps ng DSWD?</td>
                                <td class="answer">Hindi</td>
                            </tr>
                            <tr>
                                <td class="question">Ipasa ang malinaw na larawan ng mga Dokumento gaya ng NSO BIRTH CERTIFICATE at REPORT CARD</td>
                                <td class="answer"><img src="../imgs/sample-birth-cert.png" alt="birth-certificate"></td>
                            </tr>
                        </table>

                        <h2 class="disability-info">PARA SA MGA MAG-AARAL NA MAY KAPANSANAN</h2>
                        <table class="disability-info-table">
                            <tr>
                                <th class="question">Questions</th>
                                <th class="answer">Answers</th>
                            </tr>
                            <tr>
                                <td class="question">Ang mag-aaral ba ay nangangailangan ng espesyal na tulong sa pag-aaral? (hal.: sa pisikal, mental, kondisyong medical, bukod sa iba pa)</td>
                                <td class="answer">Wala</td>
                            </tr>
                            <tr>
                                <td class="question">Kung MAYROON, isulat kun g ano ang natatanging kalagayan ng bata</td>
                                <td class="answer">-</td>
                            </tr>
                        </table>                    
                    </div>
                </div>
            </div>
        </div>
    </div>