<?php
require_once 'php/bootstrap.php';

$templateParams["titolo"] = "AllYouKnit - Website products";
$templateParams["nome"] = "prodotti-venditore.php";
$templateParams["prodotti"] = $dbh->getProducts();

require 'template/base-venditore.php';
?>