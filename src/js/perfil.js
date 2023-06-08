const editar = document.getElementsByClassName('editar');
const cancelarBtn = document.getElementById('cancelar-btn');
const popup = document.getElementById('popup');

let huertoId = 0

Array.from(editar).forEach((edit) => {
    edit.addEventListener('click', async function (event) {
        popup.showModal();
        huertoId = event.target.id
    });
});


cancelarBtn.addEventListener('click', function () {
    popup.close();
});


const si = document.getElementById('correcto');
const cancelar = document.getElementById('cancel');
const editHuerto = document.getElementById('edit');
const botonEdit = document.getElementById('botonEditar')



si.addEventListener('click', function () {
    editHuerto.showModal();
    popup.close();


});
botonEdit.addEventListener('click', (event) => {
    PutHuertos(event.target)
})

cancelar.addEventListener('click', function () {
    editHuerto.close();
    popup.close();

});

async function PutHuertos(boton) {
    let nombreHuerto = document.getElementById("nombreHuerto").value
    let formData = new FormData
    console.log(huertoId)
    formData.append("idHuerto", huertoId )
    formData.append("Nombre", nombreHuerto)
    console.log(formData)
    //TODO: Poner el backend en marcha

    /*let promesaPut = await fetch("../api/huertos/" + huertoId, {
        method: 'post',
        body: formData
    })
    let textoRespuesta
    switch (promesaPut) {

        case promesaPut.ok === true :
            textoRespuesta = "Se han enviado los datos correctamente"
            break
        case promesaPut.status === 401:
            textoRespuesta = "El huerto que usted intenta cambiar no le pertenece"
            break
        default:
            textoRespuesta = "Ha habido un error inesperado en el cambio de nombre del huerto"
    }

     */

    let botonAceptar
    botonAceptar.addEventListener('click', () => {
        location.reload()
    })






}

