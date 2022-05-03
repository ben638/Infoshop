<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Shopping Cart - Shopinfo</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#">Shopinfo</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="catalog-page.html">Acceuil</a></li>
                    <li class="nav-item"><a class="nav-link active" href="shopping-cart.html">panier</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.html">Connexion</a></li>
                    <li class="nav-item"><a class="nav-link" href="registration.html">Inscription</a></li>
                    <li class="nav-item"><a class="nav-link" href="registration-1.html">Profil</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page shopping-cart-page">
        <section class="clean-block clean-cart dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Votre panier</h2>
                    <p>Voici votre panier</p>
                </div>
                <div class="content">
                    <div class="row g-0">
                        <div class="col-md-12 col-lg-8">
                            <div class="items">
                                <div class="product">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-md-3">
                                            <div class="product-image"><img class="img-fluid d-block mx-auto image" src="assets/img/tech/image2.jpg"></div>
                                        </div>
                                        <div class="col-md-5 product-info"><a class="product-name" href="#">Lorem Ipsum dolor</a>
                                            <div class="product-specs">
                                                <div></div>
                                                <div>
                                                    <p>Description</p>
                                                </div>
                                                <div></div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-2 quantity"><label class="form-label d-none d-md-block" for="quantity">Quantité</label><input type="number" id="number" class="form-control quantity-input" value="1"><button class="btn btn-primary" type="button" style="margin-top: 10px;"><img src="assets/img/icons8-modifier.svg"></button></div>
                                        <div class="col-6 col-md-2 price"><span>$120</span><button class="btn btn-primary" type="button" style="margin-left: 10px;"><img src="assets/img/icons8-poubelle.svg"></button></div>
                                    </div>
                                    <div class="product"></div>
                                    <div class="product"></div>
                                    <div class="product">
                                        <div class="row justify-content-center align-items-center">
                                            <div class="col-md-3">
                                                <div class="product-image"><img class="img-fluid d-block mx-auto image" src="assets/img/tech/image2.jpg"></div>
                                            </div>
                                            <div class="col-md-5 product-info"><a class="product-name" href="#">Lorem Ipsum dolor</a>
                                                <div class="product-specs">
                                                    <div></div>
                                                    <div>
                                                        <p>Description</p>
                                                    </div>
                                                    <div></div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-2 quantity"><label class="form-label d-none d-md-block" for="quantity">Quantité</label><input type="number" id="number-1" class="form-control quantity-input" value="1"><button class="btn btn-primary" type="button" style="margin-top: 10px;"><img src="assets/img/icons8-modifier.svg"></button></div>
                                            <div class="col-6 col-md-2 price"><span>$120</span><button class="btn btn-primary" type="button" style="margin-left: 10px;"><img src="assets/img/icons8-poubelle.svg"></button></div>
                                        </div>
                                        <div class="product"></div>
                                        <div class="product"></div>
                                    </div>
                                    <div class="product">
                                        <div class="row justify-content-center align-items-center">
                                            <div class="col-md-3">
                                                <div class="product-image"><img class="img-fluid d-block mx-auto image" src="assets/img/tech/image2.jpg"></div>
                                            </div>
                                            <div class="col-md-5 product-info"><a class="product-name" href="#">Lorem Ipsum dolor</a>
                                                <div class="product-specs">
                                                    <div></div>
                                                    <div>
                                                        <p>Description</p>
                                                    </div>
                                                    <div></div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-2 quantity"><label class="form-label d-none d-md-block" for="quantity">Quantité</label><input type="number" id="number-2" class="form-control quantity-input" value="1"><button class="btn btn-primary" type="button" style="margin-top: 10px;"><img src="assets/img/icons8-modifier.svg"></button></div>
                                            <div class="col-6 col-md-2 price"><span>$120</span><button class="btn btn-primary" type="button" style="margin-left: 10px;"><img src="assets/img/icons8-poubelle.svg"></button></div>
                                        </div>
                                        <div class="product"></div>
                                        <div class="product"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="summary">
                                <h3>Récapitulatif</h3>
                                <h4><span class="text">Total</span><span class="price">$360</span></h4><button class="btn btn-primary btn-lg d-block w-100" type="button">Payer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="page-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Sign up</a></li>
                        <li><a href="#">Downloads</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                        <li><a href="#">Forums</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2022 Copyright Text</p>
        </div>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>