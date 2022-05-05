<?php
    /**
     * Anthonioz Benjamin
     * IFA-P3B
     * CFPT Informatique
     * TPI 2022
     * Page de profil du site Infoshop
     * 
     */
    $dir = "./";
    session_start();
    if (!isset($_SESSION["email"]))
    {
        header("Location: " . $dir . "login.php");
        exit(0);
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profil - Shopinfo</title>
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
    <main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Profil</h2>
                    <p>Vous pouvez modifier vos informations personnelles ici</p>
                </div>
                <form>
                    <div class="mb-3"><label class="form-label" for="name">Name</label><input class="form-control item" type="text" id="name"></div>
                    <div class="mb-3"><label class="form-label" for="password">Password</label><input class="form-control item" type="password" id="password"></div>
                    <div class="mb-3"><label class="form-label" for="email">Email</label><input class="form-control item" type="email" id="email"></div><button class="btn btn-primary" type="submit">Sign Up</button>
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