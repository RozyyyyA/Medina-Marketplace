<?php
namespace App\Controllers;

class CustomerController extends BaseController
{
    public function dashboard()
    {
        // Cek apakah user sudah login
        if (!session()->get('customer_id')) {
            return redirect()->to('/customer/login'); // Jika belum login, arahkan ke halaman login
        }

        // Load data dashboard customer dari model atau logic lainnya
        $data = [
            'title' => 'Dashboard Customer'
        ];

        return view('customer/dashboard', $data); // Tampilkan view dashboard
    }

    public function profile()
    {
        // Periksa apakah user sudah login
        if (!session()->get('customer_id')) {
            return redirect()->to('/customer/login');
        }

        // Menyediakan data untuk view
        $data = [
            'username' => session()->get('customer_username'),
            'email' => session()->get('customer_email'),
            'dob' => session()->get('customer_dob'),
            'gender' => session()->get('customergender'),
            'address' => session()->get('customer_address'),
            'city' => session()->get('customer_city'),
            'contact_no' => session()->get('customer_contact_no'),
            'paypal_id' => session()->get('customer_paypal_id'),
        ];

        return view('customer/profile', $data);
    }
}
