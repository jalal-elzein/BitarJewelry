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
    print("Error: " . $e->getMessage() . "<br/>");
    die();
}
?>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Filter - Bitar Jewelry</title>

    <!-- linking bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
        crossorigin="anonymous"/>

    <!-- linking my css -->
    <link rel="stylesheet" href="../styles/style.css" />
</head>
<?php
session_start();
$success = '<!-- change confirmation -->
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Changes Have Been Saved Successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';

// define failure message
$failure = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Changes were not saved! Please try again or contact customer support if the problem persists.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                            
if (isset($_SESSION["stock_status"])) {
    if ($_SESSION["stock_status"] == 1) {
        echo $success;
    } else {
        echo $failure;
    }
    unset($_SESSION["stock_status"]);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id']) && isset($_POST['stock'])) {
        $product_id = $_POST['id'];
        $stock = $_POST['stock'];

        $qry = "UPDATE prduct SET stock = :stock WHERE id = :product_id";
        $stmt = $db->prepare($qry);
        $stmt->bindParam(':stock', $stock);
        $stmt->bindParam(':product_id', $product_id);

        try {
            $stmt->execute();
            $_SESSION["stock_status"] = 1;
        } catch (Exception $e) {
            $_SESSION["stock_status"] = 2;
        }
        // header("location:../pages/direcotry.php");

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

