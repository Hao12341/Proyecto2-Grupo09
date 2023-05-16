

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
        const data = await respuesta.json()
        switch (data.rol) {
            case 1:
                location.href = "../html/DashboardAdmin.html"
                break

            default:
                location.href = "../html/perfil.html"
        }

    } else {
        // si no, mostramos un mensaje de error
        output.innerText = "Credenciales no válidas";
        output.classList.add("error");
    }
}