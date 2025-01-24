<?php
require_once 'php/bootstrap.php';

$templateParams["titolo"] = "AllYouKnit - Website orders";
$templateParams["nome"] = "ordini-venditore.php";
$templateParams["ordini"] = $dbh->getOrders();

require 'template/base-venditore.php';
?>