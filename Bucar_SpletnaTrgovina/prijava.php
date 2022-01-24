<!-- PRIJAVA --->

<!-- USPEŠNA REGISTRACIJA - OB PRAVILNI REGISTRACIJA VAS PREUSMERI V PRIJAVA'--->
<html>
<head>

<link rel="stylesheet" type="text/css" href="./css/css_admin.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
<?php  include './glava.php'; ?>

<div class="prijava-form">
    <div>
<h1>Prijava</h1>
<br>

<!-- Prijavna forma -->
<form method="POST">

   <p>Uporabnisko ime:</p><br>
  <input  id="uporabnisko_ime" type="text" name="uporabnisko_ime" value="" placeholder="...">
  <br><br> 
   <p>Geslo:</p> <br>
  <input  id="geslo" type="password" name="geslo" value="" placeholder="..." style="width:500px;">
  <br><br>

  <div class="prijava-submit">
  <input type="submit" name="submit" value="Prijava" />
  <input type="submit" name="registracija" value="Registracija" />

</div>
</form> 
</div>
</div>

<?php


// povezava s podatkovno bazo, da se preveri vnešeno uporabniško ime in geslo

$dbhost = 'localhost';
$user ='root';
$pass ='';
$db ='spletna_trgovina_bucar'; // databasename
$conn=mysqli_connect("$dbhost","$user","$pass","$db");

//ko uporablik klikne "Prijava" 

if (isset($_POST['registracija'])) {

    header("Location: registracija.php");

}


if (isset($_POST['submit'])) {


    $uporabnisko_ime = $_POST["uporabnisko_ime"];
    
    $geslo = $_POST["geslo"];
   
    //poizvedba, če je uporabnik admin
    $sql = "SELECT statusAdmin FROM uporabniki WHERE geslo='$geslo' AND uporabnisko_ime='$uporabnisko_ime'";
    
    $result = $conn->query($sql);
    
  
    
    
    if ($result!=null) {
        
        //ustvarjanje seje, da se bo na vsaki strani preverilo, če je uporabnik res prijavljen


        while ($row = $result->fetch_assoc()) {
            if($row['statusAdmin'] == 'admin'){
                session_start();
                $_SESSION['uporabnisko_ime'] = $uporabnisko_ime;
                setcookie("prijava-admin",$uporabnisko_ime, time() + 3600);

                header("Location: ./admin/domov_admin.php");
            }
            else{

                session_start();

                $_SESSION['prijavljen'] = true;
                $_SESSION['uporabnisko_ime'] = $uporabnisko_ime;


                
                setcookie("prijava",$uporabnisko_ime, time() + 3600);

                header("Location: ./prijavljen/domov_prijavljen.php");
            }
        }
    } else {
        echo "0 results";
    }
    
      
    $conn->close();
}


?>

<?php  

 include 'noga.php';
?>

</body>
</html>
