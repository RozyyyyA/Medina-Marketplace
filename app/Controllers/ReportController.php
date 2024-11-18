<?php
namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\CustomerModel;
use Dompdf\Dompdf;

class ReportController extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form', 'session']);
    }

    public function generate()
    {
        // Pastikan user adalah pembeli yang sedang login
        if (!session()->has('customer_id')) {
            return redirect()->to('/customer/login')->with('error', 'Please login to access this page.');
        }

        $customerId = session()->get('customer_id');

        // Ambil data pelanggan
        $customerModel = new CustomerModel();
        $customer = $customerModel->find($customerId);

        // Ambil data pesanan pelanggan
        $orderModel = new OrderModel();
        $orders = $orderModel->getOrdersByCustomerId($customerId);

        // Loop untuk setiap order dan generate PDF
        foreach ($orders as $order) {
            // Hitung total harga untuk order ini
            $totalHarga = $order['quantity'] * $order['total_amount'];

            // Inisialisasi Dompdf
            $dompdf = new Dompdf();
            $html = view('report/pdf', [
                'customer' => $customer,
                'order' => $order,  // Send a single order
                'totalHarga' => $totalHarga
            ]);

            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();

            // Set nama file PDF berdasarkan order_id
            $dompdf->stream("Purchase_Report_Order_{$order['id']}.pdf", ["Attachment" => 1]);
        }
    }
}
