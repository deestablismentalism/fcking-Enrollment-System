<?php
require_once 'change_password.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $User_Typed_Password = $_POST['old-password'];
    $User_New_Password = $_POST['new-password'];
    $User_New_Password_Confirm = $_POST['confirm-password'];

    $change_password = new ChangePassword();
    $change_password->change_password($User_Typed_Password, $User_New_Password, $User_New_Password_Confirm);
} else {
    echo "Invalid request method.";
}
?>