
async function GetHuertos(idUsuario) {
    const promesa = await fetch("../api/huertos/" + idUsuario)
    return await promesa.json()
}

async function ponerHuertosTitulo () {
    let input = document.getElementById("huertos")
    let sesion = await getSesion()
    console.log("Datos de la sesión")
    console.log(sesion)
    let idUsuario = parseInt(sesion.IdUsuario)
    let huertos = await GetHuertos(idUsuario)
    huertos.forEach((huerto) => {
        let tituloHuerto = input.appendChild(document.createElement("option"))
        tituloHuerto.value = huerto.id
        tituloHuerto.innerText = huerto.Nombre
    })
}
