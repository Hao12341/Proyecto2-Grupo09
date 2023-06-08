function tablagrafica (){
    var tabla = document.getElementById("huertos").value;
    if (tabla == "h1"){
        document.getElementById("huerto1").style.display = "table";
        document.getElementById("huerto2").style.display = "none";
        document.getElementById("huerto3").style.display = "none";
    }
    else if ( tabla == "h2"){
        document.getElementById("huerto1").style.display = "none";
        document.getElementById("huerto2").style.display = "table";
        document.getElementById("huerto3").style.display = "none";
    }
    else if (tabla == "h3"){
        document.getElementById("huerto1").style.display = "none";
        document.getElementById("huerto2").style.display = "none";
        document.getElementById("huerto3").style.display = "table";
    }
}