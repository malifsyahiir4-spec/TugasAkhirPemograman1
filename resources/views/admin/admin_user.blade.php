<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin - Users</title>
<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  display: flex;
  background: #f4f6f9;
}

/* Sidebar */
.sidebar {
  width: 260px;
  background: linear-gradient(180deg, #1f2937 0%, #111827 100%);
  color: white;
  height: 100vh;
  position: fixed;
  box-shadow: 2px 0 10px rgba(0,0,0,0.1);
}

.sidebar-header {
  padding: 1.5rem;
  border-bottom: 1px solid #374151;
  text-align: center;
}

.sidebar-header h2 {
  font-size: 1.3rem;
  margin-bottom: 0.5rem;
}

.sidebar-header p {
  font-size: 0.8rem;
  color: #9ca3af;
}

.sidebar ul {
  list-style: none;
  padding: 1rem 0;
}

.sidebar ul li {
  padding: 0.9rem 1.5rem;
  cursor: pointer;
  border-left: 3px solid transparent;
  transition: all 0.3s;
  display: flex;
  align-items: center;
}

.sidebar ul li:hover {
  background: #374151;
  border-left-color: #3b82f6;
}

.sidebar ul li.active {
  background: #374151;
  border-left-color: #3b82f6;
}

.sidebar ul li::before {
  content: "▸";
  margin-right: 0.8rem;
  color: #6b7280;
}

/* Content */
.content {
  margin-left: 260px;
  padding: 2rem;
  width: calc(100% - 260px);
  min-height: 100vh;
}

.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 2rem;
}

.header h1 {
  font-size: 2rem;
  color: #1f2937;
}

.header p {
  color: #6b7280;
  margin-top: 0.5rem;
}

/* Stats Cards */
.stats-row {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 1rem;
  margin-bottom: 2rem;
}

.stat-card {
  background: white;
  padding: 1.2rem;
  border-radius: 10px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.08);
  display: flex;
  align-items: center;
  gap: 1rem;
  transition: all 0.3s;
}

.stat-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 6px 15px rgba(0,0,0,0.12);
}

.stat-icon {
  width: 50px;
  height: 50px;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.5rem;
}

.stat-icon.blue { background: #dbeafe; }
.stat-icon.green { background: #d1fae5; }
.stat-icon.orange { background: #fef3c7; }

.stat-info h3 {
  color: #6b7280;
  font-size: 0.85rem;
  font-weight: 500;
}

.stat-info p {
  font-size: 1.5rem;
  font-weight: bold;
  color: #1f2937;
  margin-top: 0.3rem;
}

/* Filter Section */
.filter-section {
  background: white;
  padding: 1.5rem;
  border-radius: 12px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.08);
  margin-bottom: 1.5rem;
}

.filter-row {
  display: flex;
  gap: 1rem;
  align-items: center;
  flex-wrap: wrap;
}

.search-box {
  flex: 1;
  min-width: 300px;
  position: relative;
}

.search-box input {
  width: 100%;
  padding: 0.8rem 1rem 0.8rem 2.8rem;
  border: 1px solid #e5e7eb;
  border-radius: 8px;
  font-size: 0.95rem;
  transition: all 0.3s;
}

.search-box input:focus {
  outline: none;
  border-color: #3b82f6;
  box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.search-box::before {
  content: "🔍";
  position: absolute;
  left: 1rem;
  top: 50%;
  transform: translateY(-50%);
}

.filter-select {
  padding: 0.8rem 1rem;
  border: 1px solid #e5e7eb;
  border-radius: 8px;
  font-size: 0.95rem;
  cursor: pointer;
  background: white;
}

.filter-select:focus {
  outline: none;
  border-color: #3b82f6;
}

/* Buttons */
.btn {
  padding: 0.8rem 1.5rem;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  font-size: 0.95rem;
  transition: all 0.3s;
  font-weight: 500;
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
}

.btn-primary {
  background: #3b82f6;
  color: white;
}

.btn-primary:hover {
  background: #2563eb;
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
}

.btn-success {
  background: #10b981;
  color: white;
}

.btn-success:hover {
  background: #059669;
}

.btn-edit {
  background: #3b82f6;
  color: white;
  padding: 0.5rem 1rem;
  font-size: 0.85rem;
}

.btn-edit:hover {
  background: #2563eb;
}

.btn-delete {
  background: #ef4444;
  color: white;
  padding: 0.5rem 1rem;
  font-size: 0.85rem;
}

.btn-delete:hover {
  background: #dc2626;
}

.btn-secondary {
  background: #f3f4f6;
  color: #1f2937;
}

.btn-secondary:hover {
  background: #e5e7eb;
}

/* Table */
.table-container {
  background: white;
  padding: 1.5rem;
  border-radius: 12px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.08);
  overflow-x: auto;
}

table {
  width: 100%;
  border-collapse: collapse;
}

thead {
  background: #f9fafb;
}

th {
  padding: 1rem;
  text-align: left;
  font-weight: 600;
  color: #6b7280;
  font-size: 0.85rem;
  text-transform: uppercase;
  border-bottom: 2px solid #e5e7eb;
}

td {
  padding: 1rem;
  border-bottom: 1px solid #f3f4f6;
  color: #1f2937;
}

tbody tr {
  transition: all 0.2s;
}

tbody tr:hover {
  background: #f9fafb;
}

.user-info {
  display: flex;
  align-items: center;
  gap: 0.8rem;
}

.user-avatar {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-weight: bold;
  font-size: 1rem;
}

.user-details h4 {
  font-size: 0.95rem;
  color: #1f2937;
  margin-bottom: 0.2rem;
}

.user-details p {
  font-size: 0.8rem;
  color: #6b7280;
}

.badge {
  padding: 0.4rem 0.8rem;
  border-radius: 20px;
  font-size: 0.8rem;
  font-weight: 500;
  display: inline-block;
}

.badge.admin {
  background: #fef3c7;
  color: #92400e;
}

.badge.user {
  background: #dbeafe;
  color: #1e40af;
}

.badge.active {
  background: #d1fae5;
  color: #065f46;
}

.badge.inactive {
  background: #fee2e2;
  color: #991b1b;
}

/* Modal */
.modal {
  display: none;
  position: fixed;
  z-index: 1000;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.5);
  animation: fadeIn 0.3s;
}

@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

.modal-content {
  background-color: white;
  margin: 5% auto;
  padding: 2rem;
  border-radius: 12px;
  width: 90%;
  max-width: 500px;
  box-shadow: 0 10px 40px rgba(0,0,0,0.2);
  animation: slideIn 0.3s;
}

@keyframes slideIn {
  from {
    transform: translateY(-50px);
    opacity: 0;
  }
  to {
    transform: translateY(0);
    opacity: 1;
  }
}

.modal-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 1.5rem;
}

.modal-header h2 {
  color: #1f2937;
  font-size: 1.5rem;
}

.close {
  font-size: 2rem;
  cursor: pointer;
  color: #6b7280;
  transition: all 0.3s;
}

.close:hover {
  color: #1f2937;
}

.form-group {
  margin-bottom: 1.2rem;
}

.form-group label {
  display: block;
  margin-bottom: 0.5rem;
  color: #374151;
  font-weight: 500;
}

.form-group input,
.form-group select {
  width: 100%;
  padding: 0.8rem;
  border: 1px solid #e5e7eb;
  border-radius: 8px;
  font-size: 0.95rem;
}

.form-group input:focus,
.form-group select:focus {
  outline: none;
  border-color: #3b82f6;
  box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.form-actions {
  display: flex;
  gap: 1rem;
  margin-top: 1.5rem;
}

.pagination {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 0.5rem;
  margin-top: 1.5rem;
}

.pagination button {
  padding: 0.5rem 1rem;
  border: 1px solid #e5e7eb;
  background: white;
  border-radius: 6px;
  cursor: pointer;
  transition: all 0.3s;
}

.pagination button:hover {
  background: #f3f4f6;
}

.pagination button.active {
  background: #3b82f6;
  color: white;
  border-color: #3b82f6;
}

@media (max-width: 768px) {
  .sidebar {
    width: 0;
    overflow: hidden;
  }

  .content {
    margin-left: 0;
    width: 100%;
  }

  .stats-row {
    grid-template-columns: 1fr;
  }

  .filter-row {
    flex-direction: column;
  }

  .search-box {
    width: 100%;
  }
}
</style>
</head>
<body>

<div class="sidebar">
  <div class="sidebar-header">
    <h2>⚡ Admin Panel</h2>
    <p>Nand Second</p>
  </div>
  <ul>
    <li onclick="location.href='{{route('admin.index')}}'">Dashboard</li>
    <li class="active" onclick="location.href='{{route('admin.users')}}'" >Users</li>
    <li onclick="location.href='{{route('admin.produk')}}'" >Produk</li>
    <li onclick="location.href='{{route('admin.pesanan')}}'" >Pesanan</li>
    <li onclick="location.href='{{route('admin.pesanan.detail', 1)}}'" >Detail Pesanan</li>
  </ul>
</div>

<div class="content">
  <div class="header">
    <div>
      <h1>👥 User Management</h1>
      <p>Kelola semua pengguna di sistem Anda</p>
    </div>
    <button class="btn btn-success" onclick="openModal('add')">➕ Tambah User Baru</button>
  </div>

  <!-- Stats Cards -->
  <div class="stats-row">
    <div class="stat-card">
      <div class="stat-icon blue">👥</div>
      <div class="stat-info">
        <h3>Total Users</h3>
        <p id="totalUsers">2</p>
      </div>
    </div>
    <div class="stat-card">
      <div class="stat-icon green">✅</div>
      <div class="stat-info">
        <h3>Active Users</h3>
        <p id="activeUsers">2</p>
      </div>
    </div>
    <div class="stat-card">
      <div class="stat-icon orange">👑</div>
      <div class="stat-info">
        <h3>Admin Users</h3>
        <p id="adminUsers">1</p>
      </div>
    </div>
  </div>

  <!-- Filter Section -->
  <div class="filter-section">
    <div class="filter-row">
      <div class="search-box">
        <input type="text" id="searchInput" placeholder="Cari nama, email, atau ID user..." onkeyup="searchTable()">
      </div>
      <select class="filter-select" id="roleFilter" onchange="filterByRole()">
        <option value="">Semua Role</option>
        <option value="Admin">Admin</option>
        <option value="User">User</option>
      </select>
      <select class="filter-select" id="statusFilter" onchange="filterByStatus()">
        <option value="">Semua Status</option>
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
      </select>
      <button class="btn btn-secondary" onclick="resetFilters()">🔄 Reset</button>
    </div>
  </div>

  <!-- Table -->
  <div class="table-container">
    <table id="usersTable">
      <thead>
        <tr>
          <th>User</th>
          <th>Email</th>
          <th>Role</th>
          <th>Status</th>
          <th>Registered</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody id="tableBody">
        <tr>
          <td>
            <div class="user-info">
              <div class="user-avatar">F</div>
              <div class="user-details">
                <h4>Ferdinand</h4>
                <p>ID: #USR-001</p>
              </div>
            </div>
          </td>
          <td>ferdinand@example.com</td>
          <td><span class="badge admin">Admin</span></td>
          <td><span class="badge active">Active</span></td>
          <td>20 Jan 2026</td>
          <td>
            <button class="btn btn-edit" onclick="openModal('edit', 1)">✏️ Edit</button>
            <button class="btn btn-delete" onclick="deleteUser(1)">🗑️ Hapus</button>
          </td>
        </tr>
        <tr>
          <td>
            <div class="user-info">
              <div class="user-avatar" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">B</div>
              <div class="user-details">
                <h4>Budi Santoso</h4>
                <p>ID: #USR-002</p>
              </div>
            </div>
          </td>
          <td>budi@example.com</td>
          <td><span class="badge user">User</span></td>
          <td><span class="badge active">Active</span></td>
          <td>22 Jan 2026</td>
          <td>
            <button class="btn btn-edit" onclick="openModal('edit', 2)">✏️ Edit</button>
            <button class="btn btn-delete" onclick="deleteUser(2)">🗑️ Hapus</button>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- Pagination -->
    <div class="pagination">
      <button>← Previous</button>
      <button class="active">1</button>
      <button>2</button>
      <button>3</button>
      <button>Next →</button>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="userModal" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <h2 id="modalTitle">➕ Tambah User Baru</h2>
      <span class="close" onclick="closeModal()">&times;</span>
    </div>
    <form id="userForm">
      <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" id="userName" placeholder="Masukkan nama lengkap" required>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" id="userEmail" placeholder="Masukkan email" required>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" id="userPassword" placeholder="Masukkan password" required>
      </div>
      <div class="form-group">
        <label>Role</label>
        <select id="userRole" required>
          <option value="">Pilih Role</option>
          <option value="Admin">Admin</option>
          <option value="User">User</option>
        </select>
      </div>
      <div class="form-group">
        <label>Status</label>
        <select id="userStatus" required>
          <option value="Active">Active</option>
          <option value="Inactive">Inactive</option>
        </select>
      </div>
      <div class="form-actions">
        <button type="submit" class="btn btn-primary">💾 Simpan</button>
        <button type="button" class="btn btn-secondary" onclick="closeModal()">❌ Batal</button>
      </div>
    </form>
  </div>
</div>

<script>
// Modal Functions
function openModal(mode, userId) {
  const modal = document.getElementById('userModal');
  const modalTitle = document.getElementById('modalTitle');

  if (mode === 'add') {
    modalTitle.textContent = '➕ Tambah User Baru';
    document.getElementById('userForm').reset();
  } else {
    modalTitle.textContent = '✏️ Edit User';
    // Load user data untuk edit (dummy data)
    document.getElementById('userName').value = 'Ferdinand';
    document.getElementById('userEmail').value = 'ferdinand@example.com';
    document.getElementById('userRole').value = 'Admin';
    document.getElementById('userStatus').value = 'Active';
  }

  modal.style.display = 'block';
}

function closeModal() {
  document.getElementById('userModal').style.display = 'none';
}

// Close modal when clicking outside
window.onclick = function(event) {
  const modal = document.getElementById('userModal');
  if (event.target == modal) {
    closeModal();
  }
}

// Form Submit
document.getElementById('userForm').onsubmit = function(e) {
  e.preventDefault();
  const name = document.getElementById('userName').value;
  const email = document.getElementById('userEmail').value;
  const role = document.getElementById('userRole').value;

  alert(`User ${name} berhasil disimpan!`);
  closeModal();
  // Di sini nanti bisa kirim data ke backend
}

// Search Function
function searchTable() {
  const input = document.getElementById('searchInput').value.toLowerCase();
  const rows = document.getElementById('tableBody').getElementsByTagName('tr');

  for (let row of rows) {
    const text = row.textContent.toLowerCase();
    row.style.display = text.includes(input) ? '' : 'none';
  }
}

// Filter by Role
function filterByRole() {
  const roleFilter = document.getElementById('roleFilter').value;
  const rows = document.getElementById('tableBody').getElementsByTagName('tr');

  for (let row of rows) {
    if (roleFilter === '') {
      row.style.display = '';
    } else {
      const roleCell = row.cells[2].textContent;
      row.style.display = roleCell.includes(roleFilter) ? '' : 'none';
    }
  }
}

// Filter by Status
function filterByStatus() {
  const statusFilter = document.getElementById('statusFilter').value;
  const rows = document.getElementById('tableBody').getElementsByTagName('tr');

  for (let row of rows) {
    if (statusFilter === '') {
      row.style.display = '';
    } else {
      const statusCell = row.cells[3].textContent;
      row.style.display = statusCell.includes(statusFilter) ? '' : 'none';
    }
  }
}

// Reset Filters
function resetFilters() {
  document.getElementById('searchInput').value = '';
  document.getElementById('roleFilter').value = '';
  document.getElementById('statusFilter').value = '';

  const rows = document.getElementById('tableBody').getElementsByTagName('tr');
  for (let row of rows) {
    row.style.display = '';
  }
}

// Delete User
function deleteUser(userId) {
  if (confirm('Apakah Anda yakin ingin menghapus user ini?')) {
    alert(`User ID ${userId} berhasil dihapus!`);
    // Di sini nanti bisa kirim request ke backend
  }
}
</script>

</body>
</html>
