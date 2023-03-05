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
<div class="col-sm-2" style="background-color:#872822; height:70px;">
<br>
<h3 style="color:white;font-size:30; align:left;" ><b>Мој профил</h3></b>
<hr style="background-color:white">
</div>
<div class="col-10" style="background-color:#872822; height:70px;"></div>
</div>
<div class="row" style="background-color:#872822; height:40px;"></div>
<div class="row">
<div class="col-sm-3" style="background-color:#872822; height:50px;"></div>
<div class="col-sm-4" style="background-color:#872822; height:50px;">
<h3 style="color:white" align="left">Детали за профилот</h3>
</div>
<div class="col-5" style="background-color:#872822; height:50px;"></div>
</div>
<div class="row">
<div class="col-sm-3" style="background-color:#872822; height:200px;"></div>
<div class="col-sm-4" style="background-color:white; height:200px;">
<br>
<p style="font-size:30;" ><b>Тип на профил:</b></p>
<p style="font-size:24;color:grey" ><b>Бесплатен профил</b></p>
<p style="font-size:30;" ><b>Избриши профил</b>
<form action=" " method="post">
<button type="submit" class="btn btn-info" name="b">Избриши</button>
</div>
<div class="col-5" style="background-color:#872822; height:200px;"></div>
</div>
<?php
if(isset($_POST['b']))
{
	echo" <div class='row'>
<div class='col-sm-3' style='background-color:#872822; height:60px;'></div>
<div class='col-sm-4' style='background-color:white; height:60px;'>
<p style='font-size:24;' ><b>Внесете ја лозинката:    </b><input type='password' placeholder='Внеси овде' name='t1'/><button type='submit' class='btn btn-info' name='bu1'>Избриши</button></p></p>
</div>
<div class='col-5' style='background-color:#872822; height:60px;'></div>
</div>
";
}
if(isset($_POST['bu1']))
{
	$t1=$_POST['t1'];
		if($t1!="")
	{
		$salt1='147jhgm^3';
		$salt2='!=#&g21456wef!@@@as';
		$token=hash('ripemd128',"$salt1$t1$salt2");
		$sql="SELECT * FROM users where username='$username'";
		$result=mysqli_query($conn,$sql);
		if(!$result)
		{
			echo "<h3 style='color:red'>Error " . mysqli_error($conn). "</h3>";
		}
		else
		{
			$row=mysqli_fetch_row($result);
			if($token==$row[5])
			{
				$sql="DELETE FROM users WHERE username='$username'";
				$result=mysqli_query($conn,$sql);
		if(!$result)
		{
			echo "<h5 style='color:red'>Error " . mysqli_error($conn). "</h5>";
		}
		else
		{
			header("Location:pocetna2.php");
		}
			}
			else echo "<h5 style='color:red'>Грешка лозинка</h5>";
		}
	}
}
?>

<div class="row" style="background-color:#872822; height:50px;"></div>
<div class="row">
<div class="col-sm-3" style="background-color:#872822; height:50px;"></div>
<div class="col-sm-4" style="background-color:#872822; height:50px;">
<h3 style="color:white" align="left">Детали при логирање</h3>
</div>
<div class="col-5" style="background-color:#872822; height:50px;"></div>
</div>
<div class="row">
<div class="col-sm-3" style="background-color:#872822; height:180px;"></div>
<div class="col-sm-4" style="background-color:white; height:180px;">
<br>
<p style="font-size:30;" ><b>Име:</b></p>
<?php
echo "<p style='font-size:24;color:grey' ><b>".$_SESSION['name']."</b>";
?>
<p style="font-size:30;" ><b>Презиме:</b></p>
<?php
echo "<p style='font-size:24;color:grey' ><b>".$_SESSION['surname']."</b>";
?>

</div>
<div class="col-sm-4" style="background-color:white; height:180px;">
<br>
<p style="font-size:30;" ><b>Мејл:</b></p>
<?php
echo "<p style='font-size:24;color:grey' ><b>".$_SESSION['email']."</b>";
?>
<p style="font-size:30;" ><b>Корисничко име:</b></p>
<?php
echo "<p style='font-size:24;color:grey' ><b>".$_SESSION['username']."</b>";
?>
</div>
<div class="col-sm-1" style="background-color:#872822; height:180px;"></div>
</div>

<div class="row" style="background-color:#872822; height:50px;"></div>
<div class="row">
<div class="col-sm-3" style="background-color:#872822; height:50px;"></div>
<div class="col-sm-4" style="background-color:#872822; height:50px;">
<h3 style="color:white" align="left">Детали за анкети</h3>
</div>
<form action=" " method="post">
<div class="col-5" style="background-color:#872822; height:50px;"></div>
</div>
<div class="row">
<div class="col-sm-3" style="background-color:#872822; height:60px;"></div>
<div class="col-sm-4" style="background-color:white; height:60px;">
<br>
<p style="font-size:30;" ><b>Ваши анкети:</b></p>
</div>
<div class="col-sm-5" style="background-color:#872822; height:60px;"></div>
</div>
<?php 
$us_email=$_SESSION['email'];
$sql="SELECT id from users where email='$us_email'";
	 $result=mysqli_query($conn, $sql);
				 if(!$result)
				 { 
			         echo "<h3 style='color:red'>Error</h3>";
				 }
				 $rez1=mysqli_fetch_array($result);
				 $iduser=$rez1['id'];
$sql2="SELECT * from anketi where id_user='$iduser'";
	 $result2=mysqli_query($conn, $sql2);
				 if(!$result)
				 { 
			         echo "<h3 style='color:red'>Error</h3>";
				 }
				 $brojac=1;
				 $brojac2=1;
				  while($rez=mysqli_fetch_array($result2))
				  {
					  $_SESSION["temi"]=$rez['id_anketa'];
					  $broj=$_SESSION['temi'];
					  echo "<div class='row'>
<div class='col-sm-3' style='background-color:#872822; height:50px;'></div>
<div class='col-sm-3' style='background-color:white; height:50px;'>
<button type='submit' button class='btn bg-transparent' name='b$brojac' value='$broj'>$brojac.".$rez['naslov']."</button></div>
<div class='col-sm-1' style='background-color:white; height:50px;'>
<button type='submit' class='btn btn-info' name='izb$brojac2' value='$broj'>Избриши</button></div>
<div class='col-sm-5' style='background-color:#872822; height:50px;'></div>
</div>";
					  $brojac++;
					  $brojac2++;
				  }
?>
<div class="row" style="background-color:#872822; height:50px;"><br></div>
<?php

$x=1;
while($x<=$brojac)
{
	if(isset($_POST["b$x"]))
	{
		$y=$_POST["b$x"];
		$_SESSION["kojaAnketa"]=$y;
		echo "<script type='text/javascript'>
           window.location = 'povekeinf.php'
      </script>"; 
	}
	$x++;
}
$z = 1; 
while($z < $brojac2+1)
{
	if(isset($_POST["izb$z"]))
	{
					$Id=$_POST["izb$z"];		
   					 $query5 = mysqli_query($conn, "DELETE FROM korisnickiodg where id_anketa='$Id'")
   or die (mysqli_error($conn));  
      				 $sql3="SELECT * FROM odgovori AS o, anketi AS a, anketaprasanja AS ap, prasanja AS p
      WHERE p.id_prasanje=ap.id_prasanje and o.id_prasanje=p.id_prasanje and ap.id_anketa='$Id'"; 
$result3=mysqli_query($conn, $sql3);
if(!$result3)
				 { 
			         echo "<h3 style='color:red'>Error 3</h3>";
				 }
				 while($rez3=mysqli_fetch_array($result3))
				 {				 
				    $id_odg=$rez3['id_odgovor'];
					$query5 = mysqli_query($conn, "DELETE FROM odgovori where id_odgovor='$id_odg'")
   or die (mysqli_error($conn));					
				 }
$sql="SELECT * FROM prasanja AS p, anketi AS a, anketaprasanja AS ap
      WHERE p.id_prasanje=ap.id_prasanje and a.id_anketa=ap.id_anketa and ap.id_anketa='$Id'";
	  $result=mysqli_query($conn, $sql);
	  if(!$result)
				 { 
			         echo "<h3 style='color:red'>Error 1 </h3>";
				 }
				  while($rez=mysqli_fetch_array($result))
				 {
					 
				    $id_pras=$rez['id_prasanje'];
					$query5 = mysqli_query($conn, "DELETE FROM prasanja where id_prasanje='$id_pras'")
   or die (mysqli_error($conn));					
				 }		 
				$query4 = mysqli_query($conn, "DELETE FROM anketaprasanja where id_anketa='$Id'")
   or die (mysqli_error($conn));

    $query = mysqli_query($conn, "DELETE FROM anketi where id_anketa='$Id'")
   or die (mysqli_error($conn));		
	}
	 $z++;
}
?>
</div></form>
</body>
<html>









