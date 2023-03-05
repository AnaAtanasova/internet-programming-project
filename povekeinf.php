<!DOCTYPE html>
<html>
<head>
<title>Е-анкети</title>
<meta charset="utf-8">
<meta name="viewpoint" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body style="background-color:#872822"> 
<div class="container-fluid">
<div class="row">
<div class="col-sm-1" style="background-color:#d41b0f; height:70px;">
<img src="logo.png" height="70" width="80"></div>
<div class="col-sm-2" style="background-color:#d41b0f; height:70px;"><br>
<h1><font color="white"><i>Е-анкети</i></font></h1></div>
<div class="col-sm-6" style="background-color:#d41b0f; height:70px;"></div>
<div class="col-sm-3" style="background-color:#d41b0f; height:70px;"><br>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password);
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_select_db($conn,"korisnici");
session_start();
echo "<p style='color:white;font-size:20;' ><b>Добредојде, ".$_SESSION['name']." " .$_SESSION['surname']."  </b>";
$username=$_SESSION['username'];
?>
<a href="pocetna2.php" class="btn btn-info" role="button">LOG OUT</a></p>
</div>
</div>
<div class="row">
<div class="col" style="background-color:#d41b0f; height:70px;">
<ul class="nav justify-content-center">
<li class="nav-item"><a class="nav-link" href="pocetna2Logiran.php"><font color="white">Почетна</font></a></li>
<li class="nav-item"><a class="nav-link" href="anketi.php"><font color="white">Пополни анкета</font></a></li>
<li class="nav-item"><a class="nav-link" href="kreiraj.php"><font color="white">Креирај анкета</font></a></li>
<li class="nav-item"><a class="nav-link" href="profilLogiran.php"><font color="white">Профил</font></a></li>
<li class="nav-item"><a class="nav-link" href=""><font color="white"></font></a></li>
<li class="nav-item"><a class="nav-link" href=""><font color="white"></font></a></li>
<li class="nav-item"><a class="nav-link" href=""><font color="white"></font></a></li>
</ul>
<hr  style="background-color:white;">
</div>
</div>
<div class="row">
<div class="col-sm-2" style="background-color:#872822; height:150px;">
<br>
<h3 style="color:white;font-size:30; align:left;" ><b>Мој профил</h3></b>
<hr style="background-color:white">
<a href="profilLogiran.php" class="btn btn-info" role="button">Назад</a>
</div>
<div class="col-10" style="background-color:#872822; height:150px;"></div>
</div>
<div class="row">
<div class="col-sm-3" style="background-color:#872822; height:50px;"></div>
<div class="col-sm-7" style="background-color:#872822; height:50px;">
<h3 style="color:white" align="left">Детали за Анкетата</h3>
</div>
<div class="col-2" style="background-color:#872822; height:50px;"></div>
</div>
<form action=" " method="post">
<?php
			 $brojacp=1;
		$idAnketa=$_SESSION["kojaAnketa"];
		$sql="SELECT * FROM anketi where id_anketa='$idAnketa'";
			  $result=mysqli_query($conn, $sql);
	  if(!$result)
				 { 
			         echo "<h3 style='color:red'>Error 1 </h3>";
				 }
				 $rez=mysqli_fetch_array($result);
				 echo "<div class='row'>
<div class='col-sm-3' style='background-color:#872822; height:80px;'></div>
<div class='col-sm-7' style='background-color:white; height:80px;'><br><h4 style='color:#cfc491' >Име на анкета: ".$rez['naslov']."</h4></div>
<div class='col-2' style='background-color:#872822; height:80px;'></div></div>";
				 $_SESSION["naslov"]=$rez['naslov'];
	$sql2="SELECT * FROM prasanja AS p, anketi AS a, anketaprasanja AS ap
      WHERE p.id_prasanje=ap.id_prasanje and a.id_anketa=ap.id_anketa and ap.id_anketa='$idAnketa'";
	  $result2=mysqli_query($conn, $sql2);
	  if(!$result2)
				 { 
			         echo "<h3 style='color:red'>Error 1 </h3>";
				 }
     $sql3="SELECT * FROM odgovori AS o, anketi AS a, anketaprasanja AS ap, prasanja AS p
      WHERE p.id_prasanje=ap.id_prasanje and o.id_prasanje=p.id_prasanje and ap.id_anketa='$idAnketa'"; 
$result3=mysqli_query($conn, $sql3);
if(!$result3)
				 { 
			         echo "<h3 style='color:red'>Error 3</h3>";
				 }
	
				 while($rez2=mysqli_fetch_array($result2))
				 {
					 $brojac2=1;
					 $prasanjeID=$rez2['id_prasanje'];
					 $prasanjeTelo=$rez2['prasanje'];
					 						 echo "<div class='row'>
<div class='col-sm-3' style='background-color:#872822; height:200px;'></div>
<div class='col-sm-1' style='background-color:white; height:200px;'>
<button type='submit' class='btn btn-info' name='izb$brojacp' value='$prasanjeID'>Избриши</button></div>
<div class='col-sm-6' style='background-color:white; height:200px;'><br><p style='font-size:30;' ><b>Прашање: ".$prasanjeTelo."</b></p>";
                        $brojacp++;
					 while($brojac2%4!=0 && $rez3=mysqli_fetch_array($result3))
					 {
						 $odgovor=$rez3['odgovor'];
						 $odgovorID=$rez3['id_odgovor'];
						 echo "<p>Одговорот: ".'"'.$odgovor.'"'." е одбран ";
						 $sql9="SELECT COUNT(*) AS c FROM korisnickiodg WHERE id_anketa='$idAnketa' and id_odgovor='$odgovorID'";
						 $result9=mysqli_query($conn, $sql9);
                         if(!$result9)
				          { 
			                   echo " 0 пати.</p>";
				           }
						   else 
						   {
							   $rez9=mysqli_fetch_array($result9);
							   $count=$rez9['c'];
							   echo " $count пати.</p>";
						   }
				 
						 $brojac2++; 
						 
					 }
					 echo "</div>
<div class='col-2' style='background-color:#872822; height:200px;'></div></div>";
				 }
				 
				 
				 $z = 1; 
while($z < $brojacp+1)
{
	if(isset($_POST["izb$z"]))
	{
					$ID=$_POST["izb$z"];
			
   $query5 = mysqli_query($conn, "DELETE FROM korisnickiodg where id_prasanje='$ID'")
   or die (mysqli_error($conn));

 $query6 = mysqli_query($conn, "DELETE FROM odgovori where id_prasanje='$ID'")
   or die (mysqli_error($conn));
   
    $query8 = mysqli_query($conn, "DELETE FROM anketaprasanja where id_prasanje='$ID'")
   or die (mysqli_error($conn));
			

 $query7 = mysqli_query($conn, "DELETE FROM prasanja where id_prasanje='$ID'")
   or die (mysqli_error($conn));

		
	}
	 $z++;
}
?>
<div class="row">
<div class="col-sm-3" style="background-color:#872822; height:50px;"></div>
<div class="col-sm-5" style="background-color:white; height:50px;"></div>
<div class="col-sm-2" style="background-color:white; height:50px;">
<button type="submit" class="btn btn-info" name="dodadi" value="$idAnketa">Додади прашање</button></div>
<div class="col-sm-2" style="background-color:#872822; height:200px;"></div></div>
<div class="row" style="background-color:#872822; height:40px;"></div>
<?php
if(isset($_POST['dodadi']))
{
	echo "<script type='text/javascript'>
           window.location = 'dodadiPrasanje.php'
      </script>"; 

}
?>
</div>
</form>
</body></html>