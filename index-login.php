<?php
require_once 'php/bootstrap.php';

$templateParams["titolo"] = "AllYouKnit - Login";
$templateParams["nome"] = "login.php";
$templateParams["categorie"] = $dbh->getCategories();

require 'template/base.php';
?>