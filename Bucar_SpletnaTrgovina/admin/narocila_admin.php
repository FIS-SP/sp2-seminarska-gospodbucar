<!-- USPEŠNO GET NAROČILA -->

<html>

<head>
<link rel="stylesheet" type="text/css" href="../css/css_admin.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>


<?php  

 include 'glava_admin.php';

 if (isset($_COOKIE['prijava-admin'])) {
   

} else {

    header("Location: prijava.php");

}
?>


<div class="narocila_container">


<div class="tabela">
<table class="tabela-narocil">
<tr>
    <th>Izdelek</th>
    <th>Količina</th>
    <th>Uporabnik</th>
    <th>Datum</th>
</tr>

</div>
</div>

 <?php 
 
 $dbhost = 'localhost';
$user ='root';
$pass ='';
$db ='spletna_trgovina_bucar'; // databasename
$conn=mysqli_connect("$dbhost","$user","$pass","$db");

$sql = "SELECT * FROM narocila";
    
$result = $conn->query($sql);

if ($result!=null) {
    

    while ($row = $result->fetch_assoc()) {


        ?>
        <tr>
        <td class="tabela-link-brez"><a href="./izdelek_admin.php?artikel=<?php echo $row['artikel']?>"><?php echo $row['artikel']?></a></td>
        <td><?php echo $row['kolicina']?></td>
        <td class="tabela-link"><a href="./pregled_uporabnikov.php?uporabnisko_ime=<?php echo $row['uporabnisko_ime']?>"><?php echo $row['uporabnisko_ime']?></a></td>
        <td><?php echo $row['datum']?></td>
        </tr>
    
    
    <?php


    }

}

 ?>


</table>
</div>
</div>


</body>

</html>
