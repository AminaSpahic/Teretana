<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("xmlovi/clanovi.xml");

$x=$xmlDoc->getElementsByTagName('data');

$q=$_GET["q"];
$hint = "";
if (strlen($q)>0) {
  $hint="";
  for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('name');
    $alternat = $x->item($i)->getElementsByTagName('lastname');
    $z=$x->item($i)->getElementsByTagName('email');
    if ($y->item(0)->nodeType==1) {
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {
        if ($hint=="") {
          $hint="<a href='homepage.php?id=" . 
          $z->item(0)->childNodes->item(0)->nodeValue . 
          "' target='_blank'>" . 
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";

        } else {
          $hint=$hint . "<br /><a href='homepage.php?id=" . 
          $z->item(0)->childNodes->item(0)->nodeValue . 
          "' target='_blank'>" . 
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
          
        }
      }else if (stristr($alternat->item(0)->childNodes->item(0)->nodeValue,$q))
      {
          if ($hint=="") {
          $hint=$hint . "<a href='homepage.php?id=" . 
          $z->item(0)->childNodes->item(0)->nodeValue . 
          "' target='_blank'>" . 
          $alternat->item(0)->childNodes->item(0)->nodeValue . "</a>";
        } else {          
          $hint=$hint . "<br /><a href='homepage.php?id=" . 
          $z->item(0)->childNodes->item(0)->nodeValue . 
          "' target='_blank'>" . 
          $alternat->item(0)->childNodes->item(0)->nodeValue . "</a>";
        }
      }
    }
  }
}

if ($hint=="") {
  $response="<a>Nema rezultata.</a>";
} else {
  $response=$hint;
}

echo $response;
?>