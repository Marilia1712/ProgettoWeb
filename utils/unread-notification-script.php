<?php
require_once("../db/dbhelper.php");
$dbh = new DatabaseHelper("localhost", "root", "", "allyouknit", 3306);
session_start();
$dbh->unreadNotification($_SESSION["email"], $_POST["idAvviso"]);
header("location: ../index-avvisi.php");
?>