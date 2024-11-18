<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CustomerModel;

class AuthController extends Controller
{
    public function register()
    {
        return view('customer/register'); // Tampilkan form registrasi
    }

    public function store()
    {
        $customerModel = new CustomerModel();
        
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'email' => $this->request->getPost('email'),
            'dob' => $this->request->getPost('dob'),
            'gender' => $this->request->getPost('gender'),
            'address' => $this->request->getPost('address'),
            'city' => $this->request->getPost('city'),
            'contact_no' => $this->request->getPost('contact_no'),
            'paypal_id' => $this->request->getPost('paypal_id'),
        ];

        // Simpan data ke database
        $customerModel->insert($data);
        
        // Redirect ke halaman login setelah register
        return redirect()->to('/customer/login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    public function login()
    {
        return view('customer/login');
    }

    public function authenticate()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $customerModel = new CustomerModel();
        $customer = $customerModel->where('username', $username)->first();

        if ($customer && password_verify($password, $customer['password'])) {
            session()->set('customer_id', $customer['id']);
            session()->set('customer_username', $customer['username']);
            return redirect()->to('/'); // Redirect ke beranda setelah login
        } else {
            return redirect()->back()->with('error', 'Username atau password salah.');
        }
    }

    public function logout()
    {
        session()->remove('customer_id');
        return redirect()->to('/');
    }
}
