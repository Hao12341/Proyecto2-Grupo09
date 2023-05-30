function cambiarImagen(){
    var huertos = document.getElementById("huertos");
    var huertoelegido = huertos.options[huertos.selectedIndex].value;
    var image = document.getElementById("imagen");
    var sensores = document.getElementById("sensores");
    var sensorelegido = sensores.options[sensores.selectedIndex].value;


    if (huertoelegido == "h1"&&sensorelegido=="sal"){
        image.src = "../img/gr_h1/h1_sal.png"
    }
    else if (huertoelegido == "h1" && sensorelegido == "hum"){
        image.src = "../img/gr_h1/h1_hum.png"
    }
    else if (huertoelegido == "h1" && sensorelegido == "luz"){
        image.src = "../img/gr_h1/h1_luz.png"
    }
    else if (huertoelegido=="h1"&&sensorelegido=="temp"){
        image.src = "../img/gr_h1/h1_temp.png"
    }
    else if (huertoelegido=="h1"&&sensorelegido=="ph"){
        image.src = "../img/gr_h1/h1_pH.png"
    }
    else if (huertoelegido == "h2" && sensorelegido == "sal"){
        image.src = "../img/gr_h1/h2_sal.png"
    }
    else if (huertoelegido == "h2" && sensorelegido == "hum"){
        image.src = "../img/gr_h1/h2_hum.png"
    }
    else if (huertoelegido=="h2"&&sensorelegido=="luz"){
        image.src = "../img/gr_h1/h2_luz.png"
    }
    else if (huertoelegido =="h2"&&sensorelegido=="temp"){
        image.src = "../img/gr_h1/h2_temp.png"
    }
    else if (huertoelegido == "h2"&& sensorelegido=="ph"){
        image.src = "../img/gr_h1/h2_ph.png"
    }
    else if (huertoelegido=="h3"&&sensorelegido=="sal"){
        image.src="../img/gr_h1/h3_sal.png"
    }
    else if (huertoelegido=="h3"&&sensorelegido=="hum"){
        image.src="../img/gr_h1/h3_hum.png"
    }
    else if (huertoelegido=="h3"&&sensorelegido=="luz"){
        image.src="../img/gr_h1/h3_luz.png"
    }
    else if (huertoelegido=="h3"&&sensorelegido=="temp"){
        image.src="../img/gr_h1/h3_temp.png"
    }
    else if (huertoelegido== "h3"&&sensorelegido=="ph"){
        image.src="../img/gr_h1/h3_ph.png"
    }
}