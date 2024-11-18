<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami - Medina</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
            transition: opacity 0.5s ease-in-out;
        }
        .header {
            background-image: url('<?= base_url('images/banner4.jpg') ?>');
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
            margin-top:30px;
        }
        .container p {
            margin-top: 5px;
            line-height: 1.6; /* Improve readability */
        }
        .btn-unstyled {
            background-color: transparent;
            color: inherit;
            border: none;
            text-decoration: none;
            cursor: pointer;
        }
        .form-control, .btn {
            border-radius: 0.25rem; /* Consistent border radius */
        }
        .form-group {
            margin-bottom: 1.5rem; /* Spacing between form groups */
        }
    </style>
</head>
<body>

<?= view('navbar'); ?>

<div class="header">
    <div class="container">
        <h1 class="display-4">Kontak Kami</h1>
        <p><a href="<?= base_url('/') ?>" class="home-link btn btn-unstyled">Home</a> > Kontak Kami</p>
    </div>
</div>

<div class="container" style="margin-bottom: 40px;">
    <h2>Kontak Kami</h2>
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <form action="/contact/submit" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="message">Message:</label>
            <textarea id="message" name="message" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Send Message</button>
    </form>
</div>

<?= view('footer'); ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
