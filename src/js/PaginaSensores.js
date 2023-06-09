async function getMedidas(numeroHuerto) {
    let response = await fetch("../api/medidas/" + numeroHuerto)
    return await response.json()
}


/**
 * Ordena las medidas por fecha de más antigua a más reciente
 *  @param mediciones JSON con los parámetros de medida
 *  @returns el JSON ordenado
 */
function ordenarJSONFecha(mediciones) {
    // Ordena el json por fecha
    mediciones.sort(function (a, b) {
        const fechaA = new Date(a.fecha);
        const fechaB = new Date(b.fecha);
        return fechaA - fechaB;
    });
    console.log("objeto ordenadissimo hermano")
    console.log(mediciones)
    return mediciones

}

/**
 *  Esta funcion dada unas medidas devuelve un eje X ordenado por fechas
 * @param mediciones Las mediciones de donde se saca el eje horizontal
 * @returns {*[]} Devuelve un array de fechas ordenado
 */
function crearEjeX(mediciones) {
    //ordenamos las mediciones por fecha
    mediciones = ordenarJSONFecha(mediciones)

    //creamos array vacío para almacenar los valores del eje X

    let ejeX = []

    // Si el valor ya existe en el array, no se añade
    // Si no existe, la añade
    // Esto crea un array con valores ordenadas y sin repetir,
    // que nos vale de valores para el eje X de nuestra gráfica

    mediciones.forEach(function (medicion) {
        if (ejeX.indexOf(medicion.fecha) < 0) {
            ejeX.push(medicion.fecha)
        }

    })
    console.log("crearejeX")
    console.log(ejeX)
    return ejeX
}

/**
 * Dada unas mediciones, ordena el ejeX según la fecha y añade valores al ejeY correspondientes con estas
 * @param mediciones
 * @param magnitud
 * @returns {*[]}
 */

function crearDataset(mediciones, magnitud) {
    //ordenamos las mediciones por fecha
    mediciones = ordenarJSONFecha(mediciones)

    //Creamos el eje X para asignar los valores del eje Y

    let ejeX = crearEjeX(mediciones)

    let filtrado = mediciones.filter((valor) => {
        return valor.tipoMedida === magnitud;
    })

    console.log("objeto filtrado")
    console.log(filtrado)


    return filtrado
}

/**
 *
 * @param idGrafica
 * @param idHuerto
 * @param opciones
 * @param label
 * @param magnitud
 */
async function crearGrafica(idHuerto, idGrafica, opciones, label, magnitud) {
    // Verificar si existe una instancia de gráfico asociada al canvas
    var chartInstance = Chart.getChart(idGrafica);
    console.log(chartInstance)

    // Destruir el gráfico si existe
    if (chartInstance) {
        await chartInstance.destroy();
        console.log("El gráfico se ha destruido");
    } else {
        console.log("No se encontró ningún gráfico para destruir");
    }

    // Crear datos gráfica
    let datos = await getMedidas(idHuerto)
    let dataset = crearDataset(datos, magnitud)
    console.log("Dataset en crear gráfica")
    console.log(dataset)

    if (dataset.length) {
        let datosGrafica = {
            labels: dataset.map((objeto) => objeto.fecha),
            datasets: [
                {
                    label: label,
                    data: dataset.map((objeto) => objeto.medida)
                }
            ]
        }

        //obtenemos el documento donde vamos a poner la gráfica
        let ctx = document.getElementById(idGrafica).getContext('2d')
        let grafica = new Chart(ctx, {
            type: 'line',
            data: datosGrafica,
            options: opciones
        })
    }
}



async function getUltimosDatos(idHuerto) {

    let medidas = await getMedidas(idHuerto)


    const values = medidas[tipoMedida]; // Obté l'array de valors específic del propietari de l'objecte
    const uniqueValues = [...new Set(values)]; // Obté els valors únics de l'array
    const numUniqueValues = uniqueValues.length; // Compta el nombre de valors únics
    let ultimasMedidas;
    ultimasMedidas = [];

    //Vamos a recoger el último valor por cada tipo de Valor
    uniqueValues.forEach((tipoDeMedida) => {
        let ultimaMedida = {tipoMedida, ultima}
        //ponemos un valor a la fecha de base
        let utltimaFecha = medidas[0].fecha
        medidas.forEach((medida) => {
            //miramos que sea el tipo de medida que queremos,
            if (tipoDeMedida.tipoMedida === tipoDeMedida && tipoDeMedida.fecha > utltimaFecha) {
                //remplazamos la fecha
                ultimaMedida.ultima = medida.medida

            }

        })
        //añadimos el tipo de Medida
        ultimaMedida.tipoMedida = tipoDeMedida
        ultimasMedidas.push(ultimaMedida)
    })

    return ultimasMedidas
}


async function crearTablaUltimosDatos (medidas) {
    let tabla = document.getElementById("huerto1")
    let arrayId = [""]
}
//opciones js
let
    opciones = {
        plugins: {
            plugins: {
                title: {
                    display: true,
                }
            },
            responsive: true,

            tooltip: {
                backgroundColor: '#fff',
                titleColor: '#000',
                titleAlign: 'center',
                bodyColor: '#333',
                borderColor: '#666',
                borderWidth: 1,
            }
        }
    };


document.getElementById("huertos").addEventListener('change', disparadorCrearGraficas)

async function disparadorCrearGraficas(event) {
    let idHuerto = event.target.value

    crearGrafica(idHuerto, "graficahumedad", opciones, "humedad", "Humedad")
    crearGrafica(idHuerto, "graficasalinidad", opciones, "Sal", "Sal")
    crearGrafica(idHuerto, "graficatemperatura", opciones, "Temperatura", "Temperatura")
    crearGrafica(idHuerto, "graficaph", opciones, "ph", "PH")
    crearGrafica(idHuerto, "graficaluz", opciones, "Luz", "Luz")
}

addEventListener("load", async () => {
    await ponerHuertosTitulo()


    let idHuerto = parseInt(document.getElementById("huertos").value)
    console.log("ID usuario carga")
    console.log(idHuerto)


    crearGrafica(idHuerto, "graficahumedad", opciones, "humedad", "Humedad")
    crearGrafica(idHuerto, "graficasalinidad", opciones, "Sal", "Sal")
    crearGrafica(idHuerto, "graficatemperatura", opciones, "Temperatura", "Temperatura")
    crearGrafica(idHuerto, "graficaph", opciones, "ph", "PH")
    crearGrafica(idHuerto, "graficaluz", opciones, "Luz", "Luz")

})




