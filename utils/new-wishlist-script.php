<?php
require_once("../db/dbhelper.php");
$dbh = new DatabaseHelper("localhost", "root", "", "allyouknit", 3306);
session_start();
$dbh->createNewWishlist($_POST["nome"], $_POST["descrizione"], $_SESSION["email"]);
header("location: ../index-lista-wishlists.php");
?>