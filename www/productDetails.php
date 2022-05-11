<?php
    /**
     * Anthonioz Benjamin
     * IFA-P3B
     * CFPT Informatique
     * TPI 2022
     * Infoshop product details page
     * 
     */
    $dir = "./";
    session_start();
    require $dir . "lib/functions.inc.php";
    if (!isset($_GET["productId"]))
    {
        header("Location: " . $dir . "index.php");
        exit(0);
    }
    $productId = htmlspecialchars($_GET["productId"]);
    if (!is_numeric($productId))
    {
        header("Location: " . $dir . "index.php");
        exit(0);
    }
    if (isset($_POST["quantityToAdd"]))
    {
        //check if the user is connected if not do the shopping basket in $_SESSION["shoppingBasket"]
        $quantityToAdd = htmlspecialchars($_POST["quantityToAdd"]);
        addProductToShoppingBasket($_SESSION["email"], $productId, $quantityToAdd);
        header("Location: " . $dir . "productDetails.php?productId=" . $productId);
        exit(0);
    }
    $product = getProduct($productId);
    $pictures = getPictures($productId);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Produit - Shopinfo</title>
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
    <main class="page product-page">
        <section class="clean-block clean-product dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Détails du produit</h2>
                </div>
                <div class="block-content">
                    <div class="product-info">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="gallery">
                                    <div id="product-preview" class="vanilla-zoom">
                                        <div class="zoomed-image"></div>
                                        <div class="sidebar">
                                            <?php 
                                                foreach ($pictures as $picture)
                                                {
                                                    echo "<img class=\"img-fluid d-block small-preview\" src=\"" . PICTURES_FOLDER . $picture["fileName"] . "\">";
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info">
                                    <h3><?php echo $product["productName"]; ?></h3>
                                    <div class="rating"></div>
                                    <form action="productDetails.php?productId=<?php echo $product["idProduct"]; ?>" method="post">
                                        <div class="price">
                                            <h3><?php echo $product["priceInCHF"]; ?> CHF</h3><input type="number" style="width: 80px;" value="1" max="<?php echo $product["remainingNumber"]; ?>" min="1" name="quantityToAdd">
                                            <p>Reste : <?php echo $product["remainingNumber"]; ?> produits</p>
                                        </div><button class="btn btn-primary" type="submit"><i class="icon-basket"></i>Ajouter au panier</button>
                                    </form>
                                    <div class="summary">
                                        <p><?php echo $product["description"]; ?></p>
                                    </div>
                                </div>
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