<?php
    session_start();
    unset($_SESSION['uporabnisko_ime']);
    unset($_SESSION['prijavljen']);
    setcookie("prijava-admin", "", time() - 3600);
    header("Location: ../prijava.php");
?>
