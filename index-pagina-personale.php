<?php
require_once 'php/bootstrap.php';

$templateParams["titolo"] = "Pagina di ".$_SESSION["Nome"];
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["news"] = $dbh->checkNewNotifications($_SESSION["email"]);
$templateParams["nome"] = "pagina-personale.php";

require 'template/base.php';
?>