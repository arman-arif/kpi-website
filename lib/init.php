<?php
session_start();

require_once "lib/db-config.php";
require_once "lib/autoload.php";

$ofn = new Functions();
$odb = new Database();
$opr = new Published();


if (isset($_POST['lang'])){
	$_SESSION['lang'] = $_POST['lang'];
	exit('<script>window.history.back();</script>');
}
if (!isset($_SESSION['lang'])){
	$_SESSION['lang'] = 'en';
}

$lang = $_SESSION['lang'];
