<?php
require_once 'php/bootstrap.php';

$templateParams["titolo"] = "Nuova wishlist";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["news"] = $dbh->checkNewNotifications($_SESSION["email"]);
$templateParams["nome"] = "nuova-wishlist.php";

require 'template/base.php';
?>