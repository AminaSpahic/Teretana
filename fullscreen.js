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