<?php
declare(strict_types =1);

require_once __DIR__ . '/../models/sectionsModel.php';

class adminSectionsView {
    private $sectionsModel;

    public function __construct() {
        $this->sectionsModel = new sectionsModel();
    }

    public function displayAdminSections() {
        $sections = $this->sectionsModel->getSections();

        foreach($sections as $rows) {
            echo '<tr>
                <td>' .htmlspecialchars($rows['Section_Name']). '</td>
                <td>' .htmlspecialchars($rows['Grade_Level']). '</td>
                <td>
                    <button class="assign-btn" data-id="'. $rows['Section_Id'].'"> <img src="../imgs/plus-solid.svg" alt="Add Students"> </button>
                    <button class="delete-section-btn" data-id="'. $rows['Section_Id'].'"> <img src="../imgs/trash-solid.svg" alt="Delete"> </button>
                </td>
            </tr>';
        }
    }
}