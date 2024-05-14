if (document.readyState == "loading"){
    document.addEventListener('DOMContentLoaded', ready)
}else {
    ready();
}

function ready() {
    var addToCarthomeBtn = document.getElementsByClassName('addToCarthomeBtn');
    for (var i = 0; i < addToCarthomeBtn.length; i++){
        var button = addToCarthomeBtn[i];
        button.addEventListener('click', addToCartItem);
    }

    var addTocartSingleProductBtn = document.getElementsByClassName('addTocartSingleProductBtn');
    for (var i = 0; i < addTocartSingleProductBtn.length; i++){
        var button = addTocartSingleProductBtn[i];
        button.addEventListener('click', addToCartItemFromSingleProductPage);
    }

    selectColor();
    selectSize();
}

function selectColor() {
    $('.colorBtn').on('click',function () {
        var colorId = $(this).attr('id');
       $.ajax({
           type: "Get",
           url: "/product-color/"+colorId,
           success:function (data) {
               // console.log(data);
               var colorName =  data['color_name'];
               var colorCode =  data['color_code'];
               $('#colorName').val(colorName);
               $('#colorCode').val(colorCode);
           }
       });
    });
}

function selectSize() {
    $('.sizeBtn').on('click',function () {
        var sizeId = $(this).attr('id');
       $.ajax({
           type: "Get",
           url: "/product-size/"+sizeId,
           success:function (data) {
               // console.log(data);
               var size = data['size'];
               $('#sizeName').val(size)
           }
       });
    });
}

function addToCartItem(event) {
    var buttonClicked = event.target;
    var itemSlag = buttonClicked.parentElement.getElementsByTagName('span')[0].innerText;
    var itemQty = 1;

    addToCartPostFormHome(itemSlag,itemQty);
}

function addToCartItemFromSingleProductPage(event) {
    var buttonClicked = event.target;


    var itemSlag = $('#singleProductSlag').val();
    var itemQty = $('#productQty').val();
    if (itemQty < 0){
        itemQty = 1;
    }
    var itemColorName = $('#colorName').val();
    var itemColorCode = $('#colorCode').val();
    var itemSize = $('#sizeName').val();

    // console.log(itemSlag,itemQty,itemColorName,itemColorCode,itemSize);
    addToCartPostFormSingleProductPage(itemSlag,itemQty,itemColorName,itemColorCode,itemSize);

}

