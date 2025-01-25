<?php
require_once("../db/dbhelper.php");
$dbh = new DatabaseHelper("localhost", "root", "", "allyouknit", 3306);
session_start();
$dbh->deleteUserNotification($_SESSION["email"], $_POST["idAvviso"], $_POST["dataAvviso"], $_POST["oraAvviso"]);
header("location: ../index-avvisi.php");
?>