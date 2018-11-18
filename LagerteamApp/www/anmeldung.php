<!-- Bei dieser Datei handelt es sich um die Startseite der App. -->


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Online-Anmeldung</title>

    <!-- Bootstrap einbinden -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- Eigene Stylesheets -->
    <link rel="stylesheet" href="css/kontaktformular.css">
    <link rel="stylesheet" href="css/default.css"/>

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
                <a class="nav-item nav-link" href="./">Menü</a>
                <a class="nav-item nav-link active" href="anmeldung.html">Online-Anmeldung<span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="kalender.html">Kalender</a>
                <a class="nav-item nav-link" href="galerie.html">Galerie</a>
                <a class="nav-item nav-link" href="songtexte.html">Songtexte</a>
                <a class="nav-item nav-link" href="kontaktformular.php">Kontakt</a>
                <a class="nav-item nav-link" href="intern.php">Intern</a>
            </div>
        </div>
    </nav>


    <!-- Im nachfolgenden main-Bereich wird der Container für das Anmeldeformular definiert -->
    <main>
    </br></br></br>
        <!-- Container für das Anmeldeformular -->
        <?php


        include 'dbConnect.php';

        $nachname = $_POST['nachname'];
        $vorname = $_POST['vorname'];
        $strasse = $_POST['strasse'];
        $plz = $_POST['plz'];
        $ort = $_POST['ort'];
        $telefon = $_POST['tel'];
        $geb = $_POST['geb'];
        $email = $_POST['mail'];
        $zuschuss = $_POST['zuschuss'];
        $kjg = $_POST['kjg'];
        $mitteilung = $_POST['mitteilung'];
        $timestamp = time();
        $anmelde_dat = date("d.m.Y - H:i", $timestamp);

          /*
        //Anmeldung in die DATENBANK
        $sql_einfuegen ="INSERT INTO anmeldungen(anmelde_dat; n_name, v_name, strasse_nr, plz, ort, geb_dat, telefon, email, zuschuss, mitglied, freitext)
        VALUES ('$anmelde_dat', '$nachname', '$vorname', '$strasse', '$plz', '$ort', '$geb' '$telefon', '$email', '$zuschuss', '$kjg', '$mitteilung')";
*/

        $sql_einfuegen ="INSERT INTO anmeldungen(anmelde_dat, n_name, v_name, strasse_nr, plz, ort, geb_dat, telefon, email, zuschuss, mitglied, freitext)VALUES ('$anmelde_dat', '$nachname', '$vorname', '$strasse', '$plz', '$ort', '$geb', '$telefon', '$email', '$zuschuss', '$kjg', '$mitteilung')";
        $result_einfuegen = $conn->prepare($sql_einfuegen);

        $result_einfuegen->execute();

        if(!$result_einfuegen->execute()) {
        echo " Query fehlgeschlagen: Bitte an Administrator wenden!";
      } elseif($result_einfuegen->execute()) {
        echo " Anmeldung erfolgreich! Ihr Sohn ".$vorname." ".$nachname." wurde zum Zeltlager angemeldet!";
        }



        ?>
      </main>



  </body>

  </html>
