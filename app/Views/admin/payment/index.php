<!DOCTYPE html>
<html>

<head>
    <title>Payments - Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            height: 100vh;
            /* Full height */
        }

        .sidebar {
            min-width: 250px;
            /* Minimum width for sidebar */
            max-width: 250px;
            /* Maximum width for sidebar */
            background-color: #343a40;
            /* Dark background */
            color: white;
            /* White text */
            padding-top: 20px;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: #f8f9fa;
            /* Light text color */
            display: block;
        }

        .sidebar a:hover {
            background-color: #495057;
            /* Darker gray on hover */
            color: white;
            /* Keep text white on hover */
        }

        .content {
            flex: 1;
            /* Take the remaining space */
            padding: 20px;
            overflow-y: auto;
            /* Allow scrolling if content exceeds viewport */
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
        <h3>Payment Records</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Payment Method</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payments as $payment): ?>
                    <tr>
                        <td><?= esc($payment['order_id']) ?></td>
                        <td><?= esc($payment['payment_method']) ?></td>
                        <td>Rp <?= number_format($payment['amount'], 2) ?></td>
                        <td><?= esc($payment['order_status']) ?></td> <!-- Menampilkan status pesanan -->
                        <td><?= esc($payment['created_at']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>