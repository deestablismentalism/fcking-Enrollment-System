<?php 

declare(strict_types=1);

require_once __DIR__ . '/../server_side/studentsModel.php';

class adminStudentsView {
    protected $studentsModel;

    public function __construct() {
        $students = new studentsModel();
        $this->studentsModel = $students;
    }

    public function displayStudents() {
        $data = $this->studentsModel->getAllStudents();
        foreach($data as $rows) {
            $section = $rows['Section_Name'] === null ? 'Section is not set' : htmlspecialchars($rows['Section_Name']);
            $middleInitial = $rows['Student_Middle_Name'] === null ? '' : substr($rows['Student_Middle_Name'], 0, 1) . ".";
            
            // Convert status number to text
            $statusText = '';
            switch($rows['Student_Status']) {
                case 1:
                    $statusText = 'Active';
                    break;
                case 2:
                    $statusText = 'Inactive';
                    break;
                case 3:
                    $statusText = 'On Leave';
                    break;
                default:
                    $statusText = 'Unknown';
            }

            echo '<tr class="student-rows"> 
                <td>' . htmlspecialchars($rows['Student_Last_Name']).','. 
                htmlspecialchars($rows['Student_First_Name']) .' '.
                $middleInitial .
                '</td>
                <td>' .$rows['Learner_Reference_Number'].' </td>
                <td>' . htmlspecialchars($rows['Grade_Level']).' </td>
                <td> ' . $section .'</td>
                <td>' .htmlspecialchars($rows['Student_Email']) .' </td>
                <td>' . $statusText . '</td>
                <td> 
                    <button class="view-student" data-id="'.$rows['Enrollee_Id'].'"> <img src="/SSIS/imgs/eye-regular.svg" alt="View Student Information"></button> 
                    <button class="edit-student" data-id="'.$rows['Enrollee_Id'].'"> <img src="/SSIS/imgs/edit.svg" alt="Edit Student Information"></button>
                    <button class="delete-student" data-id="'.$rows['Enrollee_Id'].'"> <img src="/SSIS/imgs/trash-solid.svg" alt="Delete Student Information"></button>
                </td>
            </tr>';
        }
    }
}
