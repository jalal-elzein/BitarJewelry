function Add(id) {
    var label = document.getElementById(id);
    var current = parseInt(label.innerHTML);
    label.innerHTML = current + 1;
}

function Remove(id) {
    var label = document.getElementById(id);
    var current = parseInt(label.innerHTML);
    if (current > 1) {
        label.innerHTML = current - 1;
    }
    else if (current == 1) {
        var prodnum = id.slice(-2);
        console.log(prodnum);
        var currprod = document.getElementById("prod" + prodnum);
        currprod.classList.add("hide");
    }
}

function showCard(id) {
    var card = document.getElementById(id);
    card.classList.remove('hide');
}

function Move() {
    window.location.href = "../pages/cart.html";
  }
  