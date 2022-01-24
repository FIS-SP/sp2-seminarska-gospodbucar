<!-- USPEŠNO PRIJAVLJEN USER --->
<!-- USPEŠNO PRIKAZANI FILTRI --->


<html>

<head>
<link rel="stylesheet" type="text/css" href="../css/css.css">
</head>

<body>

<?php  

 include './glava_prijava.php';
?>

<div class="home-main">

<?php

// preverba, če je uporabnik prijavljen



if (isset($_SESSION['prijavljen']) && $_SESSION['prijavljen'] == true) {
   
    

   
    $_SESSION['prijavljen'] = true;
    
    

} else {
   
   
    header("Location: ../prijava.php");

    
   
   
}





?>

<br><br>

<form method="POST">
    

<div class="home-main-iskanje">
<div class="home-main-iskanje-item1">
  <input  id="iskanje" type="text" name="iskanje" value="" placeholder="Iskanje...">
  <br>
</div>
<div class="home-main-iskanje-item2">
  <input type="submit" name="submit" value="Išči" />
</div>
</div>

<div class="home-main-page">
<div class="home-main-page-filtri" style="background-color: #7FB3D5;">

</form> 

<h4>Filtriraj rezutate: </h4>
<form method="POST">

<h5> Teža v Oz</h5>

<div class="inputCheck">
<p>1Oz</p>
<input type="checkbox" name="vrsta[]" value="1OZ">
</div>

<div class="inputCheck">
<p>2Oz</p>
<input type="checkbox" name="vrsta[]" value="2OZ">
</div>

<div class="inputCheck">
<p>3Oz</p>
<input type="checkbox" name="vrsta[]" value="3OZ">
</div>

<div class="inputCheck">
<p>4Oz</p>
<input type="checkbox" name="vrsta[]" value="4OZ">
</div>
<div class="inputCheck">
<p>5Oz</p>
<input type="checkbox" name="vrsta[]" value="5OZ">
</div>
<div class="inputCheck">
<p>6Oz</p>
<input type="checkbox" name="vrsta[]" value="6OZ">
</div>



<h5>Kovnica</h5>
<div class="inputCheck">
<p>The Perth Mint</p>
<input type="checkbox" name="proizvajalec[]" value="The Perth Mint">
</div>

<div class="inputCheck">
<p>Kanadian mint</p>
<input type="checkbox" name="proizvajalec[]" value="Kanadian mint">
</div>

<div class="inputCheck">
<p>China Mint</p>
<input type="checkbox" name="proizvajalec[]" value="China Mint">
</div>

<div class="inputCheck">
<p>Armenian mint</p>
<input type="checkbox" name="proizvajalec[]" value="Armenian mint">
</div>

<div class="inputCheck">
<p>American mint</p>
<input type="checkbox" name="proizvajalec[]" value="American mint">
</div>




<h5>Cena</h5>

<select name="cena" id="cena" style="font-size:15px">
    <option value="Najnizja">Naraščajoče</option>
    <option value="Najdrazja">Padajoče</option>
</select>
<br><br>
<input type="submit" name="filtri" value="Filtriraj">
</form>

</div>
<div  class="home-main-page-izdelki">
<?php 

$dbhost = 'localhost';
$user ='root';
$pass ='';
$db ='spletna_trgovina_bucar'; // databasename
$conn=mysqli_connect("$dbhost","$user","$pass","$db");

$sql = "SELECT * FROM artikli";
    
$result = $conn->query($sql);


if (isset($_POST['filtri'])) {


    $sql_filtri = "SELECT * FROM artikli";

    //filter za vsako vrsto ki se je izbrala
    if(isset($_POST['vrsta'])){

        $vrsta = $_POST["vrsta"];
        
        if(!empty($vrsta)) 

        {
            $sql_filtri .= " WHERE vrsta='";
        $N = count($vrsta);

        for($i=0; $i < $N; $i++)
        {
            $sql_filtri .= $vrsta[$i] . "'";

            if(($i+1)<$N){
                $sql_filtri .= " OR vrsta='";
            }
            
        }
        
        }
    }

    //filter za vsako firmo ki se je izbrala
    if(isset($_POST['proizvajalec'])){

        $proizvajalec = $_POST["proizvajalec"];

        if(!empty($proizvajalec)) 

        {
            if(!empty($vrsta)){
                $sql_filtri .= " AND proizvajalec='";
            }else{
                $sql_filtri .= " WHERE proizvajalec='";
            }
            
        $N = count($proizvajalec);

        for($i=0; $i < $N; $i++)
        {
            $sql_filtri .= $proizvajalec[$i] . "'";

            if(($i+1)<$N){
                $sql_filtri .= " OR proizvajalec='";
            }
            
        }
        
        }
    }

    if(isset($_POST['cena'])){

        $cena = $_POST["cena"];

        if(!empty($cena)) 

        {
            if($cena == "Najnizja"){
                $sql_filtri .= " ORDER BY cena ASC";
            }
            if($cena == "Najdrazja"){
                $sql_filtri .= " ORDER BY cena DESC";
            }
            

        }
    }

    //echo $sql_filtri;

    $result_filtri = $conn->query($sql_filtri);

    ?><br><br><?php

    if ($result_filtri!=null) {
    

        while ($row = $result_filtri->fetch_assoc()) {

            ?>
            
            <div class="home-main-page-izdelki-posamezni">
            
            <img src="../slike/<?php echo $row['slika']?>.jpg" alt="slika" width="200px" height="200px"/>
            <div class="ime-izdelka">
            <h4>
            <a href="/bucar_spletnatrgovina/artikel.php?naziv=<?php echo $row['naziv']?>"><?php echo $row['naziv']?></a>
            </h4>

            <p>
            <?php echo $row['proizvajalec'] ?>
            </p>

             <h3>
            <a>
            <?php echo $row['cena'] ?>
            €
            </a>
            </h3>
            
            
           
            </div>
            </div>

            <?php

        }
      

        }
    }




else if (isset($_POST['submit'])) {

    $iskanje = $_POST["iskanje"];
    

    $sql2 = "SELECT * FROM artikli WHERE naziv LIKE '%{$iskanje}%'";
    
    $result2 = $conn->query($sql2);

    if ($result2!=null) {
        
        //ustvarjanje sej, da se bo na vsaki strani preverilo, če je uporabnik res prijavljen


       

        while ($row = $result2->fetch_assoc()) {

            

            ?>
            
            <div class="home-main-page-izdelki-posamezni">
            
            <img src="../slike/<?php echo $row['slika']?>.jpg" alt="slika" width="200px" height="200px"/>
            <div class="ime-izdelka">
            <h4>
            
            <a href="/bucar_spletnatrgovina/artikel.php?naziv=<?php echo $row['naziv']?>"><?php echo $row['naziv']?></a>
           
            </h4>

            <p>
            <?php echo $row['proizvajalec'] ?>
            </p>

             <h3>
            <a>
            <?php echo $row['cena'] ?>
            €
            </a>
            </h3>
            
            
           
            </div>
            </div>

            <?php
        }
      

        }

       
    
} else{

   


    if ($result!=null) {
    


    

        while ($row = $result->fetch_assoc()) {
            ?>
            
            <div class="home-main-page-izdelki-posamezni">
            
            <img src="../slike/<?php echo $row['slika']?>.jpg" alt="slika" width="200px" height="200px"/>
            <div class="ime-izdelka">
            <h4>
            <a href="/bucar_spletnatrgovina/artikel.php?naziv=<?php echo $row['naziv']?>"><?php echo $row['naziv']?></a>
            </h4>

            <p>
            <?php echo $row['proizvajalec'] ?>
            </p>

             <h3>
            <a>
            <?php echo $row['cena'] ?>
            €
            </a>
            </h3>
            
            
           
            </div>
            </div>

            <?php
        }
       
        
    }


}





?>
</div>
</div>

</body>

<?php  

 include '../noga.php';
?>

</html>
