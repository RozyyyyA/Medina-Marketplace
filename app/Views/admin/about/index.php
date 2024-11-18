<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage About Us Content - Medina</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
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
<body>

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
    <h1>Manage About Us Content</h1>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($about) && !empty($about)): ?>
                <tr>
                    <td><?= $about['id'] ?></td>
                    <td><?= esc($about['content']) ?></td>
                    <td>
                        <a href="/admin/about/edit" class="btn btn-warning">Edit</a>
                        <form action="/admin/about/delete/<?= $about['id'] ?>" method="POST" style="display:inline;">
                        </form>
                    </td>
                </tr>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="text-center">No content available. Please add content via MySQL.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
