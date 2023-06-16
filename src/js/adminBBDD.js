/**
 *
 * @returns {Promise<any>} Objeto con los usuarios
 */
  async function getUsuarios() {

    const promesa = await fetch("../api/usuarios")
      let usuarios = await promesa.json()
      console.log(usuarios)
      return usuarios
  }
  async function getUsuariosId(id) {
    const promesa = await fetch("../api/usuarios/" + parseInt(id))
      let usuarios = await promesa.json()
      console.log(usuarios)
      return usuarios
  }


function separarPorRol (usuarios,RolID) {
      let usuarioSeparado = usuarios.filter( (usuario) => {
          console.log("hola")
          return usuario.idRol === RolID.toString();
      })
    console.log(usuarioSeparado)
    return usuarioSeparado
  }

  function crearTabla (idTabla,usuarios) {
      // Cojemos la tabla que vamos a rellenar
      let Tabla = document.getElementById(idTabla)
      console.log("adiós")
      //Hacemos el HTML de la página que con java script
      let tbody = Tabla.appendChild(document.createElement("tbody"))
      usuarios.forEach( (usuario) => {
          let row = tbody.appendChild(document.createElement("tr"))
                    let Nombre = row.appendChild(document.createElement("th"))
                        Nombre.innerText = usuario.nombre
                    let email = row.appendChild(document.createElement("td"))
                        email.innerText = usuario.email
                    let tel = row.appendChild(document.createElement("td"))
                        tel.innerText = usuario.telefono
                    let cajaAcciones = row.appendChild(document.createElement("td"))
                        cajaAcciones.classList.add("acciones")
                        let botones = cajaAcciones.appendChild(document.createElement("div"))
                            botones.classList.add("imagen")

                            let botonEditar = botones.appendChild(document.createElement("button"))
                                botonEditar.type = "button"
                                botonEditar.classList.add("boton-editar")
                                botonEditar.value = usuario.id
                                let imagen1 = botonEditar.appendChild(document.createElement("i"))
                                    imagen1.classList.add("bi")
                                    imagen1.classList.add("bi-pencil-square")
                                    imagen1.value = usuario.id
                                    imagen1.onclick = async function (event) {
                                        await ponerDatosActualizarUsuarios(event);
                                        abrirEditarUsuarioDialog();

                                    }
                            let botonEliminar = botones.appendChild(document.createElement("button"))
                                botonEliminar.type = "button"
                                botonEliminar.classList.add("boton-quitar")

                                let imagen2 = botonEliminar.appendChild(document.createElement("i"))
                                    imagen2.classList.add("bi")
                                    imagen2.classList.add("bi-x-circle")
                                    imagen2.value = usuario.id
                                    imagen2.onclick = async function(event) {
                                        await EliminarUsuario(event);
                                      };
                                      
                                    //TODO: Añadir función que abre la página de eliminar usuarios
                                    //imagen2.onclick = abrirEditarUsuarioDialog



      })
  }


async function crearTodasTablas () {
    let usuarios = await getUsuarios()
    let usuariosUser = separarPorRol(usuarios,4)
    let usuariosTecnico = separarPorRol(usuarios,3)
    let usuariosAdmin = separarPorRol(usuarios,1)
    crearTabla("tablaUser",usuariosUser)
    crearTabla("tablaTecnico",usuariosTecnico)
    crearTabla("tablaAdmin",usuariosAdmin)
}

async function postUsuarios (event) {
      event.preventDefault()
    const formData = new FormData(event.target);
    console.log(formData)
    let promesa = await fetch("../api/usuarios",{
        method: 'post',
        body: formData
    })
    let textoEstadoEnvio
    switch (promesa.status) {
        case 200:
            textoEstadoEnvio = "Se ha creado el usuario correctamente"
            break
        case 500:
            textoEstadoEnvio ="Ha habido un error en el servidor"
            break
        case 401:
            textoEstadoEnvio = "No se tienen los permisos necesarios"
            break
    }
    console.log(textoEstadoEnvio)
    //TODO: Poner texto del estado de envío en el popup correspondiente
    location.reload()
}


//llamada funcion añadir usuarios

document.getElementById("formAñadir").addEventListener("submit", postUsuarios)



//PUT

async function ponerDatosActualizarUsuarios (event) {
    let idUsuario = parseInt(event.target.value)
    let usuario = await getUsuariosId(idUsuario)
    document.getElementById("emailEditar").value = usuario.email
    document.getElementById("nombreEditar").value = usuario.nombre
    document.getElementById("dniEditar").value = usuario.DNI
    document.getElementById("usernameEditar").value = usuario.username
    document.getElementById("passwordEditar").value = usuario.password
    document.getElementById("direccionEditar").value = usuario.email
    document.getElementById("idRolEditar").value = usuario.id
    return idUsuario
}

async function actualizarDatos (event) {
      let idUsuario = parseInt(document.getElementById("idRolEditar").value)
    console.log(idUsuario)
    event.preventDefault()
    const formData = new FormData(event.target);
    console.log("formData con todas las cosas del form"+formData)
    const usuarios = {};
    for (const [key, value] of formData.entries()) {
        usuarios[key] = value;
    }
    console.log("usuarios en objeto:" +usuarios)
     let usuariosJSON =  JSON.stringify(usuarios);
    console.log("usuarios en json:" + usuariosJSON)
    let promesa = await fetch("../api/usuarios/" + idUsuario, {
        method: 'put',
        body: usuariosJSON
    })
    //TODO: Añadir funcionalidad al popup de prevenir la edición sin querer
    location.reload()
}




//Delete
/**
 * Destruye un usuario en la base de datos
 * @param {number} idUsuario ID del usuario a eliminar
 */

async function EliminarUsuario(event) {
    const idUsuario = event.target.value;

    const confirmacion = confirm("¿Estás seguro de que deseas eliminar este usuario?");
    
    if (!confirmacion) {
      return;
    }
  
    try {
      const promesa = await fetch("../api/usuarios/" + idUsuario, {
        method: "delete"
      });
  
      switch (promesa.status) {
        case 200:
          console.log("Se ha eliminado el usuario correctamente");
          break;
        case 500:
          console.error("Ha habido un error en el servidor");
          break;
        case 401:
          console.error("No se tienen los permisos necesarios");
          break;
        case 404:
          console.error("No se ha encontrado el usuario");
          break;
        default:
          console.error("Error desconocido");
          break;
      }
    } catch (error) {
      console.error("Ha ocurrido un error:", error);
    }
  
    // Actualizar la página después de eliminar el usuario
    location.reload();
  }

  