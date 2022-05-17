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
    $updateProduct = false;
    // redirect if not admin
    if (!isset($_SESSION["email"]) || !isset($_SESSION["isAdmin"]))
    {
        header("Location: " . $dir . "index.php");
        exit(0);
    }
    //update or add a product
    if (isset($_POST["productName"]) && isset($_POST["description"]) && isset($_POST["priceInCHF"]) && isset($_POST["quantity"]) && isset($_FILES))
    {
        $productName = htmlspecialchars($_POST["productName"]);
        $description = htmlspecialchars($_POST["description"]);
        $priceInCHF = filter_input(INPUT_POST, "priceInCHF", FILTER_SANITIZE_NUMBER_FLOAT);
        $quantity = filter_input(INPUT_POST, "quantity", FILTER_SANITIZE_NUMBER_INT);
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
        if (isset($_POST["idProductToUpdate"]))
        {
            $idProductToUpdate = filter_input(INPUT_POST, "idProductToUpdate", FILTER_SANITIZE_NUMBER_INT);
            $success = updateProductPictures($idProductToUpdate, $productName, $description, $priceInCHF, $quantity, $hasOthersPictures, $defaultPicture, $othersPictures);
            echo "";
            header("Location: " . $dir . "addProduct.php?idProductToUpdate=$idProductToUpdate&success=$success");
            exit(0);
        }
        else {
            $success = addProductWithPictures($productName, $description, $priceInCHF, $quantity, $hasOthersPictures, $defaultPicture, $othersPictures, true);
        }
    }
    if (isset($_GET["idPictureToDelete"]))
    {
        $idProduct = filter_input(INPUT_GET, "idProduct", FILTER_SANITIZE_NUMBER_INT);
        deleteSelectedPicture(filter_input(INPUT_GET, "idPictureToDelete", FILTER_SANITIZE_NUMBER_INT));
        header("Location: " . $dir . "addProduct.php?idProductToUpdate=$idProduct");
        exit(0);
    }
    
    // show the information of a product if the page will update a product
    if (isset($_GET["idProductToUpdate"]))
    {
        $updateProduct = true;
        if (isset($_GET["success"]))
        {
            $success = htmlspecialchars($_GET["success"]);
        }
        $idProduct = filter_input(INPUT_GET, "idProductToUpdate", FILTER_SANITIZE_NUMBER_INT);
        $product = getProduct($idProduct);
        $pictures = getPictures($idProduct);
        if ($pictures[0]["isDefaultPicture"])
        {
            $defaultPicture = $pictures[0];
            $hasDefaultPicture = true;
            for ($i = 1; $i < count($pictures); $i++)
            {
                $othersPictures[$i-1] = $pictures[$i];
            }
        }
        else {
            $hasDefaultPicture = false;
            for ($i = 1; $i <= count($pictures); $i++)
            {
                $othersPictures[$i-1] = $pictures[$i-1];
            }
        }
    }
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
                <form method="post" enctype="multipart/form-data" action="addProduct.php" style="max-width: 800px;">
                    <?php 
                        if ($success && $updateProduct)
                        {
                            echo "<div class=\"mb-3\"><p>Le produit a bien été modifié</p></div>";
                        }
                        else if ($success && !$updateProduct)
                        {
                            echo "<div class=\"mb-3\"><p>Le produit a bien été ajouté</p></div>";
                        }
                        else if (!$success && $updateProduct)
                        {
                            echo "<div class=\"mb-3\"><p>Le produit n'a pu être modifié</p></div>";
                        }
                        else if (!$success && $updateProduct)
                        {
                            echo "<div class=\"mb-3\"><p>Le produit n'a pu être ajouté</p></div>";
                        }
                        if ($updateProduct)
                        {
                            echo "<input type=\"hidden\" name=\"idProductToUpdate\" value=\"$idProduct\">";
                        }
                    ?>
                    <div class="mb-3"><label class="form-label" for="productName">Nom du produit</label><input class="form-control" type="text" id="productName" name="productName" value="<?php echo $product["productName"]; ?>" required></div>
                    <div class="mb-3"><label class="form-label" for="description">Description</label><textarea class="form-control" id="description" name="description" style="height: 150px;" required><?php echo $product["description"]; ?></textarea></div>
                    <div class="mb-3"><label class="form-label" for="priceInCHF">Prix en CHF</label><input class="form-control" type="number" name="priceInCHF" step="0.01" value="<?php echo $product["priceInCHF"]; ?>" required></div>
                    <div class="mb-3"><label class="form-label" for="quantity">Quantité en stock</label><input class="form-control" type="number" name="quantity" step="1" value="<?php echo $product["remainingNumber"]; ?>" required></div>
                    <div>
                        <div class="mb-3">
                            <label class="form-label" for="defaultPicture">Image par défaut</label>
                            <?php 
                                if (!$hasDefaultPicture)
                                {
                                    echo "<input class=\"form-control\" type=\"file\" name=\"defaultPicture[]\" accept=\"image/*\" required>";
                                }
                            ?>
                        </div>
                        <div class="mb-3">
                            <?php 
                                if ($hasDefaultPicture)
                                {
                                    echo "<img src=\"" . PICTURES_FOLDER . $defaultPicture["fileName"] . "\" style=\"max-width: 400px\"><div class=\"mb-3\" style=\"margin-top: 10px;\"><a href=\"addProduct.php?idPictureToDelete=" . $defaultPicture["idPicture"] . "&idProduct=" . $idProduct . "\"><button class=\"btn btn-primary\" type=\"button\"><img src=\"assets/img/icons8-poubelle.svg\"></button></a></div>";
                                }
                            ?>
                        </div>
                        <div class="mb-3"><label class="form-label" for="othersPictures">Autre(s) image(s)</label><input class="form-control" type="file" name="othersPictures[]" accept="image/*" multiple></div>
                        <div class="mb-3">
                            <div class="mb-3">
                                <?php
                                    foreach ($othersPictures as $picture)
                                    {
                                        echo "<img src=\"" . PICTURES_FOLDER . $picture["fileName"] . "\" style=\"max-width: 400px\"><div class=\"mb-3\" style=\"margin-top: 10px;\"><a href=\"addProduct.php?idPictureToDelete=" . $picture["idPicture"] . "&idProduct=" . $idProduct . "\"><button class=\"btn btn-primary\" type=\"button\"><img src=\"assets/img/icons8-poubelle.svg\"></button></a></div>";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <?php 
                            if ($updateProduct)
                            {
                                echo "<button class=\"btn btn-primary\" type=\"submit\">Modifier</button>";
                            }
                            else {
                                echo "<button class=\"btn btn-primary\" type=\"submit\">Ajouter</button>";
                            }
                        ?>
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