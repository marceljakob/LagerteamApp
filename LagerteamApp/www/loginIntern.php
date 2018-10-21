<?php 
/* Datei dbConnect.php einbinden um Verbindung mit Datenbank herzustellen */
include 'dbConnect.php';

/* Session starten um Benutzerdaten zu speichern */
session_start();

/* Falls bereits eine Session vorhanden ist, auf die intern.php umleiten */
if(isset($_SESSION["username"])) 
{ 
    header("Location: intern.php");  
    exit; 
}

/**
Funktion um login zu prüfen
Prüfen auf POST-Nachricht
Falls vorhanden Daten aus Post-Nachricht speichern
**/
if(!empty($_POST['username'])) {
    $username = strtolower($_POST["username"]);
    $password_post = $_POST["password"];
    
    //Datenbankabfrag nach Benutzer um zu prüfen ob dieser existiert und um eventuell vorhandene Daten zu laden für weitere Prüfungen
    $sql_getUser = "SELECT password, fehlanmeldungen, gesperrt FROM admins WHERE username = '$username' LIMIT 1";
    $result_getUser = $conn->query($sql_getUser);
    
    /**
    Falls User existiert werden die übergebene Daten in Variablen gespeichert
    Andernfalls wird die Seite neu geladen mit der Fehlermeldung dass der User nicht existiert.
    **/
    if ($result_getUser->num_rows > 0) {
        $row_getUser = $result_getUser->fetch_assoc();
        $userPw = $row_getUser["password"];
        $userFehlanmeldungen = $row_getUser["fehlanmeldungen"];
        $userGesperrt = $row_getUser["gesperrt"];
        
        //Prüfen ob der Benutzer aktuell gesperrt ist und in diesem Fall Seite neu laden mit Fehlermeldung
        if($userGesperrt == "1"){
            header("Location: loginIntern.php#gesperrt");  
            exit; 
        }
        
        /**
        Sollte der User nicht gesperrt sein, wird das Passwort geprüft
        stimmen die Passwörter überein wird geprüft ob Fehlanmeldungen vorhanden sind, diese werden ggfs. gelöscht bzw. auf Null gesetzt
        Anschließend wird für den User eine Session gestartet, womit er Zugriff auf die intern.php Seite bekommt, auf welche er im Anschluss weitergeleitet wird
        **/
        else if(password_verify($password_post, $userPw)){
            if($userFehlanmeldungen > 0){
                $sql_sendClear = "UPDATE admins SET fehlanmeldungen = '0' WHERE username = '$username'";
                $result_sendClear = $conn->query($sql_sendClear);
            }
            $_SESSION["username"] = $username;
            header("Location: intern.php");
        }
        
        /**
        Sollte das Passwort nicht korrekt sein, wird zuerst geprüft ob der User bereits 2 oder mehr Fehlanmeldungen besitzt
        In diesem Fall wird der Account des Users auf gesperrt gesetzt und die Seite wird mit der gesperrt-Fehlermeldung neu geladen
        Andernfalls wird die Anzahl der Fehlanmeldungen um 1 erhöht und die Seite wird mit der Passwort-Falsch-Fehlermeldung neu geladen. 
        **/
        else{
            if($userFehlanmeldungen >= 2){
                $sql_sendGesperrt = "UPDATE admins SET gesperrt = '1' WHERE username = '$username'";
                $result_sendGesperrt = $conn->query($sql_sendGesperrt);
                header("Location: loginIntern.php#gesperrt");
                exit;

            }
            $sql_sendFehlanmeldung = "UPDATE admins SET fehlanmeldungen = fehlanmeldungen+1 WHERE username = '$username'";
            $result_sendFehlanmeldung = $conn->query($sql_sendFehlanmeldung);
            header("Location: loginIntern.php#passwordFalse");
        }
    }
    else{
        header("Location: loginIntern.php#userFalse");
    }
    
    
    
}
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <!-- Bootstrap & Default-CSS einbinden -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/default.css" />

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- Eigene Stylesheets & Scripte-->
    <link rel="stylesheet" href="css/intern.css" />
    <script src="js/loginIntern.js"></script>
</head>

<body>
    <!-- Navigationsleiste (fixed)-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="./">Menü  <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="">Online-Anmeldung</a>
                <a class="nav-item nav-link" href="kalender.html">Kalender</a>
                <a class="nav-item nav-link" href="galerie.html">Galerie</a>
                <a class="nav-item nav-link" href="songtexte.html">Songtexte</a>
                <a class="nav-item nav-link" href="kontakt.html">Kontakt</a>
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
        <section class="container container-navbar-fixed loginForm">
            <h3><center>Login als Admin</center></h3>
            <hr>
            <h5 id="errormsg"></h5>           
            <form action="loginIntern.php" method="post">
                    <div class="form-row">
                        <div class="col-md-12">
                            <label class="sr-only" for="inlineFormInputGroup">LoginUsername</label>
                            <div class="input-group form-margin">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" id="newsStatus">👤&#xFE0E;</div>
                                </div>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Benutzername" aria-describedby="Benutzername eintragen" id="inlineFormInputGroup" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <label class="sr-only" for="inlineFormInputGroup">LoginPassword</label>
                            <div class="input-group form-margin">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" id="newsStatus">🔒&#xFE0E;</div>
                                </div>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Passwort" aria-describedby="Benutzername eintragen" id="inlineFormInputGroup" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 text-center margin-top-plus">
                            <button class="btn btn-long" type="submit">Anmelden</button>
                        </div>
                    </div>
                </form>
        </section>
    </main>

</body>

<!-- Platz für Skript innerhalb der html-Datei -->
<script>
</script>

</html>