
/* 
 var script = document.createElement('script');
script.src = 'kod.js';
script.onload = function()
{};
document.head.appendChild(script);
  */
 
/*  function aj(stranica){
var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {// Anonimna funkcija

        if (ajax.readyState == 4 && ajax.status == 200){
            document.getElementById("polje").innerHTML = ajax.responseText;
 
        document.getElementById('polje').scrollIntoView();
              
  }
        if (ajax.readyState == 4 && ajax.status == 404)
            document.getElementById("polje").innerHTML = "Greska: nepoznat URL";    
    }
	
     ajax.open("GET", stranica, true);
     ajax.send();
     return false;
} 
 */

/*homepage-slider*/
  var ind = 0;
slider();

 function slider() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    ind++;
    if (ind > x.length) {ind = 1}
    x[ind-1].style.display = "block";
    setTimeout(slider, 2000); // Change image every 2 seconds
}  

/*grupniTrening fullscreen*/
function openNav1() {
	document.getElementById("myNav1").style.width = "100%";
}

function openNav2(){
	document.getElementById("myNav2").style.width = "100%";
}

function openNav3(){
	document.getElementById("myNav3").style.width = "100%";
}

function openNav4(){
	document.getElementById("myNav4").style.width = "100%";
}

function closeNav1() {
	document.getElementById("myNav1").style.width = "0%";
}

function keyCode(event) {
    var x = event.keyCode;
    if (x == 27) {
        document.getElementById("myNav1").style.width = "0%";
		 document.getElementById("myNav2").style.width = "0%";
		  document.getElementById("myNav3").style.width = "0%";
		   document.getElementById("myNav4").style.width = "0%";
    }
}

function closeNav2(){
	document.getElementById("myNav2").style.width = "0%";
}

function closeNav3(){
	document.getElementById("myNav3").style.width = "0%";
}

function closeNav4(){
	document.getElementById("myNav4").style.width = "0%";
}

/* uclaniSe validacija*/
function validate(){
  var tacno=false;
  var greska = document.getElementsByClassName('greska')[0];
  var ime=document.getElementsByName('name')[0];
  var lastname=document.getElementsByName('lastname')[0];
  var email=document.getElementsByName('email')[0];
  var telefon=document.getElementsByName('telefon')[0];
  greska.innerHTML= "";
  var imeRegEx=/^[a-zA-Z ]{2,19}$/;
  var emailRegEx=/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
  var telefonRegEx = /^\(?(\d{3})\)?[-]?(\d{3})[-]?(\d{3})$/;

  /*ime*/
  if(ime.value.length<1 || !imeRegEx.test(ime.value))
  {
    ime.style.borderColor="#421C5";
    greska.innerHTML+="<li>Ime moze sadrzavati samo slova, najmanje dva, najvise 19.Pokusajte ponovo.</li>";
    tacno=false;
  }
  else{
    ime.style.borderColor="#b793b7";
    tacno=true;
}
/*prezime*/  
if(lastname.value.length<1 || !imeRegEx.test(lastname.value))
{
  lastname.style.borderColor="#421C5";
  greska.innerHTML+="<li>Prezime moze sadrzavati samo slova, najmanje dva, najvise 19.Pokusajte ponovo.</li>";
  tacno=false;
}
else{
  lastname.style.borderColor="#b793b7";
  tacno=true;
}
/*mail*/
if(email.value.length<0 || !emailRegEx.test(email.value))
    {
      email.style.borderColor="#421C5";
      greska.innerHTML+="<li>Email mora biti u formaru example@hotmail.com. Pokusajte ponovo.</li>";
      tacno=false;
    }
    else{
      email.style.borderColor="#b793b7";
      tacno=true;
  }
/*telefon*/
if(telefon.value.length<0 || !telefonRegEx.test(telefon.value))
    {
      telefon.style.borderColor="#421C5";
      greska.innerHTML+="<li>Telefon format: (061)-123-345 ili 061-123-456 ili 061123456. Pokusajte ponovo.</li>";
      tacno=false;
    }
    else{
      telefon.style.borderColor="#b793b7";
      tacno=true;
  }
 
  
if(!tacno) greska.style.display="inline-block";
return tacno;
}



/* kontakt validacija*/

function validirajPodatke(){
  var tacno=false;
  var greska = document.getElementsByClassName('greska')[0];
  var ime=document.getElementsByName('name')[0];
  var email=document.getElementsByName('email')[0];
  var telefon=document.getElementsByName('telefon')[0];
   var tekst=document.getElementsByName('tekst')[0];
  greska.innerHTML= "";
  var imeRegEx=/^[a-zA-Z ]{2,19}$/;
  var emailRegEx=/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
  var telefonRegEx = /^\(?(\d{3})\)?[-]?(\d{3})[-]?(\d{3})$/;

  /*ime*/
  if(ime.value.length<1 || !imeRegEx.test(ime.value))
  {
    ime.style.borderColor="#421C5";
    greska.innerHTML+="<li>Ime moze sadrzavati samo slova, najmanje dva, najvise 19.Pokusajte ponovo.</li>";
    tacno=false;
  }
  else{
    ime.style.borderColor="#b793b7";
    tacno=true;
}
/*mail*/
if(email.value.length<0 || !emailRegEx.test(email.value))
    {
      email.style.borderColor="#421C5";
      greska.innerHTML+="<li>Email mora biti u formaru example@hotmail.com. Pokusajte ponovo.</li>";
      tacno=false;
    }
    else{
      email.style.borderColor="#b793b7";
      tacno=true;
  }
/*telefon*/
if(telefon.value.length<0 || !telefonRegEx.test(telefon.value))
    {
      telefon.style.borderColor="#421C5";
      greska.innerHTML+="<li>Telefon format: (061)-123-345 ili 061-123-456 ili 061123456. Pokusajte ponovo.</li>";
      tacno=false;
    }
    else{
      telefon.style.borderColor="#b793b7";
      tacno=true;
  }
 /*tekst*/
if(tekst.value.length<10)
{
tekst.style.borderColor="#421C5";
greska.innerHTML+="<li>Poruka mora sadrzavati minimalno 10 znakova</li>";
tacno=false;
}
else{
tekst.style.borderColor="#b793b7";
tacno=true;
} 
  
if(!tacno) greska.style.display="inline-block";
return tacno;
}


/*validacija login-forme*/
function validate(){
  var tacno=false;
  var greska = document.getElementsByClassName('greska')[0];
  var ime=document.getElementsByName('username')[0];
  var lozinka=document.getElementsByName('password')[0];
  greska.innerHTML= "";
  var imeRegEx=/^[a-zA-Z ]{2,19}$/;
  var passRegex=/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
  /*ime*/
  if(ime.value.length<1 || !imeRegEx.test(ime.value))
  {
    ime.style.borderColor="#421C5";
    greska.innerHTML+="<li>Ime moze sadrzavati samo slova, najmanje dva, najvise 19.Pokusajte ponovo.</li>";
    tacno=false;
  }
  else{
    ime.style.borderColor="#b793b7";
    tacno=true;
}
  
    /*password*/
  if(lozinka.value.length<1 || !passRegex.test(lozinka.value))
  {
    lozinka.style.borderColor="#421C5";
    greska.innerHTML+="<li>Netačan password. Pokušajte ponovo.</li>";
    tacno=false;
  }
  else{
    lozinka.style.borderColor="#b793b7";
    tacno=true;
}
if(!tacno) greska.style.display="inline-block";
return tacno;
}


/*search*/
function prikazi(str) {
  if (str.length==0) { 
    document.getElementById("prikazpretrage").innerHTML="";
    document.getElementById("prikazpretrage").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("prikazpretrage").innerHTML=this.responseText;
      document.getElementById("prikazpretrage").style.border="1px solid #A5ACB2";
      document.getElementById("prikazpretrage").style.display = "block";
      document.getElementById("prikazRezultata").style.display = "none";
    }
  }
  xmlhttp.open("GET","pretraga.php?q="+str,true);
  xmlhttp.send();
}

function prikaziSvePretrage()
{
    unostrazi = document.getElementById("unostrazi").value;
    
    if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("prikazRezultata").style.display = "block";
      document.getElementById("prikazRezultata").innerHTML=this.responseText;
      document.getElementById("prikazpretrage").style.display = "none";
    }
  }
  xmlhttp.open("GET","pretraga.php?q="+unostrazi,true);
  xmlhttp.send();
}
  
