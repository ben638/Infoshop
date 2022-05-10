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
        $products = getAllProducts();
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
    <main class="page blog-post-list">
        <section class="clean-block clean-blog-list dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Nos produits en vente</h2>
                </div><input type="search" style="margin-bottom: 30px;height: 32px;width: 310px;" placeholder="Rechercher par nom ou description"><button class="btn btn-primary" type="button" style="margin-left: 15px;margin-top: -1px;width: 50px;height: 32px;padding-top: 0px;padding-bottom: 0px;"><img src="assets/img/icons8-chercher.svg"></button>
                <div class="block-content">
                <?php
                    if (isset($_SESSION["isAdmin"]))
                    {
                        echo "<button class=\"btn btn-primary\" type=\"button\" style=\"margin-top: 10px;\"><img src=\"assets/img/icons8-plus.svg\"></button>";
                    }
                    foreach ($products as $product) 
                    {
                        echo "<div class=\"clean-blog-post\">
                                <div class=\"row\">
                                    <div class=\"col-lg-5\"><a href=\"" . $dir . "productDetails.php?productId=" . $product["idProduct"] . "\"><img class=\"img-fluid d-block mx-auto\" src=\"" . PICTURES_FOLDER . $product["fileName"] . "\"></a></div>
                                    <div class=\"col-lg-7\">
                                        <h3><a href=\"" . $dir . "productDetails.php?productId=" . $product["idProduct"] . "\">" . $product["productName"] . "</a></h3>
                                        <p>";
                        for ($i = 0; $i < 150; $i++)
                        {
                            echo $product["description"][$i];
                        }
                        echo "...</p><p>" . $product["priceInCHF"] . " CHF</p>";
                        if (isset($_SESSION["isAdmin"]))
                        {
                            echo "<button class=\"btn btn-primary\" type=\"button\" style=\"margin-top: 10px;\"><img src=\"assets/img/icons8-modifier.svg\"></button>";
                            echo "<button class=\"btn btn-primary\" type=\"button\" style=\"margin-top: 10px;\"><img src=\"assets/img/icons8-poubelle.svg\"></button>";
                        }
                        echo "</div></div></div>";
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