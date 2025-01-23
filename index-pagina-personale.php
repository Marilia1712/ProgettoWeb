<?php
require_once 'php/bootstrap.php';

$templateParams["titolo"] = "AllYouKnit - Personal page";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["news"] = $dbh->checkNewNotifications($_SESSION["email"]);
$templateParams["nome"] = "pagina-personale.php";

require 'template/base.php';
?>