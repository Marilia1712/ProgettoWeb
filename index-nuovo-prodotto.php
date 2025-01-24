<?php
require_once 'php/bootstrap.php';

$templateParams["titolo"] = "AllYouKnit - Add Product";
$templateParams["nome"] = "nuovo-prodotto.php";
$templateParams["categorie"] = $dbh->getCategories();

require 'template/base-venditore.php';
?>