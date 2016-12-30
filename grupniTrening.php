<?php
	session_start();
	$change_error = array();
	$add_error = array();
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
  <li><a href="osobnitrening.php">Osobni trening</a></li>
  <li><a href="uclaniSe.php">Učlani se</a></li>
  <li><a href="odjava.php">Odjava</a></li>
  <li class="right"><a href="kontakt.php">Kontakt</a></li>
</ul>
<?php } } 
   if((!isset($_SESSION['user']) || $_SESSION['user'] == "unknown")) { ?>
   <ul class="topnav">
  <li><a href="homepage.php">Početna</a></li>
  <li><a class="aktivna" href="grupniTrening.php">Grupni trening</a></li>
  <li><a href="osobnitrening.php">Osobni trening</a></li>
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
			$fajlovi=glob('cjenovnik/*.xml');
			foreach($fajlovi as $fajl){
				$xml=new SimpleXMLElement($fajl,0,true);
				echo '<tr>';
				echo '<td>'. htmlspecialchars($xml->ID, ENT_QUOTES, 'UTF-8') . '</td>';
				echo '<td>'. htmlspecialchars($xml->proizvod, ENT_QUOTES, 'UTF-8') . '</td>';
				echo '<td>'. htmlspecialchars($xml->cijena, ENT_QUOTES, 'UTF-8') . '</td>';
				if (isset($_SESSION['user'])){
				if(stristr($_SESSION['user'], "admin")){
					echo '<td><form action="" method="POST"><input type="hidden" name="iksic" value="' . $xml->ID. '"/><input type="submit" name="izbrisi" value="X" style="width:70%; background-color:red; margin-left:15%; margin-right:15%;"/></form></td>';
				}
				}
				echo '</tr>';
			}
			if (isset($_SESSION['user'])){
				if(stristr($_SESSION['user'], "admin")){
					echo '<tr>';
					echo '<td><input type="text" style="background-color: inherit; width:100%;" name="dodajBroj" class="poljeTabela" placeholder="Redni broj ponude koju dodajete"></td>';
					echo '<td><input type="text" style="background-color: inherit; width:100%;" name="dodajProizvod" class="poljeTabela" placeholder="Naziv ponude"></td>';
					echo '<td><input type="text" style="background-color: inherit; width:100%;" name="dodajCijenu" class="poljeTabela" placeholder="Cijena ponude"></td>';
					echo '<td><input type="submit" name="add_this" value = "+" style="width:70%; background-color:lightgreen; margin-left:15%; margin-right:15%;"';
					echo '</tr>';
								
					echo '<tr>';
					echo '<td><input type="text" style="background-color: inherit; width:100%;" name="change_ID" placeholder="Redni broj ponude koju mijenjate"></td>';
					echo '<td><input type="text" style="background-color: inherit; width:100%;" name="novi_proizvod" placeholder="Novi naziv ponude"></td>';
					echo '<td><input type="text" style="background-color: inherit; width:100%;" name="nova_cijena" placeholder="Nova cijena ponude"></td>';
					echo '<td><input type="submit" name="change_this" value="E" style="width:70%; background-color:lightblue; margin-left:15%; margin-right:15%;"';
					echo '</tr>';
				}
			}			
			if(isset($_POST['change_this'])){
				$fajlovi = glob('cjenovnik/*.xml');
				$no_error1 = true;
				$nema = true;
				foreach($fajlovi as $fajl) {
				$xml = new SimpleXMLElement($fajl, 0, true);
				if($xml->ID == $_POST['change_ID']){
					$ID_d = $_POST['change_ID'];
					$proizvod_d = htmlEntities($_POST['novi_proizvod'], ENT_QUOTES);
					$proizvod_d = preg_replace("#[^0-9a-zA-Z ,.ščćžđŠČĆŽĐ]#i", "", $proizvod_d);
					$provjera = preg_replace("#[^0-9a-zA-ZščćžđŠČĆŽĐ]#i", "", $proizvod_d);
					if(strlen($provjera)<2) {
						$change_error[]="Naziv ponude mora sadržati bar dva karaktera.";
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
						$fajl1 = "cjenovnik/" . $ID_d . ".xml";
						unlink($fajl1);
						$xml = new SimpleXMLElement('<?xml version = "1.0" encoding = "utf-8"?><stavka></stavka>');
						$xml->addChild('ID', $ID_d);
						$xml->addChild('proizvod', $proizvod_d);
						$xml->addChild('cijena', $cijena_d);
						$xml->asXML('cjenovnik/' . $ID_d . '.xml');
						echo "<meta http-equiv = 'refresh' content = '0'>";
					}
				}
				}
				if($nema){
					$change_error[] = "Pod unesenim rednim brojem ne postoji ponuda.";
				}
			}
							
			if(isset($_POST['add_this'])){
				$fajlovi = glob('cjenovnik/*.xml');
				$nema = true;
				foreach($fajlovi as $fajl) {
					$xml1 = new SimpleXMLElement($fajl, 0, true);
					if($xml1->ID == $_POST['dodajBroj']){
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
					$proizvod_d = htmlEntities($_POST['dodajProizvod'], ENT_QUOTES);
					$proizvod_d = preg_replace("#[^0-9a-zA-Z ,.ščćžđŠČĆŽĐ]#i", "", $proizvod_d);
					$provjera = preg_replace("#[^0-9a-zA-ZščćžđŠČĆŽĐ]#i", "", $proizvod_d);
					if(strlen($provjera)<2) {
						$add_error[] = "Naziv ponude mora sadržati bar dva karaktera.";
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
						$xml = new SimpleXMLElement('<?xml version = "1.0" encoding = "utf-8"?><stavka></stavka>');
						$xml->addChild('ID', $ID_d);
						$xml->addChild('proizvod', $proizvod_d);
						$xml->addChild('cijena', $cijena_d);
						$xml->asXML('cjenovnik/' . $ID_d . '.xml');
						echo "<meta http-equiv = 'refresh' content = '0'>";
					}
				}
				else {
					$add_error[] = "Već postoji cijena sa tim rednim brojem.";
				}
			}
					
			if(isset($_POST['izbrisi'])){
				$ID_i = $_POST['iksic'];
				$fajl = "cjenovnik/" . $ID_i . ".xml";
				unlink($fajl);
				echo "<meta http-equiv = 'refresh' content = '0'>";
			}
			?>
		</table>
		</form>
		<?php
			if(count($change_error)>0){
				echo '<p>Došlo je do greške pri izmjeni ponude:';
				foreach($change_error as $g){
					echo '<p style = "color:red;">' . $g . '</p>';
				}
				echo '</p>';
			}
			if(count($add_error) > 0){
				echo '<p>Došlo je do greške pri dodavanju ponude:';
				foreach($add_error as $g){
					echo '<p style = "color:red;">' . $g . '</p>';
				}
				echo '</p>';
			}
		?>
		</div>
		</div>
		<br>


			<div class="footer" id="footer">
			Copyright © 2016 by AM | All rights reserved. | Preuzimanje sadržaja bez prethodne dozvole nije dopušteno.
			Owned by AM Team | Designed by Amina Spahić
		</div>
 
</body>
</html>