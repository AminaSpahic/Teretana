<?php
	
	$change_error = array();
	$add_error = array();
	session_start();
	$server = "localhost";
	$korisnik = "admin";
	$pass = "admin123";
	$baza = "teretana";
	$veza = mysqli_connect($server, $korisnik, $pass, $baza);
	mysqli_set_charset($veza, 'utf8');
	if (!$veza) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$greske_prijedlog = array();
	$bezGreske = true;
	
	if(isset($_POST['prijedlog'])){
		$program = htmlEntities($_POST['program'], ENT_QUOTES);
		$program = preg_replace("#[^0-9a-zA-Z ščćžđŠČĆŽĐ]#i", "", $program);
		$provjera = preg_replace("#[^0-9a-zA-ZščćžđŠČĆŽĐ]#i", "", $program);
		if(strlen($provjera) < 2) {
			$greske_prijedlog[] = "Naziv programa mora sadržati barem dva karaktera.";
			$bezGreske = false;
		}
		$cijena = htmlEntities($_POST['cijena'], ENT_QUOTES);
		$cijena = preg_replace("#[^0-9a-zA-Z .,ščćžđŠČĆŽĐ]#i", "", $cijena);
		$provjera = preg_replace("#[^0-9a-zA-ZščćžđŠČĆŽĐ]#i", "", $cijena);
		if(strlen($provjera) < 2) {
			$greske_prijedlog[] = "Cijena mora sadržati barem dva karaktera.";
			$bezGreske = false;
		}
		if($bezGreske){
			$upit = "INSERT INTO prijedlozi (id, program, cijena)
			VALUES (DEFAULT, '$program', '$cijena')";
			if (mysqli_query($veza, $upit)) {
				echo "";
			}
			else {
				echo "Greška: " . $upit . "<br>" . mysqli_error($veza);
			}
			header('Location: grupniTrening.php');
			die;
		}
		unset($_POST['prijedlog']);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Teretana</title>
	<link rel="stylesheet" href="style.css">
</head>
<body onkeydown="keyCode(event)">
<header>
<?php if(isset($_SESSION['user'])){
        if($_SESSION['user'] == "admin" || $_SESSION['user'] == "guest") { ?>
<ul class="topnav">
  <li><a href="homepage.php">Početna</a></li>
  <li><a class="aktivna" href="grupniTrening.php">Grupni trening</a></li>
  <li><a href="osobniTrening.php">Osobni trening</a></li>
  <li><a href="uclaniSe.php">Učlani se</a></li>
  <li><a href="odjava.php">Odjava</a></li>
  <li class="right"><a href="kontakt.php">Kontakt</a></li>
</ul>
<?php } } 
   if((!isset($_SESSION['user']) || $_SESSION['user'] == "unknown")) { ?>
   <ul class="topnav">
  <li><a href="homepage.php">Početna</a></li>
  <li><a class="aktivna" href="grupniTrening.php">Grupni trening</a></li>
  <li><a href="osobniTrening.php">Osobni trening</a></li>
  <li><a href="uclaniSe.php">Učlani se</a></li>
  <li><a href="sign_in.php">Prijava</a></li>
  <li class="right"><a href="kontakt.php">Kontakt</a></li>
</ul>
  <?php } ?>
</header>



<!-- raspored  -->
<div class="red" >
 <h2>Raspored grupnih treninga</h2><br>
 <div style="overflow-x:auto;">
  <table id="myTable">
    <tr>
      <th>Vrijeme</th>
      <th>Ponedeljak</th>
      <th>Utorak</th>
      <th>Srijeda</th>
      <th>Četvrtak</th>
      <th>Petak</th>
      <th>Subota</th>
      <th>Nedelja</th>
    </tr>
    <tr>
      <td>11:00h-12:00h</td>
      <td>Pilates</td>
      <td></td>
      <td>Yoga</td>
      <td></td>
      <td>Total Body</td>
      <td></td>
      <td>Yoga</td>
    </tr>
    <tr>
      <td>12:30h-13:30h</td>
      <td></td>
      <td>Zumba</td>
      <td>Pilates</td>
      <td>Total Body</td>
      <td>Pilates</td>
      <td></td>
      <td></td>
    </tr>
  <tr>
      <td>15:00h-16:00h</td>
      <td></td>
      <td>Total Body</td>
      <td></td>
      <td></td>
      <td></td>
      <td>Zumba</td>
      <td>Pilates</td>
    </tr>
    <tr>
      <td>17:00h-18:00h</td>
      <td>Yoga</td>
      <td></td>
      <td>Pilates</td>
      <td></td>
      <td></td>
      <td>TotalBody</td>
      <td>Zumba</td>
    </tr>
  </table>
 </div>
</div>

<div id="myNav1" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav1()">&times;</a>
  <div class="overlay-content">
   <img src="yoga.jpg" alt="yoga" id="grupneSlike1"><br>
  </div>
</div>
<span  onclick="openNav1()"></span>

<div id="myNav2" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav2()">&times;</a>
  <div class="overlay-content">
   <img src="pilates.jpg" alt="pilates" id="grupneSlike1"><br>
  </div>
</div>
<span  onclick="openNav2()"></span>

<div id="myNav3" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav3()">&times;</a>
  <div class="overlay-content">
   <img src="zumba2.jpg" alt="zumba" id="grupneSlike1"><br>
  </div>
</div>
<span  onclick="openNav3()"></span>

<div id="myNav4" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav4()">&times;</a>
  <div class="overlay-content">
   <img src="tbody.jpg" alt="totalBody" id="grupneSlike1"><br>
  </div>
</div>
<span  onclick="openNav4()"></span>
<!-- grupni trening i cjenovnik -->
		<div class="red">
			<div class="kolona tri">
				<div class="red">
					<div class="kolona dva"><strong>Yoga</strong> <br><br>
					 <img src="yoga.jpg" alt="yoga" id="grupneSlike" onclick="openNav1()"><br>
					Joga predstavlja sistem tjelesnih vježbi (asana), tehnika<br>disanja (pranajama), meditacije, te tehnika duboke relaksacije. 
					Ukratko, to je sveobuhvatan sistem za postizanje<br> psihofizičkog, mentalnog, društvenog i duhovnog zdravlja,<br> i ima holistički
					pristup čovjeku.
					<br> <br> Trener: Dragica Vidić<br><br>
					</div>
					
					<div class="kolona dva"><strong>Pilates</strong> <br><br>
					<img src="pilates.jpg" alt="pilates" id="grupneSlike" onclick="openNav2()"><br>
	             	Pilates metoda oblikovanja tijela jedinstven je sistem vježbi<br> istezanja i vježbi snage. Taj sistem jača i oblikuje mišiće,<br>
					ispravlja držanje tijela, daje nam gipkost i ravnotežu,<br> ujedinjuje tijelo i um te usavršava oblik tijela. 
					<br>Trening traje sat vremena.
					<br> <br> Trener: Ivana Kaliman<br><br>
					</div>
				</div>
				<div class="red">
					<div class="kolona dva"><strong>Zumba</strong> <br><br>
					<img src="zumba2.jpg" alt="zumba" id="grupneSlike" onclick="openNav3()"><br>
					ZUMBA – je svjetski poznat program vježbanja, koji je za<br> kratak period postao apsolutni hit u svijetu fitnesa. Ovaj<br> program 
					vježbanja otkrio je sasvim slučajno instruktor<br> aerobika Alberto Perez prije 20 godina. Sastoji se od<br> kombinacije plesova kao što su: salsa,
					merengue, tango,<br> reggeaton, calipso, hip-hop, lambada, twist itd.
					<br> <br> Trener: Asja Kanlić<br><br>
					</div>
					<div class="kolona dva"><strong>Total body</strong> <br><br>
					<img src="tbody.jpg" alt="totalBody" id="grupneSlike" onclick="openNav4()"><br>
					Total body je kondicijski trening za poboljšanje funkcionalnih <br>i motoričkih sposobnosti.Ova vrsta treninga se bazira na<br> 
					kombinaciji ritmičkih aerobnih vježbi s istezanjem i vežbama<br> snage. Total body treninzi uključuju rad svih mišića, naročito stomaka, 
					zadnjice i nogu i doprinose lijepom oblikovanju <br>tijela. Trening traje sat vremena.
					<br> <br> Trener: Adnan Spahić<br><br>
					</div>
				</div>
			</div>
	<script src="kod.js"></script> 
			<div class="kolona jedan">
			<br>
			<strong>Cjenovnik</strong><br><br>
	<table>
    <tr>
      <th><center><img src="59KM.png" class="images"></center></th>
    </tr>
    <tr>
      <td><center>Fitness+grupne vježbe<br>Konsultacije sa trenerom</center></td>
    </tr>
  </table>
  <br>
  <table>
    <tr>
      <th><center><img src="49KM.png" class="images"></center></th>
    </tr>
    <tr>
      <td><center>Fitness+grupne vježbe<br>Konsultacije sa trenerom<br>Važi samo za studente, đake, penzionere</center></td>
    </tr>
  </table>
  <br>
   <table>
    <tr>
      <th><center><img src="39KM.png" class="images"></center></th>
    </tr>
    <tr>
      <td><center>Fitness+grupne vježbe<br>Samo radnim danima<br>Važi samo za studente, đake, penzionere</center></td>
    </tr>
  </table>
  <br>
</div>
</div>
  
 <?php
		if (isset($_SESSION['user'])){
		if(stristr($_SESSION['user'], "admin")){
			echo '<h2><br>Pregledanje, uređivanje, dodavanje i brisanje stavki iz cjenovnika: </h2>';
		}
		}
		?>
		<div class="red">
		<div class="kolona cetri" id="tabela">
		<form method="post" action="grupniTrening.php">
		<table>
			<tr>
				<th>Redni broj</th>
				<th>Ponuda</th>
				<th>Cijena u KM</th>
			</tr>
		
			<?php
			$veza = new PDO("mysql:dbname=teretana; host=localhost; charset=utf8", "admin", "admin123");
			$upit = 'SELECT * FROM programi';
			foreach($veza->query($upit) as $red){
				echo '<tr>';
				echo '<td>'. htmlspecialchars($red['id'], ENT_QUOTES, 'UTF-8') . '</td>';
				echo '<td>'. htmlspecialchars($red['program'], ENT_QUOTES, 'UTF-8') . '</td>';
				echo '<td>'. htmlspecialchars($red['cijena'], ENT_QUOTES, 'UTF-8') . '</td>';
				if (isset($_SESSION['user'])){
				if(stristr($_SESSION['user'], "admin")){
					echo '<td><form action="" method="POST"><input type="hidden" name="iksic" value="' . $red['id']. '"/><input type="submit" name="izbrisi" value="X" style="width:70%; background-color:red; margin-left:15%; margin-right:15%;"/></form></td>';
				}
				}
				echo '</tr>';
			}
			if (isset($_SESSION['user'])){
				if(stristr($_SESSION['user'], "admin")){
					echo '<tr>';
					echo '<td><input type="text" style="background-color: inherit; width:100%;" name="dodajBroj" class="poljeTabela" placeholder="Redni broj ponude koju dodajete"></td>';
					echo '<td><input type="text" style="background-color: inherit; width:100%;" name="dodajProgram" class="poljeTabela" placeholder="Naziv ponude"></td>';
					echo '<td><input type="text" style="background-color: inherit; width:100%;" name="dodajCijenu" class="poljeTabela" placeholder="Cijena ponude"></td>';
					echo '<td><input type="submit" name="add_this" value = "+" style="width:70%; background-color:lightgreen; margin-left:15%; margin-right:15%;"';
					echo '</tr>';
								
					echo '<tr>';
					echo '<td><input type="text" style="background-color: inherit; width:100%;" name="change_ID" placeholder="Redni broj ponude koju mijenjate"></td>';
					echo '<td><input type="text" style="background-color: inherit; width:100%;" name="novi_program" placeholder="Novi naziv ponude"></td>';
					echo '<td><input type="text" style="background-color: inherit; width:100%;" name="nova_cijena" placeholder="Nova cijena ponude"></td>';
					echo '<td><input type="submit" name="change_this" value="E" style="width:70%; background-color:lightblue; margin-left:15%; margin-right:15%;"';
					echo '</tr>';
				}
			}	
 
					
			if(isset($_POST['change_this'])){
				$veza = new PDO("mysql:dbname=teretana; host=localhost; charset=utf8", "admin", "admin123");
				$upit = 'SELECT * FROM programi';
				
				$no_error1 = true;
				$nema = true;
				foreach($veza->query($upit) as $red) {
				if($red['id'] == $_POST['change_ID']){
					$ID_d = $_POST['change_ID'];
					$program_d = htmlEntities($_POST['novi_program'], ENT_QUOTES);
					$program_d = preg_replace("#[^0-9a-zA-Z ,.ščćžđŠČĆŽĐ]#i", "", $program_d);
					$program = preg_replace("#[^0-9a-zA-ZščćžđŠČĆŽĐ]#i", "", $program_d);
					if(strlen($provjera)<2) {
						$change_error[]="Naziv programa mora sadržati bar dva karaktera.";
						$no_error1=false;
					}
					$cijena_d = htmlEntities($_POST['nova_cijena'], ENT_QUOTES);
					$cijena_d=preg_replace("#[^0-9a-zA-Z .,ščćžđŠČĆŽĐ]#i", "", $cijena_d);
					$provjera = preg_replace("#[^a-zA-ZščćžđŠČĆŽĐ]#i", "", $cijena_d);
					if (strlen($provjera)>0){
						$change_error[]="Cijena moze sadržavati samo brojeve,tacku i zarez.";
						$no_error1=false;
					}
					$cijena_d=str_replace(',', '.', $cijena_d);
					$cijena_d = preg_replace('/\.{2,}/', '.', $cijena_d);
					$nema = false;
					
					if($no_error1){
						$upit1 = $veza->prepare("UPDATE programi SET program=?, cijena=? WHERE id=?");
						$upit1->bindValue(1, $program_d, PDO::PARAM_STR);
						$upit1->bindValue(2, $cijena_d, PDO::PARAM_STR);
						$upit1->bindValue(3, $ID_d, PDO::PARAM_INT);
						$upit1->execute();
						echo "<meta http-equiv = 'refresh' content = '0'>";
					}
				}
				}
				if($nema){
					$change_error[] = "Pod unesenim rednim brojem ne postoji program.";
				}
			}
			
			
							
			if(isset($_POST['add_this'])){
			    $veza = new PDO("mysql:dbname=teretana; host=localhost; charset=utf8", "admin", "admin123");
				$upit = 'SELECT * FROM programi';
				$nema = true;
				foreach($veza->query($upit) as $red) {
					if($red['id'] == $_POST['dodajBroj']){
						$nema = false;
					}
				}
				$no_error2 = true;
				if($nema){
					$ID_d = htmlEntities($_POST['dodajBroj'], ENT_QUOTES);
					$ID_d = preg_replace("#[^0-9a-zA-Z ščćžđŠČĆŽĐ]#i", "", $ID_d);
					$provjera = preg_replace("#[^a-zA-ZščćžđŠČĆŽĐ]#i", "", $ID_d);
					if(strlen($provjera)>0) {
						$add_error[] = "Redni broj ne smije sadržavati nikakve znakove osim brojeva.";
						$no_error2 = false;
					}
					$program_d = htmlEntities($_POST['dodajProgram'], ENT_QUOTES);
					$program_d = preg_replace("#[^0-9a-zA-Z ,.ščćžđŠČĆŽĐ]#i", "", $program_d);
					$provjera = preg_replace("#[^0-9a-zA-ZščćžđŠČĆŽĐ]#i", "", $program_d);
					if(strlen($provjera)<2) {
						$add_error[] = "Naziv programa mora sadržati bar dva karaktera.";
						$no_error2 = false;
					}
					
					$cijena_d = htmlEntities($_POST['dodajCijenu'], ENT_QUOTES);
					
					$cijena_d=preg_replace("#[^0-9a-zA-Z .,ščćžđŠČĆŽĐ]#i", "", $cijena_d);
					$provjera = preg_replace("#[^a-zA-ZščćžđŠČĆŽĐ]#i", "", $cijena_d);
					if (strlen($provjera)>0){
						$add_error[]="Cijena moze sadržavati samo brojeve,tacku i zarez.";
						$no_error2=false;
					}
					$cijena_d=str_replace(',', '.', $cijena_d);
					$cijena_d = preg_replace('/\.{2,}/', '.', $cijena_d);
					
					if($no_error2){
						$traziKorisnika = "SELECT * FROM korisnici where username = 'admin'";
						$server = "localhost";
						$korisnik = "admin";
						$pass = "admin123";
						$baza = "teretana";
						$veza = mysqli_connect($server, $korisnik, $pass, $baza);
						mysqli_set_charset($veza, 'utf8');
						if (!$veza) {
							die("Connection failed: " . mysqli_connect_error());
						}
						$korisnik = 'N/A';
						$izvrsi = $veza->query($traziKorisnika);
						if($izvrsi->num_rows > 0) {
							$rez = mysqli_fetch_row($izvrsi);
							$korisnik = $rez[0];
						}
						$programFK = -1;
						$traziFK = "SELECT * FROM prijedlozi where program = '$program_d' and cijena = '$cijena_d'";
						$izvrsi = $veza->query($traziFK);
						if($izvrsi->num_rows > 0) {
							$rez = mysqli_fetch_row($izvrsi);
							$programFK = $rez[0];
						}
						
						if($programFK != -1) {
							$upit = "INSERT INTO programi (id, program, cijena, korisnik, programFK)
							VALUES ('$ID_d', '$program_d', '$cijena_d', '$korisnik', '$programFK')";
						}
						else{
							$upit = "INSERT INTO programi (id, program, cijena, korisnik, programFK)
							VALUES ('$ID_d', '$program_d', '$cijena_d', '$korisnik', DEFAULT)";
						} 
						if (mysqli_query($veza, $upit)) {
							echo "";
						}
						else {
							echo "Greška: " . $upit . "<br>" . mysqli_error($veza);
						}
						echo "<meta http-equiv = 'refresh' content = '0'>";
					}
				}
				else {
					$add_error[] = "Već postoji cijena sa tim rednim brojem.";
				}
			}
					
			
			if(isset($_POST['izbrisi'])){
				$ID_i = $_POST['iksic'];
				$veza = new PDO("mysql:dbname=teretana; host=localhost; charset=utf8", "admin", "admin123");
				$upit = $veza->prepare("DELETE FROM programi WHERE id=?");
				$upit->bindValue(1, $ID_i, PDO::PARAM_STR);
				$upit->execute();
				
				echo "<meta http-equiv = 'refresh' content = '0'>";
			}
			?>
		</table>
		</form>
		<?php
			if(count($change_error)>0){
				echo '<p>Došlo je do greške pri izmjeni programa:';
				foreach($change_error as $g){
					echo '<p style = "color:red;">' . $g . '</p>';
				}
				echo '</p>';
			}
			if(count($add_error) > 0){
				echo '<p>Došlo je do greške pri dodavanju programa:';
				foreach($add_error as $g){
					echo '<p style = "color:red;">' . $g . '</p>';
				}
				echo '</p>';
			}
		?>
		</div>
		</div>
		<br>
				<div class = "red">
				<div class="kolona tri">
				<form method = "post" id="kolonalogin" class = "forma-validacija" name = "forma-validacija" action = "" >
					<table>
						<caption>Predložite novi program</caption>
						<tr>
							<td>Ponuda: </td>
							<td><input type = "text" name = "program" class = "unos"></td>
						</tr>
						<tr>
							<td>Cijena: </td>
							<td><input type = "text" name = "cijena" class = "unos"></td>
						</tr>
						
						<tr>
							<td></td>
							<td class = "desno"><input name = "prijedlog" type = "submit" value = "Pošalji"></td>
						</tr>
						<tr>
							<td></td>
							<td>
								<?php
									if(count($greske_prijedlog) > 0){
			                    	foreach($greske_prijedlog as $g){
					               echo '<li style = "color:red; list-style: none;">- ' . $g . '</li>';
				                         }
		                            	}
								?>
							</td>
						</tr>
					</table>	
			</div>
			</div>


			<div class="footer" id="footer">
			Copyright © 2016 by AM | All rights reserved. | Preuzimanje sadržaja bez prethodne dozvole nije dopušteno.
			Owned by AM Team | Designed by Amina Spahić
		</div>
 
</body>
</html>