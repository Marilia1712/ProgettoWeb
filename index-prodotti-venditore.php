<?php
require_once 'php/bootstrap.php';

$templateParams["titolo"] = "Prodotti del sito";
$templateParams["nome"] = "prodotti-venditore.php";
$templateParams["prodotti"] = $dbh->getProducts();

require 'template/base-venditore.php';
?>