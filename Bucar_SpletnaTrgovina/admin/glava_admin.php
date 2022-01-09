<html>
<head>

<link rel="stylesheet" type="text/css" href="../css/glava_admin_css.css">

</head>
<body>
<div class="admin_glava">
<div class="nav-item">

<p><a href="./domov_admin.php">Domov</a></p>


</div>
<div class="nav-item">

<p><a href="./narocila_admin.php">Naročila</a></p>

</div>

<div class="nav-item">

<p><a href="./dodaj_Artikel_admin.php">Dodaj artikel</a></p>

</div>

<div class="nav-item">

<p><a href="./update_artikel_admin.php">Posodobi artikel</a></p>

</div>

<div class="nav-item">

<p><a href="./odstrani_artikel_admin.php">Odstrani artikel</a></p>

</div>


<div class="odjava">

<?php session_start(); ?>

<p class="odjava"><a href="./odjava_admin.php">Odjava (<?php echo $_SESSION['uporabnisko_ime'] ?>)</a></p>

<?php  ?>

</div>

</div>


</div>
</div>
</body>
</html>