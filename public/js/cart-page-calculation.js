if (document.readyState == "loading"){
    document.addEventListener('DOMContentLoaded', ready)
}else {
    ready();
}

function ready() {
    var quantityInput = document.getElementsByClassName('quantity');
    for (var i = 0; i < quantityInput.length; i++){
        var quantity = quantityInput[i];
        quantity.addEventListener('change',cartUpdate);
    }
}

function cartUpdate(event) {
    var input = event.target;
    var tableRow = input.parentElement.parentElement.parentElement;
    var qtyValue = parseInt(input.value);
    if(qtyValue > 0){
        var unitPrice = parseFloat(tableRow.getElementsByClassName('unitPrice')[0].innerText.replace('৳',''));
        var calculate = qtyValue * unitPrice;
        tableRow.getElementsByClassName('totalPrice')[0].innerText = calculate + '.00৳';
        calculateSubTotal();
    }else {
        input.value = 1;
    }
}

function calculateSubTotal() {
    var allTotalPrice = document.getElementsByClassName('totalPrice');
    var subTotal = 0;
    for (var i = 0; i < allTotalPrice.length; i++){
        var totalPrice = parseFloat(allTotalPrice[i].innerText.replace('৳',''));
        subTotal = subTotal + totalPrice;
    }
    document.getElementsByClassName('subTotal')[0].innerText = subTotal + '.00৳';
    calculateTex();
}

function calculateTex() {
    var subTotal = parseFloat(document.getElementsByClassName('subTotal')[0].innerText.replace('৳',''));
    var texRet = parseInt(document.getElementsByClassName('textRet')[0].innerText);

    var tax = (subTotal * texRet) / 100;
    document.getElementsByClassName('taxTotal')[0].innerText = tax + '.00৳';
    calculateNetTotal();
}

function calculateNetTotal() {
    var subTotal = parseFloat(document.getElementsByClassName('subTotal')[0].innerText.replace('৳',''));
    var taxTotal = parseFloat(document.getElementsByClassName('taxTotal')[0].innerText.replace('৳',''));
    var calculate = subTotal + taxTotal;
    document.getElementsByClassName('netTotal')[0].innerText = calculate + '.00৳';
}
