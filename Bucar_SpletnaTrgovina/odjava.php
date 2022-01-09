<?php
    session_start();
    unset($_SESSION['prijavljen']);
    unset($_SESSION['uporabnisko_ime']);
    setcookie("prijava", "", time() - 3600);
    header("Location: ./prijava.php");
?>
