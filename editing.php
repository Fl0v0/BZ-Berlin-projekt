<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="jquery-1.11.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="js/form-validation.js"></script>
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
    <body>
        <?php
        include 'connect.php';
        $servername = "localhost";
        $username = "root";
        $password = "";
        $basename = "projekt";
        $connection = mysqli_connect($servername, $username, $password, $basename);
        
        // Check if article title is provided in the URL
        if (isset($_GET['id'])) {
            $articleTitle = $_GET['id'];

            // Prepare and execute the query
            $query = "SELECT * FROM news WHERE id = ?";
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($stmt, "s", $articleTitle);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            // Fetch the article from the result
            $row = mysqli_fetch_assoc($result);

            // Free the result set
            mysqli_free_result($result);

            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            echo "Article ID not provided.";
        }
        
        // Close the database connection
        mysqli_close($connection);
        ?>

        <section class="clanak">
            <div class="row">
                <h1 class="cnaziv">
                    <?php echo $row['about']; ?>
                </h1>
            <section class="slika">
                <?php echo '<img src="Slike/' . $row['pphoto'] . '">'; ?>
            </section>
            <section class="about">
                <p>
                    <i><?php echo $row['about']; ?></i>
                </p>
            </section>
            <section class="sadrzaj">
            <br>

                    <?php echo $row['content']; ?>
                <br>
            </section>
        </section>
    </body> 

    <section class="panel">
    <h1>UPDATE/DELETE PANEL</h1>

<form enctype="multipart/form-data" action="push.php" method="POST">
    <div class="form-item">
        <label for="title">Naslov vijesti</label>
        <div class="form-field">
            <input type="text" name="title" id="title" class="form-field-textual">
        </div>
    </div>
    <div class="form-item">
        <label for="about">Kratki sadržaj vijesti (do 50 znakova)</label>
        <div class="form-field">
            <textarea name="about" id="about" cols="30" rows="10" class="form-field-textual"></textarea>
        </div>
    </div>
    <div class="form-item">
        <label for="content">Sadržaj vijesti</label>
        <div class="form-field">
            <textarea name="content" id="content" cols="30" rows="10" class="form-field-textual"></textarea>
        </div>
    </div>
    <div class="form-item">
        <label for="pphoto">Slika: </label>
        <div class="form-field">
            <input type="text" class="input-text" id="pphoto" name="pphoto" />
        </div>
    </div>
    <div class="form-item">
        <label for="category">Kategorija vijesti</label>
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
        <button type="submit" value="Prihvati" id="slanje">Update</button>
        <button type="submit" value="Obrisi" id="drop ">Delete</button>
    </div>
</form>   
</section>

</body>
    <footer>
   <div class="filler">
      <div class="foot">
       <p>Weitere sind Online-Angebote der Alten Sprache SE</p>
       </div>
       

       </div>

   </footer>
</body>
<script type="text/javascript">
        // Provjera forme prije slanja
        document.getElementById("slanje").onclick = function(event) {
            var slanjeForme = true;
            // Naslov vjesti (5-30 znakova)
            var poljeTitle = document.getElementById("title");
            var title = document.getElementById("title").value;
            if (title.length < 5 || title.length > 30) {
                slanjeForme = false;
                poljeTitle.style.border = "1px dashed red";
                document.getElementById("mtitle").innerHTML = "Naslov vjesti mora imati između 5 i 30 znakova!<br>";
            } else {
                poljeTitle.style.border = "1px solid green";
                document.getElementById("mtitle").innerHTML = "";
            }
            // Kratki sadržaj (10-100 znakova)
            var poljeAbout = document.getElementById("about");
            var about = document.getElementById("about").value;
            if (about.length < 10 || about.length > 100) {
                slanjeForme = false;
                poljeAbout.style.border = "1px dashed red";
                document.getElementById("mabout").innerHTML = "Kratki sadržaj mora imati između 10 i 100 znakova!<br>";
            } else {
                poljeAbout.style.border = "1px solid green";
                document.getElementById("mabout").innerHTML = "";
            }
            // Sadržaj mora biti unesen
            var poljeContent = document.getElementById("content");
            var content = document.getElementById("content").value;
            if (content.length == 0) {
                slanjeForme = false;
                poljeContent.style.border = "1px dashed red";
                document.getElementById("mcontent").innerHTML = "Sadržaj mora biti unesen!<br>";
            } else {
                poljeContent.style.border = "1px solid green";
                document.getElementById("mcontent").innerHTML = "";
            }
            // Slika mora biti unesena
            var poljeSlika = document.getElementById("pphoto");
            var pphoto = document.getElementById("pphoto").value;
            if (pphoto.length == 0) {
                slanjeForme = false;
                poljeSlika.style.border = "1px dashed red";
                document.getElementById("mpphoto").innerHTML = "Slika mora biti unesena!<br>";
            } else {
                poljeSlika.style.border = "1px solid green";
                document.getElementById("mpphoto").innerHTML = "";
            }
            // Kategorija mora biti odabrana
            var poljeCategory = document.getElementById("category");
            if (document.getElementById("category").selectedIndex == 0) {
                slanjeForme = false;
                poljeCategory.style.border = "1px dashed red";
                document.getElementById("porukaKategorija").innerHTML = "Kategorija mora biti odabrana!<br>";
            } else {
                poljeCategory.style.border = "1px solid green";
                document.getElementById("porukaKategorija").innerHTML = "";
            }
            if (slanjeForme != true) {
                event.preventDefault();
            }
        }
    </script>


</html>
