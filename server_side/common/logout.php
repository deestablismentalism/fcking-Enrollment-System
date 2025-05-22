<?php
session_start();
session_unset();
session_destroy();
header("Location: ../client_side/login_form.php");
exit();
?>