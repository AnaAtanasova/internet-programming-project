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
<h2 style="color:#8a8a8a"><center>Креирај нова анкета</center></h2>
</div></div>
<div class="col-sm-1" style="height:150px;"></div>
<div class="col-sm-2" style="background-color:#872822; height:150px;"></div>
</div>

<div class="row">
<div class="col-sm-2" style="background-color:#872822; height:80px;"></div>
<div class="col-sm-8" style="background-color:white; height:80px;">
<br>
<h3 style="color:#cfc491">Податоци за анкетата</h3>
</div>
<div class="col-sm-2" style="background-color:#872822; height:80px;"></div>
</div>

<div class="row" style="height:60px;">
<div class="col-sm-2" style="background-color:#872822; height:150px;"></div>
<div class="col-sm-2" style="background-color:white; height:150px;">
<form action=" " method="post">
<p style="color:#b8b8b8;font-size:20;"><b>Име на анкета:</p></b></div>
<div class="col-sm-6" style="background-color:white; height:150px;">
<input type="text" name="t1" placeholder="Внеси овде" style="width:400px;height:40px;border-color:#b8b8b8; background-color:transparent;"/>
<button type="submit" class="btn btn-info" name="b5">Внеси</button>
<br/>
</div>
<div class="col-sm-2" style="background-color:#872822; height:150px;"></div>
</div>


<div class="row" style="height:100px;">
<div class="col-sm-2" style="background-color:#872822; height:150px;"></div>
<div class="col-sm-2" style="background-color:white; height:150px;">
<h3 style="color:#cfc491">Прашања</h3>
<br>
<p style="color:#b8b8b8;font-size:20;"><b>Вид на прашање:</b></p></div>
<div class="col-sm-6" style="background-color:white; height:150px;">
<br><br><br>
<select style="border-color:#b8b8b8; background-color:transparent;" name="s1"> 
<option value="vid">Вид прашање</option>
<option value="checkbox">Checkbox</option>
<option value="radiobox">Radiobox</option>
</select></div>
<div class="col-sm-2" style="background-color:#872822; height:150px;"></div>
</div>


<div class="row" style="height:90px;">
<div class="col-sm-2" style="background-color:#872822; height:150px;"></div>
<div class="col-sm-2" style="background-color:white; height:150px;">
<br>
<p style="color:#b8b8b8;font-size:20;"><b>Тело на прашањето:</b></p></div>
<div class="col-sm-6" style="background-color:white; height:150px;">
<br>
<input type="text" name="t2" placeholder="Внеси овде" style="width:600px;height:40px;border-color:#b8b8b8; background-color:transparent;"/></div>
<div class="col-sm-2" style="background-color:#872822; height:150px;"></div>
</div>


<div class="row" style="height:50px;">
<div class="col-sm-2" style="background-color:#872822; height:150px;"></div>
<div class="col-sm-2" style="background-color:white; height:150px;"></div>
<div class="col-sm-6" style="background-color:white; height:150px;">
<h3 style="color:#cfc491">Избори</h3></div>
<div class="col-sm-2" style="background-color:#872822; height:150px;"></div>
</div>

<div class="row" style="height:90px;">
<div class="col-sm-2" style="background-color:#872822; height:150px;"></div>
<div class="col-sm-2" style="background-color:white; height:150px;"></div>
<div class="col-sm-6" style="background-color:white; height:150px;">
<p style='color:#b8b8b8;font-size:20;'><b>Избор 1:</b></p>
<input type="text" name="t3" placeholder="Внеси овде" style="width:500px;height:40px;border-color:#b8b8b8; background-color:transparent;"/>
</div>
<div class="col-sm-2" style="background-color:#872822; height:150px;"></div>
</div>

<div class="row" style="height:90px;">
<div class="col-sm-2" style="background-color:#872822; height:150px;"></div>
<div class="col-sm-2" style="background-color:white; height:150px;"></div>
<div class="col-sm-6" style="background-color:white; height:150px;">
<p style='color:#b8b8b8;font-size:20;'><b>Избор 2:</b></p>
<input type="text" name="t4" placeholder="Внеси овде" style="width:500px;height:40px;border-color:#b8b8b8; background-color:transparent;"/>
</div>
<div class="col-sm-2" style="background-color:#872822; height:150px;"></div>
</div>


<div class="row" style="height:90px;">
<div class="col-sm-2" style="background-color:#872822; height:150px;"></div>
<div class="col-sm-2" style="background-color:white; height:150px;"></div>
<div class="col-sm-6" style="background-color:white; height:150px;">
<p style='color:#b8b8b8;font-size:20;'><b>Избор 3:</b></p>
<input type="text" name="t5" placeholder="Внеси овде" style="width:500px;height:40px;border-color:#b8b8b8; background-color:transparent;"/>
</div>
<div class="col-sm-2" style="background-color:#872822; height:150px;"></div>
</div>  


<div class="row" style="height:50px;"> 
<div class="col-sm-2" style="background-color:#872822; height:80px;"></div>
<div class="col-sm-2" style="background-color:white; height:80px;">
<button type="submit" class="btn btn-info" name="b6">Приказ</button>
</div>
</div>

<div class="row">
<div class="col-sm-2" style="background-color:#872822; height:80px;"></div>
<div class="col-sm-2" style="background-color:white; height:80px;">
<button type="submit" class="btn btn-info" name="b4">Додади прашање</button>
</div>
<div class="col-sm-6" style="background-color:white; height:80px;"><a href="pocetna2Logiran.php" class="btn btn-info" role="button">Излез</a>

</div>
<div class="col-sm-2" style="background-color:#872822; height:80px;"></div>
</div>

<div class="row"style="background-color:#872822"><br></div>
</form>
<?php
if (isset($_POST['b5']))
{
	$ime=$_POST['t1'];
	$_SESSION["imeanketa"]=$ime;
	$id_user=$_SESSION["id"];
	if($ime!="")
	{
        $sql="INSERT INTO anketi(id_user,naslov)
        VALUES ('$id_user','$ime');";
	    if (!mysqli_query($conn, $sql)) 
	    {
            echo "<h3 style='color:red'>Error</h3>";
        }
	}
	$sql6="SELECT * from anketi where naslov='$ime'";
	 $result=mysqli_query($conn, $sql6);
				 if(!$result)
				 { 
			         echo "<h3 style='color:red'>Error</h3>";
				 }
				 else
				 {
					 $row=mysqli_fetch_row($result);
					 $_SESSION["anketa_id"]=$row[0];
					 $an_id=$_SESSION["anketa_id"];
				 }
}
if(isset($_POST['b6']))
{
 echo "<script type='text/javascript'>
           window.location = 'anketa.php'
      </script>"; }
if(isset($_POST['b4']))
{
	    $id_user=$_SESSION["id"];
	    $telo=$_POST['t2'];
		if(isset($_POST['s1']))
		{
		     $vid=$_POST['s1'];
			 if($vid=="checkbox" || $vid=="radiobox")
		     if($telo!="")
		     {
			      $sql="INSERT INTO prasanja(prasanje,vid)
                  VALUES ('$telo','$vid');";
	               if (!mysqli_query($conn, $sql)) 
	                  { 
                            echo "<h3 style='color:red'>Error</h3>";
                      }
		     }
			 $izbor1=$_POST['t3'];
			 $izbor2=$_POST['t4'];
			 $izbor3=$_POST['t5'];
			 if($izbor1!="" && $izbor2!="" && $izbor3!="")
			 {
                  $sql2="SELECT * FROM prasanja where prasanje='$telo'";				
                  $result=mysqli_query($conn, $sql2);
				 if(!$result)
				 { 
			         echo "<h3 style='color:red'>Error</h3>";
				 }
				 else
				 {
					 $row=mysqli_fetch_row($result);
					 $_SESSION["prasanje_id"]=$row[0];
					 $pr_id=$_SESSION["prasanje_id"];
					 $sql3="INSERT INTO odgovori(id_user,id_prasanje,odgovor)
                     VALUES ('$id_user','$pr_id','$izbor1');";
	               if (!mysqli_query($conn, $sql3)) 
	                  { 
                            echo "<h3 style='color:red'>Error". mysqli_error($conn)."</h3>";
                      }
					  $sql4="INSERT INTO odgovori(id_user,id_prasanje,odgovor)
                     VALUES ('$id_user','$pr_id','$izbor2');";
	               if (!mysqli_query($conn, $sql4)) 
	                  { 
                            echo "<h3 style='color:red'>Error". mysqli_error($conn)."</h3>";
                      }
					  $sql5="INSERT INTO odgovori(id_user,id_prasanje,odgovor)
                     VALUES ('$id_user','$pr_id','$izbor3');";
	               if (!mysqli_query($conn, $sql5)) 
	                  { 
                            echo "<h3 style='color:red'>Error". mysqli_error($conn)."</h3>";
                      }
					  $an_id=$_SESSION["anketa_id"];
					  $sql7="INSERT INTO anketaprasanja (id_anketa,id_prasanje)
                     VALUES ('$an_id','$pr_id');";
	               if (!mysqli_query($conn, $sql7)) 
	                  { 
                            echo "<h3 style='color:red'>Error". mysqli_error($conn)."</h3>";
                      }
				 }
				
			 }
		}
}
?>
</div>
</body></html>
