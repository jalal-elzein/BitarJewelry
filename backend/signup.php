<?php
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["pass"];

    // Connect to database
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
    
    
    // Insert user into database
    $check_query = "SELECT * FROM customer WHERE username='$username'";
    $check_result = $db->query($check_query);
    if ($check_result->rowCount() > 0) {
        // Username already exists, prompt user to enter a different one
        echo "Username already exists. Please choose a different username.";
    } else {

        // Insert user into database
        $sql = "INSERT INTO customer (first_name, last_name, username, email, password) VALUES ('$firstname', '$lastname', '$username', '$email', '$password')";
        $res = $db->exec($sql);

        header("location:../index.php");
    }
?>
