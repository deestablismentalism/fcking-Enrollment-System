<?php
declare(strict_types=1);
require_once __DIR__ . '/../server_side/subjectsModel.php';

class adminSubjectsView {
    protected $subjectsModel;

    public function __construct() {
        $this->subjectsModel = new subjectsModel();
    }

    public function displaySubjects() {
        $data = $this->subjectsModel->getSubjectsPerGradeLevel();

        foreach($data as $rows) {
            echo '<tr> 
                    <td>' .htmlspecialchars($rows['Subject_Name']).'</td>
                    <td>' .htmlspecialchars($rows['Grade_Level']).'</td>
            </tr>';
        }
    }
}
