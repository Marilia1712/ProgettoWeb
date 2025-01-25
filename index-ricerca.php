<?php
require_once 'php/bootstrap.php';

$templateParams["titolo"] = "Risultati ricerca";
$templateParams["categorie"] = $dbh->getCategories();
if(isset($_SESSION["email"]))
    $templateParams["news"] = $dbh->checkNewNotifications($_SESSION["email"]);
$templateParams["prodotti"] = $dbh->getProducts();
$templateParams["nome"] = "ricerca.php";

require 'template/base.php';
?>