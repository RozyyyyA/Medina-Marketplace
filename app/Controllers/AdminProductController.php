<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use CodeIgniter\Controller;

class AdminProductController extends Controller
{
    public function index()
    {
        $productModel = new ProductModel();
        $categoryModel = new CategoryModel();
        
        // Mendapatkan semua produk
        $data['products'] = $productModel->findAll();
        
        // Mendapatkan semua kategori
        $data['categories'] = $categoryModel->findAll();

        // Mendapatkan kategori yang dipilih dari query string
        $selectedCategory = $this->request->getGet('category');

        // Jika ada kategori yang dipilih, filter produk berdasarkan kategori
        if (!empty($selectedCategory)) {
            $data['products'] = $productModel->where('categories', $selectedCategory)->findAll();
        }

        // Pass data ke view
        $data['selectedCategory'] = $selectedCategory;

        return view('admin/products/index', $data);
    }


    public function add()
    {
        // Mendapatkan semua kategori untuk dropdown
        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->findAll();
        
        return view('admin/products/add', $data);
    }

    public function store()
{
    $file = $this->request->getFile('photo');

    // Cek apakah file di-upload dan valid
    if ($file && $file->isValid()) {
        // Generate nama file acak
        $fileName = $file->getRandomName();

        // Pindahkan file ke folder 'uploads'
        $file->move('uploads', $fileName);

        // Simpan nama file ke database
        $data = [
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
            'categories' => $this->request->getPost('categories'),
            'photo'       => $fileName, // Simpan nama file foto
        ];

        // Masukkan data ke database
        $productModel = new ProductModel();
        $productModel->save($data);

        // Redirect kembali ke halaman manage products dengan pesan sukses
        return redirect()->to('/admin/products')->with('success', 'Product added successfully!');
    } else {
        return redirect()->back()->with('error', 'Failed to upload photo');
    }
}

    public function manage()
    {
        $productModel = new ProductModel();
        $data['products'] = $productModel->findAll();

        return view('admin/products/manage', $data);
    }

    public function edit($id)
    {
        $productModel = new ProductModel();
        $categoryModel = new CategoryModel();
        
        $data['product'] = $productModel->find($id);
        $data['categories'] = $categoryModel->findAll();

        return view('admin/products/edit', $data);
    }

    public function update($id)
    {
        $productModel = new ProductModel();
        $data = $this->request->getPost();

        // Log input
        log_message('debug', 'Input data for update: ' . json_encode($data));

        // Validasi input
        if (!$this->validate([
            'name' => 'required|min_length[3]',
            'description' => 'required|min_length[10]',
            'price' => 'required|decimal',
            'categories' => 'required',
            'photo' => 'is_image[photo]|max_size[photo,2048]',
        ])) {
            // Log kesalahan validasi
            log_message('error', 'Validation errors during update: ' . json_encode($this->validator->getErrors()));
            return redirect()->back()->withInput()->with('error', 'Validation failed');
        }

        // Cek apakah ada foto baru yang diupload
        if ($this->request->getFile('photo')->isValid()) {
            $photo = $this->request->getFile('photo');
            $photoName = time() . '_' . $photo->getRandomName();
            $photo->move('uploads/', $photoName);
            $data['photo'] = $photoName;
        } else {
            unset($data['photo']); // Jangan ubah foto jika tidak ada yang diupload
        }

        // Mempersiapkan data untuk diupdate
        $productData = [
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'categories' => $data['categories'],
        ];

        if (isset($data['photo'])) {
            $productData['photo'] = $data['photo'];
        }

        // Mengupdate data ke database
        if ($productModel->update($id, $productData)) {
            return redirect()->to('/admin/products')->with('success', 'Product updated successfully.');
        } else {
            log_message('error', 'Failed to update product: ' . json_encode($productModel->errors()));
            return redirect()->back()->withInput()->with('error', 'Failed to update product.');
        }
    }

    public function delete($id)
    {
        $productModel = new ProductModel();
        $productModel->delete($id);
        return redirect()->to('/admin/products')->with('success', 'Product deleted successfully.');
    }
}
