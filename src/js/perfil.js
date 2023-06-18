/**
 * Esta funcion realiza un GET con los parámetros del huerto del usuario
 * correspondiente
 * @param idUsuario el id del Usuario del huerto
 * @returns {Promise<any>} devuelve un objeto cuando la promesa haya acabado
 * @constructor
 */

async function GetHuertos(idUsuario) {
    const promesa = await fetch("../api/huertos/" + idUsuario)
    return await promesa.json()
}

/**
 * Está funcion crea tablas HTML que guardan la información
 * de los huertos proporcionada
 * @param huertos Objeto que contiene idHuerto, Nombre y Dirección
 * @constructor
 */
async function PonerHuertos() {
    let sesion = await getSesion()
    let huertos = await getHuertos(sesion.IdUsuario)
    console.log(huertos)
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
        boton.id = huerto.id
        boton.value = huerto.id

        const editar = document.getElementsByClassName('editar');
        const cancelarBtn = document.getElementById('cancelar-btn');
        const popup = document.getElementById('popup');
        const si = document.getElementById('correcto');
        const cancelar = document.getElementById('cancel');
        const editHuerto = document.getElementById('edit');
        const botonEdit = document.getElementById('botonEditar')

        let huertoId = 0

        Array.from(editar).forEach((edit) => {
            edit.addEventListener('click', async function (event) {
                editHuerto.showModal();
                huertoId = event.target.getAttribute("value")
            });
        });


        cancelarBtn.addEventListener('click', function () {
            popup.close();
        });


        si.addEventListener('click', function () {
            PutHuertos()


        });
        botonEdit.addEventListener('click', () => {
            popup.showModal()
        })

        cancelar.addEventListener('click', function () {
            editHuerto.close();
            popup.close();

        });

        async function PutHuertos() {
            let nombreHuerto = document.getElementById("nombreHuerto").value
            console.log(nombreHuerto)
            console.log(huertoId)
            let objetoPUT = {idHuerto: huertoId, Nombre: nombreHuerto}
            console.log(JSON.stringify(objetoPUT))

            let promesaPut = await fetch("../api/huertos/" + huertoId, {
                method: 'put',
                body: JSON.stringify(objetoPUT)
            })
            let textoRespuesta
            switch (promesaPut) {

                case promesaPut.ok === true :
                    textoRespuesta = "Se han enviado los datos correctamente"
                    break
                case promesaPut.status === 401:
                    textoRespuesta = "El huerto que usted intenta cambiar no le pertenece"
                    break
                default:
                    textoRespuesta = "Ha habido un error inesperado en el cambio de nombre del huerto"
            }

            location.reload()











        }
})
}













