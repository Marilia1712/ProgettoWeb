<?php
require_once 'php/bootstrap.php';

$templateParams["titolo"] = "AllYouKnit - Offerte Speciali";
$templateParams["nome"] = "offerte.php";
$templateParams["categorie"] = $dbh->getCategories();
if(isset($_SESSION["email"]))
    $templateParams["news"] = $dbh->checkNewNotifications($_SESSION["email"]);
$templateParams["prodottiScontati"] = $dbh->getDiscountedProducts();

require 'template/base.php';
?>