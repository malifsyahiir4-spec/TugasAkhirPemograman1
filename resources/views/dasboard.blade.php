<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nand Second - Casual Football Culture</title>
<style>
body { margin:0; font-family:Poppins,sans-serif; background:#fff; color:#222; line-height:1.5; }
a { text-decoration:none; color:inherit; }

/* Header */
header {
  background:#fff;
  color:#111;
  padding:20px 50px;
  display:flex;
  justify-content:space-between;
  align-items:center;
  position:sticky;
  top:0;
  border-bottom:1px solid #e0e0e0;
  z-index:1000;
  box-shadow:0 2px 8px rgba(0,0,0,0.05);
}
header h1 { font-size:1.8rem; font-weight:700; letter-spacing:1px; }
nav { display:flex; align-items:center; gap:25px; flex-wrap:wrap; }
nav a { font-weight:500; transition:0.3s; }
nav a:hover { color:#555; }

/* Bagian kanan header */
.nav-right {
  display: flex;
  align-items: center;
  gap: 15px;
}

/* Search box */
.search-box {
  position: relative;
  display: flex;
  align-items: center;
}
.search-box input {
  padding:8px 35px 8px 12px;
  border:1px solid #ddd;
  border-radius:6px;
  font-size:0.9rem;
  transition:0.3s;
}
.search-box input:focus { outline:none; border-color:#aaa; }
.search-box img {
  position:absolute;
  right:10px;
  width:18px; height:18px;
  opacity:0.7;
  pointer-events:none;
}

/* Icon keranjang */
.icon-btn {
  background:transparent;
  border:none;
  cursor:pointer;
  display:flex;
  align-items:center;
}
.icon-btn img {
  width:26px;
  height:26px;
  transition:transform 0.3s ease;
}
.icon-btn:hover img { transform:scale(1.1); }

/* Hero Section dengan background slideshow */
.hero {
  position: relative;
  height: 80vh;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  color: #fff;
  overflow: hidden;
}
.hero-overlay {
  position:absolute;
  top:0; left:0; width:100%; height:100%;
  background: rgba(0,0,0,0.4);
  z-index:1;
}
.hero-content {
  position: relative;
  z-index: 2;
  max-width: 800px;
  padding:0 20px;
}
.hero h2 { font-size:3rem; margin-bottom:20px; text-shadow: 1px 1px 5px rgba(0,0,0,0.6);}
.hero p { font-size:1.2rem; text-shadow:1px 1px 5px rgba(0,0,0,0.6); }

/* Slideshow background */
.hero::before {
  content: "";
  position: absolute; top:0; left:0; width:100%; height:100%;
  background-size: cover; background-position:center;
  animation: slideShow 18s infinite;
  z-index:0;
}
@keyframes slideShow {
  0%   { background-image: url('images/lctb.jpeg'); }
  33%  { background-image: url('images/lcb.jpeg'); }
  66%  { background-image: url('images/true.jpeg'); }
  100% { background-image: url('images/lctb.jpeg'); }
}

/* Story Section */
.story { max-width:1000px; margin:80px auto; padding:0 20px; }
.story h2 { text-align:center; font-size:2.5rem; margin-bottom:50px; }
.timeline { display:flex; flex-wrap:wrap; gap:30px; justify-content:center; }
.timeline-item {
  flex:1 1 250px;
  background:#f9f9f9;
  padding:25px;
  border-radius:10px;
  text-align:center;
  border:1px solid #eee;
}
.timeline-item h3 { margin-bottom:10px; color:#111; font-weight:600; }
.timeline-item p { color:#555; font-size:0.95rem; }

/* Featured Products */
.featured { max-width:1200px; margin:80px auto; padding:0 20px; }
.featured h2 { text-align:center; font-size:2.5rem; margin-bottom:50px; }
.produk-container {
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
  gap:30px;
}
.produk-card {
  position:relative;
  overflow:hidden;
  border-radius:12px;
  cursor:pointer;
  background:#fff;
  border:1px solid #eee;
  transition: transform 0.3s, box-shadow 0.3s;
}
.produk-card img {
  width:100%; height:400px; object-fit:cover;
  transition:transform 0.3s ease;
}
.produk-card .overlay {
  position:absolute; bottom:0; left:0; width:100%;
  background:rgba(255,255,255,0.9); color:#111;
  padding:15px; text-align:center; font-weight:500;
  opacity:0; transform:translateY(100%); transition:0.3s;
}
.produk-card:hover img { transform:scale(1.03); }
.produk-card:hover .overlay { opacity:1; transform:translateY(0);}
.produk-card:hover { transform:translateY(-5px); box-shadow:0 10px 20px rgba(0,0,0,0.2); }

/* Label pemanis produk */
.produk-card .label {
  position:absolute;
  top:10px; left:10px;
  background:#ff3b3b; color:#fff;
  padding:5px 12px; border-radius:6px;
  font-size:0.8rem; font-weight:600;
  z-index:2; box-shadow:0 2px 6px rgba(0,0,0,0.3);
}

/* Profile Section */
.profile { background:#fff; padding:80px 20px; text-align:center; }
.profile h2 { font-size:2.5rem; margin-bottom:20px; }
.profile p { max-width:800px; margin:0 auto; color:#555; font-size:1rem; line-height:1.8; }

/* Contact Section */
.contact { background:#f9f9f9; padding:80px 20px; text-align:center; }
.contact h2 { font-size:2.5rem; margin-bottom:30px; }
.contact p { font-size:1.1rem; margin:8px 0; }
.contact a { color:#111; font-weight:500; }
.contact a:hover { color:#555; }

/* Footer */
footer { background:#fff; color:#555; text-align:center; padding:30px 20px; border-top:1px solid #e0e0e0; }
footer a { color:#111; margin:0 10px; font-weight:500; }
footer a:hover { color:#555; }

/* Responsive */
@media(max-width:768px){
  header {
    flex-direction: column;
    align-items: flex-start;
    padding: 15px 20px;
  }
  nav {
    flex-wrap: wrap;
    justify-content: space-between;
    width: 100%;
  }
  .nav-right {
    width: 100%;
    justify-content: space-between;
  }
  .search-box { flex: 1; }
  .search-box input { width: 100%; }
  .hero h2 { font-size:2rem; }
  .hero p { font-size:1rem; }
  .produk-card img { height:300px; }
}
</style>
</head>
<body>

<header>
  <h1>Nand Second</h1>
  <nav>
    <a href="{{route('produk')}}">Produk</a>
    <a href="#story">Sejarah</a>
    <a href="{{route('profile')}}">Profil</a>
    <a href="{{route('kontak')}}">Kontak</a>

    <div class="nav-right">
      <div class="search-box">
        <input type="text" id="searchInput" placeholder="Cari produk...">
        <img src="images/download.jpg" alt="Cari">
      </div>
      <button class="icon-btn" onclick="window.location.href='{{route('keranjang')}}'">
        <img src="images/keranjang.jpg" alt="Keranjang">
      </button>
    </div>
  </nav>
</header>

<!-- Hero Section -->
<section class="hero">
  <div class="hero-overlay"></div>
  <div class="hero-content">
    <h2>From the Streets to the Pitch</h2>
    <p>Explore the culture of casual football through our exclusive collection.</p>
  </div>
</section>

<!-- Story Section -->
<section class="story" id="story">
  <h2>The History of Casual Football</h2>
  <div class="timeline">
    <div class="timeline-item">
      <h3>1960s–70s</h3>
      <p>Origin of casual football in the UK: street style meets football passion.</p>
    </div>
    <div class="timeline-item">
      <h3>1980s</h3>
      <p>Streetwear & football culture merge, creating iconic looks.</p>
    </div>
    <div class="timeline-item">
      <h3>Modern Era</h3>
      <p>Global influence: casual football inspires fashion worldwide.</p>
    </div>
  </div>
</section>

<!-- Featured Products -->
<section class="featured" id="produk">
  <h2>Featured Products</h2>
  <div class="produk-container" id="produkContainer"></div>
</section>

<!-- Profile Section -->
<section class="profile" id="profile">
  <h2>Tentang Nand Second</h2>
  <p>
    Nand Second lahir dari kecintaan terhadap budaya sepak bola jalanan dan gaya kasual.
    Kami percaya bahwa sepak bola bukan hanya tentang pertandingan, tetapi juga tentang identitas, ekspresi diri, dan kebersamaan.
    Setiap koleksi kami menghadirkan semangat itu dengan desain yang penuh karakter dan kualitas terbaik.
  </p>
</section>

<!-- Contact Section -->
<section class="contact" id="contact">
  <h2>Hubungi Kami</h2>
  <p>Email: <a href="mailto:nandsecond@gmail.com">nandsecond@gmail.com</a></p>
  <p>Instagram: <a href="https://instagram.com/nandsecond" target="_blank">@nandsecond</a></p>
  <p>WhatsApp: <a href="https://wa.me/628123456789" target="_blank">+62 812-3456-789</a></p>

  <form action="https://formspree.io/f/xpwogbqk" method="POST" style="max-width:500px; margin:30px auto; display:flex; flex-direction:column; gap:15px;">
    <input type="text" name="name" placeholder="Nama Anda" required style="padding:10px; border-radius:6px; border:1px solid #ccc;">
    <input type="email" name="email" placeholder="Email Anda" required style="padding:10px; border-radius:6px; border:1px solid #ccc;">
    <textarea name="message" placeholder="Tulis pesan..." required style="padding:10px; border-radius:6px; border:1px solid #ccc; min-height:120px;"></textarea>
    <button type="submit" style="padding:12px; background:#111; color:#fff; border:none; border-radius:6px; font-weight:600; cursor:pointer;">Kirim Pesan</button>
  </form>
</section>

<!-- Footer -->
<footer>
  <p>© 2025 Nand Second. All rights reserved.</p>
</footer>

<script>
// Produk list dengan label pemanis
const produkList = [
  {id:1, nama:"MP x LC TRUE BLOOD", hargaStr:"Rp 180.000", image:"images/tb1.jpeg", label:"New"},
  {id:2, nama:"Lads Club Moscow", hargaStr:"Rp 260.000", image:"images/lc1.jpeg", label:"Best Seller"},
  {id:3, nama:"FNF x PH", hargaStr:"Rp 330.000", image:"images/bh1.jpeg", label:"Hot"},
  {id:4, nama:"James Boogie", hargaStr:"Rp 450.000", image:"images/jb1.jpeg", label:"New"}
];

const container = document.getElementById('produkContainer');
produkList.forEach(p => {
  const card = document.createElement('div');
  card.className = 'produk-card';
  card.innerHTML = `
    <div class="label">${p.label}</div>
    <a href="detail-produk.html?id=${p.id}">
      <img src="${p.image}" alt="${p.nama}">
      <div class="overlay">
        <p style="font-weight:600;">${p.nama}</p>
        <p>${p.hargaStr}</p>
      </div>
    </a>
  `;
  container.appendChild(card);
});

// Search functionality
const searchInput = document.getElementById('searchInput');
searchInput.addEventListener('keypress', function (e) => {
  if (e.key === 'Enter') {
    e.preventDefault();
    const keyword = searchInput.value.trim();
    if (keyword) {
      window.location.href = `produk.html?search=${encodeURIComponent(keyword)}`;
    }
  }
});
</script>

</body>
</html>
