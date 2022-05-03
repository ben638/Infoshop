<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - Shopinfo</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#">Shopinfo</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="catalog-page.html">Acceuil</a></li>
                    <li class="nav-item"><a class="nav-link" href="shopping-cart.html">panier</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.html">Connexion</a></li>
                    <li class="nav-item"><a class="nav-link active" href="registration.html">Inscription</a></li>
                    <li class="nav-item"><a class="nav-link" href="registration-1.html">Profil</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Inscription</h2>
                    <p>Nouveau visiteur ? Inscrivez-vous !</p>
                </div>
                <form>
                    <div class="mb-3"><label class="form-label" for="name">Email</label><input class="form-control item" type="text" id="email"></div>
                    <div class="mb-3"><label class="form-label" for="password">Mot de passe</label><input class="form-control item" type="password" id="password"></div>
                    <div class="mb-3"><label class="form-label" for="email">Ré-entrer votre mot de passe</label><input class="form-control item" type="password" id="passwordConfirm"></div>
                    <fieldset>
                        <legend>Adresse</legend>
                        <div class="mb-3"><label class="form-label" for="email">Rue</label><input class="form-control item" type="text" id="streetName">
                            <div class="mb-3"><label class="form-label" for="email">N°</label><input class="form-control item" type="text" id="streetNumber"></div>
                        </div>
                        <div class="mb-3"><label class="form-label" for="email">Code postal</label><input class="form-control item" type="text" id="postalCode"></div>
                        <div class="mb-3"><label class="form-label" for="email">Ville</label><input class="form-control item" type="text" id="city"></div>
                    </fieldset><button class="btn btn-primary" type="submit">S'inscrire</button>
                </form>
            </div>
        </section>
    </main>
    <footer class="page-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Sign up</a></li>
                        <li><a href="#">Downloads</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                        <li><a href="#">Forums</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2022 Copyright Text</p>
        </div>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>