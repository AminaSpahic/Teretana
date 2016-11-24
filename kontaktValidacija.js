function validate(){
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
