<?php
    /**
     * Anthonioz Benjamin
     * IFA-P3B
     * CFPT Informatique
     * TPI 2022
     * Infoshop shopping basket page
     * 
     */
    $dir = "./";
    session_start();
    require $dir . "lib/functions.inc.php";
    if (isset($_POST["idProductToDeleteFromShoppingBasket"]) && isset($_POST["quantity"]))
    {
        deleteProductFromShoppingBasket(filter_input(INPUT_POST, "idProductToDeleteFromShoppingBasket", FILTER_SANITIZE_NUMBER_INT), filter_input(INPUT_POST, "quantity", FILTER_SANITIZE_NUMBER_INT), getIdOrder($_SESSION["email"]));
    }
    if (isset($_POST["idProductToUpdateInShoppingBasket"]) && isset($_POST["quantity"]))
    {
        updateProductInShoppingBasket(filter_input(INPUT_POST, "idProductToUpdateInShoppingBasket", FILTER_SANITIZE_NUMBER_INT), filter_input(INPUT_POST, "quantity", FILTER_SANITIZE_NUMBER_INT), getIdOrder($_SESSION["email"]));
    }
    if (isset($_SESSION["email"]))
    {
        $products = getShoppingBasket($_SESSION["email"]);
    }
    else {
        foreach ($_SESSION["shoppingBasket"] as $idProduct => $quantity)
        {
            $products[$idProduct] = getProductDetails($idProduct);
            $products[$idProduct]["quantity"] = $quantity;
        }
    }
    
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Panier - Shopinfo</title>
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
                                <?php
                                    $totalPrice = 0;
                                    foreach ($products as $product)
                                    {
                                        $totalPrice += $product["priceInCHF"] * $product["quantity"];
                                        echo "<div class=\"product\">
                                        <div class=\"row justify-content-center align-items-center\">
                                            <div class=\"col-md-3\">
                                                <div class=\"product-image\"><img class=\"img-fluid d-block mx-auto image\" src=\"" . PICTURES_FOLDER . $product["fileName"] . "\"></div>
                                            </div>
                                            <div class=\"col-md-5 product-info\"><a class=\"product-name\" href=\"productDetails.php?productId=" . $product["idProduct"] . "\">" . $product["productName"] . "</a>
                                                <div class=\"product-specs\">
                                                    <div></div>
                                                    <div>
                                                        <p>" . $product["description"] . "</p>
                                                    </div>
                                                    <div></div>
                                                </div>
                                            </div>
                                            <div class=\"col-6 col-md-2 quantity\"><form method=\"post\" action=\"shoppingBasket.php\"><label class=\"form-label d-none d-md-block\" for=\"quantity\">Quantité</label><input type=\"hidden\" id=\"idProductToUpdateInShoppingBasket\" name=\"idProductToUpdateInShoppingBasket\" value=\"" . $product["idProduct"] . "\"><input type=\"number\" id=\"quantity\" name=\"quantity\" class=\"form-control quantity-input\" value=\"" . $product["quantity"] . "\"><button class=\"btn btn-primary\" type=\"submit\" style=\"margin-top: 10px;\"><img src=\"assets/img/icons8-modifier.svg\"></button></form></div>
                                            <div class=\"col-6 col-md-2 price\"><form method=\"post\" action=\"shoppingBasket.php\"><span id=\"productPrice\">" . $product["priceInCHF"] . " CHF</span><br><input type=\"hidden\" id=\"idProductToDeleteFromShoppingBasket\" name=\"idProductToDeleteFromShoppingBasket\" value=\"" . $product["idProduct"] . "\"><input type=\"hidden\" id=\"quantity\" name=\"quantity\" value=\"" . $product["quantity"] . "\"><button class=\"btn btn-primary\" type=\"submit\" style=\"margin-left: 10px;\"><img src=\"assets/img/icons8-poubelle.svg\"></button></form></div>
                                        </div>
                                        </div>";
                                    }
                                    updateTotalPrice($totalPrice, $_SESSION["email"]);
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="summary">
                                <form action="paymentPage.php" method="post">
                                    <h3>Récapitulatif</h3>
                                    <h4><span class="text">Total</span><span class="price"><?php echo $totalPrice; ?> CHF</span></h4><button class="btn btn-primary btn-lg d-block w-100" type="submit">Payer</button>
                                    <input type="hidden" name="goToPaymentPage">
                                </form>
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