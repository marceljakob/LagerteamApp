<!-- Bei dieser Datei handelt es sich um die Startseite der App. -->


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Start</title>

    <!-- Bootstrap einbinden -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- Eigene Stylesheets -->
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/default.css"/>

    <!-- Skriptbereich -->
    <script>

    </script>

</head>

<body>
    <!-- Navigationsleiste -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="./"><img src="img/logo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="./">Menü <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="anmeldung.html">Online-Anmeldung</a>
                <a class="nav-item nav-link" href="kalender.html">Kalender</a>
                <a class="nav-item nav-link" href="galerie.html">Galerie</a>
                <a class="nav-item nav-link" href="songtexte.html">Songtexte</a>
                <a class="nav-item nav-link" href="kontaktformular.php">Kontakt</a>
                <a class="nav-item nav-link" href="intern.php">Intern</a>
            </div>
        </div>
    </nav>


    <!-- Im nachfolgenden main-Bereich werden die Buttons deklariert, welche die Startseite bilden. Diese werden in drei Zeilen dargestellt, wobei sich in jeder Zeile zwei Buttons befinden -->
    <main>
        <!-- Container für das Grid -->
        </br></br></br>
        <div class="container">

            <div class="row">
                <div class="col-md-6" id="onlineAnmeldung">
                    <button type="button" class="btn btn-dark btn-menu" id="btn-anmeldung" onclick="javascript:location.href='anmeldung.html'"> Online-Anmeldung</button>

                </div>

                <div class="col-md-6" id="kalender">
                    <button type="button" class="btn btn-dark btn-menu" id="btn-kalender" onclick="javascript:location.href='kalender.html'"> Kalender</button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6" id="gallerie">

                     <button type="button" class="btn btn-dark btn-menu" id="btn-galerie"
                     onclick="javascript:location.href='galerie.html'"> Galerie</button>


                </div>

                <div class="col-md-6" id="songtexte">

                     <button type="button" class="btn btn-dark btn-menu" id="btn-songtexte"
                     onclick="javascript:location.href='songtexte.html'"> Songtexte</button>

                </div>

            </div>

            <div class="row">
                <div class="col-md-6" id="kontakte">
                     <button type="button" class="btn btn-dark btn-menu" id="btn-kontakte" onclick="javascript:location.href='kontaktformular.php'"> Kontakte</button>

                </div>

                <div class="col-md-6" id="intern">
                     <button type="button" class="btn btn-dark btn-menu" id="btn-intern" onclick="javascript:location.href='intern.php'"> Intern</button>
                </div>

            </div>

        </div>



    </main>

    <!-- Fußbereich der App mit dem Newsticker -->
    <footer>
      <marquee>
        <?php
            /* Datei dbConnect.php einbinden um Verbindung mit Datenbank herzustellen */
            include 'dbConnect.php';

            /*
            Den aktuellen Text des Newstickers aus der Datenbank laden und in Variable speichern
            SQL-Befehl erstellen und an Datenbank übermitteln
            Ergebnis auf Inhalt prüfen
            Ergebnis in Variable speichern
            */
            $sql_getNews = "SELECT text FROM newsticker ORDER BY newsticker_id DESC";
            $result_getNews = $conn->query($sql_getNews);
            $newstickerText = "";
            if ($result_getNews->num_rows > 0) {
                $row_getNews = $result_getNews->fetch_assoc();
                echo $row_getNews["text"];
            }

            /* Datenbank-Verbindung nach gebrauch am Ende schließen */
            $conn->close();
        ?>
    </marquee>

    </footer>

</body>

</html>
