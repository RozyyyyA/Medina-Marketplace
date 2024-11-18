<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Medina</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            height: 100vh; /* Full height */
        }
        .sidebar {
            min-width: 250px; /* Minimum width for sidebar */
            max-width: 250px; /* Maximum width for sidebar */
            background-color: #343a40; /* Dark background */
            color: white; /* White text */
            padding-top: 20px;
        }
        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: #f8f9fa; /* Light text color */
            display: block;
        }
        .sidebar a:hover {
            background-color: #495057; /* Darker gray on hover */
            color: white; /* Keep text white on hover */
        }
        .content {
            flex: 1; /* Take the remaining space */
            padding: 20px;
            overflow-y: auto; /* Allow scrolling if content exceeds viewport */
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar p-3">
    <h4>Medina Admin</h4>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="/admin/dashboard">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="/admin/customers">Pelanggan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/categories">Kategori</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/products">Produk</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/orders">Pesanan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/payment">Pembayaran</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/about">Tentang</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/contacts">Kontak</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/logout">Logout</a>
        </li>
    </ul>
</div>

<!-- Main Content -->
<div class="content">
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard Admin</h1>
        <p>Selamat datang di dashboard admin!</p>
        
        <!-- Sample Cards for Admin Dashboard -->
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Total Pelanggan</h5>
                        <p class="card-text"><?= isset($totalCustomers) ? $totalCustomers : 3 ?></p> <!-- Menggunakan isset untuk menghindari error -->
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-success">
                    <div class="card-body">
                        <h5 class="card-title">Total Produk</h5>
                        <p class="card-text"><?= isset($totalProducts) ? $totalProducts : 3 ?></p> <!-- Menggunakan isset untuk menghindari error -->
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-success">
                    <div class="card-body">
                        <h5 class="card-title">Total Kategori</h5>
                        <p class="card-text"><?= isset($totalCategories) ? $totalCategories : 6 ?></p> <!-- Menggunakan isset untuk menghindari error -->
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-warning">
                    <div class="card-body">
                        <h5 class="card-title">Pesanan Terkirim</h5>
                        <p class="card-text">0</p>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
