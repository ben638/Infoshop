<?php
    /**
     * Anthonioz Benjamin
     * IFA-P3B
     * CFPT Informatique
     * TPI 2022
     * Infoshop home page which displays the products
     * 
     */
    $dir = "./";
    session_start();
    require $dir . "lib/functions.inc.php";
    if (isset($_POST["termToSearch"]))
    {
        $termToSearch = htmlspecialchars($_POST["termToSearch"]);
        $products = searchProducts($termToSearch);
    }
    else {
        $products = getProducts();
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Accueil - Shopinfo</title>
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
    <main class="page catalog-page">
        <section class="clean-block clean-catalog dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Nos produits en vente</h2>
                </div>
                <form action="index.php" method="post">
                    <input type="search" style="margin-bottom: 30px;height: 32px;width: 310px;" placeholder="Rechercher par nom ou description" name="termToSearch">
                    <button class="btn btn-primary" type="submit" style="margin-left: 15px;margin-top: -1px;width: 50px;height: 32px;padding-top: 0px;padding-bottom: 0px;">
                        <img src="assets/img/icons8-chercher.svg">
                    </button>
                </form>
                <div class="content">
                    <div class="row">
                        <div class="col-md-9" style="width: 1312px;">
                            <div class="products">
                                <div class="row g-0">
                                    <?php 
                                        foreach ($products as $product) 
                                        {
                                            echo "<div class=\"col-12 col-md-6 col-lg-4\">
                                                        <div class=\"clean-product-item\">
                                                            <div class=\"image\"><a href=\"#\"><img class=\"img-fluid d-block mx-auto\" src=\"" . PICTURES_FOLDER . $product["fileName"] . "\"></a></div>
                                                            <div class=\"product-name\"><a href=\"" . $dir . "productDetails.php?productId\">" . $product["productName"] . "</a></div>
                                                            <div class=\"about\">
                                                                <p style=\"width: 320px;margin-top: 0px;\">" . $product["description"] . "</p>
                                                                <div class=\"price\">
                                                                    <h3 style=\"margin-top: 0px;\">" . $product["priceInCHF"] . " CHF</h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>";
                                        }
                                    ?>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="clean-product-item">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/tech/image2.jpg"></a></div>
                                            <div class="product-name"><a href="#">Titre</a></div>
                                            <div class="about">
                                                <p style="width: 320px;margin-top: 0px;">Description</p>
                                                <div class="price">
                                                    <h3 style="margin-top: 0px;">$100</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="clean-product-item">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/tech/image2.jpg"></a></div>
                                            <div class="product-name"><a href="#">Titre</a></div>
                                            <div class="about">
                                                <p style="width: 320px;margin-top: 0px;">Description</p>
                                                <div class="price">
                                                    <h3 style="margin-top: 0px;">$100</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="clean-product-item">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/tech/image2.jpg"></a></div>
                                            <div class="product-name"><a href="#">Titre</a></div>
                                            <div class="about">
                                                <p style="width: 320px;margin-top: 0px;">Description</p>
                                                <div class="price">
                                                    <h3 style="margin-top: 0px;">$100</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="clean-product-item">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/tech/image2.jpg"></a></div>
                                            <div class="product-name"><a href="#">Titre</a></div>
                                            <div class="about">
                                                <p style="width: 320px;margin-top: 0px;">Description</p>
                                                <div class="price">
                                                    <h3 style="margin-top: 0px;">$100</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="clean-product-item">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/tech/image2.jpg"></a></div>
                                            <div class="product-name"><a href="#">Titre</a></div>
                                            <div class="about">
                                                <p style="width: 320px;margin-top: 0px;">Description</p>
                                                <div class="price">
                                                    <h3 style="margin-top: 0px;">$100</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="clean-product-item">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/tech/image2.jpg"></a></div>
                                            <div class="product-name"><a href="#">Titre</a></div>
                                            <div class="about">
                                                <p style="width: 320px;margin-top: 0px;">Description</p>
                                                <div class="price">
                                                    <h3 style="margin-top: 0px;">$100</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="clean-product-item">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/tech/image2.jpg"></a></div>
                                            <div class="product-name"><a href="#">Titre</a></div>
                                            <div class="about">
                                                <p style="width: 320px;margin-top: 0px;">Description</p>
                                                <div class="price">
                                                    <h3 style="margin-top: 0px;">$100</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="clean-product-item">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/tech/image2.jpg"></a></div>
                                            <div class="product-name"><a href="#">Titre</a></div>
                                            <div class="about">
                                                <p style="width: 320px;margin-top: 0px;">Description</p>
                                                <div class="price">
                                                    <h3 style="margin-top: 0px;">$100</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="clean-product-item">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/tech/image2.jpg"></a></div>
                                            <div class="product-name"><a href="#">Titre</a></div>
                                            <div class="about">
                                                <p style="width: 320px;margin-top: 0px;">Description</p>
                                                <div class="price">
                                                    <h3 style="margin-top: 0px;">$100</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <nav>
                                    <ul class="pagination"></ul>
                                </nav>
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