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
<h2 style="color:#8a8a8a"><center>Анкети</center></h2>
</div></div>
<div class="col-sm-1" style="height:150px;"></div>
<div class="col-sm-2" style="background-color:#872822; height:150px;"></div>
</div>

<div class="row">
<div class="col-sm-2" style="background-color:#872822; height:600px;"></div>
<div class="col-sm-8" style="background-color:white; height:600px;">
<br>
<form action=" " method="post">
<table class="table">
    <thead>
      <tr>
        <th><h3 style="color:#cfc491">ID</h3></th>
        <th><h3 style="color:#cfc491">Име на анкета</h3></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
<?php
$query = mysqli_query($conn, "SELECT * FROM anketi ORDER BY id_anketa ASC")
   or die (mysqli_error($conn));
   $brojac3=1;
while ($row = mysqli_fetch_array($query)) {
 $id=$row['id_anketa'];
  echo
   "<tr>
    <td><p>{$row['id_anketa']}.</p></td>
    <td><p style='color:#8a8a8a;'>{$row['naslov']}</p></td>
	<td><button type='submit' class='btn btn-info' name='$brojac3' value='$id'>Приказ</button></td>
   </tr>";
   $brojac3++;
}
$x = 1; 
while($x < $brojac3+1)
{
	if(isset($_POST["$x"]))
	{
	    $_SESSION["idanketa"]=$_POST["$x"];
	     echo "<script type='text/javascript'>
           window.location = 'odgovaranjeNelogiran.php'
      </script>"; 
	}
	 $x++;
}
?>
   </tbody>
  </table>
 </div>
<div class="col-sm-2" style="background-color:#872822; height:600px;"></div>
</div>

<div class="row" style="background-color:#872822"><br></div>
</div>
</form>
</body></html>
