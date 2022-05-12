<?php
    /**
     * Anthonioz Benjamin
     * IFA-P3B
     * CFPT Informatique
     * TPI 2022
     * Infoshop which delete a product and the pictures associate
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
    if (isset($_GET["idProductToDelete"]))
    {
        deleteProductAndPictures(htmlspecialchars($_GET["idProductToDelete"]), true);
    }
    header("Location: " . $dir . "index.php");
    exit(0);