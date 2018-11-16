<?php
$folder=$_GET["show"];
 ?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <!-- Bootstrap & Default-CSS einbinden -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/default.css" />
    <link rel="stylesheet" href="css/lightslider.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/lightslider.js"></script>

    <!-- Eigene Stylesheets & Scripte-->
    <link rel="stylesheet" href="css/eigene.css" />
    <script src="js/eigene.js"></script>
    <style>
    .demo {
        width:50%;
    }
    ul {
        list-style: none outside none;
        padding-left: 0;
        margin-bottom:0;
    }
    li {
        display: block;
        float: left;
        margin-right: 6px;
        cursor:pointer;
    }
    li > img {
        display: block;
        height: auto;
        width: 100%;
        object-fit: cover;
    }
    </style>
</head>

<body>
    <!-- Navigationsleiste (fixed)-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="./"><img src="img/logo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="./">Menü  </a>
                <a class="nav-item nav-link" href="anmeldung.html">Online-Anmeldung</a>
                <a class="nav-item nav-link" href="kalender.html">Kalender</a>
                <a class="nav-item nav-link active" href="galerie.html">Galerie <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="songtexte.html">Songtexte</a>
                <a class="nav-item nav-link" href="kontaktformular.php">Kontakt</a>
                <a class="nav-item nav-link" href="intern.php">Intern</a>
            </div>
        </div>
    </nav>

    <!-- Seiteninhalt -->
    <main>
        <!--
        Erster Section Abschnitt.
        Beeinhaltet die Klasse "container-navbar-fixed".
        Zuständig für den margin-top Abstand von der fixed-Navbar.
        -->
        <section class="container container-navbar-fixed">
            <h1>Galerie <?php echo $folder; ?></h1>
            <div class="demo">
              <ul id="lightSlider">
                <?php
                $directory = "img/Galerie/" . $folder . "/";
                $images = glob($directory . "*.jpg");

                foreach ($images as $img) {
                  echo '<li data-thumb="' . $img . '"> <img src="' . $img . '"></li>';
                }
                 ?>
               </ul>
             </div>
        </section>
    </main>

</body>

<!-- Platz für Skript innerhalb der html-Datei -->
<script>
$('#lightSlider').lightSlider({
      gallery: true,
      item: 1,
      loop: true,
      slideMargin: 0,
      adaptiveHeight:true,
      enableTouch: true,
      thumbItem: 9
  });
</script>

</html>
