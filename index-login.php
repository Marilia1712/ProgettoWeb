<?php
require_once 'php/bootstrap.php';

$templateParams["titolo"] = "AllYouKnit - Login";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["news"] = $dbh->checkNewNotifications($_SESSION["email"]);
$templateParams["nome"] = "login.php";

require 'template/base.php';
?>