<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BERLINER ZEITUNG</title>
    <link rel="stylesheet" type="text/css" href="look.css">
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
<?php
$kategorija=$_GET['id'];

echo'<section class="content">';
include 'connect.php';
$query = "SELECT * FROM news WHERE archive=0 AND category='$kategorija' LIMIT 3";
$result = mysqli_query($dbc, $query);
$i=0;
while($row = mysqli_fetch_array($result)) {

echo'<article>';
echo '<img src="Slike/'. $row['pphoto'] . '"';
   echo '<p><span><a href="clanak.php?id='.$row['id'].'">'. $row['title'] .'</a></span> <br>'. $row['about'] .'</p>';
echo' </article>';

   
}?>
</section>
</body>
<footer>
   <div class="filler">
      <div class="foot">
       <p>Weitere sind Online-Angebote der Alten Sprache SE</p>
       </div>
       

       </div>

   </footer>

</html>