<?php
require_once("../db/dbhelper.php");
$dbh = new DatabaseHelper("localhost", "root", "", "allyouknit", 3306);
$dbh->deleteProduct($_POST["idProdotto"]);
header("location: ../index-prodotti-venditore.php");
?>