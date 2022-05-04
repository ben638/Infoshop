<?php
    $dir = "./";
    session_start();
    session_destroy();
    header("Location: " . $dir . "index.php");
    exit(0);
?>