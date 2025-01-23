<?php
require_once 'php/bootstrap.php';

//Base Template
$templateParams["titolo"] = "AllYouKnit - Homepage";
$templateParams["nome"] = "lista-categorie.php";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["news"] = $dbh->checkNewNotifications($_SESSION["email"]);
require 'template/base.php';
?>