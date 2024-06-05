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
    <footer>
   <div class="filler">
      <div class="foot">
       <p>Weitere sind Online-Angebote der Alten Sprache SE</p>
       </div>
       

       </div>

   </footer>

</html>
