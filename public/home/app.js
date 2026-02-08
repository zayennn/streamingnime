const hamburger = document.getElementById("hamburger-toggle");
const overlay = document.querySelector(".nav__overlay");
const navMenu = document.querySelector(".nav__menu");
const links = document.querySelectorAll(".nav__link[data-route]");
const line = document.querySelector(".line__tracking");

let defaultLink = null;

/* =========================
   LINE TRACKING BY ROUTE
========================= */
function setDefaultByRoute() {
    const currentPath = window.location.pathname;

    defaultLink = [...links].find(link =>
        link.dataset.route === currentPath
    ) || links[0]; // fallback Home

    moveLine(defaultLink);
}

function moveLine(el) {
    const rect = el.getBoundingClientRect();
    const parentRect = el.parentElement.getBoundingClientRect();

    line.style.width = `${rect.width}px`;
    line.style.left = `${rect.left - parentRect.left}px`;
}

/* hover effect */
links.forEach(link => {
    link.addEventListener("mouseenter", () => {
        moveLine(link);
    });

    link.addEventListener("mouseleave", () => {
        if (defaultLink) moveLine(defaultLink);
    });
});

setDefaultByRoute();

/* =========================
   HAMBURGER SEQUENCE CONTROL
========================= */
hamburger.addEventListener("change", () => {
    if (hamburger.checked) {
        overlay.classList.add("active");

        setTimeout(() => {
            navMenu.classList.add("active");
        }, 500); // nunggu overlay kelar
    } else {
        navMenu.classList.remove("active");

        setTimeout(() => {
            overlay.classList.remove("active");
        }, 400);
    }
});
