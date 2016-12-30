<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Teretana</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<header>
<?php if(isset($_SESSION['user'])){
        if($_SESSION['user'] == "admin" || $_SESSION['user'] == "guest") { ?>
<ul class="topnav">
  <li><a href="homepage.php">Početna</a></li>
  <li><a href="grupniTrening.php">Grupni trening</a></li>
  <li><a class="aktivna" href="osobniTrening.php">Osobni trening</a></li>
  <li><a href="uclaniSe.php">Učlani se</a></li>
  <li><a href="odjava.php">Odjava</a></li>
  <li class="right"><a href="kontakt.php">Kontakt</a></li>
</ul>
<?php } } 
   if((!isset($_SESSION['user']) || $_SESSION['user'] == "unknown")) { ?>
   <ul class="topnav">
  <li><a href="homepage.php">Početna</a></li>
  <li><a href="grupniTrening.php">Grupni trening</a></li>
  <li><a class="aktivna" href="osobniTrening.php">Osobni trening</a></li>
  <li><a href="uclaniSe.php">Učlani se</a></li>
  <li><a href="sign_in.php">Prijava</a></li>
  <li class="right"><a href="kontakt.php">Kontakt</a></li>
</ul>
  <?php } ?>
</header>
<div class="red">
<div class="kolona dva">
<br>
<p>Naš profesionalni tim instruktora je pomoć članovima koji žele iskoristiti PT uslugu. Od njih možete očekivati maksimalnu posvećenost kroz sistemski i 
kontinuirani program treninga i ishrane.</p>
<p>Alcon Sports & Health Club nudi uslugu prvog besplatnog časa sa personalnim trenerom, uz rezervaciju na recepciji ili direktno na mail
 amra@alcon.ba ili na broj 060 355 0548.</p>
<p>Znamo da većini ljudi nedostaje motivacija za trening što je s jedne strane i razumljivo s obzirom na današnji ritam života, i naravno da je puno
 lakše otići na trening s spoznajom da vas tamo čeka osoba koja će isplanirati i programirati vaš trening.</p>
<p>Ako tražite bijeg od stresnog i napornog dana u uredu, ili vam je jednostavno potreban lični trener, kao i program prilagođen vašim specifičnim potrebama
 i željama , onda je naš tim instruktora pravi izbor za Vas.</p> 
</div>

<?php
if(isset($_REQUEST['posalji'])){
	$xml = new DOMDocument("1.0", "UTF-8");
	$xml->load("xmlovi/anketa.xml");
	
	$rootTag = $xml->getElementsByTagName("document")->item(0);
	$dataTag = $xml->createElement("data");
	
    $trenerTag = $xml->createElement("trener",$_REQUEST['trener']);
	
	$dataTag->appendChild($trenerTag);
	
	$rootTag->appendChild($dataTag);
	$xml->save("xmlovi/anketa.xml");
}
?>
<div class="kolona dva">
<form id="najTrener" action="osobniTrening.php" method="post">
<h2>Ocijenite kako ste zadovoljni našim programom</h2>
<input type="radio" name="trener" value="1" checked> 1.<br><br>
<input type="radio" name="trener" value="2"> 2.<br><br>
<input type="radio" name="trener" value="3"> 3.<br><br>
<input type="radio" name="trener" value="4"> 4.<br><br>
<input type="radio" name="trener" value="5"> 5.<br><br>
<button class="button" type="submit" name="posalji" value="Glasaj" id="dugme">Glasaj</button>
<button class="button" type="submit" value="Rezutati" id="dugme">Rezultati</button>
</form>
</div>
</div>
<div class="red">
<div class="kolona jedan">
  <h2>Katerina Srećković</h2>
  <img src="katerina.jpg" type="image">
  <p>Katerina ima 30 godina.<br> Personalni trener, ACE Akademije USA Chichago, REPS level4 UAE, DUBAI.<br>15 godina profesionalno je u fitnes industriji.</p>
</div>

<div class="kolona jedan">
  <h2>Renata Sopek</h2>
  <img src="renata.jpg" type="image">
  <p>Renata ima 28 godina.<br>Certificirana za “Hard body” bodyweight, kettlebell, suspenzijski trening,kao i izolacioni trening.</p> 
</div>

<div class="kolona jedan">
  <h2>Filip Dropulić</h2>
  <img src="filip.jpg" type="image">
  <p>Filip ima 25 godina.<br>Magistar sporta i tjelesnog odgoja.</p>
</div>

<div class="kolona jedan">
  <h2>Lejla Šebić</h2>
      
  <img src="lejla.jpg" type="image">
  <p>Lejla ima 31 godinu.<br>Profesorica na Fakultetu sporta i tjelesnog odgoja u Sarajevu.</p>
</div>
</div>
	<script src="kod.js"></script> 
<div class="clearfix"></div>
		
				 <div class="footer" id="footer">
			Copyright © 2016 by AM | All rights reserved. | Preuzimanje sadržaja bez prethodne dozvole nije dopušteno.
			Owned by AM Team | Designed by Amina Spahić
		</div>
</body>