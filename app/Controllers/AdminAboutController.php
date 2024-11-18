<?php

namespace App\Controllers;

use App\Models\AboutModel;
use CodeIgniter\Controller;

class AdminAboutController extends Controller
{
    protected $aboutModel;

    public function __construct()
    {
        $this->aboutModel = new AboutModel();
    }

    // Menampilkan halaman Manage About Us Content
    public function index()
    {
        // Ambil data 'About' dari database
        $data['about'] = $this->aboutModel->first(); // Mengambil data pertama dari tabel about

        if (!$data['about']) {
            // Jika data tidak ada, tampilkan pesan atau kosongkan konten
            $data['about'] = [
                'content' => 'No content available. Please add content.',
                'id' => null // set null jika belum ada ID
            ];
        }

        // Tampilkan view dan kirimkan data ke halaman
        return view('admin/about/index', $data);
    }

    // Menampilkan form untuk mengedit konten 'About'
    public function edit()
    {
        // Ambil data yang ada di 'about'
        $data['about'] = $this->aboutModel->first();
        return view('admin/about/edit', $data);
    }

    // Proses update konten 'About'
    public function update()
    {
        $aboutId = $this->request->getPost('id'); // Mendapatkan ID dari form

        $data = [
            'content' => $this->request->getPost('content'),
        ];

        // Update konten 'About' di database
        if ($aboutId) {
            $this->aboutModel->update($aboutId, $data);
        } else {
            $this->aboutModel->insert($data);
        }

        // Redirect kembali ke halaman 'About' dengan pesan sukses
        return redirect()->to('/admin/about')->with('success', 'About content updated successfully.');
    }

    public function save()
    {
        // Validasi input
        if ($this->validate([
            'content' => 'required',
        ])) {
            // Ambil konten dari form
            $content = $this->request->getPost('content');

            // Periksa apakah sudah ada data di tabel about
            $about = $this->aboutModel->first();
            if ($about) {
                // Jika ada, update data
                $this->aboutModel->update($about['id'], [
                    'content' => $content
                ]);
            } else {
                // Jika tidak ada, insert data baru
                $this->aboutModel->save([
                    'content' => $content
                ]);
            }

            // Set flashdata untuk notifikasi
            session()->setFlashdata('success', 'Content updated successfully.');

            // Redirect ke halaman manage about us
            return redirect()->to('/admin/about');
        } else {
            // Jika validasi gagal, kembali ke halaman sebelumnya
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
    }
}
