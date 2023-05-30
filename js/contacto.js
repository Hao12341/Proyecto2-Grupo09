
// Declaración de Variables
const botonEnvio = document.getElementById("botonEnvio")
const textoEnvío = document.getElementById("textoEnvío")
const Formulario = document.getElementById("Formulario")

// Simulación de estado del envío
const EnvioExitoso = true

//Funcion para cerrar el PopUp

//Funcion de activación del PopUp y cambio de atributos de los elementos dentro del mismo
Formulario.addEventListener('submit', (event) => {
    event.preventDefault()
    if (EnvioExitoso) {
        textoEnvío.innerText = "El formulario se ha enviado correctamente"
        setTimeout(()=> {
            window.location.replace("../index.html")
        }, 3000)

    }else{
        textoEnvío.innerText = "El formulario no se ha podido enviar correctamente. Por favor intentelo más tarde"
    }


    //Formulario.submit()
})

function contarCaracteres(textarea) {
    document.getElementById("contador").innerText = textarea.value.length
}



