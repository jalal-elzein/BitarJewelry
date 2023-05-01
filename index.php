<?php
session_start();
?>

<html>
    <head>  
        <link rel="stylesheet" href="./styles/loginstyle.css"> 
        <link rel="stylesheet" href="./styles/style.css">
        <title>
            Login
        </title>
        <!-- linking bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
            crossorigin="anonymous"/>

    </head>
    <body>
        <div class="title">
            <span>Log Into Your Account</h1>
        </div>        
    
        <div class="container justify-content-center" style="margin-bottom: 10px;">
            <?php
            // define failure message
            $failure = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Login Failed. Username or Password is incorrect. Try Again.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';

            if (isset($_SESSION["login_status"])) {
                if ($_SESSION["login_status"] == 0) {
                    echo $failure;
                }
                unset($_SESSION["login_status"]);
            }
            ?>
        </div>

        <div class="paragraph" style="border:0;">
            <form class="form" action="backend/login.php" method="POST" name="login-form">
                <label for="username">Username</label>
                <br>
                <input type="text" name="username" id="uninput" class="txtfield">
                <br><br>
                <label for="password">Password</label>
                <br>
                <input type="password" name="password" id="pinput" class="txtfield">
                <br><br>
                <input type="submit" value="Login" class="mButton" onclick="Login()">
            </form>
        </div>

        <script>
            function getCookie(name) {
                var cookies = document.cookie.split(";");
                for (let i = 0; i < cookies.length; i++) {
                    var tempcook = cookies[i].trim();
                    if (tempcook.startsWith(name + "=")) {
                        return decodeURIComponent(tempcook.substring(name.length + 1));
                    }
                }
                return "";
            }

            var un = getCookie("username");
            var ps = getCookie("password");

            if(un && ps) {
                document.getElementById("uninput").value = un;
                document.getElementById("pinput").value = ps;
                document.querySelector("form[name='login-form']").submit();
            }

            var isFirstLoad = true;
            document.addEventListener("DOMContentLoaded", function() {
                if (isFirstLoad) {
                    document.getElementById("uninput").value = "";
                    document.getElementById("pinput").value = "";
                    isFirstLoad = false;
                }
            });
            
            
        </script>

        <span id="login" style=" -webkit-text-stroke: 0;margin-right: 10; font-family: sans-serif; position:relative; top:200; left:42%">
            Don't have an account? Sign up!
            <br>
        </span>
        <br>
        <input type="button" value="Sign up" style="position:relative; top:200; left: 47%" class="mButton" onclick="SignUp()">

        <script>
            function SignUp() {
                window.location.href = "./pages/signup.html"; 
            }
        </script>
</body>
</html>
