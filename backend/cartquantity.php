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
    
    // get username from session
    session_start();
    $username = $_SESSION["username"];

    // receive value for product
    $amount = $_POST["f_quantity"];
    $product_id = $_POST["f_product_id"];

    // create the query 
    $query = "UPDATE cart_items SET quantity = ".$amount." 
        WHERE cart_id = (SELECT id FROM cart 
        WHERE customer_id = (SELECT id FROM customer WHERE username = '".$username."')) 
        AND product_id = ".$product_id.";";

    try {
        $db->exec($query);
        $_SESSION["change_success"] = 1;
    } catch (Exception $e) {
        $_SESSION["change_success"] = 0;
    }

    header("location:../pages/cart.php");
?>