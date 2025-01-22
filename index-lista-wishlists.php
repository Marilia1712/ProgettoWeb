<?php
require_once 'php/bootstrap.php';

$templateParams["titolo"] = "AllYouKnit - Your wishlists";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["wishlists"] = $dbh->getUserWishlists($_SESSION["email"]);
$templateParams["nome"] = "lista-wishlists.php";

require 'template/base.php';
?>