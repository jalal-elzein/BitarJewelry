<?php
	// connecting to the database
	$dbhost = "127.0.0.1";
	$dbname = "bitarDB";
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
    $remember = $_POST["remembercheck"];
	
	// query the database for a username with the provided credentials
	$query = "SELECT id FROM users WHERE username = '".$username."' AND password=PASSWORD('".$password."')";
	$result = $db->query($query);
	
	// if # records == 1: login and start session etc
	$resrows = $result->rowCount();
	if ($resrows == 1) {
		session_start();
		$_SESSION["username"] = $username;
        
        if ($remember) {
            setcookie("uname", $un, time() + 3600);
        }

		header("location:./pages/home.php");
	} 

	
	// else send error
	else {
		header("location:./index.php");
	}
?>