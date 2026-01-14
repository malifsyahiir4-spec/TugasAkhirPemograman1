<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Keranjang - Nand Second</title>
<style>
body {
  font-family: Poppins, sans-serif;
  background: #f8f8f8;
  margin: 0;
  color: #222;
}

/* Header */
header {
  background: #fff;
  border-bottom: 1px solid #e0e0e0;
  padding: 15px 50px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  position: sticky;
  top: 0;
  box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}
header h1 {
  font-size: 1.5rem;
  font-weight: 600;
  color: #111;
  letter-spacing: 1px;
}
nav {
  display: flex;
  align-items: center;
  gap: 20px;
}
nav a {
  text-decoration: none;
  color: #222;
  font-weight: 500;
  transition: color 0.3s ease;
}
nav a:hover {
  color: #777;
}

/* Search Box */
.search-box {
  display: flex;
  align-items: center;
  background: #fff;
  border: 1px solid #ddd;
  border-radius: 6px;
  padding: 5px 10px;
}
.search-box input {
  border: none;
  outline: none;
  background: transparent;
  padding: 5px;
  width: 180px;
  font-size: 0.9rem;
}
.search-box img {
  width: 18px;
  height: 18px;
  margin-right: 5px;
  opacity: 0.6;
}

/* Icon keranjang */
.icon-btn {
  background: transparent;
  border: none;
  cursor: pointer;
}
.icon-btn img {
  width: 25px;
  height: 25px;
  vertical-align: middle;
  transition: transform 0.3s ease;
}
.icon-btn:hover img {
  transform: scale(1.1);
}

/* Kontainer utama */
.container {
  max-width: 1000px;
  margin: 40px auto;
  background: #fff;
  padding: 30px;
  border-radius: 12px;
  box-shadow: 0 3px 15px rgba(0,0,0,0.1);
}
h2 {
  margin-bottom: 20px;
}
table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}
th, td {
  padding: 12px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
th {
  background: #f5f5f5;
}
.btn {
  display: inline-block;
  background: #111;
  color: #fff;
  padding: 10px 20px;
  border-radius: 6px;
  text-decoration: none;
  font-size: 0.9rem;
  font-weight: 500;
  cursor: pointer;
  transition: 0.3s;
}
.btn:hover {
  background: #444;
  transform: scale(1.03);
}
.total {
  font-weight: bold;
  font-size: 1.2rem;
  text-align: right;
  margin-bottom: 20px;
}
.empty {
  text-align: center;
  padding: 50px 0;
  font-size: 1.2rem;
  color: #555;
}
</style>
</head>
<body>

<header>
  <h1>Nand Second</h1>
  <nav>
    <a href="{{route('dasboard')}}">Beranda</a>
    <a href="{{route('produk')}}">Produk</a>
    <div class="search-box">
      <img src="images/download.jpg" alt="Cari">
      <input type="text" id="searchInput" placeholder="Cari produk...">
    </div>
    <button class="icon-btn" onclick="window.location.href='{{route('keranjang')}}'">
      <img src="images/keranjang.jpg" alt="Keranjang">
    </button>
  </nav>
</header>

<div class="container">
  <h2>Keranjang Belanja</h2>
  <div id="cartContainer"></div>
</div>

<script>
let cart = JSON.parse(localStorage.getItem('cart')) || [];
const cartContainer = document.getElementById('cartContainer');

function renderCart(filter = '') {
  if(cart.length === 0){
    cartContainer.innerHTML = '<div class="empty">Keranjang kosong</div>';
    return;
  }

  let filtered = cart.filter(i => i.name.toLowerCase().includes(filter.toLowerCase()));

  if(filtered.length === 0){
    cartContainer.innerHTML = '<div class="empty">Produk tidak ditemukan</div>';
    return;
  }

  let html = `<table>
    <thead>
      <tr>
        <th>Produk</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Subtotal</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>`;

  let total = 0;
  filtered.forEach((item, idx)=>{
    const subtotal = item.price * (item.qty || 1);
    total += subtotal;
    html += `<tr>
      <td>${item.name}</td>
      <td>Rp ${item.price.toLocaleString()}</td>
      <td><input type="number" min="1" value="${item.qty || 1}" data-idx="${idx}" class="qtyInput" style="width:50px;"></td>
      <td>Rp ${subtotal.toLocaleString()}</td>
      <td><button class="btn" onclick="removeItem(${idx})">Hapus</button></td>
    </tr>`;
  });

  html += `</tbody></table>
  <div class="total">Total: Rp ${total.toLocaleString()}</div>
  <button class="btn" onclick="goCheckout()">Checkout</button>`;

  cartContainer.innerHTML = html;

  document.querySelectorAll('.qtyInput').forEach(input => {
    input.addEventListener('change', e => {
      const idx = parseInt(e.target.dataset.idx);
      let val = parseInt(e.target.value);
      if(val < 1) val = 1;
      cart[idx].qty = val;
      localStorage.setItem('cart', JSON.stringify(cart));
      renderCart(filter);
    });
  });
}

function removeItem(idx){
  cart.splice(idx,1);
  localStorage.setItem('cart', JSON.stringify(cart));
  renderCart();
}

// Tombol Checkout
function goCheckout(){
  if(cart.length === 0){
    alert("Keranjang kosong!");
    return;
  }
  localStorage.setItem('checkoutData', JSON.stringify(cart));
  window.location.href = 'checkout';
}

// Pencarian
document.getElementById('searchInput').addEventListener('input', e => {
  renderCart(e.target.value);
});

// Load Data
const checkoutItem = JSON.parse(localStorage.getItem('checkoutItem')) || [];
if(checkoutItem.length > 0){
  cart.push(...checkoutItem.map(i => ({...i, qty:1})));
  localStorage.setItem('cart', JSON.stringify(cart));
  localStorage.removeItem('checkoutItem');
}
renderCart();
</script>

</body>
</html>
