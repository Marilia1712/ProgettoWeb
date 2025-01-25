<?php
require_once 'php/bootstrap.php';

$templateParams["titolo"] = "Ordini del sito";
$templateParams["nome"] = "ordini-venditore.php";
$templateParams["ordini"] = $dbh->getOrders();

require 'template/base-venditore.php';
?>