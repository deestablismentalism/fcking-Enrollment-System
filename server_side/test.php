<?php
require_once 'dbconnection.php';

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