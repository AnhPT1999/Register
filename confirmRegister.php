<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm</title>
</head>

<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <p>Code</p>
        <input type="text" name="code"><br>
        <button id="confirm">Confirm</button>
    </form>


    <?php

    $filepath = realpath(dirname(__FILE__));
    require_once($filepath . '/User.php');

    $u = new User();
    $code = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $code = $_POST["code"];
    }

    if ($_SESSION['code'] == $code) {
        $u->insertAcc($_SESSION['email'], $_SESSION['pw']);
    }
    ?>
</body>

</html>