<!-- app/Views/products/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medina - Produk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }
        .hero {
            background-image: url('<?= base_url('images/banner1.jpg') ?>');
            background-size: cover;
            height: 400px;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .featured-products {
            padding: 60px 0;
        }
        .card:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }
        .hover-effect {
            transition: all 0.3s ease;
        }
        .hover-effect:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1) !important;
        }
        .product-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .card:hover .product-overlay {
            opacity: 1;
        }
    </style>
</head>
<body>

    <?= view('navbar'); ?>

    <!-- Hero Section -->
    <div class="hero">
        <div>
            <h1>Selamat Datang di Medina</h1>
            <p>Temukan produk kesehatan terbaik untuk Anda!</p>
            <a href="<?= base_url('/products') ?>" class="btn btn-primary btn-lg">Lihat Produk</a>
        </div>
    </div>

    <!-- Featured Products Section -->
    <div id="products-section" class="container featured-products text-center">
        <h2 class="mb-4">Produk Unggulan</h2>
        <div class="row">
            <?php if ($products): ?>
                <?php foreach ($products as $product): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow hover-effect">
                            <div class="position-relative">
                                <img src="<?= base_url('uploads/' . $product['photo']); ?>" 
                                     class="card-img-top" 
                                     alt="<?= $product['name']; ?>"
                                     style="height: 200px; object-fit: cover;">
                                <div class="product-overlay">
                                    <a href="<?= base_url('/products/detail/' . $product['id']); ?>" 
                                       class="btn btn-light btn-sm">
                                       <i class="fas fa-eye"></i> Lihat Detail
                                    </a>
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title font-weight-bold text-truncate"><?= $product['name']; ?></h5>
                                <p class="card-text flex-grow-1 text-muted" style="font-size: 0.9rem;">
                                    <?= substr($product['description'], 0, 100) . '...'; ?>
                                </p>
                                <div class="mt-auto">
                                    <p class="card-price text-primary font-weight-bold mb-3">
                                        Rp<?= number_format($product['price'], 0, ',', '.'); ?>
                                    </p>
                                    <a href="<?= base_url('/cart/add/' . $product['id']); ?>" 
                                       class="btn btn-primary btn-block">
                                       <i class="fas fa-shopping-cart"></i> Beli Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-info">
                        Produk tidak ditemukan untuk kategori ini.
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    
    <!-- Services Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">Layanan Kami</h2>
            <div class="row">
                <div class="col-md-4 text-center">
                    <i class="fas fa-shipping-fast fa-3x mb-3"></i>
                    <h4>Pengiriman Cepat</h4>
                    <p>Layanan pengiriman ke seluruh Indonesia</p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="fas fa-headset fa-3x mb-3"></i>
                    <h4>Layanan 24/7</h4>
                    <p>Dukungan pelanggan setiap saat</p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="fas fa-shield-alt fa-3x mb-3"></i>
                    <h4>Produk Terjamin</h4>
                    <p>Kualitas dan keaslian terjamin</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?= view('footer'); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<!-- About Us Section -->
