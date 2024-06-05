<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BERLINER ZEITUNG</title>
    <link rel="stylesheet" type="text/css" href="look.css">
</head>
<body>
   <header>
      <div class="logo"><p><img src="Slike/logo.png"></p></div>
   </header>
   <nav class="navbar main_nav " role="navigation">
<ul class="main nav navbar-nav">
<li>
<a href="main.php" class="">HOME</a>
</li>
<li>
<a href="kategorija.php?id=sport" class="">BERLIN SPORT</a>
</li>
<li>
<a href="kategorija.php?id=kultura" class="">KULTUR UND SHOW</a>
</li>
<li>
<a href="login.php" class="">ADMINISTRACIJA</a>
</li>
</ul>
</nav>

<section role="main">
<form enctype="multipart/form-data" action="logins.php" method="POST" class="logger">
<div class="form-item">
<span id="porukaIme" class="bojaPoruke"></span>
<label for="title">Ime: </label>
<div class="form-field">
<input type="text" name="ime" id="ime" class="form-field-textual">
</div>
</div>
<div class="form-item">
<span id="porukaPrezime" class="bojaPoruke"></span>
<label for="about">Prezime: </label>
<div class="form-field">
<input type="text" name="prezime" id="prezime" class="form-field-textual">
</div>
</div>
<div class="form-item">
<span id="porukaUsername" class="bojaPoruke"></span>
<label for="content">Korisničko ime:</label>
<br>
<input type="text" name="username" id="username" class="form-field-textual">
</div>
</div>
<div class="form-item">
<span id="porukaPass" class="bojaPoruke"></span>
<label for="pphoto">Lozinka: </label>
<div class="form-field">
<input type="password" name="pass" id="pass" class="form-field-textual">
</div>
</div>
<div class="form-item">
<span id="porukaPassRep" class="bojaPoruke"></span>
<label for="pphoto">Ponovite lozinku: </label>
<div class="form-field">
<input type="password" name="passRep" id="passRep" class="form-field-textual">
</div>
</div>
<div class="form-item">
<button type="submit" value="Prijava" id="slanje">Prijava</button>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</div>
</form>
</section>

<script type="text/javascript">
document.getElementById("slanje").onclick = function(event) {
var slanjeForme = true;
// Ime korisnika mora biti uneseno
var poljeIme = document.getElementById("ime");
var ime = document.getElementById("ime").value;
if (ime.length == 0) {
slanjeForme = false;
poljeIme.style.border="1px dashed red";
document.getElementById("porukaIme").innerHTML="<br>Unesite ime!<br>";
} else {
poljeIme.style.border="1px solid green";
document.getElementById("porukaIme").innerHTML="";
}
// Prezime korisnika mora biti uneseno
var poljePrezime = document.getElementById("prezime");
var prezime = document.getElementById("prezime").value;
if (prezime.length == 0) {
slanjeForme = false;
poljePrezime.style.border="1px dashed red";
document.getElementById("porukaPrezime").innerHTML="<br>Unesite Prezime!<br>";
} else {
poljePrezime.style.border="1px solid green";
document.getElementById("porukaPrezime").innerHTML="";
}
// Korisničko ime mora biti uneseno
var poljeUsername = document.getElementById("username");
var username = document.getElementById("username").value;
if (username.length == 0) {
slanjeForme = false;
poljeUsername.style.border="1px dashed red";
document.getElementById("porukaUsername").innerHTML="<br>Unesite korisničko ime!<br>";
} else {
poljeUsername.style.border="1px solid green";
document.getElementById("porukaUsername").innerHTML="";
}
// Provjera podudaranja lozinki
var poljePass = document.getElementById("pass");
var pass = document.getElementById("pass").value;
var poljePassRep = document.getElementById("passRep");
var passRep = document.getElementById("passRep").value;
if (pass.length == 0 || passRep.length == 0 || pass != passRep) {
slanjeForme = false;
poljePass.style.border="1px dashed red";
poljePassRep.style.border="1px dashed red";
document.getElementById("porukaPass").innerHTML="<br>Lozinke nisu iste!<br>";
document.getElementById("porukaPassRep").innerHTML="<br>Lozinke nisu iste!<br>";
} else {
poljePass.style.border="1px solid green";
poljePassRep.style.border="1px solid green";
document.getElementById("porukaPass").innerHTML="";
document.getElementById("porukaPassRep").innerHTML="";
}
if (slanjeForme != true) {
event.preventDefault();
}
};
</script>

<footer>
   <div class="filler">
     <div class="foot">
      <p>Weitere sind Online-Angebote der Alten Sprache SE</p>
      </div>
   </div>
</footer>

</body>
</html>
