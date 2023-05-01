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

        if ($stmt->errorCode() !== "00000") {
            $errorInfo = $stmt->errorInfo();
            print("Error: " . $errorInfo[2] . "<br>");
        } else {
            $_SESSION['message'] = "Stock for product with ID $product_id has been updated to $stock.";
        }
    } else {
        $_SESSION['message'] = "Invalid request";
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
        <label for="new-stock-<?= $prod['id'] ?>">New Stock:</label>
        <input type="number" name="stock" id="new-stock-<?= $prod['id'] ?>">
        <button type="submit" onclick="return confirm('Are you sure you want to update the stock for <?= $prod['name'] ?> to ' + document.getElementById('new-stock-<?= $prod['id'] ?>').value + '?')">Update</button>
    </form>
    <br><br>
<?php
}

if (isset($_SESSION['message'])) {
    echo "<p>" . $_SESSION['message'] . "</p>";
    unset($_SESSION['message']);
}
echo "DEBUG: Message set to '" . $_SESSION['message'] . "'";

?>

