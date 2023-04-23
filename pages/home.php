<?php
session_start();
if (!isset($__SESSION["username"])) {
    header("location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- css -->
    <link rel="stylesheet" href="../styles/mystyle.css">
    <link rel="stylesheet" href="../styles/jalaloveramal.css">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-tZ8a+ZHYTtXd+10QmJsfaGyX9tWpyk3p3D3qBJdZb8jJN4YnLYOnI4oFElv/8CQWn1kwPOeSgzSXCZlL0lWJYg=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
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
                <a class="nav-link" href="cart.php">Cart</a>
              </li>
            </ul>
          </div>

          <?php
          echo "Welcome back, ";
          echo $_SESSION["username"];
          ?>
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

    <!-- search, sort, & filter -->
    <div class="container" style="margin-top: 75px;">
      <h1>Jeweler Directory</h1>

      <div class="row">
        <!-- search -->
        <div class="col">
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="search-key">
            <button type="button" class="btn btn-outline-dark">Search</button>
          </form>
        </div>
        
        <!-- sort -->
        <div class="col">
          <select class="form-select" aria-label="multiple select example">
            <option selected>Sort By</option>
            <option value="name-asc">Name (A-Z)</option>
            <option value="name-desc">Name (Z-A)</option>
            <option value="length-asc">Size (cm) (Low to High)</option>
            <option value="length-desc">Size (cm) (High to Low)</option>
            <option value="availability">Availability</option>
          </select>
        </div>

        <!-- filter -->
        <div class="col">
          <select class="form-select" aria-label="multiple select example">
            <option value="defualt" id="default">Filter By</option>
            <option value="color">Color</option>
            <option value="earrings">Earrings</option>
            <option value="pearls">Pearls Necklace</option>
            <option value="gold">Gold Necklace</option>
            <option value="silver">Silver Necklace</option>
            <option value="pendant">Pendants</option>
            <option value="chain">Chains</option>
            <option value="ring">Rings</option>
          </select>
        </div>
      </div>
    </div>

    <!-- grid -->
    <!-- replace by php to render from db -->
    <div class="container text-center" style="margin-top: 15px;">
      <div class="row">

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

        $username = $_SESSION["username"];
        $qry = "SELECT * FROM product;";
        $res = $db->query($qry);

        foreach ($res as $prod) {
          // print_r($prod);
        
          echo '<div class="col-sm-3 col-xs-12">
          <div class="card">
            <img src="../pics/' . $prod["image"] . '" class="card-img-top">
            <div class="card-body">
              <!-- title -->
              <p class="card-text">' . $prod["name"] . '</p>
              <!-- price -->
              <p class="card-text">
                <span>$</span>
                <span>' . $prod["price"] . '</span>
              </p>
              <button class="btn btn-outline-primary">Add to Cart</button>
            </div>
          </div>
        </div>';
        }
        ?>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"></script>
    <script>
      function search() {
        var query = document.getElementById("search-key").value;
        alert("Performing search for query: " + query);
      }
    </script>
  </body>   
</html>