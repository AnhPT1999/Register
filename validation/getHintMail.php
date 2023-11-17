<?php
require_once('../lib/DB.php');
// check mail

$mail = $_REQUEST["mail"];
$db = new DB();
$err = "";

if ($mail !== "") {
    $checkQuery = "select * from user where userName = '$mail'";
    $checkResult = $db->select($checkQuery);
    if (filter_var($mail, FILTER_VALIDATE_EMAIL) === false) {
        $err = "Invalid Email !";
    } elseif($checkResult != false){
        $err = "Email is exist!";
    }
}

echo $err;