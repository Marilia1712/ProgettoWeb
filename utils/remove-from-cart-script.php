<?php
require_once("../db/dbhelper.php");
$dbh = new DatabaseHelper("localhost", "root", "", "allyouknit", 3306);
session_start();
$dbh->removeFromCart($_SESSION["email"], $_POST["idProdotto"], $_POST["quantita"]);
header("location: ../index-carrello.php");
?>