<?php
require_once 'php/bootstrap.php';

$templateParams["titolo"] = "AllYouKnit - Personal page";
$templateParams["categorie"] = $dbh->getCategories();

$templateParams["nome"] = "pagina-personale.php";

require 'template/base.php';
?>