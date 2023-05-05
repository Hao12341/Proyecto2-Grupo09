function cambiarTabla(){
    var tabla = document.getElementById("tabla").value;
    if (tabla == "tablasal"){
        document.getElementById("tablasal").style.display = "table";
        document.getElementById("tablahumedad").style.display = "none";
        document.getElementById("tablapH").style.display = "none";
        document.getElementById("tablatemp").style.display = "none";
        document.getElementById("tablaluz").style.display = "none";
    }
    else if (tabla == "tablahumedad"){
        document.getElementById("tablasal").style.display = "none";
        document.getElementById("tablahumedad").style.display = "table";
        document.getElementById("tablapH").style.display = "none";
        document.getElementById("tablatemp").style.display = "none";
        document.getElementById("tablaluz").style.display = "none";
    }
    else if (tabla == "tablapH"){
        document.getElementById("tablasal").style.display = "none";
        document.getElementById("tablahumedad").style.display = "none";
        document.getElementById("tablapH").style.display = "table";
        document.getElementById("tablatemp").style.display = "none";
        document.getElementById("tablaluz").style.display = "none";
    }
    else if (tabla == "tablatemp"){
        document.getElementById("tablasal").style.display = "none";
        document.getElementById("tablahumedad").style.display = "none";
        document.getElementById("tablapH").style.display = "none";
        document.getElementById("tablatemp").style.display = "table";
        document.getElementById("tablaluz").style.display = "none";
    }
    else if (tabla == "tablaluz"){
        document.getElementById("tablasal").style.display = "none";
        document.getElementById("tablahumedad").style.display = "none";
        document.getElementById("tablapH").style.display = "none";
        document.getElementById("tablatemp").style.display = "none";
        document.getElementById("tablaluz").style.display = "table";
    }
}