<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function produk(){
        return view('produk');
    }
    public function detailproduk(){
        return view('detail_produk');
    }
}
