<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Teretana</title>
	<link rel="stylesheet" href="style.css">
	<title>Teretana</title>
</head>
<body>

<header>
<?php if(isset($_SESSION['user'])){
        if($_SESSION['user'] == "admin" || $_SESSION['user'] == "guest") { ?>
<ul class="topnav">
  <li><a href="homepage.php">Početna</a></li>
  <li><a href="grupniTrening.php">Grupni trening</a></li>
  <li><a href="osobniTrening.php">Osobni trening</a></li>
  <li><a href="uclaniSe.php">Učlani se</a></li>
  <li><a href="odjava.php">Odjava</a></li>
  <li class="right"><a class="aktivna" href="kontakt.php">Kontakt</a></li>
</ul>
<?php } } 
   if((!isset($_SESSION['user']) || $_SESSION['user'] == "unknown")) { ?>
   <ul class="topnav">
  <li><a href="homepage.php">Početna</a></li>
  <li><a href="grupniTrening.php">Grupni trening</a></li>
  <li><a href="osobniTrening.php">Osobni trening</a></li>
  <li><a href="uclaniSe.php">Učlani se</a></li>
  <li><a href="sign_in.php">Prijava</a></li>
  <li class="right"><a class="aktivna" href="kontakt.php">Kontakt</a></li>
</ul>
  <?php } ?>
</header>


<?php
// validacija u php-u
$nameErr = $emailErr = $telefonErr = "";
$name = $email = $telefon = $tekst = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Unesite ime";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]{5,19}$/",$name)) {
      $nameErr = "Ime moze sadrzavati samo slova, najmanje pet, najvise 19."; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Unesite email";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Email mora biti u formatu example@hotmail.com"; 
    }
  }
    
  if (empty($_POST["telefon"])) {
      $telefonErr = "Unesite telefon";
  } else {
    $telefon = test_input($_POST["telefon"]);
    if (!preg_match("/^\(?(\d{3})\)?[-]?(\d{3})[-]?(\d{3})$/",$telefon)) {
      $telefonErr = "Telefon format: (061)-123-345 ili 061-123-456 ili 061123456."; 
    }
  }

  if (empty($_POST["tekst"])) {
    $tekst = "";
  } else {
    $tekst = test_input($_POST["tekst"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

   <?php
if(isset($_REQUEST['posalji'])){
	$xml = new DOMDocument("1.0", "UTF-8");
	$xml->load("xmlovi/kontakti.xml");
	
	$rootTag = $xml->getElementsByTagName("document")->item(0);
	$dataTag = $xml->createElement("data");
	
    $nameTag = $xml->createElement("name",$_REQUEST['name']);
	$emailTag = $xml->createElement("email",$_REQUEST['email']);
    $telefonTag = $xml->createElement("telefon",$_REQUEST['telefon']);
	$tekstTag = $xml->createElement("tekst",$_REQUEST['tekst']);
	
	$dataTag->appendChild($nameTag);
	$dataTag->appendChild($emailTag);
	$dataTag->appendChild($telefonTag);
	$dataTag->appendChild($tekstTag);
	
	$rootTag->appendChild($dataTag);
	$xml->save("xmlovi/kontakti.xml");
}
?>


				<div class="red" id="forma-main">
			<div class="kolona dva" id="forma-div">
				<form class="forma" id="forma1" name="forma-validacija" action="kontakt.php" method="post" onsubmit="return validirajPodatke()">
				<h3><br>Kontaktirajte nas<br></h3>
					<div class="validacija">
						<input name="name" type="text" placeholder="Ime" value="<?php echo $name;?>" id="ime">
					 <span class="error"><?php echo $nameErr;?></span>
					</div>
					
					<div class="validacija">
						<input name="email" type="text" placeholder="E-mail" value="<?php echo $email;?>" id="email">
					 <span class="error"><?php echo $emailErr;?></span>
					</div>
					
					<div class="validacija">
						<input name="telefon" type="text" placeholder="Broj telefona" value="<?php echo $telefon;?>" id="phone">
						<span class="error"> <?php echo $telefonErr;?></span>
					</div>
					<div class="validacija">
						<textarea name="tekst" rows=10 maxlength="4000" type="text" placeholder="Upišite poruku" id="poruka"><?php echo $tekst;?>       </textarea>
					</div>
				    <div class="validacija">
                    <ul class="greska"></ul>
                    </div>
					<div class="submit">
						<input type="submit" name="posalji" value="Pošalji" id="posalji1"/>
					</div>
				</form>
			</div>
			
			<div class="kolona dva">
			<br><br>
				<strong>KONTAKT</strong> <br>
				<h4>Posjetite nas u Alta Shopping Centru <br>na 2. Spratu:
                Alcon Sports & Health Club<br>
				Bulevar Franca Lehara 2
				BiH -71000 Sarajevo
                <br><br>
				T: 033 553 300 <br>
                F: 033 553 303 <br>
				<a href="">info@alconfitness.ba</a><br>
                <a href="">recepcija@alconfitness.ba</a></h4>
				<h3>Kako do nas</h3>
				<img src="mapa.png" id="mapa">
			</div>
		</div>
		
<script src="kod.js"></script>
		
		<div class="clearfix"></div>

		<div class="footer" id="footer">
			Copyright © 2016 by AM | All rights reserved. | Preuzimanje sadržaja bez prethodne dozvole nije dopušteno.
			Owned by AM Team | Designed by Amina Spahić
		</div>

</body> 