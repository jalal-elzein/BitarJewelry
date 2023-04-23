

<?php
//only for testing ignore!!
    // connecting to the database
	$dbhost = "127.0.0.1";
	$dbname = "se";
	$dbuser = "root";
	$dbpass = "";
	$db = null;
	try {
		$db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
	} catch (PDOException $e) {
		print("Error: ".$e->getMessage()."<br/>");
		die();
	}
    session_start();

    $qry = "SELECT stock, name FROM product";
    $res = $db->query($qry);

    foreach ($res as $prod) {
        echo "Product Name: " . $prod['name'] . "<br>";
        echo "Stock: " . $prod['stock'] . "<br><br>";
    }
?>
    