
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <script type="text/javascript" src="jquery-1.11.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="js/form-validation.js"></script>
    <link rel="stylesheet" type="text/css" href="look.css">
    <meta charset="utf-8">
   
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

    <h1>Admin Panel</h1>

    <form action="push.php" method="POST">
<div class="form-item">
<label for="title">Naslov vijesti</label>
<div class="form-field">
<input type="text" name="title" class="form-field-textual">
</div>
</div>
<div class="form-item">
<label for="about">Kratki sadržaj vijesti (do 50
znakova)</label>
<div class="form-field">
<textarea name="about" id="" cols="30" rows="10" class="form-
field-textual"></textarea>
</div>
</div>
<div class="form-item">
<label for="content">Sadržaj vijesti</label>
<div class="form-field">
<textarea name="content" id="" cols="30" rows="10"
class="form-field-textual"></textarea>
</div>
</div>
<div class="form-item">
<label for="pphoto">Slika: </label>
<div class="form-field">
<input type="text" 
class="input-text" name="pphoto"/>
</div>
</div>
<div class="form-item">
<label for="category">Kategorija vijesti</label>
9
<div class="form-field">
<select name="category" id="" class="form-field-textual">
<option value="sport">Sport</option>
<option value="kultura">Kultura</option>
</select>
</div>
</div>
<div class="form-item">
<label>Spremiti u arhivu:
<div class="form-field">
<input type="checkbox" name="archive">
</div>
</label>
</div>
<div class="form-item">
<button type="reset" value="Poništi">Poništi</button>
<button type="submit" value="Prihvati">Prihvati</button>
<button type="button" onclick="window.location.href='register.php'">Dodaj admina</button>
</div>
</form>
<footer>
   <div class="filler">
     <div class="foot">
      <p>Weitere sind Online-Angebote der Alten Sprache SE</p>
      </div>
   </div>
</footer>
</body>
</html>