<?php
require_once("../db/dbhelper.php");
$dbh = new DatabaseHelper("localhost", "root", "", "allyouknit", 3306);
session_start();
$dbh->insertIntoCart($_SESSION["email"], $_POST["idProdotto"], $_POST["quantita"]);
header("location: ../index-singolo-prodotto.php?idProdotto=".$_POST["idProdotto"]);
?>