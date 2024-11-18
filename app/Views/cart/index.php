<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang - Medina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table td,
        .table th {
            vertical-align: middle;
        }

        .product-image {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }

        .btn-sm {
            padding: 0.2rem 0.4rem;
        }

        .total-price {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .header {
            background-image: url('<?= base_url('images/banner3.jpg') ?>');
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
        }
        .header p {
            font-size: 18px; 
        }
        .container h2, .section-title {
            font-size: 2rem; 
            margin-top: 30px;
        }
        .container p {
            margin-top: 5px;
            line-height: 1.6;
        }
        .btn-unstyled {
            background-color: transparent;
            color: inherit;
            border: none;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?= view('navbar'); ?>

    <div class="header">
        <div class="container">
            <h1 class="display-4">Keranjang saya</h1>
            <p><a href="<?= base_url('/') ?>" class="home-link btn btn-unstyled">Home</a> > Keranjang saya</p>
        </div>
    </div>

    <div class="container mt-5">
        <h3 class="mb-4">Keranjang Saya</h3>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <div class="card" style="margin-bottom: 40px;">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Quantity</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($cartItems)): ?>
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada item dalam keranjang</td>
                            </tr>
                        <?php else: ?>
                            <?php $totalPrice = 0; ?>
                            <?php foreach ($cartItems as $item): ?>
                                <tr>
                                    <td><?= esc($item['product_name']) ?></td>
                                    <td>
                                        <form method="post" action="<?= base_url('/cart/update') ?>" class="d-inline">
                                            <input type="hidden" name="cart_id" value="<?= esc($item['id']) ?>">
                                            <input type="number" name="quantity" value="<?= esc($item['quantity']) ?>" min="1" required style="width: 60px;">
                                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                        </form>
                                    </td>
                                    <td>Rp <?= number_format($item['price'], 2) ?></td>
                                    <td>
                                        <form method="post" action="<?= base_url('/cart/delete') ?>" class="d-inline">
                                            <input type="hidden" name="cart_id" value="<?= esc($item['id']) ?>">
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php $totalPrice += $item['price'] * $item['quantity']; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>

                <?php if (!empty($cartItems)): ?>
                    <h5 class="total-price mt-3">Total Harga: Rp <?= number_format($totalPrice, 2) ?></h5>
                    <a href="<?= base_url('/payment/index?totalAmount=' . $totalPrice) ?>" class="btn btn-success mt-3">Beli Produk</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?= view('footer'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
