<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $allowedFields = ['customer_id', 'product_name', 'product_id', 'quantity', 'total_amount', 'status_payment', 'order_date'];

    public function getAllOrders()
    {
        $orders = $this->select('orders.*, products.name as product_name')
            ->join('products', 'products.id = orders.product_id', 'left')
            ->findAll();

        log_message('info', 'Orders Retrieved: ' . print_r($orders, true));

        return $orders;
    }
  
    public function getOrdersByCustomerId($customerId)
    {
        return $this->select('orders.*, products.name as product_name')
            ->join('products', 'products.id = orders.product_id', 'left')
            ->where('orders.customer_id', $customerId)
            ->findAll();
    }
}

