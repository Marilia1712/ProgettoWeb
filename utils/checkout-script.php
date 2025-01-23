<?php
require_once("../db/dbhelper.php");
$dbh = new DatabaseHelper("localhost", "root", "", "allyouknit", 3306);
session_start();
$dbh->cartCheckout($_SESSION["email"], $_POST["prezzoTotale"]);
header("location: ../index-carrello.php?");
?>