<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CustomerModel;

class AdminController extends Controller
{
    public function index()
    {
        $customerModel = new CustomerModel();
        $data['customers'] = $customerModel->findAll();
        return view('admin/customers/index', $data);
    }

    public function delete($id)
    {
        $customerModel = new CustomerModel();
        $customerModel->delete($id);
        return redirect()->to('/admin/customers');
    }

    public function dashboard()
    {
        // Periksa apakah pengguna adalah admin
        if (!session()->get('admin_id')) {
            return redirect()->to('/admin/login'); // Redirect jika tidak login
        }

        return view('admin/dashboard'); // Tampilkan halaman dashboard admin
    }
}
