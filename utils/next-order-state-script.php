<?php
require_once("../db/dbhelper.php");
$dbh = new DatabaseHelper("localhost", "root", "", "allyouknit", 3306);
$dbh->nextOrderState($_POST["idOrdine"], $_POST["statoOrdine"]);
if($_POST["statoOrdine"] == "Spedito")
    $dbh->sendFormatNotification($_POST["emailCliente"], 3);
header("location: ../index-ordini-venditore.php");
?>