<html>

<head>
<link rel="stylesheet" type="text/css" href="../css/css_admin.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<?php  include './glava_admin.php'; ?>
<div class="prijava-form">
    <div>
<h4>Odstrani Artikel:</h4> <br>


<form id='izdelek' method="POST">
  <div class="register-column">
  <div class="register-column-vmesni">
   <p>ID: </p></br>
  <input  id="id" type="number" name="id" value=""  required>
  <br><br>
</div>



 
  <input type="submit" id="submit" class="gumb" name="submit" value="Odstrani!" />
  
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
    $id = $_POST["id"];


        
    $sql = "DELETE FROM artikli WHERE id='$id'";
       
        
        if ($conn->query($sql) === TRUE) {
            echo "Artikel je bil uspešno odstranjen";
            header("Location: ./domov_admin.php");
          } else {
            echo "Napaka pri odstranjevanju artikla ->: " . $conn->error;
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