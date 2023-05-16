

document.getElementById("form").addEventListener('submit', login);


async function login(event) {
    // eliminamos el mensaje de error previo, si lo hay
    const output = document.getElementById("output");
    output.classList.remove("error");

    event.preventDefault();
    const formData = new FormData(event.target);

    const respuesta = await fetch('api/sesion/', {
        method: 'post',
        body: formData
    })
    // si el resultado de la petición es OK (i.e. código HTTP 200)
    if (respuesta.ok) {
        // redirigimos a la página correspondiente
        location.href = '../html/paginasensores.html';
    } else {
        // si no, mostramos un mensaje de error
        output.innerText = "Credenciales no válidas";
        output.classList.add("error");
    }
}