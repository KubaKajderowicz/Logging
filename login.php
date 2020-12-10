<?php

include "db.php";
include "log.php";

if (isset($_POST["email"]) && isset($_POST["password"])) {

    $email = htmlspecialchars($_POST["email"]);
    $pass = htmlspecialchars($_POST["password"]);
    $myConn = new DB;

    $query = "SELECT * FROM user WHERE email = '$email' AND password = '$pass'";

    $result = $myConn->executeSQL($query);

    $logger = new log;

    date_default_timezone_set("Europe/Amsterdam");

    $date = date('m/d/Y h:i:s a', time());

    $userip = $ip = $_SERVER['REMOTE_ADDR'];

    if (!empty($result)) { 
        echo "<br> Login as $email <br>";

        $logger->addLoginLog($date,$userip,'success');

    } else {
        echo "<br> Invalid login! <br>";
        $logger->addLoginLog($date,$userip,'failed');

    }
} else {
    exit("Niet alle velden zijn ingevuld.");
}
