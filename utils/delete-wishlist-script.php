<?php
require_once("../db/dbhelper.php");
$dbh = new DatabaseHelper("localhost", "root", "", "allyouknit", 3306);
$dbh->deleteWishlist($_POST["wishlistID"]);
header("location: ../index-lista-wishlists.php");
?>