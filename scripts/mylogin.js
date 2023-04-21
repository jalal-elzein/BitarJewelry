function getCookie(name) {
    var cookies = document.cookie.split(";");

    for (var i = 0; i < cookies.length; i++) {
        var tempcook = cookies[i].trim();
        if (tempcook.startsWith(name + "=")) {
            return decodeURIComponent(tempcook.substring(name.length + 1));
        }
    }

    return null;
}

function login() {
    var uname = document.getElementById("username").value;
    var upass = document.getElementById("password").value;
    console.log(uname);
    console.log(upass);
    if (uname != "" && upass != "") {
        document.getElementById("login").submit();
    } else {
        alert("fill both inputs please");
    }
}

function hlogin() {
    document.getElementById("husername").value = getCookie("uname");
    document.getElementById("hpassword").value = getCookie("pass");
    document.getElementById("hlogin").submit();
}