<!DOCTYPE html>
<html lang="en">

  <head>
    <title>Directory</title>
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
    
    session_start();
    
    // get the filter value from the post request
    $filter_by = $_POST['filter-by'];
    $qry = "SELECT type, name, image FROM product WHERE type = :filter_by";
    $stmt = $db->prepare($qry);
    $stmt->bindParam(':filter_by', $filter_by);
    $stmt->execute();
   // $row['name']
    //$row['type']
    echo 'The results are for type ', $filter_by;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="col-sm-3 col-xs-12">
        <div class="card">
        <img src="../pics/' . $row["image"] . '" class="card-img-top">
          <div class="card-body">
            <p class="card-text">' . $row['name'] . '</p>
          </div>
        </div>
      </div>';
    }
?>
  </body>
</html>