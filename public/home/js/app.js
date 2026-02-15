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

function updateNavbarHeight() {
    const height = navbar.offsetHeight;
    document.documentElement.style.setProperty("--navbar-height", height + "px");
}

updateNavbarHeight();
window.addEventListener("resize", updateNavbarHeight);
window.addEventListener("scroll", updateNavbarHeight);

function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

function initBackToTop() {
    const backToTopBtn = document.querySelector('.back-to-top');
    
    if (backToTopBtn) {
        backToTopBtn.style.opacity = '0';
        backToTopBtn.style.visibility = 'hidden';
        backToTopBtn.style.transform = 'translateY(20px)';
        
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopBtn.style.opacity = '1';
                backToTopBtn.style.visibility = 'visible';
                backToTopBtn.style.transform = 'translateY(0)';
                backToTopBtn.classList.add('visible');
            } else {
                backToTopBtn.style.opacity = '0';
                backToTopBtn.style.visibility = 'hidden';
                backToTopBtn.style.transform = 'translateY(20px)';
                backToTopBtn.classList.remove('visible');
            }
        });

        backToTopBtn.addEventListener('click', function(e) {
            e.preventDefault();
            scrollToTop();
        });
    }
}

// Mobile menu toggle
function initMobileMenu() {
    const hamburger = document.querySelector('.hamburger input');
    const navMenu = document.querySelector('.nav__menu');
    const navOverlay = document.querySelector('.nav__overlay');

    if (hamburger && navMenu && navOverlay) {
        hamburger.addEventListener('change', function() {
            if (this.checked) {
                navMenu.classList.add('active');
                navOverlay.classList.add('active');
                document.body.style.overflow = 'hidden';
            } else {
                navMenu.classList.remove('active');
                navOverlay.classList.remove('active');
                document.body.style.overflow = '';
            }
        });

        navOverlay.addEventListener('click', function() {
            hamburger.checked = false;
            navMenu.classList.remove('active');
            this.classList.remove('active');
            document.body.style.overflow = '';
        });

        navMenu.querySelectorAll('.nav__link').forEach(link => {
            link.addEventListener('click', function() {
                hamburger.checked = false;
                navMenu.classList.remove('active');
                navOverlay.classList.remove('active');
                document.body.style.overflow = '';
            });
        });
    }
}

function initNewsletter() {
    const newsletterForm = document.querySelector('.newsletter-form');
    
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('.newsletter-input').value;
            
            if (email) {
                this.innerHTML = `
                    <div class="success-message" style="
                        background: rgba(0, 255, 136, 0.1);
                        padding: 1rem;
                        border-radius: 10px;
                        text-align: center;
                        border: 1px solid rgba(0, 255, 136, 0.3);
                    ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#00ff88" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom: 0.5rem;">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                        <p style="color: #00ff88; margin: 0; font-weight: 600;">Successfully subscribed!</p>
                        <p style="color: rgba(255, 255, 255, 0.7); font-size: 0.9rem; margin: 0.5rem 0 0 0;">
                            You'll receive our newsletter soon.
                        </p>
                    </div>
                `;
            }
        });
    }
}

document.addEventListener('DOMContentLoaded', function() {
    initMobileMenu();
    initBackToTop();
    initNewsletter();
    
    document.querySelectorAll('.anime-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});

window.addEventListener('load', function() {
    initBackToTop();
});

window.Common = {
    debounce: debounce,
    scrollToTop: scrollToTop,
    initBackToTop: initBackToTop,
    initMobileMenu: initMobileMenu
};