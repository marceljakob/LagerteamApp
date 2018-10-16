<?php
    session_start(); 
    //Session beenden
    session_destroy(); 
    //Zurück nach index.php -> verweist weiter auf login.php bei keiner vorhandenen Session
    header("Location: intern.php");
?>