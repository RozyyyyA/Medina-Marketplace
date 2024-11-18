<?php

namespace App\Controllers;

use App\Models\AboutModel;

class AboutController extends BaseController
{
    protected $aboutModel;
    
    // Konstruktor untuk menginisialisasi model AboutModel
    public function __construct()
    {
        $this->aboutModel = new AboutModel();
    }

    // Fungsi index untuk mengambil data 'about' dengan id 1 dan mengarahkannya ke tampilan 'about'
    public function index()
    {
        $data['about'] = $this->aboutModel->find(1); // Ambil konten About dengan id 1
        return view('about', $data); // Mengarah ke tampilan pelanggan
    }
}
