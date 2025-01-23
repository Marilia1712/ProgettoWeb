<?php
require_once 'php/bootstrap.php';

$templateParams["titolo"] = "AllYouKnit - Your wishlists";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["news"] = $dbh->checkNewNotifications($_SESSION["email"]);
$templateParams["wishlists"] = $dbh->getUserWishlists($_SESSION["email"]);
$templateParams["nome"] = "lista-wishlists.php";

require 'template/base.php';
?>