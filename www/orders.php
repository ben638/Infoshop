<?php
    /**
     * Anthonioz Benjamin
     * IFA-P3B
     * CFPT Informatique
     * TPI 2022
     * Infoshop orders page which displays the orders of the user
     * 
     */
    $dir = "./";
    session_start();
    require $dir . "lib/functions.inc.php";
    $orders = getOrders($_SESSION["email"]);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Commandes - Shopinfo</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
</head>

<body>
    <?php 
        require "headers/navBar.php";
    ?>
    <main class="page blog-post-list">
        <section class="clean-block clean-blog-list dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Vos commandes</h2>
                </div>
                <div class="block-content">
                    <?php
                        if ($orders)
                        {
                            foreach ($orders as $order)
                            {
                                $paymentMessage = "";
                                $sendMessage = "";
                                if ($order["orderInfo"]["isPaid"])
                                {
                                    $paymentMessage = "Payé";
                                }
                                else {
                                    $paymentMessage = "En attente de paiement";
                                }
                                if ($order["orderInfo"]["isSent"])
                                {
                                    $sendMessage = "Envoyé";
                                }
                                else {
                                    $sendMessage = "En attente d'envoi";
                                }
                                echo "<div class=\"clean-blog-post\">
                                        <div class=\"row\">
                                            <div class=\"col-lg-7\" style=\"width: 100%;\">
                                                <h3>Commande n°" . $order["orderInfo"]["idOrder"] . "</h3>
                                                <div class=\"info\"><span class=\"text-muted\">$paymentMessage</span></div>
                                                <div class=\"info\"><span class=\"text-muted\">$sendMessage</span></div>
                                                <p>Prix total : " . $order["orderInfo"]["totalPrice"] . " CHF</p>";
                                foreach ($order["detailOrder"] as $product)
                                {
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
                                            <div class=\"col-6 col-md-2 quantity\"><label class=\"form-label d-none d-md-block\" for=\"quantity\">Quantité</label><input type=\"number\" id=\"number\" class=\"form-control quantity-input\" value=\"" . $product["quantity"] . "\"></div>
                                            <div class=\"col-6 col-md-2 price\"><label class=\"form-label d-none d-md-block\" for=\"quantity\">Prix à l'unité</label><p class=\"form-control quantity-input\">" . $product["priceInCHF"] . " CHF</p></div>
                                        </div>
                                        </div>";
                                }
                                echo "</div></div></div>";
                            }
                        }
                    ?>
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