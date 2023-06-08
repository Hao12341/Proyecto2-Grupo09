function datosPopUp(idAveria, averias){
    let averia= averias[idAveria]

    let tituloIncidencia=document.getElementById("tituloAveria")
    tituloIncidencia.innerText= averia.id

    let nombreUsuario= document.getElementById("Cliente")
    nombreUsuario.innerText= averia.usuario

    let usuarioId=document.getElementById("idUsuario")
    usuarioId.innerText= averia.idUsuario

    let hogarUsuario=document.getElementById("direcciónUsuario")
    hogarUsuario.innerText= averia.dirección

    let huertoUsuario=document.getElementById("idHuerto")
    huertoUsuario.innerText= averia.idHuerto

    let sondaUsuario=document.getElementById("idSonda")
    sondaUsuario.innerText= averia.idSonda

    let sensorUsuario=document.getElementById("idSensor")
    sensorUsuario.innerText= averia.idSensor

}

function crearAverias(averias){
    let incidencias=document.getElementById("incidencias")
    averias.forEach(function(averia){
        let contenedorIncidencias=incidencias.appendChild(document.createElement("div"))
            let cliente = contenedorIncidencias.appendChild(document.createElement("p"))
                cliente.classList.add("Cliente")
                let nombreReal= cliente.appendChild(document.createElement("b"))
                    nombreReal.innerText="Usuario:" + averia.usuario

            let gravedad= contenedorIncidencias.appendChild(document.createElement("p"))
                gravedad.classList.add("Gravedad")
                let nivel= gravedad.appendChild(document.createElement("b"))
                    nivel.innerText="Prioridad de Incidencia" + averia.nivelGravedad
    })


}