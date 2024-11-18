<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - Medina</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        .profile-info {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .profile-info h3 {
            color: #333;
            font-size: 1.8rem;
        }
        .profile-info p {
            color: #555;
            font-size: 1rem;
        }
        .btn-logout {
            width: 100%;
        }
    </style>
</head>

<body>
    <?= view('navbar'); ?>

    <div class="header">
        <div class="container">
            <h1 class="display-4">Profil Saya</h1>
            <p><a href="<?= base_url('/') ?>" class="home-link btn btn-unstyled">Home</a> > Profil Saya</p>
        </div>
    </div>
    <?php
    // Assuming you have a database connection set up
    $customer_id = session()->get('customer_id'); // Assuming customer_id is stored in session
    $db = \Config\Database::connect();
    $query = $db->query("SELECT * FROM customers WHERE id = ?", [$customer_id]);
    $customer = $query->getRow();
    ?>

    <div class="container">
        <div class="profile-info mt-4 p-4 mb-5">
            <h3>Informasi Pengguna</h3>
            <hr>
            <p><strong>Nama Pengguna:</strong> <?= $customer->username; ?></p>
            <p><strong>Email:</strong> <?= $customer->email; ?></p>
            <p><strong>Date Of Birth:</strong> <?= $customer->dob; ?></p>
            <p><strong>Jenis Kelamin:</strong> <?= $customer->gender; ?></p>
            <p><strong>Alamat :</strong> <?= $customer->address; ?></p>
            <p><strong>Kota:</strong> <?= $customer->city; ?></p>
            <p><strong>No Telfon:</strong> <?= $customer->contact_no; ?></p>
            <p><strong>Id Paypal :</strong> <?= $customer->paypal_id; ?></p>
            <!-- Tambahkan informasi profil lainnya di sini -->
            <a href="/customer/logout" class="btn btn-danger btn-logout mt-3">Logout</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <?= view('footer'); ?>
</body>

</html>
