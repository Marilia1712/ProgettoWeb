<?php
require_once 'php/bootstrap.php';

//Base Template
$templateParams["titolo"] = "AllYouKnit - Homepage";
$templateParams["nome"] = "lista-categorie.php";
$templateParams["categorie"] = $dbh->getCategories();

require 'template/base.php';
?>