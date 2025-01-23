<?php
require_once 'php/bootstrap.php';

if(isset($_GET["nomeCategoria"])){
    $nomeCategoria = $_GET["nomeCategoria"];
}
$templateParams["titolo"] = "AllYouKnit - Offerte Speciali";
$templateParams["nome"] = "offerte.php";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["news"] = $dbh->checkNewNotifications($_SESSION["email"]);
$templateParams["prodottiScontati"] = $dbh->getDiscountedProducts();

require 'template/base.php';
?>