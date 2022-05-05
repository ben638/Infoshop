<?php
    /**
     * Anthonioz Benjamin
     * IFA-P3B
     * CFPT Informatique
     * TPI 2022
     * Footer du site Infoshop
     * 
     */
?>
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
    <div class="container"><a class="navbar-brand logo" href="index.php">Shopinfo</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="index.php">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="shoppingBasket.php">Panier</a></li>
                <?php
                    if (isset($dir))
                    {
                        if (!isset($_SESSION["email"]))
                        {
                            echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"" . $dir . "login.php\">Connexion</a></li>";
                            echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"" . $dir . "registration.php\">Inscription</a></li>";
                        }
                        else {
                            echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"" . $dir . "profil.php\">Profil</a></li>";
                            echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"" . $dir . "logout.php\">Déconnexion</a></li>";
                        }
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>