<?php
session_start();
session_unset();
session_destroy();
?>

<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Log In</title>

    <link rel="stylesheet" href="./styles/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>

  <body>
    <div class="background">
      <div class="container">
        <div class="d-flex justify-content-center">
          <h1>Log Into Your Account</h1>
        </div>

        <!-- hidden form -->
        <div class="text-center">
          <br>
          <form id="login" class="border border-black rounded d-none" action="backend/login.php" method="POST">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username">
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password">
            </div>

            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Remember Me</label>
            </div>
          </form>
          <!-- php here -->
          <?php
            if (isset($_COOKIE["uname"])) {
              echo '<button type="button" class="btn btn-outline-dark">Quick Sign in as'.$_COOKIE["uname"].'</button>';
            }
          ?>
        </div>

        <div class="d-flex justify-content-center">
          <form id="hlogin" class="border border-black rounded" action="./backend/login.php" method="POST">
            <div class="mb-3">
              <label for="husername" class="form-label">Username</label>
              <input type="text" class="form-control" id="husername">
              <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>

            <div class="mb-3">
              <label for="hpassword" class="form-label">Password</label>
              <input type="password" class="form-control" id="hpassword">
            </div>

            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="remembercheck">
              <label class="form-check-label" for="remembercheck">Remember Me</label>
            </div>

            <div class="text-center">
              <input type="button" onclick="login()" class="btn btn-outline-dark" value="Submit"></input>
            </div>
          </form>

        </div>
      </div>

      <div class="container">
        <div class="text-center">
          Don't have an account? Sign Up here!
        </div>
        <div class="text-center">
          <button type="button" class="btn btn-outline-dark" onclick="window.location.href='pages/signup.html'">Sign
            Up</button>
        </div>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
      </script>

    <script src="./scripts/mylogin.js"></script>
  </body>

</html>