
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="look.css">
    <meta charset="utf-8">
   
</head>

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
<body>

    <h1>Admin Panel</h1>

    <form enctype="multipart/form-data" action="insert.php"
method="POST">
<div class="form-item">
<span id="porukaTitle" class="bojaPoruke"></span>
<label for="title">Naslov vjesti</label>
<div class="form-field">
<input type="text" name="title" id="title" class="form-
field-textual">
</div>
</div>
<div class="form-item">
<span id="porukaAbout" class="bojaPoruke"></span>
<label for="about">Kratki sadržaj vjesti (do 50
znakova)</label>
<div class="form-field">
<textarea name="about" id="about" cols="30" rows="10"
class="form-field-textual"></textarea>
</div>
</div>
<div class="form-item">
<span id="porukaContent" class="bojaPoruke"></span>
<label for="content">Sadržaj vjesti</label>
<div class="form-field">
<textarea name="content" id="content" cols="30" rows="10"
class="form-field-textual"></textarea>
</div>
</div>
<div class="form-item">
<span id="porukaSlika" class="bojaPoruke"></span>
<label for="pphoto">Slika: </label>
<div class="form-field">
<input type="text" class="input-text" id="pphoto"
name="pphoto"/>
</div>
</div>
<div class="form-item">
<span id="porukaKategorija" class="bojaPoruke"></span>
<label for="category">Kategorija vjesti</label>
<div class="form-field">
<select name="category" id="category" class="form-field-
textual">
<option value="" disabled selected>Odabir
kategorije</option>
8
<option value="sport">Sport</option>
<option value="kultura">Kultura</option>
</select>
</div>
</div>
<div class="form-item">
<label>Spremiti u arhivu:
<div class="form-field">
<input type="checkbox" name="archive" id="archive">
</div>
</label>
</div>
<div class="form-item">

<button type="reset" value="Poništi">Poništi</button>
<button type="submit" value="Prihvati" id="slanje">Prihvati</button>
<button type="button" onclick="window.location.href='editor.php'">Editiraj clanke</button>
<button type="button" onclick="window.location.href='register.php'">Dodaj admina</button>
</div>
</div>
</form>
<script type="text/javascript">
// Provjera forme prije slanja
document.getElementById("slanje").onclick = function(event) {
var slanjeForme = true;
// Naslov vjesti (5-30 znakova)
var poljeTitle = document.getElementById("title");
var title = document.getElementById("title").value;
if (title.length < 5 || title.length > 30) {
slanjeForme = false;
poljeTitle.style.border="1px dashed red";
document.getElementById("porukaTitle").innerHTML="Naslov vjesti mora imati između 5 i 30 znakova!<br>";
} else {
poljeTitle.style.border="1px solid green";
document.getElementById("porukaTitle").innerHTML="";
}
// Kratki sadržaj (10-100 znakova)
var poljeAbout = document.getElementById("about");
var about = document.getElementById("about").value;
if (about.length < 10 || about.length > 100) {
slanjeForme = false;
poljeAbout.style.border="1px dashed red";
document.getElementById("porukaAbout").innerHTML="Kratki sadržaj mora imati između 10 i 100 znakova!<br>";
} else {
poljeAbout.style.border="1px solid green";
document.getElementById("porukaAbout").innerHTML="";
}
// Sadržaj mora biti unesen
var poljeContent = document.getElementById("content");
var content = document.getElementById("content").value;
if (content.length == 0) {
slanjeForme = false;
poljeContent.style.border="1px dashed red";
document.getElementById("porukaContent").innerHTML="Sadržaj mora biti unesen!<br>";
} else {
poljeContent.style.border="1px solid green";
10
document.getElementById("porukaContent").innerHTML="";
}
// Slika mora biti unesena
var poljeSlika = document.getElementById("pphoto");
var pphoto = document.getElementById("pphoto").value;
if (pphoto.length == 0) {
slanjeForme = false;
poljeSlika.style.border="1px dashed red";
document.getElementById("porukaSlika").innerHTML="Slika mora biti unesena!<br>";
} else {
poljeSlika.style.border="1px solid green";
document.getElementById("porukaSlika").innerHTML="";
}
// Kategorija mora biti odabrana
var poljeCategory = document.getElementById("category");
if(document.getElementById("category").selectedIndex == 0) {
slanjeForme = false;
poljeCategory.style.border="1px dashed red";
document.getElementById("porukaKategorija").innerHTML="Kategorija mora biti odabrana!<br>";
} else {
poljeCategory.style.border="1px solid green";
document.getElementById("porukaKategorija").innerHTML="";
}
if (slanjeForme != true) {
event.preventDefault();
}
};
</script>
</body>

    <footer>
        <div class="filler">
            <div class="foot">
                <p>Weitere sind Online-Angebote der Alten Sprache SE</p>
            </div>
        </div>
    </footer>
    
</html>