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

include './glava_admin.php';?>



<div class="prijava-form">
    <div class="prijava-form">
<h4>Dodaj Artikel:</h4>

<form id='prijava-form' method="POST">

<div class="register-column">

    <div class="register-column-vmesni">
        <p>Naziv: </p></br>
        <input  id="naziv" type="text" name="naziv" value=""  required>
        <br><br>
    </div>

    <div class="register-column-vmesni">
        <p>Vrsta: </p></br>
        <select class="select" id="vrsta" name="vrsta">
            <option value="1Oz">1Oz</option>
            <option value="2Oz">2Oz</option>
            <option value="3Oz">3Oz</option>
            <option value="4Oz">4Oz</option>
            <option value="5Oz">5Oz</option>
            <option value="6Oz">6Oz</option>
        </select>
    
    </div>


    <div class="register-column-vmesni">
        <p>Proizvajalec: </p></br>
        <input  type="text" name="proizvajalec" value="" required>
        <br><br>
    </div>

    <div class="register-column-vmesni">
        <p>Slika: </p></br>
        <input  type="text" name="slika" value="" required>
        <br><br>
    </div>

    <div class="register-column-vmesni">
        <p>Opis: </p></br>
        <input   type="text" name="opis" value="" required>
        <br><br>
    </div>
    

    <div class="register-column-vmesni">
        <p>Cena: </p></br>
        <input  type="number" class="form-control" id="cena"  name="cena" value="" required>
        <br><br>
    </div>

    
    
    
    <input type="submit" id="submit" class="gumb" name="submit" value="Dodaj!" />
</div>
</form> 
</div>
</div>
<?php




if (isset($_POST['submit'])) {
    
    $dbhost = 'localhost';
    $user ='root';
    $pass ='';
    $db ='spletna_trgovina_bucar'; // databasename
    $conn=mysqli_connect("$dbhost","$user","$pass","$db");
    


    //pridobivanje podatkov iz forme
    $naziv = $_POST["naziv"];
    $vrsta = $_POST["vrsta"];
    $proizvajalec = $_POST["proizvajalec"];
    $slika = $_POST["slika"];
    $opis = $_POST["opis"];
    $cena = $_POST["cena"];

 
    
    
    $sql = "SELECT naziv FROM artiklli WHERE naziv='$naziv' ";
    
    $result = $conn->query($sql);
   
    if (mysqli_num_rows($result) == 0) {
        
        $sql = "INSERT INTO artikli ( naziv, vrsta, proizvajalec, slika, opis, cena )
            VALUES ( '$naziv', '$vrsta', '$proizvajalec','$slika', '$opis', '$cena')";
        
        if($conn->query($sql) === TRUE){
          header("Location: ./domov_admin.php");
        }
        else{
          echo "Prišlo je do napake";
        }
        
        
           
    }
    else{
        
        echo "Ta izdelek že obstaja";
        }

    
    $conn->close();
    exit;
  
}

   
?>
<?php  

include '../noga.php';
?>

</body>

</html>