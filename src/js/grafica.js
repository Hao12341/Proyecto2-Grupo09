

async function fetchMedidas (numeroHuerto) {
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
    mediciones.sort(function(a, b) {
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

     mediciones.forEach( function (medicion) {
         if( ejeX.indexOf(medicion.fecha) < 0){
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
 * @param magintud
 * @returns {*[]}
 */

function crearDataset(mediciones,magintud) {
     //ordenamos las mediciones por fecha
     mediciones = ordenarJSONFecha(mediciones)

     //Creamos el eje X para asignar los valores del eje Y

     let ejeX = crearEjeX(mediciones)

    let filtrado = mediciones.filter((valor) => {
        if (valor.tipoMedida !== magintud){
            return false

        }else {
            return true
        }
    })

    console.log("objeto filtrado" + filtrado)


    return  filtrado
 }

/**
 *
 * @param idGrafica
 * @param idHuerto
 * @param opciones
 * @param label
 * @param magnitud
 */
 async function crearGrafica(idHuerto,idGrafica,opciones,label,magnitud) {
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
     let datos = await fetchMedidas(idHuerto)
    let dataset = crearDataset(datos,magnitud)

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
    let grafica = new Chart (ctx, {
        type: 'line',
        data: datosGrafica,
        options: opciones
    })
 }

async function crearTablas (idTabla,magnitud) {
     let datos = await fetchMedidas('1')
    let dataset = crearDataset(datos,magnitud)
    dataset.forEach((dataRow) => {
        let tabla = document.getElementById(idTabla)
        let tableRow = tabla.appendChild(document.createElement("tr"))
    })
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
     crearGrafica(idHuerto,"graficasalinidad",opciones,"Sal","Sal")
     crearGrafica(idHuerto,"graficatemperatura",opciones,"Temperatura","Temperatura")
     crearGrafica(idHuerto,"graficaph",opciones,"ph","PH")
     crearGrafica(idHuerto,"graficaluz",opciones,"Luz","Luz")
}

addEventListener("load", async () => {
    ponerHuertosTitulo()

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

    let objeto  = await getSesion()
    let idHuerto = parseInt(objeto.IdUsuario)
    console.log("ID usuario carga")
    console.log(idHuerto)



    crearGrafica(idHuerto,"graficahumedad",opciones,"humedad","Humedad")
    crearGrafica(idHuerto,"graficasalinidad",opciones,"Sal","Sal")
    crearGrafica(idHuerto,"graficatemperatura",opciones,"Temperatura","Temperatura")
    crearGrafica(idHuerto,"graficaph",opciones,"ph","PH")
    crearGrafica(idHuerto,"graficaluz",opciones,"Luz","Luz")


})
