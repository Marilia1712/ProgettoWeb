<?php
require_once("../db/dbhelper.php");
$dbh = new DatabaseHelper("localhost", "root", "", "allyouknit", 3306);
session_start();
$dbh->cartCheckout($_SESSION["email"], $_POST["prezzoTotale"]);
$dbh->sendFormatNotification($_SESSION["email"], 2);
header("location: ../index-carrello.php?");
?>