<?php

// check PW

$pw = $_REQUEST["pw"];
$pwErr = "";

if ($pw !== "") {
    
    if (strlen($pw) < '8') {
        $pwErr = "Your Password Must Contain At Least 8 Characters!";
    } elseif (!preg_match("#[0-9]+#", $pw)) {
        $pwErr = "Your Password Must Contain At Least 1 Number!";
    } elseif (!preg_match("#[A-Z]+#", $pw)) {
        $pwErr = "Your Password Must Contain At Least 1 Capital Letter!";
    } elseif (!preg_match("#[a-z]+#", $pw)) {
        $pwErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
    }
}
echo $pwErr;
