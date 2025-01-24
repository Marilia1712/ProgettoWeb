<?php
    require_once("../db/dbhelper.php");
    $dbh = new DatabaseHelper("localhost", "root", "", "allyouknit", 3306);
    if($dbh->checkSeller($_POST["email"], $_POST["password"])){
        header("location: ../index-pagina-venditore.php");
    }
    else {
        if($dbh->checkUserPresence($_POST["email"])){
            $cliente = $dbh->checkUserCredentials($_POST["email"], $_POST["password"]);
            if(!is_null($cliente)) {
                session_start();
                session_unset();

                $_SESSION["email"] = $cliente["Email"];
                $_SESSION["nome"] = $cliente["Nome"];
                $_SESSION["cognome"] = $cliente["Cognome"];
                header("location: ../index.php");
            }
            else {
                header("location: ../index-login.php?wrongPassword=true");
            }
        }
        else{
            header("location: ../index-login.php?notRegistered=true");
        }
    }
?>