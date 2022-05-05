<?php
    $dir = "./";
    session_start();
    $_SESSION = array();
    session_destroy();
    header("Location: " . $dir . "index.php");
    exit(0);
?>