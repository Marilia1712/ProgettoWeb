<?php
require_once 'php/bootstrap.php';

$templateParams["titolo"] = "Nuovo prodotto";
$templateParams["nome"] = "nuovo-prodotto.php";
$templateParams["categorie"] = $dbh->getCategories();

require 'template/base-venditore.php';
?>