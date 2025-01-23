<?php
require_once 'php/bootstrap.php';

if(isset($_GET["IDwishlist"])){
    $IDwishlist = $_GET["IDwishlist"];
    $nomeWishlist = $_GET["nomeWishlist"];
}
$templateParams["titolo"] = "AllYouKnit - ".$nomeWishlist;
$templateParams["nome"] = "prodotti-wishlist.php";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["news"] = $dbh->checkNewNotifications($_SESSION["email"]);
$templateParams["prodotti"] = $dbh->getWishlistProducts($IDwishlist);

require 'template/base.php';
?>