<?php
require_once 'php/bootstrap.php';

$templateParams["titolo"] = "AllYouKnit - Carrello";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["prodotti"] = $dbh->getCartProducts($_SESSION["email"]);
$templateParams["nome"] = "carrello.php";

require 'template/base.php';
?>