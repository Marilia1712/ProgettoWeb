<?php
require_once("../db/dbhelper.php");
$dbh = new DatabaseHelper("localhost", "root", "", "allyouknit", 3306);
$dbh->nextOrderState($_POST["idOrdine"], $_POST["statoOrdine"]);
header("location: ../index-ordini-venditore.php");
?>