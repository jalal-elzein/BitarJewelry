<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/jalaloveramal.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
            session_start();
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
    <div class="container text-center">
      <div class="row">
        <div class="col-sm-3 col-xs-12">
          <div class="card">
            <img src="../pics/bodychain.jpg" class="card-img-top">
            <div class="card-body">
              <p class="card-text">Body Chain</p>
            </div>
          </div>
        </div>

        <div class="col-sm-3 col-xs-12">
          <div class="card">
            <img src="../pics/chainwide.jpg" class="card-img-top" alt="wide chain">
            <div class="card-body">
              <p class="card-text">Wide Chain</p>
            </div>
          </div>
        </div>

        <div class="col-sm-3 col-xs-12">
          <div class="card">
            <img src="../pics/clockredpen.jpg" class="card-img-top" alt="Red Pendant">
            <div class="card-body">
              <p class="card-text">Red Pendant</p>
            </div>
          </div>
        </div>

        <div class="col-sm-3 col-xs-12">
          <div class="card">
            <img src="../pics/crysrainbow.jpg" class="card-img-top" alt="Rainbow Crystal">
            <div class="card-body">
              <p class="card-text">Rainbow Crystal</p>
            </div>
          </div>
        </div>

        <div class="col-sm-3 col-xs-12">
          <div class="card">
            <img src="../pics/earine2.jpg" class="card-img-top" alt="Butterfly Earrings">
            <div class="card-body">
              <p class="card-text">Butterfly Earrings</p>
            </div>
          </div>
        </div>

        <div class="col-sm-3 col-xs-12">
          <div class="card">
            <img src="../pics/goldear.jpg" class="card-img-top" alt="Gold Earrings">
            <div class="card-body">
              <p class="card-text">Gold Earrings</p>
            </div>
          </div>
        </div>

        <div class="col-sm-3 col-xs-12">
          <div class="card">
            <img src="../pics/pinkcrys.jpeg" class="card-img-top" alt="Pink Crystals">
            <div class="card-body">
              <p class="card-text">Pink Crystals</p>
            </div>
          </div>
        </div>

        <div class="col-sm-3 col-xs-12">
          <div class="card">
            <img src="../pics/ringred.jpg" class="card-img-top" alt="Red Ring">
            <div class="card-body">
              <p class="card-text">Red Ring</p>
            </div>
          </div>
        </div>

        <div class="col-sm-3 col-xs-12">
          <div class="card">
            <img src="../pics/ringsiler.jpg" class="card-img-top" alt="Silver Ring">
            <div class="card-body">
              <p class="card-text">Silver Ring</p>
            </div>
          </div>
        </div>

        <div class="col-sm-3 col-xs-12">
          <div class="card">
            <img src="../pics/webpearl.jpg" class="card-img-top" alt="Pearls">
            <div class="card-body">
              <p class="card-text">Pearls</p>
            </div>
          </div>
        </div>

        <div class="col-sm-3 col-xs-12">
          <div class="card">
            <img src="../pics/18k-gold-chain-33483988_1036550_ED.jpg" class="card-img-top" alt="Gold Chain">
            <div class="card-body">
              <p class="card-text">Gold Chain</p>
            </div>
          </div>
        </div>
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