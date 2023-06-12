
async function GetHuertos(idUsuario) {
    const promesa = await fetch("../api/huertos/" + idUsuario)
    return await promesa.json()
}

async function ponerHuertosTitulo (){
    let input = document.getElementById("huertos")
    let huertos = await GetHuertos('4')
    huertos.forEach((huerto) => {
        let tituloHuerto = input.appendChild(document.createElement("option"))
            tituloHuerto.value = huerto.id
            tituloHuerto.innerText = huerto.Nombre
    })
}