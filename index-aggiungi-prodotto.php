<?php
require_once 'php/bootstrap.php';

$templateParams["titolo"] = "AllYouKnit - Edit Product";
$templateParams["nome"] = "aggiungi-prodotto.php";
$templateParams["categorie"] = $dbh->getCategories();

require 'template/base-venditore.php';
?>