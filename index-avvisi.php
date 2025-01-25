<?php
require_once 'php/bootstrap.php';

$templateParams["titolo"] = "Avvisi";
$templateParams["news"] = $dbh->checkNewNotifications($_SESSION["email"]);
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["inbox"] = $dbh->getUserInbox($_SESSION["email"]);
$templateParams["nome"] = "avvisi.php";

require 'template/base.php';
?>