setInterval (function cartPriceDisplay(){
let cartCost = localStorage.getItem('totalAmountNumber');
cartCost = parseInt(cartCost);
document.querySelector('.totalpricedelivery').textContent = cartCost;
},1/100);
cartPriceDisplay();
