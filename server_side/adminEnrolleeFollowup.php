<?php
declare(strict_types=1);
session_start();  // important!

require_once __DIR__ .'/../server_side/EnrolleesModel.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit();
}

if (!isset($_SESSION['Admin']['Staff-Id'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized: no admin session']);
    exit();
}

if (!isset($_POST['id'], $_POST['status'], $_POST['description'])) {
    echo json_encode(['success' => false, 'message' => 'Missing POST data']);
    exit();
}

$enrolleeModel = new getEnrollees();

$staffId = $_SESSION['Admin']['Staff-Id'];
$enrolleeId = $_POST['id'];
$status = (int)$_POST['status'];
$description = $_POST['description'];

$date = date('Ymd');
$time = time();

$statusCode = ($status === 1) ? "F" : "D";
$transactionCode = $statusCode . "-" . $date . "-" . $time;

if (!isset($_POST['reasons'])) {
    echo json_encode(['success' => false, 'message' => 'Missing reasons']);
    exit();
}

$reasons = $_POST['reasons'];
$allInfo = [];

foreach ($reasons as $value) {
    $allInfo[] = [
        'enrolleeId' => $enrolleeId,
        'transactionCode' => $transactionCode,
        'status' => $status,
        'description' => $description,
        'reason' => $value
    ];
}

echo json_encode([
    'success' => true,
    'data' => $allInfo
]);
exit();