<?php
require_once 'php/bootstrap.php';

if(isset($_GET["nomeCategoria"])){
    $nomeCategoria = $_GET["nomeCategoria"];
}
$templateParams["titolo"] = "AllYouKnit - ".$nomeCategoria;
$templateParams["nome"] = "prodotti-categoria.php";
$templateParams["prodotti"] = $dbh->getProductsOfCategory($nomeCategoria);
$templateParams["categorie"] = $dbh->getCategories();
if(isset($_SESSION["email"]))
    $templateParams["news"] = $dbh->checkNewNotifications($_SESSION["email"]);

require 'template/base.php';
?>