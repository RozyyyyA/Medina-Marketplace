<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Customer - Medina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }
        .register-container {
            margin-top: 60px;
            padding: 30px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .register-container h3 {
            margin-bottom: 30px;
            font-weight: 600;
        }
        .form-label {
            font-weight: 500;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<?= view('navbar'); ?>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="register-container">
                <h3 class="text-center">Daftar Customer</h3>
                <form method="post" action="<?= base_url('/customer/register') ?>">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                    </div>
                    <div class="mb-3">
                        <label for="rewrite-password" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="rewrite-password" name="rewrite_password" placeholder="Ulangi password" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="male">Pria</option>
                            <option value="female">Wanita</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea class="form-control" id="address" name="address" placeholder="Masukkan alamat" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">Kota</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Masukkan kota" required>
                    </div>
                    <div class="mb-3">
                        <label for="contact_no" class="form-label">No. Kontak</label>
                        <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Masukkan nomor kontak" required>
                    </div>
                    <div class="mb-3">
                        <label for="paypal_id" class="form-label">ID PayPal</label>
                        <input type="text" class="form-control" id="paypal_id" name="paypal_id" placeholder="Masukkan ID PayPal" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Daftar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= view('footer'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
