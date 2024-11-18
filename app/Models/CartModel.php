<?php 
namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'carts'; 
    protected $allowedFields = ['customer_id', 'product_id', 'quantity'];

    public function getCartItems($customerId)
    {
        // Join products table to get product details (e.g., name, price) in the cart view
        return $this->select('carts.*, products.name as product_name, products.price')
                    ->join('products', 'products.id = carts.product_id')
                    ->where('customer_id', $customerId)
                    ->findAll();
    }
}
