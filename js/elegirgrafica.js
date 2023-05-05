const huertos = document.getElementById('huertos');
const sensores = document.getElementById('sensores');
const imagen = document.getElementById('imagen');

function cambiarHuerto(){
    const huerto= huertos.value;
    imagen.src = 'gr_h1/' + huerto + '_sal.png'
}
function cambiarImagen() {
    const huerto = huertos.value;
    const sensor = sensores.value;
    imagen.src = 'gr_h1/' + huerto + '_' + sensor + '.png'
}
