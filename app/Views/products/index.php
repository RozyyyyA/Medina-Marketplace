<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk - Medina</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
            transition: opacity 0.5s ease-in-out;
        }

        .header {
            background-image: url('<?= base_url('images/banner2.jpg') ?>');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 50px 0;
            height: 250px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .header h1 {
            font-size: 32px;
            font-weight: bold;
            margin: 0;
        }

        .header p {
            font-size: 18px;
            margin: 0;
        }

        .container h2 {
            font-size: 2rem;
            margin-top: 30px;
        }

        .card {
            margin-bottom: 20px;
            transition: transform 0.2s, box-shadow 0.2s;
            cursor: pointer;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .btn-detail,
        .btn-cart {
            width: 48%;
            margin: 1%;
        }

        /* Styles for the sidebar */
        .filter-sidebar {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .filter-sidebar h5 {
            font-weight: bold;
            margin-bottom: 10px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 5px;
        }

        .filter-sidebar ul {
            padding-left: 0;
            list-style-type: none;
        }

        .filter-sidebar ul li {
            margin-bottom: 5px;
        }

        .filter-sidebar ul li a {
            color: #333;
            text-decoration: none;
            transition: color 0.2s;
        }

        .filter-sidebar ul li a:hover {
            color: #007bff;
            text-decoration: underline;
        }

        .filter-sidebar ul ul {
            padding-left: 15px;
        }
    </style>
</head>

<body>

<?= view('navbar'); ?>

<div class="header">
    <div class="container">
        <h1 class="display-4">Daftar Produk</h1>
        <p><a href="<?= base_url('/') ?>" class="home-link btn btn-unstyled">Home</a> > Daftar Produk</p>
    </div>
</div>

<div class="container">
    <h2 class="mb-4">Daftar Produk</h2>

    <div class="row">
        <div class="col-md-3"> <!-- Perkecil lebar sidebar -->
            <!-- Sidebar Filter -->
            <div class="filter-sidebar">
                <h5>Kategori</h5>
                <hr>
                <ul class="list-unstyled">
                    <li><a href="/products">Semua kategori</a></li>
                    <?php foreach ($categories as $category): ?>
                        <li>
                            <a href="/products?category=<?= urlencode($category['name']) ?>"><?= htmlspecialchars($category['name']) ?></a>
                            <?php if (!empty($category['subcategories'])): ?>
                                <ul class="list-unstyled pl-3">
                                    <?php foreach ($category['subcategories'] as $subcategory): ?>
                                        <li><a href="/products?category=<?= urlencode($subcategory['name']) ?>"><?= htmlspecialchars($subcategory['name']) ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <!-- End of Sidebar Filter -->
        </div>

        <div class="col-md-9 mb-5"> <!-- Sesuaikan lebar kolom produk -->
            <div class="row">
                <!-- Product List -->
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <div class="col-md-6">
                            <div class="card">
                                <img src="<?= base_url('uploads/' . $product['photo']) ?>" class="card-img-top" alt="<?= esc($product['name']) ?>">
                                <div class="card-body text-center">
                                    <h5 class="card-title"><?= htmlspecialchars($product['name']) ?></h5> <!-- Menampilkan nama produk -->
                                    <p class="card-price">Rp<?= number_format($product['price'], 2) ?></p> <!-- Menampilkan harga produk -->
                                    <div class="d-flex justify-content-center">
                                        <a href="<?= base_url('cart/add/' . $product['id']) ?>" class="btn btn-primary btn-cart">Add to Cart</a>
                                        <a href="/products/detail/<?= $product['id'] ?>" class="btn btn-secondary btn-detail">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Tidak ada produk yang ditemukan.</p>
                <?php endif; ?>
                <!-- End of Product List -->
            </div>
        </div>
    </div>
</div>

<?= view('footer'); ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

