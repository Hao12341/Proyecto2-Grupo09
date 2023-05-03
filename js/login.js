// Obtener el elemento del enlace "olvido-contraseña"
const olvidoContraseña = document.getElementById("olvido-contraseña");

// Obtener el elemento del pop up
const popup = document.getElementById("popup");

// Obtener el botón "cerrar" del pop up
const cerrar = document.getElementById("cerrar");

// Obtener el botón "cerrar" del pop up de envío
const cerraBoton = document.getElementById("cerraBoton");

// Obtener el pop up de envío
const popupEnvio = document.getElementById("popupEnvio");

// Cuando se haga clic en el enlace "olvido-contraseña", mostrar el pop up
olvidoContraseña.addEventListener("click", function() {
  popup.style.display = "block";
});

// Cuando se haga clic en el botón "cerrar", ocultar el pop up
cerrar.addEventListener("click", function() {
  popup.style.display = "none";
});


// Cuando se haga clic en el botón "cerrar" del pop up de envío, ocultar el pop up
cerraBoton.addEventListener("click", function() {
  popupEnvio.style.display = "none";
  popup.style.display = "none";

});
// Obtener el botón "enviar" del pop up
const enviar = document.querySelector("#popup form button[type='submit']");

// Cuando se haga clic en el botón "enviar", comprobar si el campo de correo electrónico está completo
enviar.addEventListener("click", function(event) {
    const emailInput = document.querySelector("#popup input[type='email']");
    if (emailInput.value.trim() === "") {
        event.preventDefault();
        alert("Por favor, completa el campo de correo electrónico antes de enviar.");
    } else {
        // Mostrar el pop-up de envío correcto
        popupEnvio.style.display = "block";
    }
});
