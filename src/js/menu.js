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


//esto es para cambiar el color de los botones al hacer hover con el ratón
window.addEventListener('DOMContentLoaded', (event) => {
    const menuItems = document.querySelectorAll('#menuDesktop li');

    menuItems.forEach((item) => {
        item.addEventListener('mouseover', () => {
            item.querySelector('a').style.color = '#65946f'; /* Cambia el color deseado */
        });

        item.addEventListener('mouseout', () => {
            item.querySelector('a').style.color = ''; /* Restablece el color predeterminado */
        });
    });
});