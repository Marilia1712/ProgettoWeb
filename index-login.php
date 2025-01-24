<?php
require_once 'php/bootstrap.php';

$templateParams["titolo"] = "AllYouKnit - Login";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["nome"] = "login.php";

require 'template/base.php';
?>