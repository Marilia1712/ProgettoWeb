<?php
    require_once("../db/dbhelper.php");
    $dbh = new DatabaseHelper("localhost", "root", "", "allyouknit", 3306);
    $dbh->verifyUser($_POST["email"]);
    $dbh->createNewOrder($_POST["email"]);
    $dbh->sendFormatNotification($_POST["email"], 1);
    header("location: ../index-login.php?verified=true");
?>