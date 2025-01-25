<?php
require_once 'php/bootstrap.php';

$templateParams["titolo"] = "Carrello";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["news"] = $dbh->checkNewNotifications($_SESSION["email"]);
$templateParams["prodotti"] = $dbh->getCartProducts($_SESSION["email"]);
$templateParams["nome"] = "carrello.php";

require 'template/base.php';
?>