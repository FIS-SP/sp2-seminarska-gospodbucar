<html>
<head>

<link rel="stylesheet" type="text/css" href="../css/glava.css">

</head>
<body>
<div class="glava" >
<div class="nav-main">


<div class="nav-item">

<p><a href="/bucar_spletnatrgovina/prijavljen/domov_prijavljen.php">Trgovina</a></p>


</div>
<div class="nav-item">

<p><a href="/bucar_spletnatrgovina/prijavljen/narocila.php">Moja naročila</a></p>

</div>
<div class="nav-item">


<p><a href="./kontakt_prijavljen.php">Kontakt</a></p>



</div>

<div class="nav-item-odjava">

<?php session_start(); ?>

<p class="odjava"><a href="../odjava.php">Odjava (<?php echo $_SESSION['uporabnisko_ime'] ?>)</a></p>

<?php  ?>

</div>




</div>
</div>
</body>
</html>