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

// ajax this somehow
function Update(idid, qntid) {
    // get necessary information
    var id = document.getElementById(idid).innerHTML;
    var quantity = document.getElementById(qntid).innerHTML;

    // set them in the form 
    var f_prod_id = document.getElementById("f_product_id");
    f_prod_id.value = parseInt(id);
    var f_quantity = document.getElementById("f_quantity");
    f_quantity.value = parseInt(quantity);

    // submit the form
    var form = document.getElementById("quantity-form");
    form.submit();
}