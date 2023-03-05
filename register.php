<html>
<head>
<meta charset="utf-8"/>
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
<td><h2 style="color:#00994D"><i>Креирај го својот бесплатен профил!</i></h2>
<h5 style="color:#d9a5b3" align="center">------<a href="login.php" style="color:#d9a5b3;font-size:16px" >Веќе имате профил?</a>------</h5>
</td></tr>
<tr><td><h3 style="color:#00994D">Е-пошта*  <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Невалиден формат на мејл" name="t1" placeholder="Внеси овде" style="height:30px;border: none;background-color:transparent;"/></h3>
<hr style="width:350px" align="left"/></td></tr>
<tr><td><h3 style="color:#00994D">Име*  <input type="text" name="t2" pattern="[A-Za-z]+" title="Мора да содржи само букви" placeholder="Внеси овде" style="height:30px;border: none;background-color:transparent;"/></h3>
<hr style="width:350px" align="left"/></td></tr>
<tr><td><h3 style="color:#00994D">Презиме*  <input type="text" name="t3" pattern="[A-Za-z]+" title="Мора да содржи само букви" placeholder="Внеси овде" style="height:30px;border: none;background-color:transparent;"/></h3>
<hr style="width:350px" align="left"/></td></tr>
<tr><td><h3 style="color:#00994D">Username*  <input type="text" pattern=".{8,}" title="Внесете 8 или повеќе карактери" name="t4" placeholder="Внеси овде" style="height:30px;border: none;background-color:transparent;"/></h3>
<hr style="width:350px" align="left"/></td></tr>
<tr><td><h3 style="color:#00994D">Password*  <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" title="Мора да содржи барем 1 цифра, 1 голема буква, 1 мала буква и најмалку уште 5 други карактери" name="t5" placeholder="Внеси овде" style="height:30px;border: none;background-color:transparent;"/></h3>
<hr style="width:350px" align="left"/></td></tr>
<tr><td><h1 align="center"><button type="submit" name="b1" style="height: 25px; width: 100px ;color:white;border: none;background-color:#00994D;">Sign up</h1></td></tr>
<tr>
<td>
<?php
$username="root";
$password="";
$servername="localhost";
$conn=mysqli_connect($servername,$username,$password);
if(!$conn)
{
	die("Connection failed: " . mysqli_connect_error());
}
mysqli_select_db($conn,"korisnici");
if(isset($_POST['b1']))
{
	$email=$_POST['t1'];
	$name=$_POST['t2'];
	$surname=$_POST['t3'];
	$username=$_POST['t4'];
	$password=$_POST['t5'];
	if($email!="" && $name!="" && $username!="" && $password!="" && $surname!="")
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
			if($row[4]==$username)
			{
				echo "<h3 style='color:red'>Одберете друг username.</h3>";
		    }
            else
            {
	            $sql = "INSERT INTO users(email,name,surname,username,password)
                VALUES ('$email','$name','$surname','$username','$token');";
	            if (!mysqli_query($conn, $sql)) 
				{
                     echo "<h3 style='color:red'>Корисникот со тој мејл веќе постои.</h3>";
			    }
	            else
				{ 
	                 header("Location:login.php"); 
	            }
	        }
	    }
    }
	else
	{
		echo "<h3 style='color:red'>Не смее да се оставаат празни полиња.</h3>";
	
	}
}
mysqli_close($conn);
?>
</td></tr>
</table>
<td>
<table cellpadding="10px">
<tr>
<td><h2 style="color:#00994D" align="center"><i>Зошто да креираш профил?</i></h2>
<ul style="color:white">
<li>За да можеш да креираш сопстевни анкети</li>
<li>За да можеш да одговараш на постоечки анкети</li>
<li>За да бидеш во тек со барањата на пазарот</li>
<li>За пополнување на своето време</li>
</ul>
</td>
</tr>
<tr><td><center>
<img src="slika7.png" width="250px" height="300px"></td></tr></center>
</table>
</td>
</tr>
</table>
</form>

</body>
</html>