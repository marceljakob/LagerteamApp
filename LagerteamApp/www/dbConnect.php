<?php
    /**
    Diese Datei wird in php-Dateien via "include" (include 'dbConnect.php';) eingebunden um eine schnelle Verbindung zur Datenbank herzustellen.
    Durch diese Datei müssen die Zugangsdaten ausschließlich in einer Datei abgelegt werden. Ziel ist die Verminderung des Risikos und die Erhöhung der Gemütlichkeit für den Programmierer.
    **/
    /* Host-Adresse der zu verbindenden Datenbank (z.B. "localhost", "127.0.0.1" oder "http://www.meineDatenbank.de")*/
    $servername = "localhost";
    /* Benutzername um sich an der Datenbank anzumelden */
    $username = "lagerteam";
    /* Passwort zum Benutzername um sich an der Datenbank anzumelden */
    $password = "lagerteam";
    /* Name der Datenbank die genutzt werden soll */
    $dbname = "zeltlager";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
