<!-- USPEŠNO PREGLED UPORABNIKOV --->


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


// preverba, kater izdelek moramo preveriti
$uporabnisko_ime = $_GET['uporabnisko_ime'];

$dbhost = 'localhost';
$user ='root';
$pass ='';
$db ='spletna_trgovina_bucar'; // databasename
$conn=mysqli_connect("$dbhost","$user","$pass","$db");

$sql = "SELECT * FROM uporabniki WHERE uporabnisko_ime='$uporabnisko_ime'";
    
$result = $conn->query($sql);

if($result!=null){



    while ($row = $result->fetch_assoc()) {

    
        ?>
            
        
        <div class="uporabnik">
        <div class="uporabnik-podatki">

        <p>
        <?php echo $row['ime_priimek'] ?>
        </p>
        <p>
        <?php echo $row['naslov'] ?>
        </p>
        <p>
        <?php echo $row['posta'] ?>
        </p>
        <p>
        <?php echo $row['email'] ?>
        </p>
        <p>
        <?php echo $row['uporabnisko_ime'] ?>
        </p>


        </div>
        </div>
        

    
    

        <?php

    

    }


    }






?>

<?php  

 
?>

</body>



</html>
