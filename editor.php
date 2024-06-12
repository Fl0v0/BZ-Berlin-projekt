<!DOCTYPE html>
<html>
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
<h1> IZABERI CLANAK ZA EDITIRANJE </h1>
   <section class="sport">
      <h2> BERLIN-SPORT > </h2>
   </section>
   <section class="content">
   <?php
include 'connect.php';
$query = "SELECT * FROM news WHERE archive=0 AND category='sport' LIMIT 3";
$result = mysqli_query($dbc, $query);
$i=0;
while($row = mysqli_fetch_array($result)) {
   
   echo'<article>';
   echo '<img src="Slike/'. $row['pphoto'] . '"';
      echo '<p><span><a href="editing.php?id='.$row['id'].'">'. $row['title'] .'</a></span> '. $row['about'] .'</p>';
   echo' </article>';
  
      
   
}?>
</section>
    <section class="show">
      <h2>KULTUR UND SHOW > </h2>
     </section>
     <section class="content">
       <?php
$query = "SELECT * FROM news WHERE archive=0 AND category='kultura' LIMIT 3";
$result = mysqli_query($dbc, $query);
$i=0;

while($row = mysqli_fetch_array($result)) {
      echo'<article>';
      echo '<img src="Slike/' . $row['pphoto'] . '"';
         echo '<p><span><a href="editing.php?id='.$row['id'].'">'. $row['title'] .'</a></span> '. $row['about'] .'</p>';
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