<?php

declare(strict_types=1);
require_once __DIR__ . '/EnrolleesModel.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
    $updateStatus = new getEnrollees();

    $enrolleeId = $_POST['id'] ?? null;
    $status = $_POST['status'] ?? null;

    error_log($enrolleeId);
    error_log($status);

    if($enrolleeId && in_array($status, [1, 2])) {
        $updateStatus->updateEnrollee($enrolleeId, $status);

        echo json_encode(['success' => true]);
    }
    else {
        echo json_encode(['success' => false, 'message' => 'Invalid input']);
    }
    }
    catch(PDOException $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
}