const editar = document.querySelectorAll('.editar');
const cancelarBtn = document.querySelectorAll('.cancelar-btn');
const popup = document.getElementById('popup');



editar.addEventListener('click', function () {
    popup.showModal();
});

cancelarBtn.addEventListener('click', function () {
    popup.close();
});


const si = document.getElementById('correcto');
const cancelar = document.getElementById('cancel');
const editHuerto = document.getElementById('edit');



si.addEventListener('click', function () {
    editHuerto.showModal();
    popup.close();

});

cancelar.addEventListener('click', function () {
    editHuerto.close();
    popup.close();

});