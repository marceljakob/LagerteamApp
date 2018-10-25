<!-- Dies ist der php-Code-->

<!--Mit folgender Anweisung wird die Datenbank eingebunden -->
<?php 
include 'dbConnect.php';

//if-Abfrage, um zu prüfen ob die Felder gefüllt sind
//Da alle Felder den Zusatz requiered haben, genügt es ein Feld auf Inhalt zu prüfen. 
if(!empty ($_POST["name"])) {
    $name = $_POST["name"];
    $email = $_POST["emailfeld"];
    $telefon = $_POST["telefonnr"];
    $nachricht = $_POST["nachricht"];
    echo $name;
}


?>






















<!-- Dies ist der  html-Quelltext für das Kontaktformular -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Kontaktformular</title>
    <!-- Bootstrap einbinden -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- Eigenes Stylesheet einbinden -->
    <link rel="stylesheet" href="css/kontaktformular.css">
    <link rel="stylesheet" href="css/default.css">

</head>

<body>
    <!-- Navigationsleiste -->
    <nav id="nav-main" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="index.html">Menü</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="#">Online-Anmeldung </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kalender</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="galerie.html">Galerie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="songtexte.html">Songtexte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Kontakt <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Intern</a>
                </li>

            </ul>
        </div>
    </nav>


    <main>
        <!-- Kontaktformular -->
        <form action="kontaktformular.php" method="post"> <!-- Anweisung, wohin die Inputs gesendet werden sollen. -->
           <!--container für das Grid -->
            <div class="container container-navbar-fixed">
               <!--Abschnitt für das Namensfeld-->
                <div class="row">
                    <div class="cold-md-6" id="namensfeld">
                        <div class="form-group">
                            <label for="formGroupExampleInput">*Name:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Namen eingeben..." required name="name">
                        </div>
                    </div>
                </div>
                
                <!--Abschnitt für das E-Mail Feld-->
                <div class="row">
                    <div class="cold-md-6" id="emailfeld">
                        <div class="form-group">
                            <label for="exampleInputEmail1">*E-Mail Adresse:</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-Mail Adresse eingeben..." required name="emailfeld">
                        </div>
                    </div>
                </div>
                <!--Abschnitt für die Telefonnummer-->
                <div class="row">
                    <div class="cold-md-6" id="telefonnummer">
                        <div class="form-group">
                            <label for="formGroupExampleInput">*Telefon:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Telefonnummer eingeben..." required name="telefonnr">
                        </div>
                    </div>
                </div>
                <!--Abschnitt für das Nachrichtenfeld-->
                <div class="row">
                    <div class="cold-md-6" id="nachrichtenfeld">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">*Nachrichtenfeld:</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Deine Nachricht an uns!" required name="nachricht"></textarea>
                        </div>
                    </div>
                </div>
                <!--Abschnitt für den Hinweis Pflichtfelder-->
                <div class="row">
                    <div class="cold-md-6" id="pflichtfelder">
                        mit * gekennzeichnete Felder sind Pflichtfelder!
                    </div>
                </div>
                
                <!--Absenden Button-->
                <div class="row">
                    <div class="cold-md-6" id="bestaetigen">
                        <button type="submit" class="btn btn-primary btn-menu" id="buttonAbsenden">Absenden!

                        </button>

                    </div>
                </div>


            </div>
        </form>
    </main>
</body>


</html>