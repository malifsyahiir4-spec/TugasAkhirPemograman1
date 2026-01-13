<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Produk - Nand Second</title>
<style>
  body { margin:0; font-family:Poppins,sans-serif; background:#f8f8f8; color:#222; }
  header { background:#fff; border-bottom:1px solid #e0e0e0; padding:15px 50px; display:flex; justify-content:space-between; align-items:center; position:sticky; top:0; box-shadow:0 2px 8px rgba(0,0,0,0.05); z-index:10; }
  header h1 { font-size:1.5rem; font-weight:600; color:#111; letter-spacing:1px; }
  nav { display:flex; align-items:center; gap:25px; }
  nav a { text-decoration:none; color:#222; font-weight:500; transition:color 0.3s ease; }
  nav a:hover { color:#777; }

  /* ikon navbar tanpa efek hitam */
  .icon-btn {
    background:transparent;
    border:none;
    cursor:pointer;
  }
  .icon-btn img {
    width:24px;
    height:24px;
    object-fit:contain;
    transition:transform 0.3s ease;
  }
  .icon-btn:hover img {
    transform:scale(1.1);
  }

  /* search box */
  .search-box { position:relative; }
  .search-box input {
    padding:8px 30px 8px 12px;
    border:1px solid #ddd;
    border-radius:6px;
    font-size:0.9rem;
    transition:0.3s;
  }
  .search-box input:focus {
    outline:none;
    border-color:#aaa;
  }
  .search-box img {
    position:absolute;
    right:8px; top:7px;
    width:18px; height:18px;
    opacity:0.6;
  }

  /* produk */
  .produk-container { display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:40px; padding:60px 80px; transition:0.3s; }
  .produk-card { position:relative; overflow:hidden; border-radius:12px; cursor:pointer; background:#fff; border:1px solid #eee; transition:transform 0.3s; }
  .produk-card img { width:100%; height:350px; object-fit:cover; transition: transform 0.3s ease; }
  .produk-card:hover img { transform:scale(1.03); }

  .overlay { position:absolute; bottom:0; left:0; width:100%; background:rgba(255,255,255,0.9); color:#111; padding:15px; text-align:center; font-weight:500; opacity:0; transform:translateY(100%); transition:0.3s; }
  .produk-card:hover .overlay { opacity:1; transform:translateY(0); }

  .overlay p { margin:5px 0; font-weight:600; }
  .overlay .btn { background:transparent; border:none; cursor:pointer; font-size:0.9rem; margin-top:5px; }
  .overlay .btn img { width:24px; height:24px; vertical-align:middle; }

  @media(max-width:768px){
    .produk-container { padding:40px 20px; }
    .produk-card img { height:250px; }
    header { padding:15px 20px; }
  }
</style>
</head>
<body>

<header>
  <h1>Nand Second</h1>
  <nav>
    <a href="{{route('dasboard')}}">Beranda</a>
    <a href="{{route('produk')}}">Produk</a>

    <!-- kotak pencarian -->
    <div class="search-box">
      <input type="text" id="searchInput" placeholder="Cari produk...">
      <img src="images/download.jpg" alt="Search">
    </div>

    <!-- ikon keranjang tanpa efek hitam -->
    <button class="icon-btn" onclick="window.location.href='keranjang.html'" title="Keranjang">
      <img src="images/keranjang.jpg" alt="Keranjang">
    </button>
  </nav>
</header>

<section class="produk-container" id="produkContainer"></section>

<script>
const produkList = [
  {id:1, nama:"MP x LC TRUE BLOOD", harga:180000, hargaStr:"Rp 180.000", image:"images/tb1.jpeg"},
  {id:2, nama:"Lads Club Moscow", harga:260000, hargaStr:"Rp 260.000", image:"images/lc1.jpeg"},
  {id:3, nama:"FNF x PH", harga:330000, hargaStr:"Rp 330.000", image:"images/bh1.jpeg"},
  {id:4, nama:"James Boogie", harga:450000, hargaStr:"Rp 450.000", image:"images/jb1.jpeg"}
];

const container = document.getElementById('produkContainer');
const searchInput = document.getElementById('searchInput');

function renderProduk(list){
  container.innerHTML = '';
  list.forEach(produk=>{
    const card = document.createElement('div');
    card.className = 'produk-card';
    card.innerHTML = `
      <a href="detail-produk.html?id=${produk.id}">
        <img src="${produk.image}" alt="${produk.nama}">
        <div class="overlay">
          <p>${produk.nama}</p>
          <p>${produk.hargaStr}</p>
          <button class="btn addCart" title="Tambah ke Keranjang">
            <img src="images/keranjang.jpg" alt="Keranjang">
          </button>
          <button class="btn buyNow">BUY NOW</button>
        </div>
      </a>
    `;
    container.appendChild(card);

    const addBtn = card.querySelector('.addCart');
    const buyBtn = card.querySelector('.buyNow');

    addBtn.onclick = (e)=>{
      e.preventDefault();
      let cart = JSON.parse(localStorage.getItem('cart')) || [];
      cart.push({ name: produk.nama, price: produk.harga, image: produk.image });
      localStorage.setItem('cart', JSON.stringify(cart));
      alert(produk.nama + " ditambahkan ke keranjang!");
    };

    buyBtn.onclick = (e)=>{
      e.preventDefault();
      localStorage.setItem('checkoutItem', JSON.stringify([{ name: produk.nama, price: produk.harga, image: produk.image }]));
      window.location.href = 'checkout.html';
    };
  });
}

renderProduk(produkList);

searchInput.addEventListener('input', ()=>{
  const keyword = searchInput.value.toLowerCase();
  const filtered = produkList.filter(p => p.nama.toLowerCase().includes(keyword));
  renderProduk(filtered);
});
</script>

</body>
</html>
