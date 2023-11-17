<?php
$filepath = realpath(dirname(__FILE__));
require_once($filepath . '/User.php');

$u = new User();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $_SESSION['email'] = $email;
    $_SESSION['pw'] = $password;

    $u->userRegister($email, $password);
}

header("Location:../confirmRegister.php");
