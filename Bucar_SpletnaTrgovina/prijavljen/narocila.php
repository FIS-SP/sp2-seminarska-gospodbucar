<html>

<head>

<link rel="stylesheet" href="./css/css_admin.css">
</head>

<body>
    
<?php  

include './glava_prijava.php';

?>

<?php  

if (isset($_COOKIE['prijava'])) {
   
    

   
    $_SESSION['prijavljen'] = true;
    $uporabnisko_ime = $_COOKIE['prijava'];
    
    

} else {
   
   
    header("Location: prijava.php");
   
}?>

<div class="narocila_container" style="margin-left:20%; margin-top: 100px">

<table class="tabela-narocil">
<tr>
    <th>Izdelek</th>
    <th>Količina</th>
    <th>Uporabnik</th>
    <th>Datum</th>
</tr>


 <?php 
 
 $dbhost = 'localhost';
$user ='root';
$pass ='';
$db ='spletna_trgovina_bucar'; // baza
$conn=mysqli_connect("$dbhost","$user","$pass","$db");

$sql = "SELECT * FROM narocila WHERE uporabnisko_ime='$uporabnisko_ime' ORDER BY datum DESC LIMIT 10";
    
$result = $conn->query($sql);

if ($result!=null) {
    

    while ($row = $result->fetch_assoc()) {


        ?>
        <tr>
        <td><?php echo $row['artikel']?></td>
        <td><?php echo $row['kolicina']?></td>
        <td><?php echo $row['uporabnisko_ime']?></td>
        <td><?php echo $row['datum']?></td>
        </tr>
    
    
    <?php


    }

}

else{

    ?> 
    <p>Ni naročil</p>
    <?php

}

 ?>


</table>

</div>
<br /><br /><br /><br /><br /><br />
<?php 

include '../noga.php';
?>

</body>

</html>