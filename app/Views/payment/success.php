<!DOCTYPE html>
<html>
<head>
    <title>Payment Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }

        .header {
            background-image: url('<?= base_url('images/banner2.jpg') ?>');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 50px 0;
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 100vw;
            margin-left: calc(50% - 50vw);
        }

        .header h1 {
            font-size: 32px;
            font-weight: bold;
            margin: 0;
        }

        .header p {
            font-size: 18px;
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
    
    <div class="header">
        <div class="container">
            <h1 class="display-4">Pembayaran</h1>
            <p><a href="<?= base_url('products/') ?>" class="home-link btn btn-unstyled">Daftar Produk</a> > Pembayaran</p>
        </div>
    </div>

    <div class="container mt-5">
        <h3>Payment Successful!</h3>
        <p>Thank you for your purchase!</p>
        <a href="<?= base_url('/') ?>" class="btn btn-primary">Go to Home</a>
        <a href="<?= base_url('/report/pdf') ?>" class="btn btn-success">Print PDF Report</a>
    </div>

    <div id="recommended-products" class="container featured-products mt-4">
        <h2 class="mb-4">Rekomendasi Produk Untuk Anda</h2>
        <div class="row">
            <?php if ($recommended_products): ?>
                <?php foreach ($recommended_products as $product): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow hover-effect">
                            <div class="position-relative">
                                <img src="<?= base_url('uploads/' . $product->photo); ?>"
                                     class="card-img-top" 
                                     alt="<?= $product->name ?>"
                                     style="height: 200px; object-fit: cover;">
                                <div class="product-overlay">
                                    <a href="<?= base_url('products/detail/' . $product->id) ?>" 
                                       class="btn btn-light btn-sm">
                                       <i class="fas fa-eye"></i> Lihat Detail
                                    </a>
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title font-weight-bold text-truncate"><?= $product->name ?></h5>
                                <p class="card-text flex-grow-1 text-muted" style="font-size: 0.9rem;">
                                    <?= substr($product->description ?? '', 0, 100) . '...'; ?>
                                </p>
                                <div class="mt-auto">
                                    <p class="card-price text-primary font-weight-bold mb-3">
                                        Rp<?= number_format($product->price, 0, ',', '.') ?>
                                    </p>
                                    <a href="<?= base_url('cart/add/' . $product->id) ?>" 
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
                        Tidak ada rekomendasi produk saat ini.
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?= view('footer'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animate success message
            const successMsg = document.querySelector('h3');
            successMsg.style.opacity = '0';
            setTimeout(() => {
                successMsg.style.transition = 'opacity 1s';
                successMsg.style.opacity = '1';
            }, 300);

            // Enable tooltips
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            const tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>
</body>
</html>