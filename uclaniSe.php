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
  <li><a href="osobniTrening.php">Osobni trening</a></li>
  <li><a class="aktivna" href="uclaniSe.php">Učlani se</a></li>
  <li><a href="odjava.php">Odjava</a></li>
  <li class="right"><a href="kontakt.php">Kontakt</a></li>
</ul>
<?php } } 
   if((!isset($_SESSION['user']) || $_SESSION['user'] == "unknown")) { ?>
   <ul class="topnav">
  <li><a href="homepage.php">Početna</a></li>
  <li><a href="grupniTrening.php">Grupni trening</a></li>
  <li><a href="osobniTrening.php">Osobni trening</a></li>
  <li><a class="aktivna" href="uclaniSe.php">Učlani se</a></li>
  <li><a href="sign_in.php">Prijava</a></li>
  <li class="right"><a href="kontakt.php">Kontakt</a></li>
</ul>
  <?php } ?>
</header>
  
   <?php
// validacija u php-u
$nameErr = $lastnameErr =$poljeErr = $emailErr = $telefonErr = "";
$name = $lastname =$polje= $email = $telefon = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Unesite ime";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]{5,19}$/",$name)) {
      $nameErr = "Ime moze sadrzavati samo slova, najmanje pet, najvise 19."; 
    }
  }
  
  if (empty($_POST["lastname"])) {
    $lastnameErr = "Unesite prezime";
  } else {
    $lastname = test_input($_POST["lastname"]);
    if (!preg_match("/^[a-zA-Z ]{5,19}$/",$lastname)) {
      $lastnameErr = "Prezime moze sadrzavati samo slova, najmanje pet, najvise 19."; 
    }
  }
  
  if (empty($_POST["polje"])) {
    $poljeErr = "Oznaci spol";
  } else {
    $polje = test_input($_POST["polje"]);
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
	$xml->load("xmlovi/clanovi.xml");
	
	$rootTag = $xml->getElementsByTagName("document")->item(0);
	$dataTag = $xml->createElement("data");
	
    $nameTag = $xml->createElement("name",$_REQUEST['name']);
	$lastnameTag = $xml->createElement("lastname",$_REQUEST['lastname']);
	$poljeTag = $xml->createElement("polje",$_REQUEST['polje']);
	$emailTag = $xml->createElement("email",$_REQUEST['email']);
    $telefonTag = $xml->createElement("telefon",$_REQUEST['telefon']);
	$polje1Tag = $xml->createElement("polje1",$_REQUEST['polje1']);
	$polje2Tag = $xml->createElement("polje2",$_REQUEST['polje2']);
	
	$dataTag->appendChild($nameTag);
	$dataTag->appendChild($lastnameTag);
	$dataTag->appendChild($poljeTag);
	$dataTag->appendChild($emailTag);
	$dataTag->appendChild($telefonTag);
	$dataTag->appendChild($polje1Tag);
	$dataTag->appendChild($polje2Tag);
	
	$rootTag->appendChild($dataTag);
	$xml->save("xmlovi/clanovi.xml");
}
?>
<div class="red" id="uclaniSe">
<div class="format">
  <form class="forma-validacija" name="forma-validacija" action="uclaniSe.php" method="post" onsubmit="return validate()">
    <div class="validacija">
    <label>Ime:</label>
    <input type="text" id="fname" name="name" placeholder="Unesi ime" value="<?php echo $name;?>" >
	<span class="error"> <?php echo $nameErr;?></span>
    </div>
    <div class="validacija">
    <label>Prezime:</label>
    <input type="text" id="flastname" name="lastname" placeholder="Unesi prezime" value="<?php echo $lastname;?>" >
	 <span class="error"><?php echo $lastnameErr;?></span>
    </div>
	<div class="validacija">
    <label for="lspol">Spol:</label><br><br>
    <input type="radio" name="polje" value="male" <?php if (isset($polje) && $polje=="male") echo "checked";?> checked> Musko
    <input type="radio" name="polje" value="female" <?php if (isset($polje) && $polje=="female") echo "checked";?> >Zensko <br><br>
      <span class="error"> <?php echo $poljeErr;?></span>
	</div>
	<div class="validacija">
	<label>Kontakt e-mail:</label>
    <input type="text" id="femail" name="email" placeholder="Unesi email" value="<?php echo $email;?>">
	 <span class="error"><?php echo $emailErr;?></span>
   </div>
	<div class="validacija">
	<label for="ltelefon">Kontakt telefon:</label>
    <input type="text" id="ltelefon" name="telefon" placeholder="Unesi broj telefona" value="<?php echo $telefon;?>" >
	<span class="error"> <?php echo $telefonErr;?></span>
    </div>
	<div class="validacija">
    <label for="tip">Grupni trening:</label>
    <select id="tip" name="polje1">
      <option name="polje1" value="Yoga">Yoga</option>
      <option name="polje1" value="Pilates">Pilates</option>
	  <option name="polje1" value="Zumba">Zumba</option>
	  <option name="polje1" value="Total Body">Total Body</option>
    </select>
	</div>
	<div class="validacija">
	<label for="tip">Izaberi trenera:</label>
    <select id="tip" name="polje2">
      <option name="polje2" value="Katerina Srečković">Katerina Srečković</option>
      <option name="polje2" value="Renata Sopek">Renata Sopek</option>
	  <option name="polje2" value="Filip Dropulić">Filip Dropulić</option>
	  <option name="polje2" value="Lejla Sebić">Lejla Šebić</option>
    </select>
	</div>
    <br>
	<div class="validacija">
    <ul class="greska"></ul>
    </div>
    <button class="button" id="submit" name="posalji" type="submit" value="Submit">Pošalji</button> 
  </form>
</div>
</div>

<?php 
				if (isset($_SESSION['user'])){

				if(stristr($_SESSION['user'], "admin")){
				echo '<div class="red">
	<div class="kolona dva">
    Članovi teretane u .pdf formatu
    <form action="pdf.php" method="POST">
    <button class="button" id="submit" name="download" type="submit" value="Submit">pdf</button> 
    </form>
	</div>
		<div class="kolona dva">
     Članovi teretane u .csv formatu
     <form action="csv.php" method="POST">
    <button class="button" id="submit" name="download" type="submit" value="Submit">csv</button> 
    </form>
	</div>
	</div>';
				}} 
				?>


<script src="kod.js"></script>


		
			<div class="footer" id="footer">
			Copyright © 2016 by AM | All rights reserved. | Preuzimanje sadržaja bez prethodne dozvole nije dopušteno.
			Owned by AM Team | Designed by Amina Spahić
		</div>
</body> 