<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CartModel;
use App\Models\ProductModel;

class CartController extends Controller
{
    public function index()
    {
        $session = session();
        $customerId = $session->get('customer_id');

        // Log customer ID
        log_message('info', 'Customer ID: ' . $customerId);

        // Ensure the user is logged in
        if (!$customerId) {
            return redirect()->to('/customer/login')->with('error', 'Please log in to view your cart.');
        }

        $cartModel = new CartModel();
        $data['cartItems'] = $cartModel->getCartItems($customerId);

        // Log cart items
        log_message('info', 'Cart Items: ' . print_r($data['cartItems'], true));

        return view('cart/index', $data);
    }

    public function productDetail($id)
    {
        $productModel = new ProductModel();
        $product = $productModel->find($id);

        // Log product ID and details
        log_message('info', 'Product ID: ' . $id);
        log_message('info', 'Product Details: ' . print_r($product, true));

        if (!$product) {
            return redirect()->to('/products')->with('error', 'Product not found.');
        }

        $data['product'] = $product;

        return view('cart/', $data);
    }

    public function add($productId)
    {
        $session = session();
        $customerId = $session->get('customer_id');

        // Log customer ID and product ID
        log_message('info', 'Customer ID: ' . $customerId . ', Product ID: ' . $productId);

        // Ensure the user is logged in
        if (!$customerId) {
            return redirect()->to('/customer/login')->with('error', 'Please log in to add items to your cart.');
        }

        $productModel = new ProductModel();
        $product = $productModel->find($productId);

        if (!$product) {
            return redirect()->to('/products')->with('error', 'Product not found.');
        }

        $cartModel = new CartModel();
        $quantity = $this->request->getVar('quantity') ?? 1;

        // Log quantity
        log_message('info', 'Quantity: ' . $quantity);

        // Check if the product already exists in the cart
        $existingItem = $cartModel->where('customer_id', $customerId)->where('product_id', $productId)->first();

        if ($existingItem) {
            // Update quantity if item already exists
            $newQuantity = $existingItem['quantity'] + $quantity;
            $cartModel->update($existingItem['id'], ['quantity' => $newQuantity]);
            log_message('info', 'Updated cart item quantity: ' . $newQuantity);
        } else {
            // Add new item to the cart
            $cartModel->insert([
                'customer_id' => $customerId,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
            log_message('info', 'Added new item to cart');
        }

        return redirect()->to('/cart')->with('success', 'Product added to cart.');
    }

    public function update()
    {
        $cartId = $this->request->getVar('cart_id');
        $quantity = $this->request->getVar('quantity');

        // Log cart ID and quantity
        log_message('info', 'Updating cart item. Cart ID: ' . $cartId . ', Quantity: ' . $quantity);

        // Validate the quantity
        if ($quantity < 1) {
            return redirect()->to('/cart')->with('error', 'Quantity must be at least 1.');
        }

        $cartModel = new CartModel();
        $cartModel->update($cartId, ['quantity' => $quantity]);

        return redirect()->to('/cart')->with('success', 'Cart updated successfully.');
    }

    public function delete()
    {
        $cartId = $this->request->getVar('cart_id');

        // Log cart ID being deleted
        log_message('info', 'Deleting cart item. Cart ID: ' . $cartId);

        $cartModel = new CartModel();
        $cartModel->delete($cartId);

        return redirect()->to('/cart')->with('success', 'Item removed from cart.');
    }

    public function checkoutFromDetail($productId)
    {
        $productModel = new ProductModel();
        $product = $productModel->find($productId);

        // Log product ID and details
        log_message('info', 'Checkout from product detail. Product ID: ' . $productId);
        log_message('info', 'Product Details: ' . print_r($product, true));

        if (!$product) {
            return redirect()->to('/products')->with('error', 'Product not found.');
        }

        $totalAmount = $product['price'];
        session()->setFlashdata('totalAmount', $totalAmount);

        // Log total amount
        log_message('info', 'Total Amount for checkout: ' . $totalAmount);

        return redirect()->to('/payment/index');
    }

    public function checkoutFromCart()
    {
        $cartModel = new CartModel();
        $session = session();
        $customerId = $session->get('customer_id');
        $cartItems = $cartModel->where('customer_id', $customerId)->findAll();

        // Log cart items for checkout
        log_message('info', 'Cart items for checkout: ' . print_r($cartItems, true));

        $totalAmount = 0;
        foreach ($cartItems as $item) {
            $totalAmount += $item['quantity'] * $item['price'];
        }

        // Log total amount for checkout
        log_message('info', 'Total Amount for cart checkout: ' . $totalAmount);

        session()->setFlashdata('totalAmount', $totalAmount);

        return redirect()->to('/payment/index');
    }
    
}
