<!-- app/Views/partials/footer.php -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
.footer {
    background: #212529;
    font-family: 'Poppins', sans-serif;
}
.footer-widget h4 {
    position: relative;
    padding-bottom: 12px;
    margin-bottom: 25px;
}
.footer-widget h4::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 50px;
    height: 2px;
    background: #ffd700;
}
.social-links a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: rgba(255,255,255,0.1);
    transition: all 0.3s ease;
}
.social-links a:hover {
    background: #ffd700;
    transform: translateY(-3px);
}
.footer-contact i, .footer-info i {
    color: #ffd700;
}
</style>

<footer class="footer text-white">
    <div class="footer-top py-4">
        <div class="container">
            <div class="row g-4">
                <!-- About Section -->
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget">
                        <h4 class="text-uppercase">Tentang Medina</h4>
                        <p class="mb-4 opacity-75">Medina adalah platform e-commerce yang menyediakan berbagai produk berkualitas. Kami berkomitmen untuk memberikan pengalaman berbelanja yang terbaik.</p>
                        <div class="footer-contact">
                            <p class="mb-2 opacity-75"><i class="fas fa-phone-alt me-2"></i> Hubungi kami 24/7:</p>
                            <h5><a href="tel:(021)123-4567" class="text-white text-decoration-none hover-opacity"> (021) 123-4567</a></h5>
                        </div>
                    </div>
                </div>

                <!-- Info Toko -->
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget">
                        <h4 class="text-uppercase">Info Toko</h4>
                        <div class="footer-info">
                            <p class="mb-3 opacity-75"><i class="fas fa-map-marker-alt me-2"></i> Jl. Sukamaju No. 123, Sidoarjo</p>
                            <p class="mb-3 opacity-75"><i class="far fa-clock me-2"></i> Senin - Jumat, 09:00 - 17:00</p>
                            <p class="mb-3 opacity-75"><i class="fas fa-envelope me-2"></i><a href="mailto:info@medina.com" class="text-white text-decoration-none"> info@medina.com</a></p>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget">
                        <h4 class="text-uppercase">Ikuti Kami</h4>
                        <div class="social-links mb-4 d-flex gap-3">
                            <a href="https://facebook.com/medinastore" class="text-white" title="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/medinastore" class="text-white" title="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://instagram.com/medinastore" class="text-white" title="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://linkedin.com/company/medinastore" class="text-white" title="LinkedIn">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                        <div class="newsletter">
                            <p class="mb-3 opacity-75">Dapatkan update terbaru dan penawaran eksklusif</p>
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Email Anda">
                                <button class="btn btn-primary">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="py-3" style="background: rgba(0,0,0,0.3);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="text-center mb-0 opacity-75">© 2024 Medina. Semua hak dilindungi.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
