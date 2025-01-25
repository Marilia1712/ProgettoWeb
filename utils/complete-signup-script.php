<?php
    require_once("../db/dbhelper.php");
    $dbh = new DatabaseHelper("localhost", "root", "", "allyouknit", 3306);
    $dbh->verifyUser($_POST["email"]);
    $dbh->createNewOrder($_POST["email"]);
    $dbh->sendWelcomeNotification($_POST["email"]);
    header("location: ../index-login.php?verified=true");
?>