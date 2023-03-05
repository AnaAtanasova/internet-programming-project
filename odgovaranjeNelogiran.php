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
<body> 
<div class="container-fluid">
<div class="row">
<div class="col-sm-1" style="background-color:#d41b0f; height:70px;">
<img src="logo.png" height="70" width="80"></div>
<div class="col-sm-2" style="background-color:#d41b0f; height:70px;"><br>
<h1><font color="white"><i>Е-анкети</i></font></h1></div>
<div class="col-sm-7" style="background-color:#d41b0f; height:70px;"></div>
<div class="col-2" style="background-color:#d41b0f; height:70px;"><br>
<a href="login.php" class="btn btn-info" role="button">LOG IN</a>
<a href="register.php" class="btn btn-info" role="button">SIGN UP</a></div>
</div>
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
?>
<div class="row">
<div class="col" style="background-color:#d41b0f; height:70px;">
<ul class="nav justify-content-center">
<li class="nav-item"><a class="nav-link" href="pocetna2.php"><font color="white">Почетна</font></a></li>
<li class="nav-item"><a class="nav-link" href="anketiNelogiran.php"><font color="white">Пополни анкета</font></a></li>
<li class="nav-item"><a class="nav-link" href="kreirajNelogiran.php"><font color="white">Креирај анкета</font></a></li>
<li class="nav-item"><a class="nav-link" href="profil.php"><font color="white">Профил</font></a></li>
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
<div class="col-sm-1" style="background-color:#white; height:150px;"></div>
<div class="col-sm-6" style="background-color:white; height:150px;">
<br><br>
<div class = "shadow p-3 mb-5 bg-white rounded">
<?php
	    $anketa_id=$_SESSION["idanketa"];
		$query = mysqli_query($conn, "SELECT * FROM anketi WHERE id_anketa='$anketa_id'")
   or die (mysqli_error($conn));
   $row=mysqli_fetch_row($query);
   $naslov=$row[2];
   echo "<h2 style='color:#8a8a8a'><center>$naslov</center></h2>";
?>
</div></div>
<div class="col-sm-1" style="height:150px;"></div>
<div class="col-sm-2" style="background-color:#872822; height:150px;"></div>
</div>

<form action=" " method="post">
<form action=" " method="post">

<div class="row">
<div class="col-sm-2" style="background-color:#872822; height:80px;"></div>
<div class="col-sm-6" style="background-color:white; height:80px;">
<br>
<h3 style="color:#cfc491">Прашања:</h3>
</div>
<div class="col-sm-2" style="background-color:white; height:80px;">
<br>
<a href="anketiNelogiran.php" class="btn btn-info" role="button">Назад</a>
<button type='submit' class='btn btn-info' name='b1' >Зачувај</button>
</div>

<div class="col-sm-2" style="background-color:#872822; height:80px;"></div>
</div>


<?php
$brojac=1;
$imeCB=1;
$imeRB=1;
$daliEradio=0;
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
<?php
if(isset($_POST['b1']))
{ 
$sql="SELECT * FROM prasanja AS p, anketi AS a, anketaprasanja AS ap
      WHERE p.id_prasanje=ap.id_prasanje and a.id_anketa=ap.id_anketa and ap.id_anketa='$anketa_id'";
	  $result=mysqli_query($conn, $sql);
	  if(!$result)
				 { 
			         echo "<h3 style='color:red'>Error 1 </h3>";
				 }
     $sql3="SELECT * FROM odgovori AS o, anketi AS a, anketaprasanja AS ap, prasanja AS p
      WHERE p.id_prasanje=ap.id_prasanje and o.id_prasanje=p.id_prasanje and ap.id_anketa='$anketa_id'"; 
$result3=mysqli_query($conn, $sql3);
if(!$result3)
				 { 
			         echo "<h3 style='color:red'>Error 3</h3>";
				 }
				 $imeCB=1;
                 $imeRB=1;
				 $daliEradio=0;
				 while($rez=mysqli_fetch_array($result))
				 {
					 $brojac9=0;
					 $pr=$rez['vid'];
					 $brojac2=1;
					 while($brojac2%4!=0 && $rez3=mysqli_fetch_array($result3))
					 {
						 if($pr=="checkbox")
					      {
					      	 if(isset($_POST["c$imeCB"]))
							 {
								 $id_pras=$rez['id_prasanje'];
								 $id_odg=$_POST["c$imeCB"];
								 $odg=$rez3['odgovor'];
								 $sql5="INSERT INTO korisnickiodg(id_anketa,id_prasanje,id_odgovor,odgovor)
                                   VALUES ('$anketa_id','$id_pras','$id_odg','$odg');";
	                               if (!mysqli_query($conn, $sql5)) 
	                                  { 
                                             echo "<h3 style='color:red'>Error</h3>";
                                       }
							 }
							 $imeCB++;
					      }
						  if($pr=="radiobox")
					      {
					      	 if((isset($_POST["r$imeRB"])) && $brojac9==0)
							 {
								 $brojac9=658;
								 $id_pras=$rez['id_prasanje'];
								 $id_odg=$_POST["r$imeRB"];
								 $query = mysqli_query($conn, "SELECT * FROM odgovori WHERE id_odgovor='$id_odg'")
                                       or die (mysqli_error($conn));
				                 $rezultat=mysqli_fetch_array($query);
								 $odg=$rezultat['odgovor'];
									 $sql5="INSERT INTO korisnickiodg(id_anketa,id_prasanje,id_odgovor,odgovor)
                                   VALUES ('$anketa_id','$id_pras','$id_odg','$odg');";
	                               if (!mysqli_query($conn, $sql5)) 
	                                  { 
                                             echo "<h3 style='color:red'>Error</h3>";
                                       }
							 }
							 $daliEradio=1;
					      }
						 	 $brojac2++; 
 				     }
					 if($daliEradio==1)
				 {
					 $daliEradio=0;
				     $imeRB++;
				 }
                }
				
				
}
?>
<div class="row"style="background-color:#872822; height:200px;"></div>

</div>
</form>
</body></html>