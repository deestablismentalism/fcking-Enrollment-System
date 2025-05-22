<?php
declare(strict_types =1);

require_once __DIR__ . '/../server_side/sectionsModel.php';

class adminSectionsView {
    private $sectionsModel;

    public function __construct() {
        $model = new sectionsModel();
        $this->sectionModel = $model;
    }

    public function displayAdminSections() {
        $sections = $this->sectionModel->getSections();

        foreach($sections as $rows) {
            echo '<tr>
                <td>' .htmlspecialchars($rows['Section_Name']). '</td>
                <td>' .htmlspecialchars($rows['Grade_Level']). '</td>
            </tr>';
        }
    }
}