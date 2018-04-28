/*price range*/

 $('#sl2').slider();

    var RGBChange = function() {
      $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
    };  
        
/*scroll to top*/

$(document).ready(function(){
    $(function () {
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            scrollDistance: 300, // Distance from top/bottom before showing element (px)
            scrollFrom: 'top', // 'top' or 'bottom'
            scrollSpeed: 300, // Speed back to top (ms)
            easingType: 'linear', // Scroll to top easing (see http://easings.net/)
            animation: 'fade', // Fade, slide, none
            animationSpeed: 200, // Animation in speed (ms)
            scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
                    //scrollTarget: false, // Set a custom target element for scrolling to the top
            scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
            scrollTitle: false, // Set a custom <a> title if required.
            scrollImg: false, // Set true to use image
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
            zIndex: 2147483647 // Z-Index for the overlay
        });
    });
    
    $("[data-status = 2]").removeAttr("disabled");

    $(".add-to-cart").click(function(){
        id = $(this).attr("data-id");
        $.post("/cart/addProduct/" + id , {}, function(data){
            $("#countProducts").html(data);
        });
        return false;
    });
});

// Удаление продукта из корзины

function deleteCartProduct(i) {
  var id = i.getAttribute('data-id');
  var item = i.parentNode.parentNode;
  var itemPrice = parseInt( item.getElementsByClassName('price')[0].innerText ); 

  $.post('cart/deleteProduct/' + id, {}, function(data){
    refreshItemCount(item);
    refreshTotalPrice(itemPrice);
    refreshTotalCount();    
  });
};

function refreshItemCount(item) {
  var countElem = item.getElementsByClassName('count')[0];
  var count = countElem.innerText;

  if (count > 1) {
      countElem.innerText = --count;
  } else {
      item.remove();
  }
}

function refreshTotalPrice(itemPrice) {
  var totalPriceElem = document.getElementById('total-price'); 
  var totalPrice = totalPriceElem.innerText;

  totalPriceElem.innerText = totalPrice - itemPrice;
}

function refreshTotalCount() {
  var totalCountElem = document.getElementById('countProducts');
  var totalCount = totalCountElem.innerText;
  var emptyElem = document.getElementById('emptyCart');
  var mainElem = document.getElementById('main');

  totalCountElem.innerText = --totalCount;
  
  if (totalCount == 0) {           
    emptyElem.hidden = false; 
    mainElem.innerHTML = emptyElem.outerHTML;
  }
}

function confirmOrder(i){
  var id = i.getAttribute('data-id');
  var order = i.parentNode;
  $.post('orders/edit/' + id, {}, function(data){
      order.remove();
  })
}