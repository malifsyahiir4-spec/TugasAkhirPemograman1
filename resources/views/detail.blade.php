<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detail Produk - Nand Second</title>
<style>
body { font-family:Poppins,sans-serif; background:#f8f8f8; margin:0; color:#222; }
.container { max-width:1000px; margin:40px auto; background:#fff; padding:30px; border-radius:12px; box-shadow:0 3px 15px rgba(0,0,0,0.1); display:flex; flex-wrap:wrap; gap:40px; }
.product-images { flex:1 1 400px; display:flex; flex-direction:column; gap:15px; }
.main-image { width:100%; border-radius:12px; object-fit:cover; }
.thumbnails { display:flex; gap:10px; }
.thumbnails img { width:100px; height:100px; object-fit:cover; border-radius:8px; cursor:pointer; border:2px solid transparent; transition: border 0.3s; }
.thumbnails img.active { border-color:#111; }
.product-info { flex:1 1 400px; display:flex; flex-direction:column; justify-content:start; }
.product-info h2 { font-size:2rem; margin-bottom:10px; }
.product-info .price { font-size:1.5rem; font-weight:bold; margin-bottom:20px; }
.product-info .description { color:#555; font-size:1rem; line-height:1.5; margin-bottom:20px; }
.product-info .options { margin-bottom:20px; display:flex; gap:10px; align-items:center; }
.product-info .icon-btn { background:transparent; border:none; cursor:pointer; font-size:1.5rem; margin-right:10px; }
.product-info .buy-btn { padding:12px 24px; background:#111; color:#fff; border-radius:6px; border:none; cursor:pointer; transition:0.3s; }
.product-info .buy-btn:hover { background:#444; }
.divider { height:1px; background:#eee; margin:20px 0; border:none; }
.back-link { margin-top:20px; text-decoration:none; color:#111; font-weight:500; }
.back-link:hover { color:#777; }
@media(max-width:768px){ .container{flex-direction:column;} .thumbnails img{width:80px;height:80px;} }
</style>
</head>
<body>

<div class="container">
  <div class="product-images">
    <img id="mainImage" class="main-image" src="" alt="Produk">
    <div class="thumbnails" id="thumbnails"></div>
  </div>
  <div class="product-info">
    <h2 id="produkNama"></h2>
    <div class="price" id="produkHarga"></div>
    <div class="description" id="produkDeskripsi"></div>

    <div class="options">
      <button class="icon-btn" id="addToBagBtn" title="Add to Cart">🛒</button>
      <button class="buy-btn" id="buyNowBtn">BUY NOW</button>
    </div>
    <hr class="divider">
    <a href="{{route('produk')}}" class="back-link">← Kembali ke Produk</a>
  </div>
</div>

<script>
const produkList = [
  {id:1, nama:"MP x LC True Blood", deskripsi:"Used Like New VVGC", harga:180000, hargaStr:"Rp 180.000", images:["images/tb1.jpeg","images/tb2.jpeg","images/tb3.jpeg"]},
  {id:2, nama:"Lads Club", deskripsi:"Used 1x VVGC", harga:260000, hargaStr:"Rp 260.000", images:["images/lc1.jpeg","images/lc2.jpeg","images/lc3.jpeg"]},
  {id:3, nama:"FNF x PH", deskripsi:"Used Conditions", harga:330000, hargaStr:"Rp 330.000", images:["images/bh1.jpeg","images/bh2.jpeg","images/bh3.jpeg"]},
  {id:4, nama:"James Boogie", deskripsi:"With Minus Drop Color", harga:450000, hargaStr:"Rp 450.000", images:["images/jb1.jpeg","images/jb3.jpeg"]}
];

const params = new URLSearchParams(window.location.search);
const id = parseInt(params.get('id'));
const produk = produkList.find(p => p.id === id);

if(produk){
  const mainImage = document.getElementById('mainImage');
  const thumbnailsDiv = document.getElementById('thumbnails');

  mainImage.src = produk.images[0];

  produk.images.forEach((imgSrc, idx)=>{
    const thumb = document.createElement('img');
    thumb.src = imgSrc;
    if(idx===0) thumb.classList.add('active');
    thumb.onclick = () => {
      mainImage.src = imgSrc;
      thumbnailsDiv.querySelectorAll('img').forEach(t => t.classList.remove('active'));
      thumb.classList.add('active');
    };
    thumbnailsDiv.appendChild(thumb);
  });

  document.getElementById('produkNama').textContent = produk.nama;
  document.getElementById('produkDeskripsi').textContent = produk.deskripsi;
  document.getElementById('produkHarga').textContent = produk.hargaStr;

  document.getElementById('addToBagBtn').onclick = () => {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.push({name: produk.nama, price: produk.harga, qty:1, image: produk.images[0]});
    localStorage.setItem('cart', JSON.stringify(cart));
    alert(produk.nama + " telah ditambahkan ke keranjang!");
  };

  document.getElementById('buyNowBtn').onclick = () => {
    localStorage.setItem('checkoutItem', JSON.stringify([{name: produk.nama, price: produk.harga, qty:1, image: produk.images[0]}]));
    window.location.href = 'checkout.html';
  };

}else{
  document.body.innerHTML = "<h2>Produk tidak ditemukan</h2><a href='produk.html'>← Kembali ke Produk</a>";
}
</script>

</body>
</html>
