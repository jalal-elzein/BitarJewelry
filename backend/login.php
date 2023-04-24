<?php
	// connecting to the database
	$dbhost = "127.0.0.1";
	$dbname = "bitar_db";
	$dbuser = "root";
	$dbpass = "";
	$db = null;
	try {
		$db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
	} catch (PDOException $e) {
		print("Error: ".$e->getMessage()."<br/>");
		die();
	}
	
	// receive values from form submission
	$username = $_POST["username"];
	$password = $_POST["password"];

	// query the database for a username with the provided credentials
	$query = "SELECT id FROM customer WHERE username = '".$username."' AND password = '".$password."';";
	$result = $db->query($query);
	
	// if # records == 1: login and start session etc
	$resrows = $result->rowCount();
	if ($resrows == 1) {
		session_start();
		$_SESSION["username"] = $username;
		header("location:../pages/home.php");
	}
	// else send error
	else {
		header("location:../index.php");
	}
?>