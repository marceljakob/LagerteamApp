<?php
    /**
    Diese Datei wird in php-Dateien via "include" (include 'dbConnect.php';) eingebunden um eine schnelle Verbindung zur Datenbank herzustellen.
    Durch diese Datei müssen die Zugangsdaten ausschließlich in einer Datei abgelegt werden. Ziel ist die Verminderung des Risikos und die Erhöhung der Gemütlichkeit für den Programmierer.
    **/
    /* Host-Adresse der zu verbindenden Datenbank (z.B. "localhost", "127.0.0.1" oder "http://www.meineDatenbank.de")*/
    $_db_host = "localhost";
    /* Benutzername um sich an der Datenbank anzumelden */
    $_db_username = "username";
    /* Passwort zum Benutzername um sich an der Datenbank anzumelden */
    $_db_passwort = "password";
    /* Name der Datenbank die genutzt werden soll */
    $_db_datenbank = "beispielDB";
    
    /* Variable die den Befehl mit allen zugehörigen Variablen zur herstellung der Verbindung zum Host beeinhaltet */
    $_link = mysql_connect($_db_host, $_db_username, $_db_passwort) 
        or die("Die Verbindung zur Datenbank konnte nicht hergestellt werden.<br>Prüfen Sie ob die angegebenen Anmeldedaten korrekt sind.<br>Prüfen Sie ob der angegebene Ziel-Server aktiv und erreichbar ist.<br>Prüfen Sie ob die Datenbank auf dem Ziel-Server aktiv und erreichbat ist."); 
    
    /* Befehl um die Verbindung zur Datenbank herzustellen und die angegebene Datenbank auszuwählen und zu öffnen */
    mysql_select_db($_db_datenbank, $_link) or die ("Die Datenbank konnte nicht ausgewählt werden.<br>Prüfen Sie ob die angegeben Datenbank auf dem Ziel-Server existiert.<br>Prüfen Sie ob die angegebene Datenbank auf dem Server unbeschädigt ist.");
?>