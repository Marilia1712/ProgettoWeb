<?php
require_once 'php/bootstrap.php';

$templateParams["titolo"] = "Modifica prodotto";
$templateParams["nome"] = "modifica-prodotto.php";
$templateParams["prodotto"] = $dbh->getProduct($_POST["idProdotto"]);
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["categorieProdottoRaw"] = $dbh->getProductCategories($_POST["idProdotto"]);
$templateParams["categorieProdotto"] = [];
foreach ($templateParams["categorieProdottoRaw"] as $categoria) {
    array_push($templateParams["categorieProdotto"], $categoria["Nome"]);
}

require 'template/base-venditore.php';
?>