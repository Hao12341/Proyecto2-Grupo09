
async function DevuelveUsuarios(event) {
    // eliminamos el mensaje de error previo, si lo hay
    const output = document.getElementById("form");

    event.preventDefault();
    const formData = new FormData(event.target);
    console.log(formData)

    const respuesta = await fetch('../api/sesion/index.php', {
        method: 'post',
        body: formData
    })
    if (respuesta.ok){
        return await respuesta.json()
    }

}

/**
 *
 * @param usuarios
 * @param tablas
 * @constructor
 */
function CrearTablas(usuarios, tablas){
    usuarios.forEach(
        function (usuario){
            let tabla = document.getElementById(tablas)
            let cuerpoTabla = tabla.appendChild(document.createElement("tbody"))
            let tr = cuerpoTabla.appendChild(document.createElement("tr"))
            let th = tr.appendChild(document)
        }
            )
}