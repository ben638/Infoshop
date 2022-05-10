<?php
    /**
     * Anthonioz Benjamin
     * IFA-P3B
     * CFPT Informatique
     * TPI 2022
     * Infoshop login page
     * 
     */
    $dir = "./";
    session_start();
    if (isset($_SESSION["email"]))
    {
        header("Location: " . $dir . "profil.php");
        exit(0);
    }
    if (isset($_POST["email"]) && isset($_POST["password"]))
    {
        require $dir . "lib/functions.inc.php";
        $email = htmlspecialchars($_POST["email"]);
        $password = htmlspecialchars($_POST['password']);
        $userInfo = getUserInfo($email);
        if (!$userInfo)
        {
            $accountErrorMessage = "Votre compte n'existe pas";
        }
        else if ($email == $userInfo['email'] && password_verify($password, $userInfo['passwordHash']))
        {
            $_SESSION['email'] = $email;
            if ($userInfo["isAdmin"])
            {
                $_SESSION['isAdmin'] = true;
            }
            header('Location: profil.php');
            exit(0);
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Connexion - Shopinfo</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php 
        require "headers/navBar.php";
    ?>
    <main class="page login-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Connexion</h2>
                    <p>Veuillez vous connecter pour faire vos achats</p>
                </div>
                <form method="post" action="login.php">
                    <div class="mb-3"><label class="form-label" for="email">Email</label><input class="form-control item" type="email" id="email" name="email" required></div>
                    <div class="mb-3"><label class="form-label" for="password">Mot de passe</label><input class="form-control" type="password" id="password" name="password" required></div>
                    <div class="mb-3"><p>Vous n'avez pas de compte ? <a href="<?php echo $dir; ?>registration.php">Inscrivez-vous ici</a></p></div>
                    <div class="mb-3"><button class="btn btn-primary" type="submit">Connexion</button></div>
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