<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location:../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Cart - Bitar Jewelry</title>

        <!-- linking bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
            crossorigin="anonymous"/>

        <!-- linking my css -->
        <link rel="stylesheet" href="../styles/style.css" />
    </head>

    <body>
        <!-- fixed -->
        <!-- navigation bar -->
        <nav class="navbar fixed-top my-bg-primary" data-bs-theme="dark">
            <div class="container-fluid">
                <div>
                    <!-- logo -->
                    <a class="navbar-brand my-text-secondary">
                        <img src="../images/logo.png" alt="Logo" width="100px" />
                    </a>

                    <!-- dropdown -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="../index.php">Log In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="home.php">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Pricing</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- search bar -->
                <form class="d-none d-sm-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-light" type="submit">
                        Search
                    </button>
                </form>
            </div>
        </nav>

        <!-- cart items (card) -->
        <main>
            <div class="container-fluid">
                <h1>My Cart</h1>
                <div class="row">
                    <!-- card col -->
                    <div class="col-sm-8 col-xs-12">
                        <!-- render products from db here -->
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

                        $un = $_SESSION["username"];

                        // get products
                        $stmnt = "SELECT product.* FROM customer JOIN cart ON customer.id = cart.customer_id JOIN cart_items ON cart.id = cart_items.cart_id JOIN product ON cart_items.product_id = product.id WHERE customer.username = '".$un."';";
                        $result = $db->query($stmnt);
                        $new = $result->fetchAll();

                        foreach ($new as $prod) {
                            $prodid = $prod["id"];
                            $prodname = $prod["name"];
                            $proddesc = $prod["description"];
                            $prodtype = $prod["type"];
                            $prodprice = $prod["price"];
                            $prodimage = $prod["image"];
                            $prodstock = $prod["stock"];

                            // get the quantity of each product from the user's cart 
                            $amntq = "SELECT quantity FROM cart_items WHERE (product_id = ".$prodid.") AND (cart_id = (SELECT cart_id FROM customer WHERE username = '".$un."'));";
                            $cartamntx = $db->query($amntq);
                            $cartamnt = $cartamntx->fetch();

                            // display the products
                            echo "<div class='card' id='prod".$prodid."'>
                            <div class='row'>
                                <!-- product.image -->
                                <div class='col-sm-6 col-xs-12 img-col'>
                                    <img src='../pics/".$prodimage."' class='card-img-top' alt='".$prodname."' />
                                </div>

                                <!-- info -->
                                <div class='col-sm-6 col-xs-12'>
                                    <div class='card-body'>
                                        <!-- product.name -->
                                        <h5 class='card-title'>".$prodname."</h5>

                                        <!-- product.price -->
                                        <p class='card-text'>$".$prodprice."</p>
                                        
                                        <!-- product.description -->
                                        <p id='pdesc".$prodid."'>".$proddesc."</p>
                                        
                                        <!-- product.id -->
                                        <p style='margin-bottom: 0px;'>
                                            <span>Product ID: </span>
                                            <span id='pid".$prodid."'>".$prodid."</span>
                                        </p>


                                        <!-- product.type -->
                                        <p style='margin-bottom: 0px;'>
                                            <span>Type:</span>
                                            <span id='ptype".$prodid."'>".$prodtype."</span>
                                        </p>

                                        <p class='div'>
                                            <span>
                                                Amount:
                                            </span>
                                            <!-- cart_items.quantity -->
                                            <span id='pqnt".$prodid."'>".$cartamnt["quantity"]."</span>
                                        </p>

                                        <!-- add btn -->
                                        <button type='button' class='btn btn-outline-primary' onclick='Add(\"pqnt".$prodid."\")'>
                                            Add
                                        </button>

                                        <!-- remove btn -->
                                        <button type='button' class='btn btn-outline-danger' onclick='Remove(\"pqnt".$prodid."\")'>
                                            Remove
                                        </button>

                                        <!-- save button -->
                                        <button type='button' class='btn btn-outline-primary' onclick='Update(\"pid".$prodid."\", \"pqnt".$prodid."\")'>
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>";
                        }
                        ?>

                        <form action="../backend/cartquantity.php" id="quantity-form" method="POST">
                            <input type="hidden" name="f_product_id" id="f_product_id" value="">
                            <input type="hidden" name="f_quantity" id="f_quantity" value="">
                        </form>
                    </div>

                    <!-- summary col -->
                    <div class="col-sm-4 col-xs-12">
                        <!-- total card -->
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Summary</h5>

                                <p class="card-text">Total: US$ 15.00</p>

                                <button type="button" class="btn btn-outline-primary" onclick="showCard('paymentinfo')">Checkout</button>
                            </div>
                        </div>

                        <!-- visa card information -->
                        <div class="card hide" id="paymentinfo">
                            <div class="card-header">
                                Card Information
                            </div>
                            <div class="card-body">
                                <div class="vertical-margin-5">
                                    <h5 class="card-title">Card Number</h5>
                                    <input class="form-control" type="text" placeholder="XXXX XXXX XXXX XXXX"
                                        aria-label="CardNo" />
                                </div>

                                <div class="vertical-margin-5">
                                    <h5 class="card-title">Card Holder's Name</h5>
                                    <input class="form-control" type="text" placeholder="e.g. John Doe"
                                        aria-label="Name" />
                                </div>

                                <div class="vertical-margin-5">
                                    <h5 class="card-title">Expiration Date</h5>
                                    <input class="form-control" type="text" placeholder="MM / YY" aria-label="Date" />
                                </div>

                                <div class="vertical-margin-5">
                                    <h5 class="card-title">CSV</h5>
                                    <input class="form-control" type="number" placeholder="XXX" aria-label="CSVNo" />
                                </div>

                                <a href="#" class="btn btn-outline-primary" style="margin-top: 5px;">BUY!</a>
                            </div>
                        </div>

                        <!-- payment methods -->
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Payment Methods</h5>

                                <!-- row of payment methods -->
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item justify-content-evenly" style="display:flex;"">
                                        <img src=" https://img.alicdn.com/tfs/TB1xcMWdEKF3KVjSZFEXXXExFXa-68-48.png"
                                        alt="Visa">
                                        <img src="https://img.alicdn.com/tfs/TB19TEYdB1D3KVjSZFyXXbuFpXa-53-48.png"
                                            alt="Mastercard">
                                        <img src="https://img.alicdn.com/tfs/TB19qM7drus3KVjSZKbXXXqkFXa-39-48.png"
                                            alt="JCB">
                                    </li>
                                    <li class="list-group-item">
                                        <h5 class="card-title">Buyer Protection</h5>

                                        <p>
                                            Get full refunds if the item is not as described or if it is not delivered
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- linking bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>

        <script src="../scripts/cart.js"></script>
    </body>

</html>