<?php
    session_start();
    session_unset();
    session_destroy();
?>

<html>
    <head>
        <link rel="stylesheet" href="loginstyle.css"> 
        <link rel="stylesheet" href="../BitarJewelry/styles/loginstyle.css"> 
        <link rel="stylesheet" href="./BitarJewelry/styles/style.css"> 
        <script>
            // alert("my first javascript!"); 
         </script>
        <title>
            Login
        </title>
    </head>
    <body>
                    

        <div class="title">
            <span>Login</h1>
        </div>        
        
    
        <div class="paragraph" style="border:0;">
            <form action="../BE/login.php" method="POST" name="login-form">
                <label for="username">Username</label>
                <br>
                <input type="text" name="username" id="uninput" class="txtfield">
                <br>
                <label for="password">Password</label>
                <br>
                <input type="password" name="password" id="pinput" class="txtfield">
                <br>
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

            if(un && ps){
                
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

        <span id="login" style=" -webkit-text-stroke: 0;margin-left: 10; font-family: sans-serif;">
            Don't have an account? Sign up!
        </span>
        <br>
        <input type="button" value="Sign up" style="margin-left: 10;" class="mButton" onclick="SignUp()">
        <script>
            function SignUp() {
                window.location.href = "./pages/signup.html"; 
                }
        </script>
</body>
</html>
