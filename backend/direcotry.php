<?php
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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST['id']) && isset($_POST['stock'])) {
    $product_id = $_POST['id'];
    $stock = $_POST['stock'];

    $qry = "UPDATE product SET stock = :stock WHERE id = :product_id";
    $stmt = $db->prepare($qry);
    $stmt->bindParam(':stock', $stock);
    $stmt->bindParam(':product_id', $product_id);
    $stmt->execute();
	$stmt->execute();
if ($stmt->errorCode() !== "00000") {
    $errorInfo = $stmt->errorInfo();
    print("Error: " . $errorInfo[2] . "<br>");
}
	}
	else{
		echo "alert";
	}

}

$qry = "SELECT id, stock, name FROM product";
$res = $db->query($qry);

foreach ($res as $prod) {
    echo "Product Name: " . $prod['name'] . "<br>";
    echo "Stock: " . $prod['stock'] . "<br>";
    ?>
    <form method="post">
        <input type="hidden" name="id" value="<?= $prod['id'] ?>">
        <label for="stock">New Stock:</label>
        <input type="number" name="stock" id="stock">
        <button type="submit">Update</button>
    </form>
    <br><br>
    <?php
}
?>
