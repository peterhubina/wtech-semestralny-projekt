<footer class="footer mt-auto py-5">
    <div class="container">
        <div class="row">
            <!-- Social media icons -->
            <div class="footer-col col-12 col-md-6 col-lg-3">
                <div class="col-container">
                    <div class="mb-2">
                        <img src="{{ asset('assets/img/logo.webp') }}" alt="Logo" style="height: 50px; width: auto;">
                    </div>
                    <div>© 2024</div>
                    <div class="social-icons">
                        <a href="#" class="me-2"
                        ><i class="fab fa-twitter"></i
                            ></a>
                        <a href="#" class="me-2"
                        ><i class="fab fa-facebook-f"></i
                            ></a>
                        <a href="#" class="me-2"
                        ><i class="fab fa-instagram"></i
                            ></a>
                        <a href="#" class="me-2"
                        ><i class="fab fa-linkedin-in"></i
                            ></a>
                    </div>
                </div>
            </div>
            <!-- Footer links -->
            <div
                class="footer-col side-col col-12 col-md-6 col-lg-3"
            >
                <div class="col-container">
                    <h5>Categories</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route ('home.show')}}#plants">Plants</a></li>
                        <li><a href="{{ route ('home.show')}}#seeds">Seeds</a></li>
                        <li><a href="{{ route ('home.show')}}#gardening-tools">Gardening Tools</a></li>
                        <li><a href="{{ route ('home.show')}}#garden-care">Garden Care</a></li>
                    </ul>
                </div>
            </div>
            <div
                class="footer-col side-col col-12 col-md-6 col-lg-3"
            >
                <div class="col-container">
                    <h5>Info</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route ('info-page.show')}}#about">About</a></li>
                        <li><a href="{{ route ('info-page.show')}}#contact">Contact</a></li>
                        <li><a href="{{ route ('info-page.show')}}#visit">Visit Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-col col-12 col-md-6 col-lg-3">
                <div class="col-container">
                    <h5>Contact</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a
                                href="mailto:info@theurbangardener.com"
                            >info@theurbangardener.com</a
                            >
                        </li>
                        <li>
                            <a href="tel:+421420420420"
                            >+421 420 420 420</a
                            >
                        </li>
                        <li>Address 123, City 420 69, Slovakia</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
