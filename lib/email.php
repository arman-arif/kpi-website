<?php
session_start();

require_once "../lib/db-config.php";
require_once "../class/Functions.php";
require_once "../class/Connection.php";
require_once "../class/Database.php";

$ofn = new Functions();
$odb = new Database();

if (isset($_POST['email'])){
	$data = $ofn->validateArray($_POST);
	$data = $odb->escapeStringArray($data);

	$name = $data['first_name'] . " " . $data['last_name'];
	$data['sender'] = ucwords(strtolower($name));
	unset($data['first_name']);
	unset($data['last_name']);

	$odb->insertData("message", $data);
	
	$_SESSION['message'] = "Email or Message send successfully!";
}

header("location: ../contact.php");