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


function separarPorRol (usuarios,RolID) {
      let usuarioSeparado = usuarios.filter( (usuario) => {
          console.log("hola")
          return usuario.idRol === RolID.toString();
      })
    console.log(usuarioSeparado)
    return usuarioSeparado
  }

  function crearTabla (idTabla,usuarios) {
      let Tabla = document.getElementById(idTabla)
      console.log("adiós")
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
                                let imagen1 = botonEditar.appendChild(document.createElement("i"))
                                    imagen1.classList.add("bi")
                                    imagen1.classList.add("bi-pencil-square")
                                    imagen1.onclick = abrirEditarUsuarioDialog
                            let botonEliminar = botones.appendChild(document.createElement("button"))
                                botonEliminar.type = "button"
                                botonEliminar.classList.add("boton-quitar")

                                let imagen2 = botonEliminar.appendChild(document.createElement("i"))
                                    imagen2.classList.add("bi")
                                    imagen2.classList.add("bi-x-circle")
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