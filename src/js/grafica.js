
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
 * @returns {{medicion: *[], ejeX: *[]}}
 */

function crearDataset(mediciones) {
     //ordenamos las mediciones por fecha
     mediciones = ordenarJSONFecha(mediciones)

     //Creamos el eje X para asignar los valores del eje Y

     let ejeX = crearEjeX(mediciones)

     //Array para almacenar los valores de las ordenadas
     let medicion;

     // Esta map devuelve por cada valor de la fecha su correspondiente
     // en el objeto, buscando esta fecha en las mediciones,
     // la encuentra, devuelve su index, y añadimos la Medicion
     // de ese index quedadno relacionado con la fecha
    medicion = ejeX.map((fecha) => {
         return mediciones[mediciones.findIndex((element => {
             return element.fecha === fecha;

         }))].medida
     })

    console.log({ejeX,medicion})

    return  {ejeX,medicion}
 }

/**
 *
 * @param idGrafica
 * @param datos
 * @param opciones
 */
 function crearGrafica(idGrafica, datos,opciones,label) {
    let dataset = crearDataset(datos)
     let datosGrafica = {
        labels: dataset.ejeX,
         datasets: [
             {
                 label: label,
                 data: dataset.medicion
             }
         ]
     }
     let ctx = document.getElementById(idGrafica)
    let grafica = new Chart (ctx, {
        type: 'line',
        data: datosGrafica,
        options: opciones
    })
 }

