<?php
require_once("../db/dbhelper.php");
$dbh = new DatabaseHelper("localhost", "root", "", "allyouknit", 3306);
$dbh->sendNotification($_POST["notification-title"], $_POST["notification-content"]);
header("location: ../index-nuovo-avviso.php");
?>