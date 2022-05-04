<?php
    $dir = "./";
    session_start();
?>
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
    <?php 
        require "headers/navBar.php";
    ?>
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
    <?php 
        require "headers/footer.php";
    ?>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>