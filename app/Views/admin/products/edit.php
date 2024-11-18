<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
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
        <h1>Edit Product</h1>
        <form action="/admin/products/update/<?= $product['id'] ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" name="name" class="form-control" value="<?= $product['name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" required><?= $product['description'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" name="price" class="form-control" value="<?= $product['price'] ?>" required>
            </div>
            <div class="form-group">
                <label for="category_id">Category:</label>
                <select name="category_id" class="form-control" required>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>" <?= $category['id'] == $product['category_id'] ? 'selected' : '' ?>>
                            <?= $category['name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="photo">Photo:</label>
                <input type="file" name="photo" class="form-control">
                <img src="<?= base_url('writable/uploads/' . $product['photo']) ?>" alt="Current Photo" width="100">
            </div>
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
</body>
</html>
