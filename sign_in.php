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
  <li><a href="homepage.php">Početna</a></li>
  <li><a href="grupniTrening.php">Grupni trening</a></li>
  <li><a href="osobniTrening.php">Osobni trening</a></li>
  <li><a href="uclaniSe.php">Učlani se</a></li>
  <li><a class="aktivna" href="sign_in.php">Prijava</a></li>
  <li class="right"><a href="kontakt.php">Kontakt</a></li>
</ul>
  <?php } ?>
</header>

<?php
// validacija u php-u
$usernameErr = $passwordErr = "";
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = "Unesite ime";
  } else {
    $username = test_input($_POST["username"]);
    if (!preg_match("/^[a-zA-Z ]{5,19}$/",$username)) {
      $usernameErr = "Ime moze sadrzavati samo slova, najmanje pet, najvise 19."; 
    }
  }
  
  if (empty($_POST["password"])) {
    $passwordErr = "Unesite lozinku";
  } else {
    $password = test_input($_POST["password"]);
    if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",$password)) {
      $passwordErr = "Netacna lozinka"; 
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
	$xml->load("xmlovi/login.xml");
	
	$rootTag = $xml->getElementsByTagName("document")->item(0);
	$dataTag = $xml->createElement("data");
	
    $usernameTag = $xml->createElement("username",$_REQUEST['username']);
	$passwordTag = $xml->createElement("password",$_REQUEST['password']);
	
	$dataTag->appendChild($usernameTag);
	$dataTag->appendChild($passwordTag);
	
	$rootTag->appendChild($dataTag);
	$xml->save("xmlovi/login.xml");
}
?>
              <div class="red">
			  <div class="kolona tri" id="prijava">
			  <img src="slika.jpg" alt="slika">
			  </div>
			  </div>
               
              <div class="red">
              <div class="kolona tri" id="kolonalogin" id="sign">
				<form id="kolonalogin"  method="post" action="admin.php" class="forma-validacija" name="forma-validacija" onsubmit="return validate()" >
					<img src="loginicon.png" alt="login" id="loginIcon">
					<div class="validacija">
						<input name="username" type="text" placeholder="Username" id="username" value="" value="<?php echo $username;?>"><br><br>
						<span class="error"> <?php echo $usernameErr;?></span>
						</div>
						<img src="password.png" alt="login" id="passicon">
						<div class="validacija">
			            <input name="password" type="password" placeholder="Password" id="password" value="<?php echo $password;?>" onsubmit="return validate()">	<br><br>
                       <span class="error"><?php echo $passwordErr;?></span>						
						</div>
                        <?php if(isset($_SESSION['user']) && $_SESSION['user'] == "unknown") { ?>
        <p style="padding-top:1.5%; padding-bottom:1.5%; margin-left:-50px;" id="warningMessage"> Nepostojeći korisnik! Pokušajte se logovati ponovo. </p>
        <?php session_unset(); } else { ?>
        <p style="display:none" id="warningMessage"> Nepostojeći korisnik! Pokušajte se logovati ponovo. </p>
    <?php } ?>					
                      <div class="validacija">
						<ul class="greska"></ul>
						</div> 	
					    <button id="logbutton" name="posalji" type="submit" value="Submit">Prijava</button> 
				  </form>	
				</div>
				</div>

				
			<div class="footer" id="footer">
			Copyright © 2016 by AM | All rights reserved. | Preuzimanje sadržaja bez prethodne dozvole nije dopušteno.
			Owned by AM Team | Designed by Amina Spahić
		</div>
 
</body>
</html>