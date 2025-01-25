<?php
require_once 'php/bootstrap.php';

//Base Template
$templateParams["titolo"] = "AllYouKnit";
$templateParams["nome"] = "lista-categorie.php";
$templateParams["categorie"] = $dbh->getCategories();
if(isset($_SESSION["email"]))
    $templateParams["news"] = $dbh->checkNewNotifications($_SESSION["email"]);
require 'template/base.php';
?>