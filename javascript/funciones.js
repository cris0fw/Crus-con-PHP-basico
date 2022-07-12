const documento = document

documento.addEventListener("DOMContentLoaded", () => {
    const menu = documento.querySelector(".btn-menu")

    menu.addEventListener("click", e => {
        const elementos = documento.querySelector("ul")

        elementos.classList.toggle("show")
    })
})