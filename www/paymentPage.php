<?php
    /**
     * Anthonioz Benjamin
     * IFA-P3B
     * CFPT Informatique
     * TPI 2022
     * Infoshop payment page
     * 
     */
    $dir = "./";
    session_start();
    require $dir . "lib/functions.inc.php";
    if (!isset($_SESSION["email"]))
    {
        header("Location: " . $dir . "index.php");
        exit(0);
    }
    if (!isset($_POST["goToPaymentPage"]))
    {
        header("Location: " . $dir . "index.php");
        exit(0);
    }
    $shoppingBasket = orderExist($_SESSION["email"])[0];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Paiement - Shopinfo</title>
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
    <main class="page payment-page">
        <section class="clean-block payment-form dark">
            <div class="container" style="margin-left: 123px;">
                <div class="block-heading">
                    <h2 class="text-info">Paiement</h2>
                    <p>Veuillez procéder au paiement</p>
                </div>
                <form>
                    <div class="products">
                        <h3 class="title">Infoshop</h3>
                        <div class="item"><span class="price">CH19 0900 0000 1234 5678 9</span>
                            <p class="item-name">IBAN</p>
                            <p class="item-description">Merci de procéder au virement bancaire, dès sa réception votre commande sera expédiée</p>
                        </div>
                        <div class="item"><span class="price"><?php echo $shoppingBasket["idOrder"]; ?></span>
                            <p class="item-name">Commande N°</p>
                        </div>
                        <div class="total"><span>Total</span><span class="price"><?php echo $shoppingBasket["totalPrice"]; ?> CHF</span></div>
                    </div>
                </form>
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