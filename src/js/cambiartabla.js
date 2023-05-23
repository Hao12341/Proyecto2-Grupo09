function cambiarTabla(){
    var tabla = document.getElementById("tabla").value;
    if (tabla == "tablasal"){
        document.getElementById("tablasal").style.display = "table";
        document.getElementById("tablahumedad").style.display = "none";
        document.getElementById("tablapH").style.display = "none";
        document.getElementById("tablatemp").style.display = "none";
        document.getElementById("tablaluz").style.display = "none";
        document.getElementById("tablasal1").style.display = "none";
        document.getElementById("tablasal2").style.display = "none";
        document.getElementById("tablahumedad1").style.display = "none";
        document.getElementById("tablahumedad2").style.display = "none";
        document.getElementById("tablaluz1").style.display = "none";
        document.getElementById("tablaluz2").style.display = "none";
        document.getElementById("tablapH1").style.display = "none";
        document.getElementById("tablapH2").style.display = "none";
        document.getElementById("tablatemp1").style.display = "none";
        document.getElementById("tablatemp2").style.display = "none";
    }
    else if (tabla == "tablahumedad"){
        document.getElementById("tablasal").style.display = "none";
        document.getElementById("tablahumedad").style.display = "table";
        document.getElementById("tablapH").style.display = "none";
        document.getElementById("tablatemp").style.display = "none";
        document.getElementById("tablaluz").style.display = "none";
        document.getElementById("tablasal1").style.display = "none";
        document.getElementById("tablasal2").style.display = "none";
        document.getElementById("tablahumedad1").style.display = "none";
        document.getElementById("tablahumedad2").style.display = "none";
        document.getElementById("tablaluz1").style.display = "none";
        document.getElementById("tablaluz2").style.display = "none";
        document.getElementById("tablapH1").style.display = "none";
        document.getElementById("tablapH2").style.display = "none";
        document.getElementById("tablatemp1").style.display = "none";
        document.getElementById("tablatemp2").style.display = "none";
    }
    else if (tabla == "tablapH"){
        document.getElementById("tablasal").style.display = "none";
        document.getElementById("tablahumedad").style.display = "none";
        document.getElementById("tablapH").style.display = "table";
        document.getElementById("tablatemp").style.display = "none";
        document.getElementById("tablaluz").style.display = "none";
        document.getElementById("tablasal1").style.display = "none";
        document.getElementById("tablasal2").style.display = "none";
        document.getElementById("tablahumedad1").style.display = "none";
        document.getElementById("tablahumedad2").style.display = "none";
        document.getElementById("tablaluz1").style.display = "none";
        document.getElementById("tablaluz2").style.display = "none";
        document.getElementById("tablapH1").style.display = "none";
        document.getElementById("tablapH2").style.display = "none";
        document.getElementById("tablatemp1").style.display = "none";
        document.getElementById("tablatemp2").style.display = "none";
    }
    else if (tabla == "tablatemp"){
        document.getElementById("tablasal").style.display = "none";
        document.getElementById("tablahumedad").style.display = "none";
        document.getElementById("tablapH").style.display = "none";
        document.getElementById("tablatemp").style.display = "table";
        document.getElementById("tablaluz").style.display = "none";
        document.getElementById("tablasal1").style.display = "none";
        document.getElementById("tablasal2").style.display = "none";
        document.getElementById("tablahumedad1").style.display = "none";
        document.getElementById("tablahumedad2").style.display = "none";
        document.getElementById("tablaluz1").style.display = "none";
        document.getElementById("tablaluz2").style.display = "none";
        document.getElementById("tablapH1").style.display = "none";
        document.getElementById("tablapH2").style.display = "none";
        document.getElementById("tablatemp1").style.display = "none";
        document.getElementById("tablatemp2").style.display = "none";
    }
    else if (tabla == "tablaluz"){
        document.getElementById("tablasal").style.display = "none";
        document.getElementById("tablahumedad").style.display = "none";
        document.getElementById("tablapH").style.display = "none";
        document.getElementById("tablatemp").style.display = "none";
        document.getElementById("tablaluz").style.display = "table";
        document.getElementById("tablasal1").style.display = "none";
        document.getElementById("tablasal2").style.display = "none";
        document.getElementById("tablahumedad1").style.display = "none";
        document.getElementById("tablahumedad2").style.display = "none";
        document.getElementById("tablaluz1").style.display = "none";
        document.getElementById("tablaluz2").style.display = "none";
        document.getElementById("tablapH1").style.display = "none";
        document.getElementById("tablapH2").style.display = "none";
        document.getElementById("tablatemp1").style.display = "none";
        document.getElementById("tablatemp2").style.display = "none";
    }
}

function siguientesal (){
    var boton = document.getElementById("botonderechasal1");
    if (boton.click){
        document.getElementById("tablasal").style.display = "none";
        document.getElementById("tablasal1").style.display = "table";
    }else{
        document.getElementById("tablasal1").style.display = "none";
    }

}
function ultimasal () {
    var boton = document.getElementById("botonderechasal2");
    if (boton.click) {
        document.getElementById("tablasal1").style.display = "none";
        document.getElementById("tablasal2").style.display = "table";
    } else {
        document.getElementById("tablasal2").style.display = "none";
    }
}
function primerasal () {
    var boton = document.getElementById("botonizquierdasal2");
    if (boton.click) {
        document.getElementById("tablasal1").style.display = "none";
        document.getElementById("tablasal").style.display = "table";
    } else {
        document.getElementById("tablasal").style.display = "none";
    }
}
function segundasal (){
    var boton = document.getElementById("botonizquierdasal3");
    if (boton.click){
        document.getElementById("tablasal2").style.display = "none";
        document.getElementById("tablasal1").style.display = "table";
    }else{
        document.getElementById("tablasal1").style.display = "none";
    }

}

function siguientehum (){
    var boton = document.getElementById("botonderechahum1");
    if (boton.click){
        document.getElementById("tablahumedad").style.display = "none";
        document.getElementById("tablahumedad1").style.display = "table";
    }else{
        document.getElementById("tablahumedad1").style.display = "none";
    }
}

function primerahum (){
    var boton = document.getElementById("botonizquierdahum2");
    if(boton.click){
        document.getElementById("tablahumedad1").style.display = "none";
        document.getElementById("tablahumedad").style.display = "table";
    }else{
        document.getElementById("tablahumedad").style.display = "none";
    }
}
 function ultimahum (){
    var boton = document.getElementById("botonderechahum2");
    if (boton.click){
        document.getElementById("tablahumedad1").style.display = "none";
        document.getElementById("tablahumedad2").style.display = "table";
    }else{
        document.getElementById("tablahumedad2").style.display = "none";
    }
 }
 function segundahum (){
    var boton = document.getElementById("botonizquierdahum3");
    if (boton.click){
        document.getElementById("tablahumedad2").style.display = "none";
        document.getElementById("tablahumedad1").style.display = "table";
    }else{
        document.getElementById("tablahumedad1").style.display = "none";
    }
 }
function siguienteluz (){
    var boton = document.getElementById("botonderechaluz");
    if (boton.click){
        document.getElementById("tablaluz").style.display = "none";
        document.getElementById("tablaluz1").style.display = "table";
    }else{
        document.getElementById("tablaluz1").style.display = "none";
    }
}

function primeraluz (){
    var boton = document.getElementById("botonizquierdaluz1");
    if(boton.click){
        document.getElementById("tablaluz1").style.display = "none";
        document.getElementById("tablaluz").style.display = "table";
    }else{
        document.getElementById("tablaluz").style.display = "none";
    }
}
function ultimaluz (){
    var boton = document.getElementById("botonderechaluz1");
    if (boton.click){
        document.getElementById("tablaluz1").style.display = "none";
        document.getElementById("tablaluz2").style.display = "table";
    }else{
        document.getElementById("tablaluz2").style.display = "none";
    }
}
function segundaluz (){
    var boton = document.getElementById("botonizquierdaluz2");
    if (boton.click){
        document.getElementById("tablaluz2").style.display = "none";
        document.getElementById("tablaluz1").style.display = "table";
    }else{
        document.getElementById("tablaluz1").style.display = "none";
    }
}
function siguienteph (){
    var boton = document.getElementById("botonderechaph");
    if (boton.click){
        document.getElementById("tablapH").style.display = "none";
        document.getElementById("tablapH1").style.display = "table";
    }else{
        document.getElementById("tablapH1").style.display = "none";
    }
}

function primeraph (){
    var boton = document.getElementById("botonizquierdaph1");
    if(boton.click){
        document.getElementById("tablapH1").style.display = "none";
        document.getElementById("tablapH").style.display = "table";
    }else{
        document.getElementById("tablapH").style.display = "none";
    }
}
function ultimaph (){
    var boton = document.getElementById("botonderechaph1");
    if (boton.click){
        document.getElementById("tablapH1").style.display = "none";
        document.getElementById("tablapH2").style.display = "table";
    }else{
        document.getElementById("tablapH2").style.display = "none";
    }
}
function segundaph (){
    var boton = document.getElementById("botonizquierdaph2");
    if (boton.click){
        document.getElementById("tablapH2").style.display = "none";
        document.getElementById("tablapH1").style.display = "table";
    }else{
        document.getElementById("tablapH1").style.display = "none";
    }
}
function siguientetemp (){
    var boton = document.getElementById("botonderechatemp");
    if (boton.click){
        document.getElementById("tablatemp").style.display = "none";
        document.getElementById("tablatemp1").style.display = "table";
    }else{
        document.getElementById("tablatemp1").style.display = "none";
    }
}

function primeratemp (){
    var boton = document.getElementById("botonizquierdatemp1");
    if(boton.click){
        document.getElementById("tablatemp1").style.display = "none";
        document.getElementById("tablatemp").style.display = "table";
    }else{
        document.getElementById("tablatemp").style.display = "none";
    }
}
function ultimatemp (){
    var boton = document.getElementById("botonderechatemp1");
    if (boton.click){
        document.getElementById("tablatemp1").style.display = "none";
        document.getElementById("tablatemp2").style.display = "table";
    }else{
        document.getElementById("tablatemp2").style.display = "none";
    }
}
function segundatemp (){
    var boton = document.getElementById("botonizquierdatemp2");
    if (boton.click){
        document.getElementById("tablatemp2").style.display = "none";
        document.getElementById("tablatemp1").style.display = "table";
    }else{
        document.getElementById("tablatemp1").style.display = "none";
    }
}

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