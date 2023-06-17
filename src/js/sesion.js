



 async function  getSesion () {
    let promesa = await fetch("../api/sesion/index.php")
     return await promesa.json()
 }