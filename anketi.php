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
<div class="col-sm-1" style="background-color:#white; height:150px;"></div>
<div class="col-sm-6" style="background-color:white; height:150px;">
<br><br>
<div class = "shadow p-3 mb-5 bg-white rounded">
<h2 style="color:#8a8a8a"><center>Анкети</center></h2>
</div></div>
<div class="col-sm-1" style="height:150px;"></div>
<div class="col-sm-2" style="background-color:#872822; height:150px;"></div>
</div>

<div class="row">
<div class="col-sm-2" style="background-color:#872822; height:1000px;"></div>
<div class="col-sm-8" style="background-color:white; height:1000px;">
<br>
<form action=" " method="post">
<table class="table">
    <thead>
      <tr>
        <th><h3 style="color:#cfc491">ID</h3></th>
        <th><h3 style="color:#cfc491">Име на анкета</h3></th>
        <th></th>
		<th></th>
      </tr>
    </thead>
    <tbody>
<?php
$query = mysqli_query($conn, "SELECT * FROM anketi ORDER BY id_anketa ASC")
   or die (mysqli_error($conn));
   $brojac3=1;
   $brojac4=1;
  $administrator=-1;
while ($row = mysqli_fetch_array($query)) {
 $id=$row['id_anketa'];
  echo
   "<tr>
    <td><h5>{$row['id_anketa']}.</h5></td>
    <td><h5 style='color:#8a8a8a;'>{$row['naslov']}</h5></td>
	<td><button type='submit' class='btn btn-info' name='$brojac3' value='$id'>Приказ</button></td>";
$administrator=$_SESSION["admin"];
if($administrator==1)
{
	echo "<td><button type='submit' class='btn btn-info' name='izb$brojac4' value='$id'>Избриши</button></td>";
	$brojac4++;
}
   echo "</tr>";
   $brojac3++;
}
$x = 1; 
while($x < $brojac3+1)
{
	if(isset($_POST["$x"]))
	{
		$id=$_POST["$x"];
	    $_SESSION["idanketa"]=$id;
		 echo "<script type='text/javascript'>
           window.location = 'odgovaranje.php'
      </script>"; 

	}
	 $x++;
}
if($administrator==1)
{
$y = 1; 
while($y < $brojac4+1)
{
	if(isset($_POST["izb$y"]))
	{
					$Id=$_POST["izb$y"];
			
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
	 $y++;
}
}
?>
   </tbody>
  </table>
 </div>
<div class="col-sm-2" style="background-color:#872822; height:1000px;"></div>
</div>

<div class="row" style="background-color:#872822"><br></div>
</div>
</form>
</body></html>
