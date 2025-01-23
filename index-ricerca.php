<?php
require_once 'php/bootstrap.php';

$templateParams["titolo"] = "AllYouKnit - Search";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["news"] = $dbh->checkNewNotifications($_SESSION["email"]);
$templateParams["prodotti"] = $dbh->getProducts();
$templateParams["nome"] = "ricerca.php";

require 'template/base.php';
?>