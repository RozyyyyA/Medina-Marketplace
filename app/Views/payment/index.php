<!DOCTYPE html>
<html>
<head>
    <title>Payment - Medina</title>
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
            margin: 0;
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

<div class="container mt-5 mb-5">
    <h3>Checkout</h3>
    
    <!-- Customer Details Section -->
    <div class="card mb-4">
        <div class="card-header">
            <h5>Informasi Pelanggan</h5>
        </div>
        <div class="card-body">
            <p><strong>Nama:</strong> <?= $customer['username'] ?? '-' ?></p>
            <p><strong>Alamat:</strong> <?= $customer['address'] ?? '-' ?></p>
            <p><strong>No. Telepon:</strong> <?= $customer['contact_no'] ?? '-' ?></p>
        </div>
    </div>

    <!-- Order Details Section -->
    <div class="card mb-4">
        <div class="card-header">
            <h5>Detail Pesanan</h5>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cartItems as $item): ?>
                    <tr>
                        <td><?= $item['name'] ?></td>
                        <td>Rp <?= number_format($item['price'], 2) ?></td>
                        <td><?= $item['quantity'] ?></td>
                        <td>Rp <?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">Total</th>
                        <th>Rp <?= number_format($totalAmount, 2) ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <form method="post" action="<?= base_url('/payment/checkout') ?>">
        <input type="hidden" name="total_amount" value="<?= $totalAmount ?>">
        <div class="mb-3">
            <label for="payment_method" class="form-label">Payment Method</label>
            <select class="form-control" id="payment_method" name="payment_method" required>
                <option value="prepaid">Prepaid (Credit/Debit Card)</option>
                <option value="postpaid">Postpaid (Cash on Delivery)</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Bayar</button>
    </form>
</div>
<?= view('footer'); ?>
</body>
</html>
