<?php

namespace App\Controllers;

use App\Models\ProductModel; // Load model produk untuk menampilkan produk terbaru

class Home extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $data['products'] = $productModel->findAll(); // Ambil semua produk untuk ditampilkan di halaman utama

        return view('home', $data);
    }
}
