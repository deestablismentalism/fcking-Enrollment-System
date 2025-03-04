<?php
require_once 'connect.php';

$db = new Connect();
$conn = $db->getConnection();

$selectAllEnrollee = $db->SelectAllEnrollee();

if ($selectAllEnrollee) {
    print_r($selectAllEnrollee);
    echo "Data found Successfully!";
} else {
    echo "No data found";
}
?>