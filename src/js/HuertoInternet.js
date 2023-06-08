



 async function GetHuertos(idUsuario) {
    const promesa = await fetch("../api/huertos" + idUsuario)
     return await promesa.json()
 }

 function PonerHuertos(huertos) {
    const contenedorHuerto = document.getElementById("ContenedorHuertos")
    huertos.forEach( (huerto) => {
        let cajaHuerto = contenedorHuerto.appendChild(document.createElement("div"))
            let cajaHuerto2 = cajaHuerto.appendChild(document.createElement("dd"))
                cajaHuerto2.classList.add("huertos")
                let texto = cajaHuerto2.appendChild(document.createElement("div"))
                    texto.classList.add("texto")
                        let tituloHueto = texto.appendChild(document.createElement("p"))
                            tituloHueto.classList.add("TituloHuerto")
                            tituloHueto.innerText = huerto.Nombre
                        let direccionHuerto = texto.appendChild(document.createElement("p"))
                            direccionHuerto.classList.add("direccion")
                            direccionHuerto.innerText = huerto.Dirección
                let botonHuerto = cajaHuerto2.appendChild(document.createElement("div"))
                            botonHuerto.classList.add("boton")
                            botonHuerto.classList.add("botonHUerto")
                        let boton = botonHuerto.appendChild(document.createElement("button"))

                            boton.innerText = "Editar"
                            boton.type = "button"
                            boton.classList.add("editar")



    })
 }