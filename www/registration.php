<?php
    /**
     * Anthonioz Benjamin
     * IFA-P3B
     * CFPT Informatique
     * TPI 2022
     * Page d'inscription du site Infoshop
     * 
     */
    $dir = "./";
    session_start();
    if (isset($_SESSION["email"]))
    {
        header("Location: " . $dir . "profil.php");
        exit(0);
    }
    if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["passwordConfirm"]) && isset($_POST["streetName"]) && isset($_POST["streetNumber"]) && isset($_POST["postalCode"]) && isset($_POST["city"]))
    {
        require $dir . "lib/functions.inc.php";
        $email = htmlspecialchars($_POST["email"]);
        $passwordHash = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
        $passwordConfirm = htmlspecialchars($_POST['passwordConfirm']);
        $streetName = htmlspecialchars($_POST["streetName"]);
        $streetNumber = htmlspecialchars($_POST["streetNumber"]);
        $postalCode = htmlspecialchars($_POST["postalCode"]);
        $city = htmlspecialchars($_POST["city"]);
        $success = false;
        if (password_verify($passwordConfirm, $passwordHash))
        {
            $success = createUser($email, $passwordHash, $streetName, $streetNumber, $postalCode, $city);
        }
        else
        {
            $passwordMessageError = "Les mots de passe ne correspondent pas";
        }
        if ($success)
        {
            header("Location: " . $dir . "login.php");
            exit(0);
        }
        else {
            $emailErrorMessage = "L'email est déjà utilisé";
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Inscription - Shopinfo</title>
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
                    <h2 class="text-info">Inscription</h2>
                    <p>Nouveau visiteur ? Inscrivez-vous !</p>
                </div>
                <form method="post" action="registration.php">
                    <div class="mb-3"><label class="form-label" for="email">Email</label><input class="form-control item" type="email" id="email" name="email" required></div>
                    <div class="mb-3"><p><?php echo $emailErrorMessage ?></p></div>
                    <div class="mb-3"><label class="form-label" for="password">Mot de passe</label><input class="form-control item" type="password" id="password" name="password" required></div>
                    <div class="mb-3"><label class="form-label" for="passwordConfirm">Ré-entrer votre mot de passe</label><input class="form-control item" type="password" id="passwordConfirm" name="passwordConfirm" required></div>
                    <div class="mb-3"><p><?php echo $passwordMessageError ?></p></div>
                    <fieldset>
                        <legend>Adresse</legend>
                        <div class="mb-3"><label class="form-label" for="email">Rue</label><input class="form-control item" type="text" id="streetName" name="streetName" required>
                            <div class="mb-3"><label class="form-label" for="email">N°</label><input class="form-control item" type="text" id="streetNumber" name="streetNumber" required></div>
                        </div>
                        <div class="mb-3"><label class="form-label" for="email">Code postal</label><input class="form-control item" type="text" id="postalCode" name="postalCode" required></div>
                        <div class="mb-3"><label class="form-label" for="email">Ville</label><input class="form-control item" type="text" id="city" name="city" required></div>
                    </fieldset><button class="btn btn-primary" type="submit">S'inscrire</button>
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