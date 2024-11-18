<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Medina</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
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
        .icon-box {
            font-size: 1.5rem;
            color: #00a8ff;
            margin-bottom: 15px;
        }
        .services, .team, .vision-mission {
            padding: 20px 0 40px;
        }
    </style>
</head>
<body>

<?= view('navbar'); ?>

<div class="header">
    <div class="container">
        <h1 class="display-4">Tentang Kami</h1>
        <p><a href="<?= base_url('/') ?>" class="home-link btn btn-unstyled">Home</a> > Tentang Kami</p>
    </div>
</div>

<div class="container">
    <h2>Tentang Kami</h2>
    <img src="<?= base_url('images/aboutus.jpg') ?>" alt="Tentang Kami - Medina" class="img-fluid my-4" style="width: 100%; max-height: 200px; object-fit: cover; border-radius: 10px;">
    <p><?= $about['content'] ?></p>
</div>

<div class="container vision-mission">
    <h2 class="section-title">Visi dan Misi Kami</h2>
    <div class="row">
        <div class="col-md-6">
            <h4><i class="fas fa-eye icon-box"></i> Visi Kami</h4>
            <p>Menjadi platform kesehatan digital terkemuka di Indonesia yang dipercaya dalam menyediakan solusi kesehatan menyeluruh, dari obat-obatan hingga konsultasi profesional.</p>
        </div>
        <div class="col-md-6">
            <h4><i class="fas fa-bullseye icon-box"></i> Misi Kami</h4>
            <p>Kami berkomitmen menyediakan produk kesehatan yang berkualitas, meningkatkan pengalaman belanja yang aman, serta mendukung layanan kesehatan online yang mudah diakses bagi seluruh masyarakat Indonesia.</p>
        </div>
    </div>
</div>

<div class="container services">
    <h2 class="section-title">Mengapa Memilih Medina?</h2>
    <div class="row">
        <div class="col-md-4 text-center">
            <i class="fas fa-certificate icon-box"></i>
            <h5>Produk Berkualitas</h5>
            <p>Kami menjamin semua produk yang tersedia adalah asli, berkualitas, dan terdaftar resmi di BPOM serta Kementerian Kesehatan.</p>
        </div>
        <div class="col-md-4 text-center">
            <i class="fas fa-clock icon-box"></i>
            <h5>Kemudahan dan Kecepatan</h5>
            <p>Pesan kebutuhan kesehatan Anda dengan cepat dan mudah, kapan saja dan di mana saja.</p>
        </div>
        <div class="col-md-4 text-center">
            <i class="fas fa-shield-alt icon-box"></i>
            <h5>Privasi Terjaga</h5>
            <p>Data pribadi Anda aman dengan kami; keamanan dan privasi adalah prioritas utama kami.</p>
        </div>
    </div>
</div>

<?= view('footer'); ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
