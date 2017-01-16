<?php
$no_error = true;
$send_error = array();
    session_start();
	$veza = new PDO("mysql:dbname=teretana;host=localhost;charset=utf8", "admin", "admin123");
	$veza->exec("set names utf8");
	
	if (isset($_REQUEST['register'])){
    
		$username=$_REQUEST['username'];
		$mail=$_REQUEST['mail'];
		
		$password=$_REQUEST['password'];
		$password2=$_REQUEST['password2'];
		
		$rezultat = $veza->prepare("SELECT * FROM korisnici where username = '$username'");
		$rezultat->execute();
		$broj = $rezultat->rowCount();
		if ($broj > 0){
			$send_error[] = 'Username već postoji';
		}
	
		$username=preg_replace("#[^a-zA-Z ščćžđŠČĆŽĐ]#i", "", $username);
		$validacija = preg_replace("#[^a-zA-ZščćžđŠČĆŽĐ]#i", "", $username);
		if(strlen($validacija)<2) {
			$send_error[]="Ime mora sadržati minimalno dva karaktera.";
			$no_error=false;
		}
		
		
		
		$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";
		if((preg_match($pattern, $mail))==0){
			$send_error[]="Email nije ispravan.";
			$no_error=false;
		}
		if($password != $password2){ $send_error[] = 'Passwordi se ne poklapaju'; }
		if(file_exists('xmlovi/admin.xml'))
		{
			$xml = new DOMDocument();
			$xml->load('xmlovi/admin.xml');
			
        $rootTag = $xml->getElementsByTagName("AllUsers")->item(0);
        $dataTag = $xml->createElement("User");
        $roleTag = $xml->createElement("Role", "user");
        
        $usernameTag=$xml->createElement("Username");
        $usernameTag->appendChild($xml->createTextNode($_REQUEST['username']));
        $emailTag = $xml->createElement("Email");
        $emailTag->appendChild($xml->createTextNode($_REQUEST['mail']));
        $pswTag = $xml->createElement("Password");
        $pswTag->appendChild($xml->createTextNode($_REQUEST['password']));
            
        $dataTag->appendChild($roleTag);
        
        $dataTag->appendChild($usernameTag);
        $dataTag->appendChild($emailTag);
        $dataTag->appendChild($pswTag);
        $rootTag->appendChild($dataTag);
        $xml->save('xmlovi/admin.xml');
		
		}
		$password = md5($password);
		$rezultat = $veza->query("INSERT INTO `korisnici` (`username`, `password`, `email`) VALUES ('$username', '$password', '$mail');");
    
		if (!$rezultat) {
			$greska = $veza->errorInfo();
			print "SQL greška: " . $greska[2];
			exit();
		}
		
 
    }
	
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<title>Teretana</title>
	</head>
<body>
	 <div class="red">
			  <div class="kolona tri" id="prijava">
			  <img src="slika.jpg" alt="slika">
			  </div>
     </div>

		<div class = "red">
		  <div class = "kolona tri" id="kolonalogin" id="sign">
				<form id="kolonalogin"  method="post"  class = "forma-validacija" action = "sign_up.php" onsubmit="return validacijaForme()">
			
					    <input type="text" id="username" placeholder="Unesite vaše ime i prezime" name="username" required><br>

							<input type="text" id="username" placeholder="Unesite vaš email" name="mail" required><br><br>

							<input type="password" id="username" placeholder="Unesite vašu lozinku" name="password" required><br><br>

							<input type="password" id="username" placeholder="Ponovno unesite odabranu lozinku" name="password2" required><br><br>

							<button id="logbutton" name="register" type="submit" value="Registruj se"/>Registruj se</button>

							<?php 
							if(count($send_error) > 0){
								echo '<ul>';
								foreach($send_error as $g){
									echo '<li style = "color:red; list-style: none;">- ' . $g . '</li>';
								}
								echo '</ul>';
							}
							?>
							<p id="greska" style="color:white;"></p>
							
					
					<div class="kolona tri">
					<p class = "greska">Već ste registrovani? <a href = "sign_in.php">Prijavi se</a></p>
					</div>
				</form>
		  </div>
		</div>
		<div class="footer" id="footer">
			Copyright © 2016 by AM | All rights reserved. | Preuzimanje sadržaja bez prethodne dozvole nije dopušteno.
			Owned by AM Team | Designed by Amina Spahić
		</div>
 
<script src="sign_up.js"></script>
</body>
</html>