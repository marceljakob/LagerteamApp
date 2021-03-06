/**
Script Datei für die Datei songtexte.html
Das Script ermgölicht das wechseln zwischen den beiden Ansichten Songliste und Songtext eines ausgewählten Songs.
Das Script wird erst ausgeführt, nachdem die Seite vollständig geladen wurde.
**/
window.addEventListener("load", () => {
    /** Variable um den aktuellen Wert des Anchors aus der URL zu speichern (Anchor = #WERT in der URL z.B. songtexte.html#abc) **/
    let anchor = window.location.hash;
    
    /** Variablen für die HTML Elemente die manipuliert werden sollen (siehe songtexte.html) **/
    let songtexte = document.getElementById("songtexte");
    let showSong = document.getElementById("showSong");
    let songtitle = document.getElementById("songtitle");
    let songtext = document.getElementById("songtext");

    /** Variablen um Titel und Texte der einzelnen Songs zu speichern **/
    let title_einKompliment = "";
    let text_einKompliment = "<img src='./img/songtexte/ein-kompliment.png' width='100%' id='songImg'></img>";
    let title_kameradenlied = "Lagerteam - All die schönen Zeiten";
    let text_kameradenlied = "<img src='./img/songtexte/all-die-schoenen-zeiten.png' width='100%' id='songImg'></img>";
    let title_takeMeHomeCountryRoads = "";
    let text_takeMeHomeCountryRoads = "<img src='./img/songtexte/Take-Me-Home-Country-Roads_Seite_1.png' width='100%' id='songImg'></img><img src='./img/songtexte/Take-Me-Home-Country-Roads_Seite_2.png' width='100%' id='songImg'></img>";
    let title_knockinOnHeavensDoor = "";
    let text_knockinOnHeavensDoor = "<img src='./img/songtexte/Knockin-On-Heavens-Door_Seite_1.png' width='100%' id='songImg'></img><img src='./img/songtexte/Knockin-On-Heavens-Door_Seite_2.png' width='100%' id='songImg'></img>";

    /** Prüfen ob Anchor leer ist **/
    if (anchor != "") {
        /** 
        Falls Anchor nicht leer, Switch-Case um zu bestimmen um welchen Song es sich handelt.
        HTML Datei dahingehend manipulieren, dass der richtige Titel und der richtige Songtext an entsprechender Stelle angezeigt wird.
        **/
        switch (anchor) {
            case "#ein-kompliment":
                songtitle.innerHTML = title_einKompliment;
                songtext.innerHTML = text_einKompliment;
                break;
            case "#kameradenlied":
                songtitle.innerHTML = title_kameradenlied;
                songtext.innerHTML = text_kameradenlied;
                break;
            case "#take-me-home-country-roads":
                songtitle.innerHTML = title_takeMeHomeCountryRoads;
                songtext.innerHTML = text_takeMeHomeCountryRoads;
                break;
            case "#knockin-on-heavens-door":
                songtitle.innerHTML = title_knockinOnHeavensDoor;
                songtext.innerHTML = text_knockinOnHeavensDoor;
                break;
        }
        /** Liste der Songtexte ausblenden über hidden + den gewünschten Songtext anzeigen (entfernen von hidden) **/
        songtexte.classList.add("hidden");
        showSong.classList.remove("hidden");
    } else {
        /** Liste der Songtexte einblenden über entfernen von hidden + Songtext ausblenden (hinzufügen von hidden) **/
        showSong.classList.add("hidden");
        songtexte.classList.remove("hidden");
    }
    
    /** 
    EventListener um auf klicks zu reagieren, die ein Songtexte-Element betreffen.
    Die Seite muss neu geladen werden, um den entsprechenden Inhalt auch tatsächlich anzuzeigen.
    **/
    songtexte.addEventListener("click", () => {
        location.reload();
    });
});