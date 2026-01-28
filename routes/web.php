<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AdminController;

// Route::get('/', function () {
//     return view('welcome');
// });

//welcome/Home
Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');

//Beranda
Route::get('/beranda', [BerandaController::class, 'beranda'])->name('beranda');

//Produk
Route::get('/produk', [ProdukController::class, 'produk'])->name('produk');
Route::get('/detail_produk', [ProdukController::class, 'detail_produk'])->name('detail_produk');

//Keranjang
Route::get('/keranjang', [KeranjangController::class, 'keranjang'])->name('keranjang');

//Checkout
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');

//Auth (Login, Register, Logout, Profil)
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'loginSubmit'])->name('auth.login.submit');
Route::post('/register', [AuthController::class, 'registerSubmit'])->name('auth.register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Profil - Protected by auth
Route::middleware('auth')->group(function () {
    Route::get('/profil', [AuthController::class, 'profil'])->name('profil');
});

//Form & Kontak
Route::get('/form', [FormController::class, 'form'])->name('form');
Route::get('/kontak', [FormController::class, 'kontak'])->name('kontak');

//admin - Protected by auth + admin middleware
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/produk', [AdminController::class, 'produk'])->name('admin.produk');
    Route::get('/admin/pesanan', [AdminController::class, 'pesanan'])->name('admin.pesanan');
    Route::get('/admin/pesanan/{id}', [AdminController::class, 'detailPesanan'])->name('admin.pesanan.detail');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');

    // Admin CRUD Routes
    Route::post('/admin/produk', [AdminController::class, 'storeProduct'])->name('admin.produk.store');
    Route::put('/admin/produk/{id}', [AdminController::class, 'updateProduct'])->name('admin.produk.update');
    Route::delete('/admin/produk/{id}', [AdminController::class, 'deleteProduct'])->name('admin.produk.delete');
    Route::put('/admin/pesanan/{id}/status', [AdminController::class, 'updateOrderStatus'])->name('admin.pesanan.status');
});
