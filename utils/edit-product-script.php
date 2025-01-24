<?php
require_once("../db/dbhelper.php");
$dbh = new DatabaseHelper("localhost", "root", "", "allyouknit", 3306);
$dbh->editProduct($_POST["product-name"], $_POST["product-price"], $_POST["product-store"], $_POST["product-category"],
                    $_POST["product-color"], $_POST["product-composition"], $_POST["product-tools"], $_POST["product-id"]);
header("location: ../index-prodotti-venditore.php");
?>