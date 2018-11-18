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

        $sql_einfuegen ="INSERT INTO anmeldungen(anmelde_dat, n_name, v_name, strasse_nr, plz, ort, geb_dat, telefon, email, zuschuss, mitglied, freitext)VALUES ('$anmelde_dat', '$nachname', '$vorname', '$strasse', '$plz', '$ort', '$geb', '$telefon', '$email', '$zuschuss', '$kjg', '$mitteilung')";
        $result_einfuegen = $conn->prepare($sql_einfuegen);

        if(!$result_einfuegen->execute()) {
        echo " Query fehlgeschlagen: Bitte an Administrator wenden!";
        echo "</br>";
        echo "Hier gehts zurück zur  <a href='./'>Startseite</a>!";
      } else {
        echo " Anmeldung erfolgreich! Ihr Sohn ".$vorname." ".$nachname." wurde zum Zeltlager angemeldet!";
        echo "</br>";
        echo "Hier gehts zurück zur  <a href='./'>Startseite</a>!";
        }
        ?>

        <?php
        include 'sendMail.php';
        $mail->SetFrom("lagerteamapp2018@gmail.com", "Lagerteam");
        $mail->AddAddress("lagerteamapp2018@gmail.com"); //Empfänger Adresse, Weitere Adressen über $mail->AddAddress hinzufügen oder als CC/BCC
        //Set an alternative reply-to address
        //$mail->addReplyTo('replyto@example.com', 'First Last');
        //Set who the message is to be sent to
        $mail->addAddress($email);
        //Set the subject line
        $mail->Subject = 'Anmeldebestaetigung zum Zeltlager';
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        //$mail->msgHTML(file_get_contents('test.html'), dirname(/var/www/html/));
        $mail->IsHTML(true);
        $mail->Body='Guten Tag,<br />
        <br />
        Hiermit m&ouml;chten wir Ihnen den Eingang der Anmeldung Ihres Sohnes zu unserem j&auml;hrlichen Zeltlager best&auml;tigen.<br />
        Wir bitten Sie den Beitrag von 240,00 Euro auf unser Konto der <b>Spar- und Kreditbank Rheinstetten eG</b> zu &uuml;berweisen.<br />
        <br />
        <b>IBAN: DE53 6606 1407 0008 0219 61</b><br />
        <b>BIC: GENODE61RH2</b><br/>
        <br />
        Vermerken Sie bei der &Uuml;berweisung unbedingt den Namen Ihres Kindes!<br />
        Unsere Finanzw&auml;rte pr&uuml;fen w&ouml;chentlich unser Bankkonto auf Neueing&auml;nge.<br />
        Sobald Ihre &Uuml;berweisung bei uns eingetroffen ist, erhalten Sie eine Email mit der Zahlungsbest&auml;tigung.<br />
        <br />
        <br />
        Im Anhang befindet sich zudem unser gewohntes Info-Schreiben (Ansprechpartner, Termine, Beantragung von Zuschuss, Reiser&uuml;cktritt, usw.) und der Dokumentenumschlag, den Sie Ihrem Sohn bei der Abfahrt der Busse mitgeben.<br />
        <br />
        <br />
        Viele Gr&uuml;&szlig;e,<br />
        Ihr Lagerteam<br /><br />
        <i>i.A. Marcel Jakob<br />
        marcel@lagerteam.de</i>';

        //$mail->body = 'Hello, this is my message.';
        //Replace the plain text body with one created manually
        $mail->AltBody = '';
        //Attach an image file
        $mail->addAttachment('Anmeldung_2016.pdf');
        //send the message, check for errors
        ?>

        <?php
        echo "</br></br>";
        if (!$mail->send()) {
            echo "Es konnte leider keine Email an Sie gesendet werden, bitte wenden Sie sich an marcel@lagerteam.de <br /><br />" . $mail->ErrorInfo;
        } else {
            echo "Bitte Überprüfen Sie Ihr Email-Postfach, Sie sollten eine Email über die Eingangsbestätigung der Anmeldung Ihres Sohnes bekommen haben.";
        }
        ?>

      </main>



  </body>

  </html>
