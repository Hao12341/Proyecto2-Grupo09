const anyadirBtn = document.getElementById('anyadir-btn');
const cancelarBtn = document.getElementById('cancelar-btn');
const popup = document.getElementById('popup');

const editar = document.getElementById("editUsuario");
const anyadirBton = document.getElementById('anyadir');
const cancelarBton = document.getElementById('cancelar');

function validatePhone(event) {
    const input = event.target;
    const phoneNumber = input.value.replace(/\D/g, "").slice(0, 9);
    if (phoneNumber.length !== 9) {
      input.setCustomValidity("Introduce un número de teléfono válido (9 dígitos)");
    } else {
      input.setCustomValidity("");
    }
    input.value = phoneNumber;
  }

  function validateEmail(event) {
    const input = event.target;
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const isValidEmail = emailPattern.test(input.value);
    if (!isValidEmail) {
      input.setCustomValidity("Introduce un correo electrónico válido");
    } else {
      input.setCustomValidity("");
    }
  }

  function validateDNI(event) {
    const input = event.target;
    const dniPattern = /^([0-9]{8})([A-Za-z])$/;
    const isValidDNI = dniPattern.test(input.value);
    if (!isValidDNI) {
      input.setCustomValidity("Introduce un DNI o NIE válido");
    } else {
      input.setCustomValidity("");
    }
  }
  
anyadirBtn.addEventListener('click', function () {
    popup.showModal();
});

cancelarBtn.addEventListener('click', function () {
    popup.close();
});
function mostrarTabla(tabla) {
    // Ocultar todas las tablas
    var tablas = document.getElementsByClassName("tabla");
    for (var i = 0; i < tablas.length; i++) {
        tablas[i].style.display = "none";
    }

    // Mostrar la tabla seleccionada
    var tablaSeleccionada = document.getElementById("tabla" + tabla);
    tablaSeleccionada.style.display = "block";

    // Cambiar el color de las pestañas
    var pestañas = document.getElementsByClassName("pestaña");
    for (var j = 0; j < pestañas.length; j++) {
        pestañas[j].classList.remove("active");
    }

    var pestañaActual = document.getElementById("pestaña" + tabla);
    pestañaActual.classList.add("active");
}

function abrirEditarUsuarioDialog() {
    var dialog = document.getElementById("editUsuario");
    dialog.showModal();
}

function cerrarEditarUsuarioDialog() {
    var dialog = document.getElementById("editUsuario");
    dialog.close();
    return false; // Para evitar el envío del formulario
}

function ConfirmacionEliminar(idUsuario, nombreUsuario) {
    var dialog = document.getElementById("ConfirmacionEliminar");
    var mensaje = document.getElementById("mensaje");
    mensaje.innerHTML = `¿Estás seguro de que quieres eliminar al usuario <strong>${nombreUsuario}</strong>?`;
    dialog.showModal();

    var correctoBtn = document.getElementById("correcto");
    var cancelarBtn = document.getElementById("cerrarr");
    correctoBtn.onclick = async function() {
        await EliminarUsuario(idUsuario);
        dialog.close();
    };
    cancelarBtn.onclick = function() {
        dialog.close();
    };
}
document.getElementById("buscar-btn").addEventListener("click", function () {
    // Obtener el valor del campo de búsqueda
    var textoBusqueda = document.getElementById("buscar-input").value.toLowerCase();

    // Obtener todas las filas de la tabla
    var filas = document.getElementsByTagName("tr");

    // Iterar sobre las filas y mostrar o ocultar según el texto de búsqueda
    for (var i = 0; i < filas.length; i++) {
        var nombre = filas[i].getElementsByTagName("th")[0].innerText.toLowerCase();

        if (nombre.includes(textoBusqueda)) {
            filas[i].style.display = "";
        } else {
            filas[i].style.display = "none";
        }
    }
});