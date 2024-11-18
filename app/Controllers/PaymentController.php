<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CartModel;
use App\Models\OrderModel;
use App\Models\PaymentModel;
use App\Models\ProductModel; // Tambahkan ini untuk mengambil data harga produk

class PaymentController extends Controller
{
    public function index()
    {
        $session = session();
        $customerId = $session->get('customer_id');

        // Instantiate required models
        $cartModel = new CartModel();
        $productModel = new ProductModel();
        $customerModel = new \App\Models\CustomerModel(); // Add this model

        // Get cart items with product details
        $cartItems = $cartModel->where('customer_id', $customerId)->findAll();
        foreach ($cartItems as &$item) {
            $product = $productModel->find($item['product_id']);
            $item['name'] = $product['name'];
            $item['price'] = $product['price'];
        }

        // Get customer details
        $customer = $customerModel->find($customerId);

        // Calculate total amount
        $totalAmount = 0;
        foreach ($cartItems as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }

        $data = [
            'cartItems' => $cartItems,
            'customer' => $customer,
            'totalAmount' => $totalAmount
        ];

        return view('payment/index', $data);
    }

    public function checkout()
    {
        $session = session();
        $customerId = $session->get('customer_id');

        // Instansiasi model
        $orderModel = new OrderModel();
        $paymentModel = new PaymentModel();
        $cartModel = new CartModel();
        $productModel = new ProductModel(); // Tambahkan ini untuk mengambil data harga produk

        // Ambil data dari keranjang berdasarkan customer_id
        $cartItems = $cartModel->where('customer_id', $customerId)->findAll();

        if (empty($cartItems)) {
            return redirect()->to('/cart')->with('error', 'Your cart is empty.');
        }

        // Hitung total amount dari keranjang
        $totalAmount = 0;
        foreach ($cartItems as $item) {
            // Ambil harga produk dari tabel products
            $product = $productModel->find($item['product_id']);
            if (!$product) {
                return redirect()->to('/cart')->with('error', 'Product not found.');
            }
            
            // Gunakan harga dari produk jika tersedia
            $price = $product['price'];
            $totalAmount += $price * $item['quantity'];
        }

        // Insert ke tabel orders
        foreach ($cartItems as $item) {
            $orderData = [
                'customer_id' => $customerId,
                'product_id' => $item['product_id'], // Ambil product_id dari keranjang
                'quantity' => $item['quantity'],
                'total_amount' => $totalAmount,
                'status_payment' => 'pending',
            ];

            $orderId = $orderModel->insert($orderData);

            // Insert ke tabel payment
            $paymentData = [
                'order_id' => $orderId,
                'payment_method' => $this->request->getVar('payment_method'),
                'amount' => $totalAmount,
                'status' => 'pending',
            ];

            $paymentModel->insert($paymentData);
        }

        // Bersihkan keranjang setelah pembayaran
        $cartModel->where('customer_id', $customerId)->delete();

        return redirect()->to('/payment/success');
    }

    public function success()
    {
        $data = [];

        // Get 4 random products for recommended products
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM products ORDER BY RAND() LIMIT 4");
        $data['recommended_products'] = $query->getResult();

        return view('payment/success', $data);
    }
}
