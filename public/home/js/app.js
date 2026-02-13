const navbar = document.querySelector(".navbar__container");
const hamburger = document.getElementById("hamburger-toggle");
const overlay = document.querySelector(".nav__overlay");
const navMenu = document.querySelector(".nav__menu");
const links = document.querySelectorAll(".nav__link[data-route]");
const line = document.querySelector(".line__tracking");

window.addEventListener('scroll', () => {
    if (window.scrollY > 200) {
        navbar.classList.add("scrolled");
    } else {
        navbar.classList.remove("scrolled");
    }
})

let defaultLink = null;

function setDefaultByRoute() {
    const currentPath = window.location.pathname
        .replace(/\/+$/, "")
        .toLowerCase();

    defaultLink = null;

    links.forEach(link => {
        const route = (link.dataset.route || "")
            .replace(window.location.origin, "")
            .replace(/\/+$/, "")
            .toLowerCase();

        console.log("COMPARE:", currentPath, "vs", route);

        if (route && currentPath.startsWith(route)) {
            defaultLink = link;
        }
    });

    if (!defaultLink) defaultLink = links[0];

    moveLine(defaultLink);
}

function moveLine(el) {
    const rect = el.getBoundingClientRect();
    const parentRect = el.parentElement.getBoundingClientRect();

    line.style.width = `${rect.width}px`;
    line.style.left = `${rect.left - parentRect.left}px`;
}

links.forEach(link => {
    link.addEventListener("mouseenter", () => {
        moveLine(link);
    });

    link.addEventListener("mouseleave", () => {
        if (defaultLink) moveLine(defaultLink);
    });
});

setDefaultByRoute();

hamburger.addEventListener("change", () => {
    if (hamburger.checked) {
        overlay.classList.add("active");

        setTimeout(() => {
            navMenu.classList.add("active");
        }, 500);
    } else {
        navMenu.classList.remove("active");

        setTimeout(() => {
            overlay.classList.remove("active");
        }, 400);
    }
});
