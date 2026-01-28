<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat admin user
        User::firstOrCreate(
            ['email' => 'admin@nandsecond.com'],
            [
                'name' => 'Admin Nand Second',
                'password' => \Illuminate\Support\Facades\Hash::make('admin123456'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // Buat test user biasa
        User::firstOrCreate(
            ['email' => 'user@test.com'],
            [
                'name' => 'John Doe',
                'password' => \Illuminate\Support\Facades\Hash::make('user123456'),
                'role' => 'user',
                'email_verified_at' => now(),
            ]
        );

        // Buat produk sample
        $products = Product::factory(5)->create();

        // Buat user customer
        $user = User::create([
            'name' => 'Test Customer',
            'email' => 'customer@test.com',
            'password' => \Illuminate\Support\Facades\Hash::make('user123456'),
            'role' => 'user',
            'email_verified_at' => now(),
        ]);

        // Buat pesanan sample
        $order = Order::create([
            'user_id' => $user->id,
            'order_number' => 'ORD-' . date('Ymd') . '-001',
            'total_harga' => 500000,
            'status' => 'processing',
            'catatan' => 'Pesanan sample untuk testing',
        ]);

        // Tambahkan detail pesanan
        foreach ($products->take(2) as $product) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => 2,
                'harga_satuan' => 250000,
                'subtotal' => 500000,
            ]);
        }
    }
}
