<?php
    require_once 'backend_registration.php';

    header("Content-Type: application/json");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $registration = new Registration();
        
        $result = $registration->register(
            $_POST['Guardian-First-Name'],
            $_POST['Guardian-Last-Name'],
            $_POST['Guardian-Middle-Name'],
            $_POST['Contact-Number']
        );
        
        echo json_encode($result);
    }
?>
