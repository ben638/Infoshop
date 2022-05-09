<?php
    /**
     * Anthonioz Benjamin
     * IFA-P3B
     * CFPT Informatique
     * TPI 2022
     * Infoshop navbar which is used in all pages
     * 
     */
    $dir = "./";
    session_start();
    $_SESSION = array();
    session_destroy();
    header("Location: " . $dir . "index.php");
    exit(0);
?>