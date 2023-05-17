

document.getElementById("form").addEventListener('submit', login);


async function login(event) {
    // eliminamos el mensaje de error previo, si lo hay
    const output = document.getElementById("form");

    event.preventDefault();
    const formData = new FormData(event.target);
    console.log(formData)

    const respuesta = await fetch('../api/sesion/', {
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
                location.href = "../html/DashboardAdmin.html"
                break

            case "3":
                location.href = "../html/Página Incidencias.html"
                break
            case "4":
                location.href = "../html/paginasensores.html"
                break

            default:
                location.href = "../index.html"
        }

    } else {
        // si no, mostramos un mensaje de error
        // para cambiar, texto abajo contraseña
        output.innerText = "Credenciales no válidas";
        output.classList.add("error");
    }
}