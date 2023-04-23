<?php
session_start();
session_unset();
session_destroy();
?>

<html>
    <head>  
        <link rel="stylesheet" href="./styles/loginstyle.css"> 
        <link rel="stylesheet" href="./styles/style.css">
        <title>
            Login
        </title>
    </head>
    <body>
                    

        <div class="title">
            <span>Log Into Your Account</h1>
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
