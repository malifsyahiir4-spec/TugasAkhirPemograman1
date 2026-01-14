<?php
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CheckoutController;

// Route::get('/', function () {
//     return view('');
// });


Route::get('/login', [UserController::class, 'index'])->name('login');
Route::get('/dasboard', [DasboardController::class, 'index'])->name('dasboard');
Route::get('/index', [IndexController::class, 'index'])->name('index');
Route::get('/form',[FormController::class, 'index'])->name('form');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
Route::get('kontak', [KontakController::class, 'index'])->name('kontak');
Route::get('keranjang', [KeranjangController::class, 'index'])->name('keranjang');
Route::get('detail', [DetailController::class, 'detail'])->name('detail');
Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
