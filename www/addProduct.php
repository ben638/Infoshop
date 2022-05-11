<?php
    /**
     * Anthonioz Benjamin
     * IFA-P3B
     * CFPT Informatique
     * TPI 2022
     * Infoshop page to add some products
     * 
     */
    $dir = "./";
    session_start();
    require $dir . "lib/functions.inc.php";
    if (!isset($_SESSION["email"]) || !isset($_SESSION["isAdmin"]))
    {
        header("Location: " . $dir . "index.php");
        exit(0);
    }
    if (isset($_POST["productName"]) && isset($_POST["description"]) && isset($_POST["priceInCHF"]) && isset($_POST["quantity"]) && isset($_FILES) && isset($_GET["idProductToUpdate"]))
    {
        $productName = htmlspecialchars($_POST["productName"]);
        $description = htmlspecialchars($_POST["description"]);
        $priceInCHF = htmlspecialchars($_POST["priceInCHF"]);
        $quantity = htmlspecialchars($_POST["quantity"]);
        $defaultPicture = $_FILES["defaultPicture"];
        $defaultPicture = renamePictures($defaultPicture);
        if (isset($_FILES["othersPictures"]))
		{
			if ($_FILES["othersPictures"]["name"][0] != "")
			{
				$othersPictures = $_FILES["othersPictures"];
				$hasOthersPictures = true;
				$othersPictures = renamePictures($othersPictures);
			}
		}
        addProductWithPictures($productName, $description, $priceInCHF, $quantity, $hasOthersPictures, $defaultPicture, $othersPictures);
    }
    else if (isset($_POST["productName"]) && isset($_POST["description"]) && isset($_POST["priceInCHF"]) && isset($_POST["quantity"]) && isset($_FILES))
    {
        $productName = htmlspecialchars($_POST["productName"]);
        $description = htmlspecialchars($_POST["description"]);
        $priceInCHF = htmlspecialchars($_POST["priceInCHF"]);
        $quantity = htmlspecialchars($_POST["quantity"]);
        $defaultPicture = $_FILES["defaultPicture"];
        $defaultPicture = renamePictures($defaultPicture);
        if (isset($_FILES["othersPictures"]))
		{
			if ($_FILES["othersPictures"]["name"][0] != "")
			{
				$othersPictures = $_FILES["othersPictures"];
				$hasOthersPictures = true;
				$othersPictures = renamePictures($othersPictures);
			}
		}
        addProductWithPictures($productName, $description, $priceInCHF, $quantity, $hasOthersPictures, $defaultPicture, $othersPictures);
    }
    $updateProduct = false;
    
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>
        <?php 
            if ($updateProduct)
            {
                echo "Modifier un produit";
            }
            else {
                echo "Ajouter un produit";
            }
        ?> - Shopinfo</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
</head>

<body>
    <?php 
        require "headers/navBar.php";
    ?>
    <main class="page contact-us-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <?php 
                        if ($updateProduct)
                        {
                            echo "<h2 class=\"text-info\">Modifier un produit</h2><p>Modifier un produit en remplissant tous les champs</p>";
                        }
                        else {
                            echo "<h2 class=\"text-info\">Ajouter un produit</h2><p>Ajouter un produit en remplissant tous les champs</p>";
                        }
                    ?>
                </div>
                <form method="post" enctype="multipart/form-data" action="addProduct.php">
                    <?php 
                        /*if ($updateProduct)
                        {
                            echo "<div class=\"mb-3\" required><label class=\"form-label\" for=\"name\">Produit à modifier</label><select class=\"form-select\">";
                            foreach ($products as $product)
                            {
                                echo "<option value=\"" . $product["idProduct"] . "\" selected>" . $product["productName"] . "</option>";
                            }
                            echo "</select></div>";
                        }*/
                    ?>
                    <div class="mb-3"><label class="form-label" for="productName">Nom du produit</label><input class="form-control" type="text" id="productName" name="productName" required></div>
                    <div class="mb-3"><label class="form-label" for="description">Description</label><textarea class="form-control" id="description" name="description" style="height: 150px;" required></textarea></div>
                    <div class="mb-3"><label class="form-label" for="priceInCHF">Prix en CHF</label><input class="form-control" type="number" name="priceInCHF" step="0.01" required></div>
                    <div class="mb-3"><label class="form-label" for="quantity">Quantité en stock</label><input class="form-control" type="number" name="quantity" step="1" required></div>
                    <div class="mb-3"><label class="form-label" for="defaultPicture">Image par défaut</label><input class="form-control" type="file" name="defaultPicture[]" accept="image/*" required></div>
                    <div class="mb-3"><label class="form-label" for="othersPictures">Autre(s) image(s)</label><input class="form-control" type="file" name="othersPictures[]" accept="image/*" multiple></div>
                    <div class="mb-3"><button class="btn btn-primary" type="submit">Send</button></div>
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