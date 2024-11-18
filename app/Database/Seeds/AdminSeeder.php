<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'admin',
            'password' => password_hash('1111', PASSWORD_BCRYPT), // Ganti dengan password yang diinginkan
        ];

        // Masukkan data ke tabel admins
        $this->db->table('admins')->insert($data);
    }
}
