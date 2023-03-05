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

<div class="row"style="background-color:#872822; height:20px;"></div>
<div class="row" >
<div class="col-sm-2" style="background-color:#872822; height:150px;"></div>
<div class="col-sm-1" style="background-color:white; height:150px;"></div>
<div class="col-sm-6" style="background-color:white; height:150px;">
<br><br>
<div class = "shadow p-3 mb-5 bg-white rounded">
<h2 style="color:#8a8a8a"><center>Креирај нова анкета</center></h2>
</div></div>
<div class="col-sm-1" style="background-color:white;height:150px;"></div>
<div class="col-sm-2" style="background-color:#872822; height:150px;"></div>
</div>

<div class="row">
<div class="col-sm-2" style="background-color:#872822; height:80px;"></div>
<div class="col-sm-7" style="background-color:white; height:80px;">
<br>
<h3 style="color:#cfc491">Податоци за анкетата</h3>
</div>
<div class="col-sm-1" style="background-color:white; height:80px;">
<br>
<a href="kreiraj.php" class="btn btn-info" role="button">Назад</a>
</div>

<div class="col-sm-2" style="background-color:#872822; height:80px;"></div>
</div>

<form action=" " method="post">
<?php
$brojac=1;
$imeCB=1;
$imeRB=1;
$daliEradio=0;
$anketa_id=$_SESSION["anketa_id"];
$sql="SELECT * FROM prasanja AS p, anketi AS a, anketaprasanja AS ap
      WHERE p.id_prasanje=ap.id_prasanje and a.id_anketa=ap.id_anketa and ap.id_anketa='$anketa_id' ";
	  $result=mysqli_query($conn, $sql);
	  if(!$result)
				 { 
			         echo "<h3 style='color:red'>Error 1 </h3>";
				 }
$sql2="SELECT vid FROM prasanja AS p, anketi AS a, anketaprasanja AS ap
      WHERE p.id_prasanje=ap.id_prasanje and ap.id_anketa='$anketa_id'";
	  $result2=mysqli_query($conn, $sql2);
	  if(!$result2)
				 { 
			         echo "<h3 style='color:red'>Error 2 </h3>";
				 }
$sql3="SELECT * FROM odgovori AS o, anketi AS a, anketaprasanja AS ap, prasanja AS p
      WHERE p.id_prasanje=ap.id_prasanje and o.id_prasanje=p.id_prasanje and ap.id_anketa='$anketa_id'"; 
$result3=mysqli_query($conn, $sql3);
if(!$result)
				 { 
			         echo "<h3 style='color:red'>Error 3</h3>";
				 }
				  while($rez=mysqli_fetch_array($result))
				 {
				 echo "<div class='row'>
<div class='col-sm-2' style='background-color:#872822; height:180px;'></div>
<div class='col-sm-8' style='background-color:white; height:180px;'><div class = 'shadow p-3 mb-5 bg-white rounded'><p style='color:#b8b8b8;font-size:28;'><b>$brojac.".$rez['prasanje']."</b></p>";
				 $rez2=mysqli_fetch_array($result2);
				 $brojac2=1;
				 
				  $_SESSION["idprasanje"]=$rez['id_prasanje'];
				 while($brojac2%4!=0 && $rez3=mysqli_fetch_array($result3))
				 {
				$_SESSION["idodgovor"]=$rez3['id_odgovor'];
				$idodg=$_SESSION["idodgovor"];
				 $pr=$rez2['vid'];
				 if($pr=="checkbox")
				 {
					 echo "<input type='checkbox' name='c$imeCB' value='$idodg'/>".$rez3['odgovor']."<br>";
					 $imeCB++;
				 }
			     else if($pr=="radiobox")
				 {
					 echo "<input type='radio' name='r$imeRB' value='$idodg'/>".$rez3['odgovor']."<br>";
					 $daliEradio=1;
				 }
			 $brojac2++;
			 }
				 echo "<br></div></div>
<div class='col-sm-2' style='background-color:#872822; height:180px;'></div>
</div>";
				 $brojac++;
				 if($daliEradio==1)
				 {
					 $daliEradio=0;
				     $imeRB++;
				 }
				 }
?>
<div class="row"style="background-color:#872822; height:20px;"></div>
</div>
</form>
</body></html>