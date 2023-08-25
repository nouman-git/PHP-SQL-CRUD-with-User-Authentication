<?php
include 'Login/session_validity.php';

if (!checkSession()) {

    header("Location: http://localhost/00_practice/PHP_SQL/Login/main_login.php");


} else {}


    // session valid
    $user_id = $_SESSION['user_id'];
    $token_id = $_SESSION['token_id'];



    ?>