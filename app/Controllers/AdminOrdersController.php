<?php

namespace App\Controllers;

use App\Models\OrderModel;

class AdminOrdersController extends BaseController
{
    public function index()
    {
        $orderModel = new OrderModel();
        $data['orders'] = $orderModel->getAllOrders();
        return view('admin/orders/index', $data);
    }

    public function updateStatus($id)
    {
        $orderModel = new OrderModel();
        $status = $this->request->getVar('status');

        // Log the data being sent
        log_message('info', 'Updating order status', ['order_id' => $id, 'status' => $status]);

        $orderModel->update($id, ['status_payment' => $status]);

        return redirect()->to('/admin/orders')->with('message', 'Status pembayaran berhasil diubah');
    }
}
