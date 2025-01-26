<?php
require_once("../db/dbhelper.php");
$dbh = new DatabaseHelper("localhost", "root", "", "allyouknit", 3306);
$dbh->editProduct($_POST["product-name"], number_format($_POST["product-price"], 2, ".", ""), $_POST["product-store"], $_POST["product-category"],
                    $_POST["product-color"], $_POST["product-composition"], $_POST["product-tools"], $_POST["product-id"]);
$titolo = "Modifica di un prodotto del catalogo";
$contenuto = "Salve cari clienti! Vi scriviamo per comunicarVi che un prodotto del nostro catalogo, ".$_POST["product-name"].", 
                è stato modificato ed è pronto per essere acquistato. Venite a dare un occhiata, Vi aspettiamo!";
$dbh->sendBroadcastNotification($titolo, $contenuto);
header("location: ../index-prodotti-venditore.php");
?>