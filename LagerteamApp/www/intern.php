<!DOCTYPE html>

<?php
/* Datei dbConnect.php einbinden um Verbindung mit Datenbank herzustellen */
include 'dbConnect.php';

/* Session starten um Benutzerdaten zu speichern */
session_start();

/*
Update des Newstickers an Server
Prüfen ob POST-Message existiert
POST-Messages in Variablen speichern (+ kuerzel in Kleinschreibung umwandeln)
Variable der aktuellen Uhrzeit anlegen
Prüfen ob Nachrichten einen Text enthalten
SQL-Befehl erstellen und an Datenbank übermitteln
*/
if(!empty($_POST['newsText'])) {
    $newsText = $_POST["newsText"];
    $newsKuerzel = strtolower($_POST["newsKuerzel"]);
    $newsDate = date('Y-m-d H:i:s');
    if($newsText != "" && $newsKuerzel != ""){
        $sql_sendNews = "INSERT INTO newsticker (text, kuerzel, datum) VALUES ('$newsText', '$newsKuerzel', '$newsDate')";
        $result_sendNews = $conn->query($sql_sendNews);
    }
}


/*
Den aktuellen Text des Newstickers aus der Datenbank laden und in Variable speichern
SQL-Befehl erstellen und an Datenbank übermitteln
Ergebnis auf Inhalt prüfen
Ergebnis in Variable speichern
*/
$sql_getNews = "SELECT text FROM newsticker ORDER BY id DESC";
$result_getNews = $conn->query($sql_getNews);
$newstickerText = "";
if ($result_getNews->num_rows > 0) {
    $row_getNews = $result_getNews->fetch_assoc();
    $newstickerText = $row_getNews["text"];
}

?>

<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Intern</title>

    <!-- Bootstrap einbinden -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- Eigene Stylesheets & Scripte-->
    <link rel="stylesheet" href="css/intern.css" />
    <script src="js/intern.js"></script>
</head>

<body>
    <!-- Navigationsleiste -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="./">Menü</a>
                <a class="nav-item nav-link" href="#">Online-Anmeldung</a>
                <a class="nav-item nav-link" href="kalender.html">Kalender</a>
                <a class="nav-item nav-link" href="galerie.html">Galerie</a>
                <a class="nav-item nav-link" href="songtexte.html">Songtexte</a>
                <a class="nav-item nav-link" href="kontakt.html">Kontakt</a>
                <a class="nav-item nav-link active" href="">Intern <span class="sr-only">(current)</span></a>
            </div>
        </div>
    </nav>

    <!-- Seiteninhalt -->
    <main>
        <!-- Erste Section Intern Newsticker -->
        <section class="container container-navbar-fixed" id="newsticker">
            <!--Überschrift Seite-->
            <h1>
                Intern
            </h1>
            <!--Überschrift Section-->
            <h4>
                Update für den Newsticker schreiben:
                <!-- 
                Formular für Update des Newstickers
                Beeinhaltet Feld für Text des Newstickers, Feld für Namenskürzel und submit-Button
                Als value des Textfeldes für den neuen Newsticker ist der aktuelle Text des Newstickers hinterlget.
                Formular wird an diese Seite gesendet und im obigen PHP-Teil verarbeitet
                -->
                <form action="intern.php" method="post">
                    <div class="form-row">
                        <div class="col-md-7">
                            <label class="sr-only" for="inlineFormInputGroup">NewstickerText</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" id="newsStatus">Aktuelle News</div>
                                </div>
                                <input type="text" class="form-control" id="newstickerUpdate" name="newsText" aria-describedby="Newsticker Update" placeholder="News hier eintragen" value="<?php echo $newstickerText; ?>" id="inlineFormInputGroup" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" id="newstickerKuerzel" name="newsKuerzel" aria-describedby="Newsticker Kuerzel" placeholder="kuerzel (xx)" maxlength="2" required>
                        </div>
                        <button class="btn btn-dark" type="submit">aktualisieren ➤</button>
                    </div>
                </form>
            </h4>
            <hr>
        </section>
        
        <!-- Zweite Section Intern onlineAnmeldungen -->
        <section class="container container-navbar-fixed hidden" id="onlineAnmeldungen">
            <!--Überschrift Section-->
            <h4>
                Bisherige Online-Anmeldungen
            </h4>
            <!--
            Tabelle mit allen in der Datenbank hinterlegten Anmeldungen.
            Die Tabelle beeinhaltet ein Suchfeld, dessen Funktionsweise im unteren Javascript Teil weiter beschrieben wird.
            Über das Suchfeld lässt sich ein Beliebiger Wert in der Tabelle suchen, z.B. PLZ, Alter oder auch Teile des Namens.
            Der PHP-Teil, der zuständig zur Datenbanksabfrage und Darstellung ist, wird etwas weiter unten beschrieben.
            -->
            <input class="form-control" id="searchBar" type="text" placeholder="Suchen..">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-sm" id="onlineAnmeldungen">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Datum</th>
                            <th scope="col">Name</th>
                            <th scope="col" class="nowrap">Straße Nr.</th>
                            <th scope="col">PLZ</th>
                            <th scope="col">Ort</th>
                            <th scope="col">Alter</th>
                            <th scope="col">Telefon</th>
                            <th scope="col">E-Mail</th>
                            <th scope="col">Zuschuss</th>
                            <th scope="col">Mitglied</th>
                            <th scope="col" class="nowrap">Nachricht der Eltern</th>
                        </tr>
                    </thead>
                    <tbody id="onlineAnmeldungenBody">
                       <?php
                        //Datenbankabfrage um alle relevanten Daten bzgl. der Online-Anmeldungen zu erhalten.
                        $sql = "SELECT anmelde_dat, n_name, v_name, strasse_nr, plz, ort, geb_dat, telefon, email, zuschuss, mitglied, freitext FROM anmeldungen ORDER BY n_name";
                        $result = $conn->query($sql);
                        
                        /*
                        Prüfung ob Result-Ergebnis leer ist, oder Datenenthält
                        Variablen prüfen und durch leichter Verständlichen String ersetzen.
                        Daten in Tabelle darstellen und Alter errechnen, sowie die Darstellung des Datums der Anmeldungen anpassen.
                        Die Ergebnisse der SQL-Abfrage werden Reihe für Reihe abgearbeitet.
                        */
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                if($row["zuschuss"] == "1"){
                                    $zuschuss = "🗸";
                                }
                                else{
                                    $zuschuss = "✗";
                                }
                                
                                if($row["mitglied"] == "1"){
                                    $mitglied = "🗸";
                                }
                                else{
                                    $mitglied = "✗";
                                }
                                
                                echo "<tr>";
                                echo "<td>" . date_format(date_create($row["anmelde_dat"]), "d.m.Y") ."</td>";
                                echo "<td>" . $row["v_name"] . " " . $row["n_name"] . "</td>";
                                echo "<td class='nowrap'>" . $row["strasse_nr"] . "</td>";
                                echo "<td>" . $row["plz"] . "</td>";
                                echo "<td>" . $row["ort"] . "</td>";
                                echo "<td>" . date_diff(date_create($row["geb_dat"]), date_create('today'))->y . "</td>";
                                echo "<td class='nowrap'>" . $row["telefon"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td><center>" . $zuschuss . "</center></td>";
                                echo "<td><center>" . $mitglied . "</center></td>";
                                echo "<td>" . $row["freitext"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </section>
        
    </main>

</body>

<script>
    /*
    Script um Tabelle zu durchsuchen.
    Das HTML-Objekt mit der ID "searchBar" wird dauerhaft auf Tastendrücke überwacht.
    Die eingegebenen Werte werden in einer Variable namens "value" gespeichert.
    Eine Filter-Funktion wird auf das HTML-Objekt mit der ID "onlineAnmeldungBody" angewandt.
    Die Filter-Funktion darf ausschließlich auf den Body-Teil der Tabelle angewandt werden, da ansonsten auch der Head Bereich gefiltert wird und somit ausgeblendet wird.
    Die Filter-Funktion zeigt ausschließlich die Zeilen an, in denen der in der Variable "value" gespeicherte String vorhanden ist.
    */
    $(document).ready(function(){
      $("#searchBar").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#onlineAnmeldungenBody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
</script>

<?php
    /* Datenbank-Verbindung nach gebrauch am Ende schließen */
    $conn->close();
?>

</html>