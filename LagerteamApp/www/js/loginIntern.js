window.addEventListener("load", () => {
    let anchor = window.location.hash;
    let errormsg = document.getElementById("errormsg");
    
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