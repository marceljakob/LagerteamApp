window.addEventListener("load", () => {
    //Variable um Anchor / Hash aus URL zu speichern
    //Variable um Element "errormsg" aus dem HTML Dokument zu speichern
    let anchor = window.location.hash;
    let errormsg = document.getElementById("errormsg");
    
    /**
    if-Anweisung um zu prüfen ob sich eine Nachricht in der URL befindet
    Falls ja, entscheidet die switch-Anweisung welche Fehlermeldung ausgegeben wird.
    **/
    if(anchor != ""){
        switch(anchor){
            case "#gesperrt":
                errormsg.innerHTML = "Der Benutzer ist aufgrund zu vieler Fehlanmeldungen gesperrt!";
                break;
            case "#passwordFalse":
                errormsg.innerHTML = "Das eingegebene Passwort ist falsch!";
                break;
            case "#userFalse":
                errormsg.innerHTML = "Der angegebene Benutzer existiert nicht!";
                break;
        }
    }
});