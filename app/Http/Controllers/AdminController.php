<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Dashboard
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'total_products' => Product::count(),
            'total_orders' => Order::count(),
            'total_revenue' => Order::sum('total_harga') ?? 0,
        ];

        $recent_orders = Order::with('user')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.admin', compact('stats', 'recent_orders'));
    }

    // Produk
    public function produk()
    {
        $products = Product::paginate(15);
        return view('admin.admin_produk', compact('products'));
    }

    // Pesanan
    public function pesanan()
    {
        $orders = Order::with('user')
            ->latest()
            ->paginate(15);
        return view('admin.admin_pesanan', compact('orders'));
    }

    // Detail Pesanan
    public function detailPesanan($id)
    {
        $order = Order::with('user', 'details.product')->findOrFail($id);
        return view('admin.admin_detail_pesanan', compact('order'));
    }

    // Users
    public function users()
    {
        $users = User::withCount('orders')
            ->paginate(15);
        return view('admin.admin_user', compact('users'));
    }

    // API endpoint untuk CRUD (opsional)
    public function storeProduct(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'label' => 'nullable|string|max:50',
        ]);

        Product::create($validated);
        return back()->with('success', 'Produk berhasil ditambahkan');
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'label' => 'nullable|string|max:50',
        ]);

        $product->update($validated);
        return back()->with('success', 'Produk berhasil diupdate');
    }

    public function deleteProduct($id)
    {
        Product::findOrFail($id)->delete();
        return back()->with('success', 'Produk berhasil dihapus');
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled',
        ]);

        $order->update($validated);
        return back()->with('success', 'Status pesanan berhasil diupdate');
    }
}
