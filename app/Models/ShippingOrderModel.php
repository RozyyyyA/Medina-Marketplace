<?php

namespace App\Models;

use CodeIgniter\Model;

class ShippingOrderModel extends Model
{
    protected $table = 'shipping_orders';
    protected $primaryKey = 'id';
    protected $allowedFields = ['customer_id', 'product_id', 'shipping_status', 'created_at'];
    protected $returnType = 'array';
    protected $useTimestamps = true;
}
