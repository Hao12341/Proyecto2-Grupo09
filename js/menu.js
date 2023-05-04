/*Variable constante que almacena el id "menu"*/
const menu = document.getElementById("menu");
/*Instrucción de interacción del menu hamburguesa, si clicas en las barras y no tiene asignada la propiedad "activo", se la asigna*/
document.querySelector(".hamburguesa").addEventListener(
    "click", () => {
        menu.classList.toggle("activo")
    }
)
/*FIN DE Instrucción de interacción del menu hamburguesa, si clicas en las barras y no tiene asignada la propiedad "activo", se la asigna*/

/*Instrucción de interacción del menu hamburguesa, si clicas en las barras y tiene asignada la propiedad "activo", se la retira*/
document.querySelectorAll("#menu ul a").forEach(
    (enlace) => {
        enlace.addEventListener("click", () =>{
            menu.classList.remove("activo")
        })
    }
)
/*FIN DE Instrucción de interacción del menu hamburguesa, si clicas en las barras y tiene asignada la propiedad "activo", se la retira*/