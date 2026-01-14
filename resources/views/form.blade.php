<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Checkout - Nand Second</title>
<style>
body { font-family:Poppins,sans-serif; background:#f8f8f8; margin:0; color:#222; }
header { background:#fff; border-bottom:1px solid #e0e0e0; padding:15px 50px; display:flex; justify-content:space-between; align-items:center; position:sticky; top:0; box-shadow:0 2px 8px rgba(0,0,0,0.05); }
header h1 { font-size:1.5rem; font-weight:600; color:#111; letter-spacing:1px; }
nav a { text-decoration:none; color:#222; margin:0 15px; font-weight:500; transition:color 0.3s ease; }
nav a:hover { color:#777; }

.container { max-width:1000px; margin:40px auto; background:#fff; padding:30px; border-radius:12px; box-shadow:0 3px 15px rgba(0,0,0,0.1); display:flex; flex-wrap:wrap; gap:40px; }
.form-section, .summary-section { flex:1 1 400px; }
.form-section h2, .summary-section h2 { margin-bottom:20px; }
input, select, textarea { width:100%; padding:10px; margin-bottom:15px; border-radius:6px; border:1px solid #ccc; font-size:1rem; }
textarea { resize: vertical; }
.btn { display:inline-block; background:#111; color:#fff; padding:12px 24px; border-radius:6px; text-decoration:none; font-size:0.9rem; font-weight:500; cursor:pointer; transition:0.3s; }
.btn:hover { background:#444; transform:scale(1.03); }
.item { display:flex; justify-content:space-between; margin-bottom:10px; }
.total { font-weight:bold; font-size:1.2rem; margin-top:15px; text-align:right; }
.back-link { display:block; margin-top:20px; text-decoration:none; color:#111; font-weight:500; }
.back-link:hover { color:#777; }
</style>
</head>
<body>

<header>
<h1>Nand Second</h1>
<nav>
<a href="{{route('dasboard')}}">Beranda</a>
<a href="{{route('produk')}}">Produk</a>
<a href="{{route('checkout')}}">Keranjang</a>
</nav>
</header>

<div class="container">
  <div class="form-section">
    <h2>Alamat Pengiriman</h2>
    <input type="text" id="nama" placeholder="Nama Lengkap" required>
    <input type="email" id="email" placeholder="Email" required>
    <input type="tel" id="telp" placeholder="Nomor Telepon" required>
    <textarea id="alamat" placeholder="Alamat Lengkap" rows="4" required></textarea>
    <input type="text" id="kota" placeholder="Kota / Kabupaten" required>
    <input type="text" id="kodepos" placeholder="Kode Pos" required>
  </div>
  <div class="summary-section">
    <h2>Ringkasan Pesanan</h2>
    <div id="itemsContainer"></div>
    <div class="total" id="totalHarga"></div>
    <button class="btn" id="bayarBtn">Bayar Sekarang</button>
    <a href="{{route('produk')}}" class="back-link">← Kembali ke Produk</a>
  </div>
</div>

<script>
// Ambil item checkout dari localStorage
let checkoutItem = JSON.parse(localStorage.getItem('checkoutItem')) || [];
if(checkoutItem.length === 0){
  checkoutItem = JSON.parse(localStorage.getItem('cart')) || [];
}
const itemsContainer = document.getElementById('itemsContainer');
let total = 0;

checkoutItem.forEach(item => {
  const subtotal = item.price * (item.qty || 1);
  total += subtotal;
  const div = document.createElement('div');
  div.className = 'item';
  div.innerHTML = `<span>${item.name} x${item.qty || 1}</span><span>Rp ${subtotal.toLocaleString()}</span>`;
  itemsContainer.appendChild(div);
});

document.getElementById('totalHarga').textContent = "Total: Rp " + total.toLocaleString();

// Simulasi tombol bayar
document.getElementById('bayarBtn').onclick = () => {
  const nama = document.getElementById('nama').value.trim();
  const email = document.getElementById('email').value.trim();
  const telp = document.getElementById('telp').value.trim();
  const alamat = document.getElementById('alamat').value.trim();
  const kota = document.getElementById('kota').value.trim();
  const kodepos = document.getElementById('kodepos').value.trim();

  if(!nama || !email || !telp || !alamat || !kota || !kodepos){
    alert("Mohon lengkapi semua data alamat pengiriman!");
    return;
  }

  // Simulasi sukses checkout
  alert(`Terima kasih ${nama}! Pesanan Anda sebesar Rp ${total.toLocaleString()} berhasil.`);
  localStorage.removeItem('checkoutItem');
  localStorage.removeItem('cart');
  window.location.href = 'produk';
};
</script>

</body>
</html>
