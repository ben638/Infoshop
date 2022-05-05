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
<footer class="page-footer dark">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h5>Nos produits</h5>
                <ul>
                    <li><a href="index.php">Acceuil</a></li>
                    <li><a href="index.php">Panier</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                
                    <?php
                        if (isset($dir))
                        {
                            if (!isset($_SESSION["email"]))
                            {
                                echo "<h5>Identifiez-vous</h5><ul><li><a href=\"" . $dir . "registration.php\">Inscription</a></li><li><a href=\"" . $dir . "login.php\">Connexion</a></li>";
                            }
                            else {
                                echo "<h5>Bienvenue</h5><ul><li><a href=\"" . $dir . "profil.php\">Profil</a></li><li><a href=\"" . $dir . "profil.php\">Vos commandes</a></li>";
                            }
                        }
                    ?>
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