<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Checkout - Nand Second</title>
<style>
body{margin:0;font-family:Poppins,sans-serif;background:#f8f8f8;color:#222;}
header{background:#fff;border-bottom:1px solid #e0e0e0;padding:15px 50px;display:flex;justify-content:space-between;align-items:center;position:sticky;top:0;box-shadow:0 2px 8px rgba(0,0,0,0.05);}
header h1{font-size:1.5rem;font-weight:600;color:#111;}
nav a{text-decoration:none;color:#222;margin:0 15px;font-weight:500;transition:color .3s ease;}
nav a:hover{color:#777;}
.checkout-container{max-width:900px;margin:60px auto;padding:20px 30px;background:#fff;border-radius:12px;box-shadow:0 3px 10px rgba(0,0,0,0.08);}
.checkout-title{font-size:1.5rem;font-weight:600;margin-bottom:25px;color:#111;}
.checkout-item{display:flex;align-items:center;margin-bottom:20px;border-bottom:1px solid #e0e0e0;padding-bottom:15px;}
.checkout-item img{width:100px;height:100px;object-fit:cover;border-radius:8px;margin-right:20px;}
.item-info{flex:1;}
.item-name{font-weight:600;font-size:1rem;margin-bottom:5px;}
.item-price{font-size:.95rem;color:#666;}
.total{text-align:right;font-size:1.2rem;font-weight:600;margin-top:25px;margin-bottom:25px;}
.btn{display:inline-block;background:#111;color:#fff;padding:12px 25px;border-radius:6px;text-decoration:none;font-size:1rem;font-weight:500;transition:background .3s ease,transform .3s ease;cursor:pointer;}
.btn:hover{background:#444;transform:scale(1.05);}
</style>
</head>
<body>

<header>
<h1>Nand Market</h1>
<nav><a href="{{route('produk')}}">Produk</a></nav>
</header>

<section class="checkout-container">
<h2 class="checkout-title">Checkout</h2>
<div id="checkout-items"></div>
<p class="total" id="total-price"></p>
<button class="btn" onclick="proceedForm()">Konfirmasi Pembelian</button>
</section>

<script>
const checkoutData = JSON.parse(localStorage.getItem('checkoutItem')) || JSON.parse(localStorage.getItem('cart')) || [];
const container = document.getElementById('checkout-items');
let total = 0;

checkoutData.forEach(item => {
  const div = document.createElement('div');
  div.className = 'checkout-item';
  div.innerHTML = `
    <img src="${item.image}" alt="${item.name}">
    <div class="item-info">
      <p class="item-name">${item.name}</p>
      <p class="item-price">Rp ${item.price.toLocaleString()}</p>
    </div>
  `;
  container.appendChild(div);
  total += item.price;
});

document.getElementById('total-price').innerText = 'Total: Rp ' + total.toLocaleString();

function proceedForm(){
  window.location.href = 'form.html'; // Halaman form
}
</script>

</body>
</html>
