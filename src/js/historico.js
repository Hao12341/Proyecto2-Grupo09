async function crearTablas(idTabla, magnitud, idHuerto) {
    let datos = await getMedidas(idHuerto);
    let dataset = crearDataset(datos, magnitud);


    let tabla = document.getElementById(idTabla);
    let tableBody = tabla.appendChild(document.createElement("tbody"))

    dataset.forEach((dataRow) => {
        let tableRow = tableBody.appendChild(document.createElement("tr"));


        // Creamos los elementos html que iran a la tabla

        let fecha = document.createElement("td");
        let hora = document.createElement("td");
        let medida = document.createElement("td");

        let fechaP = document.createElement("p");
        let horaP = document.createElement("p");
        let medidaP = document.createElement("p");

        // Separamos la fecha de la hora

        let fechaDate = new Date(dataRow.fecha)


        let fechaString = fechaDate.getDate() + "/" + fechaDate.getMonth() + "/" + fechaDate.getFullYear()

        let horaString = fechaDate.getHours() + ":" + fechaDate.getMinutes()+ ":" + fechaDate.getSeconds()


        fechaP.innerText = fechaString;
        horaP.innerText = horaString;
        medidaP.innerText = dataRow.medida;

        fecha.appendChild(fechaP);
        hora.appendChild(horaP);
        medida.appendChild(medidaP);

        let arrayTablas = [fecha, hora, medida];
        arrayTablas.forEach((valor) => {
            tableRow.appendChild(valor);
        });
    });
}


addEventListener('load', async () => {

    //TODO: que elija el huerto perteneciente al usuario

    let idTablas = [{idTabla: "tablahum", magnitud: "Humedad"}, {
        idTabla: "tablasal",
        magnitud: "Sal"
    }, {idTabla: "tablatemp", magnitud: "Temperatura"}, {idTabla: "tablaph", magnitud: "PH"}, {
        idTabla: "tablaluz",
        magnitud: "Luz"
    }]
    idTablas.forEach((valor) => {
        crearTablas(valor.idTabla, valor.magnitud, 4)
    })

})

