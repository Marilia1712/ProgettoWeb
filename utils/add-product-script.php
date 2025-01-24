<?php
require_once("../db/dbhelper.php");
$dbh = new DatabaseHelper("localhost", "root", "", "allyouknit", 3306);
$dbh->addProduct($_POST["product-name"], $_POST["product-price"], $_POST["product-store"], $_POST["product-category"],
                    $_POST["product-color"], $_POST["product-composition"], $_POST["product-tools"]);
header("location: ../index-aggiungi-prodotto.php");
?>