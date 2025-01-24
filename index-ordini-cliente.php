<?php
require_once 'php/bootstrap.php';

$templateParams["titolo"] = "AllYouKnit - I tuoi ordini";
$templateParams["nome"] = "ordini-cliente.php";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["news"] = $dbh->checkNewNotifications($_SESSION["email"]);
$templateParams["ordini"] = $dbh->getCustomerOrders($_SESSION["email"]);

require 'template/base.php';
?>