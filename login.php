<html>
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Е-анкети</title>
</head>
<body style="background-color:#91352f">
<form action=" " method="post">
<br/><br/>
<table align="center" cellpadding="0px">
<tr>
<td>
<table cellpadding="0px">
<tr>
<td><img src="logo.png" height="100" width="110"></td>
<td><h1 style="color:white;font-size:44"><i>E-анкети!</h1></td></i>
</tr>
</table>
</tr>
<tr>
<td>
<table style="background-color:white" cellpadding="10px" cellspacing="10px">
<tr>
<td><h2 style="color:#00994D" align="center"><i>Логирај се на својот профил!</i></h2>
<h5 style="color:#d9a5b3" align="center">------<a href="register.php" style="color:#d9a5b3;font-size:16px" >Немате создадено профил?</a>------</h5>
</td></tr>
<tr><td><h3 style="color:#00994D">Username  <input type="text" name="t1" placeholder="Внеси овде" style="height:30px;border: none;background-color:transparent;"/></h3>
<hr style="width:350px" align="left"/></td></tr>
<tr><td><h3 style="color:#00994D">Password  <input type="password" name="t2" placeholder="Внеси овде" style="height:30px;border: none;background-color:transparent;"/></h3>
<hr style="width:350px" align="left"/></td></tr>
<tr><td><h1 align="center"><button type="submit" name="b1" style="height: 25px; width: 100px ;color:white;border: none;background-color:#00994D;">Log In</h1></td></tr>
<tr>
<td>
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
if(isset($_POST['b1']))
{
	$username=$_POST['t1'];
	$password=$_POST['t2'];
	if($username!="" && $password!="")
	{
		$salt1='147jhgm^3';
		$salt2='!=#&g21456wef!@@@as';
		$token=hash('ripemd128',"$salt1$password$salt2");
		
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
                session_start();
                $_SESSION["name"]=$row[2];
				$_SESSION["surname"]=$row[3];
                $_SESSION["username"]=$row[4];
				$_SESSION["email"]=$row[1];
				$_SESSION["id"]=$row[0];
				$_SESSION["admin"]=$row[6];
				header("Location:pocetna2Logiran.php"); 
            }
            else 
			{
				echo "<h3 style='color:red'>Грешка username или password</h3>";
			}
        }
    }
	else
    {
         echo "<h3 style='color:red'>Мора да внесете вредности</h3>";
    }
}
mysqli_close($conn);
?>
</td></tr>
</table>
</td>
<td>
<img src="slika9.png" width="400" height="250"><br/>
<h1 style="color:#c6d7eb" align="center"><i>Добредојдовте пак!</i></h1></td></tr>
</table>
</form>
</body>
</html>