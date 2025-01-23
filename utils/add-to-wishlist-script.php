<?php
require_once("../db/dbhelper.php");
$dbh = new DatabaseHelper("localhost", "root", "", "allyouknit", 3306);
$dbh->insertIntoWishlist($_POST["idWishlist"], $_POST["idProdotto"]);
header("location: ../index-singolo-prodotto.php?idProdotto=".$_POST["idProdotto"]);
?>