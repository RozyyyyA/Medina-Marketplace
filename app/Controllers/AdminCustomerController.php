<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Controller;

class AdminCustomerController extends Controller
{
    public function index()
    {
        $customerModel = new CustomerModel();
        $data['customers'] = $customerModel->findAll(); // Ensure the 'name' field is in the result
        return view('admin/customers/index', $data);
    }

    public function delete($id)
    {
        $customerModel = new CustomerModel();
        $customerModel->delete($id);
        return redirect()->to('/admin/customers');
    }
}
