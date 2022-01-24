<!-- USPEŠNO GET ARTIKEL ADMIN --->

<html>


<head>
<link rel="stylesheet" type="text/css" href="../css/css_admin.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

<?php  



if (isset($_COOKIE['prijava-admin'])) {
   


} else {
   
   
    header("Location: ../prijava.php");

    
   
   
}

include './glava_admin.php';

// <a href="/bucar_spletna_trgovina/artikel.php?artikel=<?php echo $row['naziv']">


// preverba, kateri izdelek moramo preveriti
$artikel = $_GET['artikel'];

$dbhost = 'localhost';
$user ='root';
$pass ='';
$db ='spletna_trgovina_bucar'; // databasename
$conn=mysqli_connect("$dbhost","$user","$pass","$db");

$sql = "SELECT * FROM artikli WHERE naziv='$artikel'";
    
$result = $conn->query($sql);

if($result!=null){



    while ($row = $result->fetch_assoc()) {

    
        ?>
            
        <div class="izdelek">
        <div class="izdelek-slika">
        <img src="../slike/<?php echo $row['slika']?>.jpg" alt="slika" width="200px" height="200px"/>
        </div>
        <div class="izdelek-podatki">

        <p>
        <?php echo $row['proizvajalec'] ?>
        </p>
        <p>
        <?php echo $row['vrsta'] ?>
        </p>
        <h4>
        <a>
        <?php echo $row['naziv'] ?>
        
        </a>
        </h4>

        

         <h3>
        <a style="font-size:30;">
        <?php echo $row['cena'] ?>
        €
        
        </a>
        </h3>
        

    
    

        <?php

    

    }


    }






?>

<?php  

 
?>

</body>



</html>
