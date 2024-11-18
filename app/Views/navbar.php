<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        html {
            scroll-behavior: smooth;
        }
        /* Navbar Styles */
        .navbar {
            background-color: #343a40; /* Change the background color */
            font-weight: bold;
            position: fixed; /* Make the navbar fixed */
            width: 100%; /* Ensure full width */
            top: 0; /* Align to the top */
            z-index: 1000; /* Keep it above other content */
        }

        .navbar-brand {
            color: #fff !important;
            margin-left: 20px;
            font-size: 1.5rem;
        }

        .navbar-nav .nav-link {
            color: #fff !important;
        }

        .navbar-nav .nav-link:hover {
            color: #ffc107 !important;
        }

        .btn-primary {
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-primary:hover {
            background-color: #ffd600;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .navbar-nav-center {
            flex-direction: row;
            justify-content: center;
            width: 100%;
            margin-left: 40px;
        }

        .navbar-nav-right {
            margin-right: 20px;
        }

        body {
            padding-top:60px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Medina.</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav navbar-nav-center mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/products">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Kontak</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto navbar-nav-right">
                <?php if (session()->get('customer_id')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/cart">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/customer/profile">
                            <i class="fas fa-user"></i>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="btn btn-primary mr-2" href="/customer/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-secondary" href="/customer/register">Daftar</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
        $("a").on('click', function(event) {
            // Cegah default anchor behavior
            if (this.hash !== "") {
                event.preventDefault();
                const hash = this.hash;

                // Perpindahan halus
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function(){
                    window.location.hash = hash;
                });
            }
        });
    });
</script>


</body>
</html> 