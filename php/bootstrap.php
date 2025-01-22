<?php
session_start();
define("UPLOAD_DIR", "./upload/");
require_once("db/dbhelper.php");
$dbh = new DatabaseHelper("localhost", "root", "", "allyouknit", 3306);
?>
