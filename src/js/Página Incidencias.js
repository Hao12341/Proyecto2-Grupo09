
//     POP UPS

let NivelesGravedad = ["Leve","Grave","Muy Grave","Crítico"]
let clasesGravedad = ["Leve","Grave","MuyGrave","Crítico"]



function showPopUp (event,averia) {
    let popup = document.getElementById("popUpBox")
    popup.style.display = "block"
    afegirClassesRecursivament(popup,"activo", "desactivado")
    cogerIdAveriaPopUp(event, averia)

}

function hidePopUp() {
    let popup = document.getElementById("popUpBox")
    popup.style.display = "none"
    afegirClassesRecursivament(popup,"desactivado", "activo")

}


//                                  FUNCIONES OBTENER AVERIA

async function getAverias () {
    let promesa = await fetch("../api/averias")
    let averias =  await promesa.json()
    console.log(averias)
    averias.sort( (a, b) => {
        return b.nivelGravedad-a.nivelGravedad
    })
    console.log(averias)
    return averias
}




//                                  FUNCION HACER ENTRADAS
    async function crearEntradasAverias (averias) {

    let contenedor = document.getElementById("contenedor")
    averias.forEach((averia) => {
        let incidencias = contenedor.appendChild(document.createElement("div"))
            incidencias.classList.add("incidencias")
            let datosPrincipales = incidencias.appendChild(document.createElement("div"))
                datosPrincipales.classList.add("datosPrincipales")
                let Cliente = datosPrincipales.appendChild(document.createElement("p"))
                    Cliente.classList.add("Cliente")
                    Cliente.innerText = "Usuario: "
                    let clienteDatos = Cliente.appendChild(document.createElement("b"))
                        clienteDatos.innerText = averia.usuario
                let Gravedad = datosPrincipales.appendChild(document.createElement("p"))
                    Gravedad.classList.add("Gravedad")
                    Gravedad.innerText = "Gravedad: "
                    let gravedadDatos = Gravedad.appendChild(document.createElement("b"))
                        gravedadDatos.innerText = NivelesGravedad[parseInt([averia.nivelGravedad])-1]
                        gravedadDatos.classList.add(clasesGravedad[(parseInt([averia.nivelGravedad])-1)])
            let boton = incidencias.appendChild(document.createElement("button"))
                boton.classList.add("btn")
                boton.innerText = "Ver Más"
                boton.value = averia.id

    })

    }


// IMPLEMENTACION FUNCIONES

let averias
let verMas
let botonCerrar


addEventListener('load', async () => {
    averias = await getAverias()
    let cantidad = document.getElementById("cantidad")
    cantidad.innerText = averias.length
    await crearEntradasAverias(await averias)
     verMas = document.getElementsByClassName("btn")
     botonCerrar = document.getElementById("closeIcon")
    console.log("averias")
    console.log(averias)
    Array.from(await (verMas)).forEach( (boton) => {
        boton.addEventListener('click',async (event) => {
            showPopUp(event.target,averias)
        })
    })

    botonCerrar.addEventListener('click', hidePopUp)



})


    function cambiarDatosPopUp (averia) {
        document.getElementById("tituloAveria").innerText = "Avería #" + averia.id
        document.getElementById("nombreUsuario").innerText = "Nombre del Usuario: " + averia.usuario
        document.getElementById("textoIdUsuario").innerText = "Id del Usuario: "+  averia.idUsuario
        document.getElementById("dirección").innerText = "Dirección: " + averia.dirección
        document.getElementById("textoIdHuerto").innerText = "ID del Huerto: " + averia.idHuerto
        document.getElementById("textoIdSensor").innerText = "Id Sensor: " + averia.idSensor
        document.getElementById("textoIdSonda").innerText = "Tipo de Sensor: " + averia.tipoSensor
    }


    function cogerIdAveriaPopUp (target,averias) {
    let idAveria = target.value
        console.log("cogerIdAveriaPopUp")
        console.log(averias)
        let indexAveria = averias.findIndex((element) => element.id === idAveria)
        console.log(indexAveria)
        cambiarDatosPopUp(averias[indexAveria])
    }

function afegirClassesRecursivament(element, classeAnyadir, classeEliminar ) {
    if (element.hasChildNodes()) {
        const fills = element.children;
        for (let i = 0; i < fills.length; i++) {
            const fill = fills[i];
            afegirClassesRecursivament(fill, classeAnyadir,classeEliminar);
            fill.classList.add(classeAnyadir);
            fill.classList.remove(classeEliminar);
        }
    }
}





