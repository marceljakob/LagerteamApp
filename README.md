# Lagerteam-App

Die Lagerteam-App wurde entwickelt für das Lagerteam - KJG Zeltlager Forchheim

## Starten der App

Um zu starten bitte das Repository herunterladen und die folgenden Schritte befolgen.

### Vorraussetzungen

- Windows 7/8/8.1/10 Computer
- Moderner und aktueller Browser (empfohlen werden: [Google Chrome](https://www.google.com/chrome/) oder [Mozilla Firefox](https://www.mozilla.org/de/firefox/new/))
- Aktuelle Version von [XAMPP](https://www.apachefriends.org/de/index.html) mit Apache Webserver und MqSQL/MariaDB
- Eine aktive Internetverbindung für die Übertragung der Daten aus dem Kontaktformular per Mail.

### Installation

1. Entpacken Sie das Repository.
2. Navigieren Sie in den Ordner [\LagerteamApp-master\LagerteamApp\ ](https://github.com/marceljakob/LagerteamApp/tree/master/LagerteamApp).
3. Kopieren Sie den Ordner [www](https://github.com/marceljakob/LagerteamApp/tree/master/LagerteamApp/www) in Ihren XAMPP/htdocs (I.d.R "C:\XAMPP\htdocs") Ordner.
4. Starten Sie über XAMPP Ihren Apache Webserver und Ihre MySQL/MariaDB SQL-Datenbank
5. Importieren Sie die Datei [import-database-zeltlager.sql](https://github.com/marceljakob/LagerteamApp/blob/master/LagerteamApp/www/import-Database-zeltlager.sql) aus dem [www](https://github.com/marceljakob/LagerteamApp/tree/master/LagerteamApp/www)-Ordner in Ihre SQL-Datenbanken (z.B. über http://localhost/phpmyadmin).
    Es wird ein Benutzer Namens 'lagerteam' mit dem Passwort 'lagerteam' angelegt der volle Rechte auf Ihre SQL-Datenbank erlangt.
6. Öffnen Sie Ihren Browser und Öffnen die Seite http://localhost/www
7. Um den Intern-Bereich zu nutzen stehen die folgenden Anmeldedaten zur Verfügung:
    - User: Marcel    PW: marcel
    - User: Raphael   PW: raphael
    - User: Nicolas   PW: nicoals
    - User: Tim       PW: tim

## Autoren

* **Marcel Jakob** - [Marcel Jakob Github](https://github.com/marceljakob)
* **Raphael Menken** - [Raphael Menken Github](https://github.com/RaphaelMenken)
* **Nicolas Neuhof** - [Nicolas Neuhof Github](https://github.com/nicolasNeu)
* **Tim Riebesam** - [Tim Riebesam Github](https://github.com/TimRiebesam)
