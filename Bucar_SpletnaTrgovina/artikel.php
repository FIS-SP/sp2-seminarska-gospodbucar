<html>


<head>
<link rel="stylesheet" type="text/css" href="./css/css.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>

<body>

<?php  



if (isset($_COOKIE['prijava'])) {
   
 $up_ime = $_COOKIE['prijava'];

} else {
   
   
    header("Location: /prijava.php");

    
   
   
}

include './prijavljen/glava_prijava.php';

// <a href="/bucar_spletna_trgovina/artikel.php?artikel=<?php echo $row['naziv']">


// preverba, kateri izdelek moramo preveriti
$naziv = $_GET['naziv'];

$dbhost = 'localhost';
$user ='root';
$pass ='';
$db ='spletna_trgovina_bucar'; // databasename
$conn=mysqli_connect("$dbhost","$user","$pass","$db");

$sql = "SELECT * FROM artikli WHERE naziv='$naziv'";
    
$result = $conn->query($sql);

if($result!=null){



    while ($row = $result->fetch_assoc()) {

    
        ?>
            
        <div class="izdelek">
        <div class="izdelek-slika">
        <img src="/bucar_spletnatrgovina/Slike/<?php echo $row['slika']?>.jpg" alt="slika" width="200px" height="200px"/>
        </div>
        <div class="izdelek-podatki">

        <p>
        <?php echo $row['proizvajalec'] ?>
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
        <p>Vključen DDV<br>
     </p>

        <form method="POST">

            <br><br>
            <h3>KOLIČINA</h3>
            <select name="kolicina" id="kolicina">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
            <br><br>
            <input type="submit" name="naroci" value="Naroči">
        </form>
    

        <?php

    if (isset($_POST['naroci'])) {

        

        if(isset($_POST['kolicina'])){

            
            $kolicina = $_POST["kolicina"];
            $uporabnisko_ime =  $_SESSION['uporabnisko_ime'];

            $sql = "INSERT INTO  narocila (uporabnisko_ime, artikel, kolicina, datum) VALUES ('$uporabnisko_ime','$naziv','$kolicina', now())";
            
    
            if ($conn->query($sql) === TRUE) {
                header("Location: /bucar_spletnatrgovina/prijavljen/narocila.php");
              } else {
                echo "Prišlo je do napake.";
              }
              
            $conn->close();

            

        }
        else{
            echo "Vsi parametri niso izbrani.";
        }

    }

    }


    }


?>

<?php  

 include './noga.php';
?>

</body>



</html>