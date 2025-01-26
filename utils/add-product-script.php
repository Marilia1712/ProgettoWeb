<?php
require_once("../db/dbhelper.php");
$dbh = new DatabaseHelper("localhost", "root", "", "allyouknit", 3306);
$dbh->addProduct($_POST["product-name"], number_format($_POST["product-price"], 2, ".", ""), $_POST["product-store"], $_POST["product-category"],
                    $_POST["product-color"], $_POST["product-composition"], $_POST["product-tools"]);
$titolo = "Inserimento di un nuovo prodotto!";
$contenuto = "Presentiamo una novità nel nostro catalogo! Ecco a voi ".$_POST["product-name"].". Vieni a scoprirlo tra i nostri prodotti. Ti aspettiamo!";
$dbh->sendBroadcastNotification($titolo, $contenuto);
header("location: ../index-prodotti-venditore.php");
?>