<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class ProductController extends BaseController
{
    public function index()
    {
        // Buat instance model
        $productModel = new ProductModel();
        $categoryModel = new CategoryModel();

        // Ambil semua kategori
        $categories = $categoryModel->findAll();

        // Ambil filter kategori dari request
        $selectedCategory = $this->request->getGet('category');

        // Ambil semua produk
        if ($selectedCategory) {
            // Jika ada filter kategori, ambil produk berdasarkan nama kategori
            $products = $productModel->where('categories', $selectedCategory)->findAll();
        } else {
            // Jika tidak ada filter, ambil semua produk
            $products = $productModel->findAll();
        }

        // Siapkan data untuk view
        $data = [
            'products' => $products,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
        ];

        // Tampilkan view
        return view('products/index', $data);
    }

    public function detail($id)
    {
        $productModel = new ProductModel();
        $data['products'] = $productModel->find($id);

        return view('products/detail/index', $data);
    }
}

