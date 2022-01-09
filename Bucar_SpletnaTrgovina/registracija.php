<html>
<head>
<link rel="stylesheet" type="text/css" href="./css/css.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<?php  include './glava.php'; ?>

<h4 style="text-align:center; padding-top:2%">Registracija</h4> <br />
<div class="prijava-form">



  <form classname="registracija" method="POST" style="width:70%">




      <div class="register-column-vmesni">
      <p>Uporabniško ime</p></br>
      <input  id="uporabnisko_ime" type="text" name="uporabnisko_ime" value=""  required>
      <br><br>
    </div>


    <div class="register-column-vmesni">
      <p>Ime in Priimek</p></br>
      <input  id="ime_priimek" type="text" name="ime_priimek" value=""  required>
      <br><br>
      </div>



      <div class="register-column-vmesni">
      <p>Naslov</p></br>
      <input  type="text" name="naslov" value="" required>
      <br><br>
      </div>


      <div class="register-column-vmesni">
      <p>Pošta</p></br>
      <input  type="text" name="posta" value="" required>
      <br><br>
      </div>

      <div class="register-column-vmesni">
      <p>E-pošta</p></br>
      <input   type="text" name="email" value="" required>
      <br><br>
    </div>
     
      


      <div class="register-column-vmesni">
      <p>Geslo</p></br>
      <input  type="password" class="form-control" id="password"  name="geslo" value="" required>
      <br><br>
      </div>

      <div class="register-column">
          
        <input type="radio" name="status" value="uporabnik"><p>Uporabnik</p></br>
      
      <input type="radio" name="status" value="admin" style="margin-left:1rem;" ><p>Admin</p></br>
      </div>
      
      
    
      <input type="submit" id="submit" class="gumb" name="submit" value="Registriraj se!" style="display:block; margin-left: auto; margin-right:auto; float:center"/>

  </form> 
</div>

<?php




if (isset($_POST['submit'])) {
    
    $dbhost = 'localhost';
    $user ='root';
    $pass ='';
    $db ='spletna_trgovina_bucar'; // databasename
    $conn=mysqli_connect("$dbhost","$user","$pass","$db");
    


    //pridobivanje podatkov iz forme
    $uporabnisko_ime = $_POST["uporabnisko_ime"];
    $ime_priimek = $_POST["ime_priimek"];
    $naslov = $_POST["naslov"];
    $posta = $_POST["posta"];
    $email = $_POST["email"];
    $geslo = $_POST["geslo"];

 
    $status_value = $_POST["status"];
 
    
    
    $sql = "SELECT uporabnisko_ime FROM uporabniki WHERE uporabnisko_ime='$uporabnisko_ime' ";
    
    $result = $conn->query($sql);
   
    if (mysqli_num_rows($result) == 0) {
        
        $sql = "INSERT INTO uporabniki ( uporabnisko_ime, geslo, ime_priimek, naslov, posta, email, statusAdmin )
            VALUES ( '$uporabnisko_ime', '$geslo', '$ime_priimek','$naslov', '$posta', '$email', '$status_value')";
        
        if($conn->query($sql) === TRUE){
          header("Location: prijava.php");
        }
        else{
          echo "Prišlo je do napake";
        }
        
        
           
    }
    else{
        
        echo "To uporabniško je že zasedeno. Poskusi znova";
        }

    
    $conn->close();
    exit;
  
}

   
?>
<?php  

include 'noga.php';
?>

</body>
</html>
