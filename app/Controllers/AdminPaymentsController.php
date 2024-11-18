<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PaymentModel;
use App\Models\OrderModel;

class AdminPaymentsController extends Controller
{
    public function index()
    {
        $paymentModel = new PaymentModel();
        $orderModel = new OrderModel();

        // Ambil semua pembayaran
        $data['payments'] = $paymentModel->findAll();

        // Dapatkan status pesanan untuk setiap pembayaran
        foreach ($data['payments'] as &$payment) {
            $order = $orderModel->find($payment['order_id']);
            $payment['order_status'] = $order ? $order['status_payment'] : 'Unknown';
        }

        return view('admin/payment/index', $data);
    }
}
