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

    
    // Assume you have an array of products with various attributes
    $products = array(
        array("product_id" => 1, "product_name" => "Product 1", "product_price" => 100, "product_category" => "Electronics"),
        array("product_id" => 2, "product_name" => "Product 2", "product_price" => 200, "product_category" => "Clothing"),
        array("product_id" => 3, "product_name" => "Product 3", "product_price" => 150, "product_category" => "Electronics"),
        array("product_id" => 4, "product_name" => "Product 4", "product_price" => 50, "product_category" => "Accessories"),
    );

    // Filter products by category
    $categoryFilter = "Electronics"; // Specify the category you want to filter by

    // Loop through each product and filter based on category
    $filteredProducts = array();
    foreach ($products as $product) {
        if ($product["product_category"] == $categoryFilter) {
            $filteredProducts[] = $product;
        }
    }

    // Display filtered products
    echo "Filtered Products:<br>";
    foreach ($filteredProducts as $product) {
        echo "Product ID: " . $product["product_id"] . "<br>";
        echo "Product Name: " . $product["product_name"] . "<br>";
        echo "Product Price: " . $product["product_price"] . "<br>";
        echo "Product Category: " . $product["product_category"] . "<br>";
        echo "<br>";
    }





