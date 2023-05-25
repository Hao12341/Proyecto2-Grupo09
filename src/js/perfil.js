
// Coding by CodingLab
const image = document.getElementById("img-perfil");
const input = document.querySelector("input");
input.addEventListener("change", () => {
    image.src = URL.createObjectURL(input.files[0])
});