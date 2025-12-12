document.querySelectorAll(".btn, .btn-edit, .btn-del").forEach(btn => {
    btn.addEventListener("mouseover", () => {
        btn.style.transform = "scale(1.05)";
        btn.style.transition = "0.2s";
    });

    btn.addEventListener("mouseout", () => {
        btn.style.transform = "scale(1)";
        btn.style.transition = "0.2s";
    });
});


document.querySelectorAll(".btn-del").forEach(btn => {
    btn.addEventListener("click", (e) => {
        if (!confirm("¿Seguro que deseas eliminar esta película?")) {
            e.preventDefault();
        }
    });
});


const inputBuscar = document.querySelector(".buscador input");

if (inputBuscar) {
    inputBuscar.addEventListener("input", () => {
        inputBuscar.style.background = "#d4f1ff"; // azul clarito
        inputBuscar.style.transition = "0.2s";

        setTimeout(() => {
            inputBuscar.style.background = "white";
        }, 200);
    });
}


document.addEventListener("DOMContentLoaded", () => {
    const cards = document.querySelectorAll(".card");

    cards.forEach((card, index) => {
        card.style.opacity = 0;
        card.style.transform = "translateY(10px)";
        card.style.transition = "0.4s";

        setTimeout(() => {
            card.style.opacity = 1;
            card.style.transform = "translateY(0px)";
        }, 100 * index);
    });
});
