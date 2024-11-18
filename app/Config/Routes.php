<?php
$routes->get('/', 'Home::index');

// Routes untuk admin autentikasi dan dashboard
$routes->group('admin', function($routes) {
    $routes->get('login', 'AdminAuthController::login');
    $routes->post('login', 'AdminAuthController::authenticate');
    $routes->get('logout', 'AdminAuthController::logout');
    $routes->get('dashboard','AdminController::dashboard');
    $routes->get('dashboard', 'AdminDashboardController::index');
});

// Routes untuk mengelola pelanggan
$routes->group('admin/customers', function($routes) {
    $routes->get('', 'AdminCustomerController::index');
    $routes->get('delete/(:num)', 'AdminCustomerController::delete/$1');
});

// Routes untuk mengelola produk
$routes->group('admin/products', function($routes) {
    $routes->get('', 'AdminProductController::index');
    $routes->get('add', 'AdminProductController::add'); // Menambahkan produk
    $routes->post('store', 'AdminProductController::store'); // Menyimpan produk
    $routes->get('edit/(:num)', 'AdminProductController::edit/$1'); // Mengedit produk
    $routes->post('update/(:num)', 'AdminProductController::update/$1'); // Memperbarui produk
    $routes->get('delete/(:num)', 'AdminProductController::delete/$1'); // Menghapus produk
});

// Routes untuk mengelola kategori
$routes->group('admin/categories', function($routes) {
    $routes->get('', 'AdminCategoryController::index');
    $routes->get('create', 'AdminCategoryController::create');
    $routes->post('store', 'AdminCategoryController::store');
    $routes->get('edit/(:num)', 'AdminCategoryController::edit/$1');
    $routes->post('update/(:num)', 'AdminCategoryController::update/$1');
    $routes->post('delete/(:num)', 'AdminCategoryController::delete/$1'); 
    $routes->get('reset', 'AdminCategoryController::resetCategories');
});

// Routes untuk mengelola about
$routes->group('admin/about', function($routes) {
    $routes->get('', 'AdminAboutController::index');
    $routes->get('edit', 'AdminAboutController::edit');
    $routes->post('update', 'AdminAboutController::update');
    $routes->post('save', 'AdminAboutController::save');
});

// Routes untuk mengelola contact us
$routes->group('admin/contacts', function($routes) {
    $routes->get('', 'AdminContactsController::index'); 
    $routes->post('delete/(:segment)', 'AdminContactsController::delete/$1');
    $routes->post('update/(:segment)', 'AdminContactsController::update/$1');
});

// Routes untuk mengelola pesanan
$routes->get('/admin/orders', 'AdminOrdersController::index');
$routes->post('/admin/orders/update-status/(:num)', 'AdminOrdersController::updateStatus/$1');

// Routes untuk permintaan pembuatan dan pengiriman
$routes->group('admin', function($routes) {
    $routes->get('creation-requests', 'AdminDashboardController::manageCreationRequests');
    $routes->get('shipping-orders', 'AdminDashboardController::manageShippingOrders');
});

// Routes untuk admin pembayaran
$routes->get('admin/payment', 'AdminPaymentsController::index');


// Routes untuk customer autentikasi dan profile
$routes->group('customer', function($routes) {
    $routes->get('register', 'AuthController::register');
    $routes->post('register', 'AuthController::store');
    $routes->get('login', 'AuthController::login');
    $routes->post('login', 'AuthController::authenticate');
    $routes->get('logout', 'AuthController::logout');
    $routes->get('profile', 'CustomerController::profile');
});

// Routes untuk produk
$routes->get('/products', 'ProductController::index');
$routes->get('products/detail/(:num)', 'ProductController::detail/$1');

// Routes untuk keranjang belanja
$routes->group('cart', function($routes) {
    $routes->get('', 'CartController::index');
    $routes->get('add/(:num)', 'CartController::add/$1');
    $routes->get('remove/(:num)', 'CartController::remove/$1');
    $routes->get('checkout', 'CartController::checkout');
    $routes->post('update', 'CartController::update');
    $routes->post('delete', 'CartController::delete');
});

// Routes untuk pembayaran
$routes->group('payment', function($routes) {
    $routes->get('', 'PaymentController::index');
    $routes->get('index', 'PaymentController::index');
    $routes->post('checkout', 'PaymentController::checkout');
    $routes->get('success', 'PaymentController::success');
});

// Routes untuk halaman About
$routes->get('about', 'AboutController::index');

// Routes untuk halaman Contact
$routes->get('contact', 'ContactController::index');
$routes->post('contact/submit', 'ContactController::submit');

$routes->get('/report/pdf', 'ReportController::generate');

