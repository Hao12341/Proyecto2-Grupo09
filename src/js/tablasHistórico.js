async function crearTablas (idTabla,magnitud) {
    let datosSesion = await getSesion()
    let datos = await getMedidas(datosSesion.idHuerto)
    let dataset = crearDataset(datos,magnitud)
    dataset.forEach((dataRow) => {
        let tabla = document.getElementById(idTabla)
        let tableRow = tabla.appendChild(document.createElement("tr"))
    })
}