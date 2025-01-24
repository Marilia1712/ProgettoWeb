<?php
require_once 'php/bootstrap.php';

if(isset($_GET["idProdotto"])){
    $idProdotto = $_GET["idProdotto"];
}
$templateParams["titolo"] = "AllYouKnit - Product ".$idProdotto;
$templateParams["nome"] = "singolo-prodotto.php";
$templateParams["categorie"] = $dbh->getCategories();
if(isset($_SESSION["email"])){
    $templateParams["news"] = $dbh->checkNewNotifications($_SESSION["email"]);
    $templateParams["wishlists"] = $dbh->getUserWishlists($_SESSION["email"]);
}
if($dbh->checkProductInSale($idProdotto)){
    $prodotto = $dbh->getDiscountedProduct($idProdotto)[0];
    $prodottoInOfferta = true;
}
else{
    $prodotto = $dbh->getProduct($idProdotto)[0];
    $prodottoInOfferta = false;
}

require 'template/base.php';
?>