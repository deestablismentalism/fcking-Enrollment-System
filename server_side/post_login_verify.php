<?php
    require_once "login_verify.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $verification = new VerifyLogin();

    $User_Typed_Phone_Number = $_POST['phone_number'];
    $User_Typed_Password = $_POST['password'];

    $verification->verify_login($User_Typed_Phone_Number, $User_Typed_Password);
    }
?>