<head>
  <meta charset="UTF-8">
  <title>Denied and Follow-Up Students</title>
  <style>

    .adminDeniedFollowUpView {
        font-family: Barlow, sans-serif;
        font-size: 16px;
        padding: 10px;
        width: 100%;
        background-color: #FFFFFF;
    }
.content{
    margin: 0 36.5px ;
}
    table.enrollments {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      padding: 10px;
    }

    table.enrollments th, table.enrollments td {
      padding: 10px;
      text-align: center; 
      font-family: Barlow, sans-serif;
    
    }

    table.enrollments th {
      background-color:rgb(255, 255, 255);
      color: black;
    }

    table.enrollments tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    table.enrollments tr:hover {
      background-color: #e0e0e0;
    }

    button[data-id] {
      padding: 5px 10px;
      background-color: #003366d5;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button[data-id]:hover {
      background-color:rgba(15, 90, 166, 0.83);
    }

    .enrollment {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top: 20px;
        padding: 20px;
    
    }
  </style>
</head>
<?php

require_once '../server_side/dbconnection.php';

class AdminDeniedFollowUpModel {
    protected $conn;
    protected $Data;
    const FOLLOWUP = 4;
    const DENIED = 2;



    //automatically run and connect database
    public function __construct() {
        $db = new Connect();
        $this->conn = $db->getConnection();
        $this->Data = $this->getDeniedAndFollowUpStudents();
    }

    public function getDeniedAndFollowUpStudents() {
        $sql_get_data = "SELECT * FROM `enrollee` WHERE Enrollment_Status IN (4,2)";
        $get_get_data = $this->conn->prepare($sql_get_data);
        $get_get_data->execute();
        $result = $get_get_data->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function displayDeniedAndFollowUpStudents() {
        $students = $this->Data;
        foreach($students as $row) {
            $status = ($row['Enrollment_Status'] == self::DENIED) ? "DENIED" : "FOLLOW UP";
            $studentMiddleInitial = !empty($rows['Student_Middle_Name']) ? substr($rows['Student_Middle_Name'], 0, 1) . "." : "";
            $fullName = $row['Student_First_Name'] . ' ' . $studentMiddleInitial . ' ' . $row['Student_Last_Name'];
            echo '<tr>
                <td>' .htmlspecialchars($row['Learner_Reference_Number']). '</td>
                <td>' .htmlspecialchars($fullName). '</td>
                <td>' .htmlspecialchars($row['Age']). '</td>
                <td>' .htmlspecialchars($row['Birth_Date']). '</td>
                <td>' . $status . '</td>
                <td> <button id="' . $row['Enrollee_Id'] . '" data-id="' . $row['Enrollee_Id'] . '">View Reason</button> </td>
            </tr>';
        }
    }

    public function getTransaction() {
        $sql_get_transaction = "SELECT * FROM `enrollment_transactions` WHERE Enrollee_Id = ";
    }
}
?>