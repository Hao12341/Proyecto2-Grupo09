const menu = document.getElementById("menu");

document.querySelector(".hamburguesa").addEventListener(
    "click", () => {
        menu.classList.toggle("activo")
    }
)
document.querySelectorAll("#menu ul a").forEach(
    (enlace) => {
        enlace.addEventListener("click", () =>{
            menu.classList.remove("activo")
        })
    }
)