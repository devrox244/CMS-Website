<?php require_once("Back\Db.php"); ?>
<?php require_once("Back\Functions.php"); ?>
<?php require_once("Back\Sessions.php"); ?>
<?php
$_SESSION["id"] = null;
$_SESSION["username"] = null;
$_SESSION["name"] = null;
$_SESSION["password"] = null;
session_destroy();
redirect_to("Login.php");
?>