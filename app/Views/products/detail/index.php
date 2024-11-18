<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk - Medina</title>
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
        }

        .header p {
            font-size: 18px;
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .product-image {
            flex: 1 1 50%;
            max-width: 50%;
            padding: 20px;
            text-align: center;
        }

        .product-image img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .product-details {
            flex: 1 1 50%;
            max-width: 50%;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .product-price {
            font-size: 1.5rem;
            color: #28a745;
            font-weight: bold;
            margin-top: 10px;
        }

        .product-description {
            margin: 20px 0;
            line-height: 1.6;
            color: #555;
        }

        .btn-addcart {
            background-color: #28a745 !important;
            color: white !important;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            width: 100%; /* Full width */
        }

        .btn-addcart:hover {
            background-color: #218838; /* Change color on hover */
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            width: 100%; /* Full width */
            margin-top: 10px; /* Spacing between buttons */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .quantity-input {
            text-align: center;
            width: 60px;
            margin: 0 10px;
        }

        @media (max-width: 768px) {
            .product-container {
                flex-direction: column;
            }
            .product-image, .product-details {
                max-width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>

<?= view('navbar'); ?>

<div class="container mb-5">
    <div class="header">
        <div class="container">
            <h1 class="display-4">Detail Produk</h1>
            <p><a href="<?= base_url('products/') ?>" class="home-link btn btn-unstyled">Produk</a> > Detail Produk</p>
        </div>
    </div>
    <div class="product-container">
        <!-- Bagian Gambar Produk -->
        <div class="product-image">
            <img src="<?= base_url('uploads/' . $products['photo']) ?>" alt="<?= esc($products['name']) ?>">
        </div>

        <!-- Bagian Detail Produk -->
        <div class="product-details">
            <h2><?= esc($products['name']) ?></h2>
            <p class="product-price">Rp <?= number_format($products['price'], 2) ?></p>
            <p class="product-description"><?= esc($products['description']) ?></p>
            <p><strong>Kategori:</strong> <?= esc($products['categories']) ?></p>

            <!-- Quantity Input with + and - Buttons -->
            <div class="quantity-controls">
                <button class="btn btn-secondary" onclick="decreaseQuantity()">-</button>
                <input type="number" id="quantity" value="1" min="1" class="form-control quantity-input">
                <button class="btn btn-secondary" onclick="increaseQuantity()">+</button>
                <a href="/cart/add/<?= $products['id'] ?>" class="btn btn-addcart ml-2">Tambah ke Keranjang</a>
            </div>

            <a href="<?= base_url('/payment/index?totalAmount=' . $products['price']) ?>" class="btn btn-primary btn-lg mt-3">Beli Produk</a>
        </div>
    </div>
</div>

<?= view('footer'); ?>

<script>
    function increaseQuantity() {
        var quantityInput = document.getElementById('quantity');
        quantityInput.value = parseInt(quantityInput.value) + 1;
    }

    function decreaseQuantity() {
        var quantityInput = document.getElementById('quantity');
        if (parseInt(quantityInput.value) > 1) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
        }
    }
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
