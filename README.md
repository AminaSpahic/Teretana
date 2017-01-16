# Teretana

###Amina Spahić 16828

Stranica će nuditi informacije o programima teretane, grupnim i osobnim treninzima.

## SPIRALA 1

**I - Šta je urađeno?** 
a) Urađene su skice za sve podstranice. Također i za izgled na mobilnim uređajima. Korišten je mockup.
b) Sve stranice su responzivne i imaju grid view izgled.
c) Napravljen je i izgled za mobilne uređaje pomoću media query-a.
d) Implementirane su 3 forme. Forma1 omogućava korisnicima da se učlane(uclaniSe.html), 
forma2 omogućava anketiranje korisnika(osobniTrening.html), i treća kontakt forma omogućava korisnicima da kontaktiraju osoblje(kontakt.html).
e) Implementiran je i meni, koji je vidljiv na svim podstranicama, te imaju linkovi na sve podstranice.
f) Elementi na strancici su poravnati.

**II  - Šta nije urađeno?**
Urađeni su svi zadaci prve spirale.

**III - Bug-ovi koje ste primijetili ali niste stigli ispraviti, a znate rješenje (opis rješenja)**
Nisam primjetila nikakve bugove.

**IV  - Bug-ovi koje ste primijetili ali ne znate rješenje**
Nisam primjetila nikakve bugove.

**V  - Lista fajlova u formatu NAZIVFAJLA - Opis u vidu jedne rečenice šta se u fajlu nalazi**

homepage.html - Pocetna stranica, sadrži slider sa slikama i ukratko o programima.

grupniTrening.html - Podstranica koja sadrzi raspored treninga, ukratko o programima i cjenovnik.

osobniTrening.html - Podstranica koja sadrzi informacije o programu, ličnim trenerima i anketu.

uclaniSe.html - Podstranica koja sadrzi formu za članstvo u teretanu.

kontakt.html - Podstranica koja sadrzi formu za slanje poruka, kontakt informacije, te mapu sa lokacijom.

Folder Skice- sadrzi skice za desktop i za mobilnu verziju stranica.

style.css - sadrzi sav css kod za stranicu
slider.js - javascript document za slider na pocetnoj stranici.


## SPIRALA 2

**I  - Šta je urađeno?** 
a) Urađena je validacija na formama, nisam radila validaciju na formi koja omogućava anketiranje, jer nije bilo potrebe.
Greške se prikazuju iznad submit dugmeta, crvenim slovima, i daju dovoljno informacija da se može ispraviti greška. Ukoliko korisnik
nije popunio sva polja, prvobitno "iskace" obavještenje da popuni polja, pa tek onda poruke o greškama(ukoliko ih ima).
b) Urađen je carousel na pocetnoj stranici(umjesto slidera koji je već tu bio na spirali 1). 
Urađena je i galerija slika sa opcijom da se na klik slika raširi preko cijelog ekrana, a na x i escape da se vrati pogled nazad na
galeriju.(na slikama koje se nalaze na podstanici grupniTrening.html)
c) urađen je ajax tako da se podstranice učitavaju bez reload-a cijele stranice, već da se samo sadržaj podstranice mijenja.

**II  - Šta nije urađeno?**
Sve je urađeno.

**III - Bug-ovi koje ste primijetili ali niste stigli ispraviti, a znate rješenje (opis rješenja)**
/

**IV  - Bug-ovi koje ste primijetili ali ne znate rješenje**
Prilikom izrade zadataka pod c), ajaxa, naišla sam na više problema. Do tada mi je sve radilo kako treba. 

Prvi problem je što mi nije učitavao javascript kod za carousel, nakon drugog ucitavanja, samo kad tek otvorim stranicu.
To sam riješila tako što sam dodala dodatni kod u js-u za ucitavanje, što je učinilo da se sve sporije učitava, ali barem radi.
Drugi problem je što mi se nakon drugog puta, kad se vratim na pocetnu stranicu(samo na nju), header ponovi ispod, pa ponovnim 
klikom na nju vrati kako treba. To nisam uspjela riješiti.
Te treći problem, nakon ubacivanja koda za ajax, zadatak pod b), u kojem se treba klikom na sliku raširiti slika preko cijelog
ekrana, i na x i escape vratiti nazad, meni sada samo radi kad kliknem na x. 

**V  - Lista fajlova u formatu NAZIVFAJLA - Opis u vidu jedne rečenice šta se u fajlu nalazi**

homepage.html - Pocetna stranica, sadrži carousel sa slikama i ukratko o programima.

grupniTrening.html - Podstranica koja sadrzi raspored treninga, ukratko o programima i cjenovnik.Klikom na slike, rašire se preko cijelog ekrana.

osobniTrening.html - Podstranica koja sadrzi informacije o programu, ličnim trenerima i anketu.

uclaniSe.html - Podstranica koja sadrzi formu za članstvo u teretanu. Forma validirana.

kontakt.html - Podstranica koja sadrzi formu za slanje poruka, kontakt informacije, te mapu sa lokacijom. Forma validirana.

Folder Skice- sadrzi skice za desktop i za mobilnu verziju stranica.

style.css - sadrzi sav css kod za stranicu
kod.js - javascript document, kod za ajax, carousel, fullscreen, validaciju ..

##SPIRALA 3
I - Šta je urađeno? 1) Napravljena je serijalizacija svih podataka u XML fajlove, nalazi u i folderu "xmlovi". Omogućen je unos, izmjenu, prikazivanje i brisanje podataka od strane admina, na podstranici "grupniTrening.php", gdje moze raditi manipulaciju nad stavkama u cjenovniku. Svi podaci koji se unose u XML du validirani (validacija i u js i PHP-u). Adminovi podaci (username - admin i password - admin123) . 2) i 3) Omogućen adminu download podataka u obliku csv i pdf fajla. Podaci su iz XML-a(clanovi.xml), nisu hardkodirani. Kad je admin logovan, na podstranici "uclaniSe.php", moze downloadovati spomente fajlove. 4) Napravljen opcija pretrage podataka sa prijedlozima.
Kada korisnik pritisne na dugme Traži prikazuju se svi rezultati koji zadovoljavaju uslov. 5) Urađen je i deployment, http://teretana-teretana.44fs.preview.openshiftapps.com/homepage.php
II - Šta nije urađeno? Sve je urađeno.
III - Bug-ovi koje ste primijetili ali niste stigli ispraviti, a znate rješenje (opis rješenja) /
IV - Bug-ovi koje ste primijetili ali ne znate rješenje /
V - Lista fajlova u formatu NAZIVFAJLA - Opis u vidu jedne rečenice šta se u fajlu nalazi
homepage.php - Pocetna stranica, sadrži slider sa slikama, ukratko o programima i pretrazivac
.
grupniTrening.php - Podstranica koja sadrzi raspored treninga, ukratko o programima i cjenovnik.Klikom na slike, rašire se preko cijelog ekrana. na samom kraju podstranice nalazi se tabele sa cijenama i ponudama teretane, na kojoj admin vrsi manipulaciju nad podacima.

osobniTrening.php - Podstranica koja sadrzi informacije o programu, ličnim trenerima i anketu.

uclaniSe.php - Podstranica koja sadrzi formu za članstvo u teretana. Kad je admin logovan, sadrzi i buttone za download u pdf i csv format.Forma validirana.

kontakt.php - Podstranica koja sadrzi formu za slanje poruka, kontakt informacije, te mapu sa lokacijom. Forma validirana.

sign_in.php - Podstranica koja omogućava prijavu odjava.php -odjava sa sesije

Folder Skice- sadrzi skice za desktop i za mobilnu verziju stranica.

style.css - sadrzi sav css kod za stranicu 

kod.js - javascript document

pretraga.php - php fajl koji vrši pretraživanje XML fajlova unutar foldera cjenovnik i šalje kao odgovor rezultat pretrage

fpdf bibiloteka

pdf.php - za downloadovanje u pdf

csv.pdf - za downloadovanje u php folder

cjenovnik - folder u kome su smješteni XML fajlovi, koji sadrže id, cijenu i naziv ponude koji se nalaze u ponudi

xmlovi- folder u kojem su smjesten XML fajlovi(admin.xml, anketa.xml, clanovi.xml, kontakti.xml, login.xml)

##SPIRALA 4
**I  - Šta je urađeno?** 
Napravljena ne MYSQL baza sa tri povezane tabele korisnici(registrovani korisniici, primarni kljuc username), prijedlozi(primarni kljuc id, programi(primarni kljuc id, a foreign key ima na tabelu korisnici(korisnik) in a tableu prijedlozi(programFK)). 
Dodana je forma za registraciju (sign_up.php), na koju se dolazi klikom na link, na podstranici sign_in.php.
Također je dodana forma za dodavanje prijedloga za nove programe u teretani, na podstranici grupniTrening.php.
svi podaci iz xml-ova se prebacuju u bazu. 
        PHP skripte su prepravljene, tako da se podaci čuvaju u bazi podataka, a  ne  u XML fajlovima. 
Napravljena je i jedna metoda REST web servisa (GET metoda), koja vraća podatke o programu koji odgovara zadanom id-u, u oblik JSON-a. (webservis.php.) 
Screenshotovi na kojima se vidi testiranje web servisa koristeći POSTMAN se nalaze u folderu POSTMAN. 
 Podaci za prijavu admina -> username:admin, password: admin123

**II  - Šta nije urađeno?**
Nije urađen zadatak pod d), tj. nije napravljen hosting stranice na OpenShift.
Nije ni omoguceno da na klikom na dugme svi podaci iz xml-a prebace u bazu podataka

**III - Bug-ovi koje ste primijetili ali niste stigli ispraviti, a znate rješenje (opis rješenja)**
/
**IV  - Bug-ovi koje ste primijetili ali ne znate rješenje**
/
**V  - Lista fajlova u formatu NAZIVFAJLA - Opis u vidu jedne rečenice šta se u fajlu nalazi**
homepage.php - Pocetna stranica, sadrži slider sa slikama, ukratko o programima i pretrazivac.

grupniTrening.php - Podstranica koja sadrzi raspored treninga, ukratko o programima i cjenovnik.Klikom na slike, rašire se 
                  preko cijelog ekrana. na samom kraju podstranice nalazi se tabele sa cijenama i ponudama teretane, 
                  na kojoj admin vrsi manipulaciju nad podacima.Dodana forma za prijedloge.
                  
                  
osobniTrening.php - Podstranica koja sadrzi informacije o programu, ličnim trenerima i anketu.


uclaniSe.php - Podstranica koja sadrzi formu za članstvo u teretana. Kad je admin logovan, sadrzi i buttone za download u
               pdf i csv format.Forma validirana.
               
               
kontakt.php - Podstranica koja sadrzi formu za slanje poruka, kontakt informacije, te mapu sa lokacijom. Forma validirana.

sign_in.php - Podstranica koja omogućava prijavu registorvsanih korisnika.

sign_up.php - Podstranica koja omogucava registraciju korisnika.

odjava.php -odjava sa sesije

Folder Skice- sadrzi skice za desktop i za mobilnu verziju stranica. 

style.css - sadrzi sav css kod za stranicu

kod.js - javascript document 

pretraga.php - php fajl koji vrši pretraživanje XML fajlova unutar foldera cjenovnik i šalje kao odgovor rezultat pretrage

fpdf bibiloteka
pdf.php - za downloadovanje u pdf

csv.php - za downloadovanje u csv

folder cjenovnik - folder u kome su smješteni XML fajlovi, koji sadrže id, cijenu i naziv ponude koji se nalaze u ponudi 

xmlovi- folder u kojem su smjesten XML fajlovi(admin.xml, anketa.xml, clanovi.xml, kontakti.xml, login.xml

teretana.sql -  export baze sa phpMyAdmin

folder POSTMAN - folder u kojem se nalaze screenshotovi na kojima je prikazano testiranje web servisa

webservis.php - php fajl u kojem se nalazi GET metoda REST web servisa koja vraća podatke u obliku JSON-a
