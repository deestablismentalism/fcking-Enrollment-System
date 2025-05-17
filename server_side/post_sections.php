<?php
declare(strict_types = 1);
require_once __DIR__ . '/../server_side/sectionsModel.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    try {
        $sectionsModel = new SectionsModel();

    $sectionName = $_POST['section-name'];
    $sectionGradeId =$_POST['section-level'];

    if(!empty($sectionName)) {
        
        if($sectionsModel->insertSections($sectionName, $sectionGradeId)) {
            header('Location: ../adminPages/Admin_Sections.php?insert=success');
            exit();
        }
        else {
            header('Location: ../adminPages/Admin_Sections.php?insert=failed');
            exit();
        }
    }
    }
    catch(PDOException $e) {
        echo "error: " . $e->getMessage();
    }
}