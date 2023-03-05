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
<div class="col-sm-1" style="background-color:#872822; height:320px;"></div>
<div class="col-sm-4" style="background-color:#872822; height:320px;">
<br><br>
<h1 style="color:white" align="center">Вашиот став значи!</h1>
<p style="color:white;font-size:20; align:justify;" ><b>Вашето мислење е од голема важност за развојот на твоите омилени бизниси и проекти! Доклку сакаш да го споделиш својот став, зачлени се веднаш!</p></b>
<h3 align="center"><a href="register.php" class="btn btn-info" role="button">SIGN UP</a></div>
<div class="col-sm-6" style="background-color:#872822; height:320px;"><br>
<img src="slika1.png" class="mx-auto d-block" width="470px" height="270px"></div>
<div class="col-sm-1" style="background-color:#872822; height:320px;"></div>
</div>
<div class="row">
<div class="col-sm-6" style="background-color:#DB9985; height:320px;">
<h1 style="color:white" align="center">Се пронаоѓаш како категорија на која и е потребна анкета?</h1><br><br>
<p style="font-size:20;color:white"><b>Доколку одговорот е да, на нашата страна секој може да состави своја анкета. Достапни се прашања од кои може да се бира,
а исто така дозволено е и додавање на нови прашања. Постојат и веќе готови анкети кои слободно можеш да ги користиш.</b></p></div>
<div class="col-sm-6" style="background-color:#EB9175; height:320px;">
<h1 style="color:white" align="center">Сакаш да помогнеш на некоја категорија која има потреба од анкета?</h1><br><br>
<p style="font-size:20;color:white"><b>Со разлистување на анкетите и разгледувајќи ги нивните прашања, вие одлучувате кои анкети се соодветни за вас, ви привлекуваат внимание
и кои сакате да ги одговорите.</b></p>
</div>
</div>
<div class="row">
<div class="col-sm-12" style="background-color:#91352f; height:120px;">
<br>
<h1 style="color:white" align="center">За кого се креираат анкетите и кому му се потребни?</h1><br><br>
</div>
</div>
<div class="row">
<div class="col-sm-4" style="background-color:#91352f; height:250px;">
<h3 style="color:white" align="center">Компании</h1><br><br>
<p style="font-size:20;color:white"><b>Компаниите често спроведуваат анкети со цел да се задржи интересот на клиентите за компанијата,
да ги исполни нивните барања и да не ги изгуби клиентите.</b></p></div>
<div class="col-sm-4" style="background-color:#91352f; height:250px;">
<h3 style="color:white" align="center">Мали бизниси</h1><br><br>
<p style="font-size:20;color:white"><b>Анкетите им помагаат на малите бизниси така што им укажуваат што е тоа што клиентите
го очекуваат од нив. На тој начин бизнисот ќе може побрзо и поуспешно да се надогради и порасне.</b></p></div>
<div class="col-sm-4" style="background-color:#91352f; height:250px;">
<h3 style="color:white" align="center">Поединци и истражувачи</h1><br><br>
<p style="font-size:20;color:white"><b>Можат да донесуваат одлуки врз основа на неутрален пристап. Преку анализирање на резултатите,
може веднаш да се укажат темите кои се од важност, наместо да се губи време и ресурси на полиња кои немаат доволно интерес.</b></p></div>
</div>
<div class="row">
<div class="col-sm-6" style="background-color:#91352f; height:200px;">
<img src="slika3.gif" class="mx-auto d-block" width="670px" height="200px"></div>
<div class="col-sm-6" style="background-color:#91352f; height:200px;">
<img src="slika3.gif" class="mx-auto d-block" width="670px" height="200px"></div>
</div>
<div class="row">
<div class="col-sm-6" style="background-color:#b05751; height:200px;"><br>
<h1 style="color:white" align="center">Ви звучи интересно?</h1><br>
<p style="font-size:20;color:white" align="center"><b>Искажи го своето мислење и помогни за развој на бизнисите.</b></p></div>
<div class="col-sm-6" style="background-color:#d15c54; height:200px;"><br>
<h1 style="color:white" align="center">Сакаш да креираш своја анкета?</h1><br>
<p style="font-size:20;color:white" align="center"><b>Најавувањето е бесплатно. </b></p>
<h3 align="center"><a href="register.php" class="btn btn-info" role="button">SIGN UP</a></h3></div>
</div>
<div class="row">
<div class="col-sm-4" style="background-color:#820d05; height:200px;"><br>
<img src="slika12t.png" class="mx-auto d-block" width="300px" height="150px"></div>
<div class="col-sm-4" style="background-color:#820d05; height:200px;"><br>
<img src="transparentna1.png" class="mx-auto d-block" width="250px" height="150px"></div>
<div class="col-sm-4" style="background-color:#820d05; height:200px;"><br>
<img src="slika11t.png" class="mx-auto d-block" width="300px" height="150px"></div>
</div>
</body>
</html>