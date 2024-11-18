<?php

namespace App\Controllers;

use App\Models\AdminModel;
use CodeIgniter\Controller;

class AdminAuthController extends Controller
{
    // Method untuk menampilkan halaman login
    public function login()
    {
        return view('admin/login');
    }

    // Method untuk menangani proses autentikasi
    public function authenticate()
    {
        $session = session(); // Memulai sesi
        $model = new AdminModel(); // Membuat instance dari AdminModel

        // Mengambil input username dan password dari request
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $admin = $model->where('username', $username)->first(); // Mencari admin berdasarkan username

        if ($admin) { // Jika admin ditemukan
            if (password_verify($password, $admin['password'])) { // Verifikasi password
                $session->set(['admin_id' => $admin['id']]); // Set session admin_id
                return redirect()->to('/admin/dashboard'); // Redirect ke dashboard admin
            } else {
                $session->setFlashdata('error', 'Password salah'); // Set pesan error jika password salah
                return redirect()->to('/admin/login'); // Redirect kembali ke halaman login
            }
        } else {
            $session->setFlashdata('error', 'Admin tidak ditemukan'); // Set pesan error jika admin tidak ditemukan
            return redirect()->to('/admin/login'); // Redirect kembali ke halaman login
        }
    }

    // Method untuk menangani proses logout
    public function logout()
    {
        session()->destroy(); // Menghancurkan sesi
        return redirect()->to('/admin/login'); // Redirect ke halaman login
    }
}