

document.getElementById("form").addEventListener('submit', login);


async function login(event) {
    // eliminamos el mensaje de error previo, si lo hay
    const output = document.getElementById("textoError");

    event.preventDefault();
    const formData = new FormData(event.target);
    console.log(formData)

    const respuesta = await fetch('../api/sesion/index.php', {
        method: 'post',
        body: formData
    })
    // si el resultado de la petición es OK (i.e. código HTTP 200)
    if (respuesta.ok) {
        // redirigimos a la página correspondiente
        let data = await respuesta.json()
        console.log(data)
        console.log(typeof data)
        switch (data.rol) {
            case "1":
                location.href = "../html/DashboardAdmin.php"
                break

            case "3":
                location.href = "../html/Página Incidencias.php"
                break
            case "4":
                location.href = "../html/paginasensores.php"
                break

            default:
                location.href = "../html/index.html"
        }

    } else {
        // si no, mostramos un mensaje de error
        // para cambiar, texto abajo contraseña
        document.getElementById("textoError").innerText = "Credenciales no válidas";
        output.classList.add("error");
    }
}