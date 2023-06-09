function cambiarImagen() {
    var huertos = document.getElementById("huertos");
    var huertoelegido = huertos.options[huertos.selectedIndex].value;
    var image = document.getElementById("imagen");
    var sensores = document.getElementById("sensores");
    var sensorelegido = sensores.options[sensores.selectedIndex].value;


    const boton = document.querySelectorAll(".boton");

    for (const boton of boton) {
        boton.addEventListener("click".clickHandler);
    }
}

    function clickHandler(e) {
        e.preventDefault();
        const href = this.getAttribute("href");
        const offsetTop = document.querySelector(href).offsetTop;
        scroll({
            top: offsetTop,
            behavior: "smooth"
        })
    }