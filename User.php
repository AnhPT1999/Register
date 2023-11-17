<?php
$filepath = realpath(dirname(__FILE__));
require_once($filepath . '/lib/DB.php');
require_once($filepath . '/lib/Format.php');
Session_start();

class User
{
    // private $db;
    private $fm;
    public function __construct(private DB $db, ?Format $format = null)
    {
        // $this->db = $db;
        // $this->db->host = '';


        $this->fm = $format ?? new Format();
    }

    public function setFormat(Format $format)
    {
        $this->fm = $format;
    }

    public function generate_code()
    {
        $a = "";
        for ($i = 0; $i < 6; $i++) {
            $a .= mt_rand(0, 9);
        }
        return $a;
    }

    public function sendEmail($email)
    {
        $code = self::generate_code();
        $_SESSION['code'] = $code;
        $to = $email;
        $subject = "please activate your account";
        $message = "Code to activate your account: $code";
        $headers = 'From: sender@example.com' . "\r\n" .
            'Reply-To: sender@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
    }

    public function userRegister($email, $password)
    {
        $email = $this->fm->validation($email);
        $password = $this->fm->validation($password);

        $email = mysqli_real_escape_string($this->db->link, $email);
        if ($email == "" || $password == "") {
            echo "<span style='color: red'>Fields Must Not be Empty!</span>";
            exit();
        } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            echo "<span style='color: red'>Invalid Email !</span>";
            exit();
        } else {
            $checkQuery = "select * from user where username = '$email'";
            $checkResult = $this->db->select($checkQuery);
            if ($checkResult != false) {
                echo "<span style='color: red'>Email Address Already Exist !</span>";
                exit();
            } else {
                // $password = mysqli_real_escape_string($this->db->link, $password);
                self::sendEmail($email);
            }
        }
    }

    public function insertAcc($email, $password)
    {
        $query = "insert into user(username, password)
                            value('$email','$password')";
        $insert_row = $this->db->insert($query);
        if ($insert_row) {
            echo "<span style='color: green'>Registration Successful!</span>";
            exit();
        } else {
            echo "<span style='color: red'>Registration Unsuccessful!</span>";
            exit();
        }
    }
}
