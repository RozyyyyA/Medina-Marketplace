<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Orders</title>
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

<div class="container mt-5">
    <h3>Order List</h3>
    <?php if (session()->getFlashdata('message')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
    <?php endif; ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer ID</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Total Harga</th>
                <th>Status Payment</th>
                <th>Order Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= $order['id'] ?></td>
                    <td><?= $order['customer_id'] ?></td>
                    <td><?= $order['product_id'] ?></td>
                    <td><?= $order['product_name'] ?></td>
                    <td><?= $order['quantity'] ?></td>
                    <td><?= $order['total_amount'] ?></td>
                    <td><?= $order['status_payment'] ?></td>
                    <td><?= $order['order_date'] ?></td>
                    <td>
                        <form action="<?= base_url('/admin/orders/update-status/' . $order['id']) ?>" method="post">
                            <select name="status" class="form-select" onchange="this.form.submit()">
                                <option value="pending" <?= $order['status_payment'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                                <option value="paid" <?= $order['status_payment'] == 'paid' ? 'selected' : '' ?>>Paid</option>
                                <option value="failed" <?= $order['status_payment'] == 'failed' ? 'selected' : '' ?>>Failed</option>
                            </select>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>