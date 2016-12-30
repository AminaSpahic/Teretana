
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	    <link rel="stylesheet" href="style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<title>Teretana</title>
</head>
<body>
<header>
<?php if(isset($_SESSION['user'])){
        if($_SESSION['user'] == "admin" || $_SESSION['user'] == "guest") { ?>
<ul class="topnav">
  <li><a class="aktivna" href="homepage.php">Početna</a></li>
  <li><a href="grupniTrening.php">Grupni trening</a></li>
  <li><a href="osobniTrening.php">Osobni trening</a></li>
  <li><a href="uclaniSe.php">Učlani se</a></li>
  <li><a href="odjava.php">Odjava</a></li>
  <li class="right"><a href="kontakt.php">Kontakt</a></li>
</ul>
<?php } } 
   if((!isset($_SESSION['user']) || $_SESSION['user'] == "unknown")) { ?>
   <ul class="topnav">
  <li><a class="aktivna" href="homepage.php">Početna</a></li>
  <li><a href="grupniTrening.php">Grupni trening</a></li>
  <li><a href="osobniTrening.php">Osobni trening</a></li>
  <li><a href="uclaniSe.php">Učlani se</a></li>
  <li><a href="sign_in.php">Prijava</a></li>
  <li class="right"><a href="kontakt.php">Kontakt</a></li>
</ul>
  <?php } ?>
</header>

<!-- <header>
<ul class="topnav">
  <li><a href="#" onclick="aj('homepage.html')">Početna</a></li>
  <li><a href="#" onclick="aj('grupniTrening.html')">Grupni trening</a></li>
  <li><a href="#" onclick="aj('osobniTrening.html')">Osobni trening</a></li>
  <li><a href="#" onclick="aj('uclaniSe.html')">Učlani se</a></li>
  <li class="right"><a href="#" onclick="aj('kontakt.php')">Kontakt</a></li>
</ul>
</header>
<div id="polje"> -->

 <div class="slider">
<div class="kolona4">
<!--   <img class="mySlides" src="running.jpg" alt="prva"> -->
 <!-- <img class="mySlides" src="blue-yoga-mat.jpg" alt="treca">-->
  <img class="mySlides" src="fitness.jpg" alt="cetvrta">
  <img class="mySlides" src="background02.jpg" alt="peta">
  <!--<img class="mySlides" src="pilates.jpg" alt="sesta">-->
	
</div>
</div> 

	
<!-- login i pretraga -->
		<div class="red">
			<div class="kolona tri" id="kolonapretraga">
		
					<img src="search.png" alt="search" id="searchIcon">
					<input id="unostrazi" type="text" id="unostrazi" placeholder="Traži..." onkeyup="prikazi(this.value)">
					<input type="submit" id="dugmetrazi" value="Traži" name="submitLogin" onclick="prikaziSvePretrage();">
					<div id="prikazpretrage"></div>
					 <div class="kolona jedan">
                    Rezultati pretrage:
                   <div  id="prikazRezultata"></div>
				    </div>
			</div>
		</div>

	<script src="kod.js"></script> 

<div class="red">
<div class="kolona ikona">
    <img src="clanstvo-ikona.png" class="images"></a>
    <p>Alcon Sports and Health Club je<br>
    uzbudljiva, potpuno nova fitness<br>
    destinacija u Sarajevu na preko<br>
    1200m2 prostora u Alta Shopping<br>
    Centru. Vrhunska oprema renomiranih<br>
	svjetskih proizvođača Matrix i<br>
    Technogym, pružit će vam jedinstveno<br>
	iskustvo bavljenja fitnessom.</p>
</div>
<div class="kolona ikona">
    <img src="grupni-trening-ikona.png" class="images"></a>
    <p>Alcon Centar nudi razne vrste grupnih<br>
    treninga za sve nivoe učesnika. Cilj<br>
    nam je ponuditi Vam selekciju grupnih<br>
    časova koja odgovara Vašim potrebama<br>
    i brzom tempu života. Profesionalni i<br>
    iskusni treneri pomoći će Vam da<br>
    ostvarite željene rezultate.<br>
	</p>
</div>
<div class="kolona ikona";>
    <img src="privatni-trening-ikona.png" class="images"></a>
    <p>Ostvarite svoje fitness ciljeve uz jedan<br>
    na jedan osobne treninge prilagođene<br>
    Vašim potrebama ili sami kreirajte<br>
    grupu 3-5 članova koja će zajedno<br>
	raditi sa osobnim trenerom.<br>
	Isprobajte naše privatne treninge i<br>
	zabavite se osjećajući se zdravije<br> 
	i sretnije!</p>
</div>
</div>
 
<div class="clearfix"></div>
		
		<div class="footer" id="footer">
			Copyright © 2016 by AM | All rights reserved. | Preuzimanje sadržaja bez prethodne dozvole nije dopušteno.
			Owned by AM Team | Designed by Amina Spahić
		</div>
		
			<script>
		function prikazi(str) {
			if (str.length==0) { 
				document.getElementById("prikazpretrage").innerHTML="";
				document.getElementById("prikazpretrage").style.border="0px";
			return;
		}
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else {  // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (this.readyState==4 && this.status==200) {
				document.getElementById("prikazpretrage").innerHTML=this.responseText;
				document.getElementById("prikazpretrage").style.border="3px solid #E2DD91;";
			}
		}
		xmlhttp.open("GET","pretraga.php?q="+str,true);
		xmlhttp.send();
		}
		</script>
	
</body>
</html>
