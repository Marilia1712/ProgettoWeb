<?php
require_once 'php/bootstrap.php';

if(isset($_GET["IDwishlist"])){
    $IDwishlist = $_GET["IDwishlist"];
    $nomeWishlist = $_GET["nomeWishlist"];
}
$templateParams["titolo"] = "AllYouKnit - ".$nomeWishlist;
$templateParams["nome"] = "prodotti-wishlist.php";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["prodotti"] = $dbh->getWishlistProducts($IDwishlist);

require 'template/base.php';
?>