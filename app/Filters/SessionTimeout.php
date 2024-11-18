<?php 
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class SessionTimeout implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Cek apakah ada sesi aktif dan customer_id
        if (!$session->has('customer_id')) {
            // Jika tidak ada sesi, redirect ke login
            return redirect()->to('/login')->with('error', 'Session expired, please log in again.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu implementasi di sini
    }
}

?>

