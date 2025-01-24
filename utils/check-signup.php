<?php
    require_once("../db/dbhelper.php");
    $dbh = new DatabaseHelper("localhost", "root", "", "allyouknit", 3306);
    if($dbh->checkUserPresence($_POST["email"])){
        //can't signup
        header("location: ../index-login.php?alreadyRegistered=true");
    }
    else{
        $dbh->signUserUp($_POST["email"], $_POST["nome"], $_POST["cognome"], $_POST["password"]);
        $dbh->createNewOrder($_POST["email"]);
        session_start();
        session_unset();
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["nome"] = $_POST["nome"];
        $_SESSION["cognome"] = $_POST["cognome"];
        $dbh->sendWelcomeNotification($_SESSION["email"]);
        header("location: ../index.php");
    }
?>