<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use CodeIgniter\Controller;

use App\Models\ProductModel;

class AdminCategoryController extends Controller
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $data['categories'] = $this->categoryModel->findAll();
        return view('admin/categories/index', $data);
    }

    public function create()
    {
        return view('admin/categories/create');
    }

    public function store()
    {
        $this->categoryModel->insert([
            'name' => $this->request->getVar('name'),
        ]);
        return redirect()->to('/admin/categories');
    }

    public function edit($id)
    {
        $categoryModel = new CategoryModel();
        $data['category'] = $categoryModel->find($id);
        
        return view('admin/categories/edit', $data);
    }

    
    public function update($id)
    {
        $categoryModel = new CategoryModel();
        
        // Validasi input
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
        ];
        
        $categoryModel->update($id, $data);
        
        return redirect()->to('/admin/categories')->with('success', 'Kategori berhasil diupdate.');
    }

    public function delete($id)
    {
        $categoryModel = new CategoryModel();
        $categoryModel->delete($id);
        
        return redirect()->to('/admin/categories')->with('success', 'Kategori berhasil dihapus.');
    }

    Public function resetCategories()
    {
        $model = new CategoryModel();
        
        // Hapus semua data dari tabel categories
        $model->truncate(); // Ini juga mengatur ID ke 1

        // Atur ulang auto increment
        $db = \Config\Database::connect();
        $db->query("ALTER TABLE categories AUTO_INCREMENT = 1");
        
        return redirect()->to('/admin/categories')->with('success', 'Categories reset successfully');
    }

}
