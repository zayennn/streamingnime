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

// ==================== SEARCH FUNCTIONALITY ====================
const searchInput = document.getElementById('searchInput');
const searchResults = document.getElementById('searchResults');
const searchResultsContent = document.getElementById('searchResultsContent');
const clearSearch = document.getElementById('clearSearch');
const closeResults = document.getElementById('closeResults');
const mobileSearchToggle = document.getElementById('mobileSearchToggle');
const mobileSearchOverlay = document.getElementById('mobileSearchOverlay');
const closeMobileSearch = document.getElementById('closeMobileSearch');
const mobileSearchInput = document.getElementById('mobileSearchInput');
const mobileSearchResults = document.getElementById('mobileSearchResults');

let searchTimeout;
let currentSearchTerm = '';

// Fetch search results from server
async function fetchSearchResults(query) {
    if (!query.trim() || query.length < 2) {
        return [];
    }

    try {
        const response = await fetch(`/api/search-anime?q=${encodeURIComponent(query)}`);
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Search error:', error);
        return [];
    }
}

// Render desktop search results
function renderSearchResults(results, container) {
    if (!container) return;

    if (!results || results.length === 0) {
        container.innerHTML = `
            <div class="search-no-results">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <p>No results found for "${currentSearchTerm}"</p>
            </div>
        `;
        return;
    }

    let html = '';
    results.slice(0, 5).forEach(anime => {
        html += `
            <a href="/anime/${anime.id}" class="search-result-item">
                <div class="result-image">
                    <img src="${anime.image}" alt="${anime.title}" loading="lazy">
                </div>
                <div class="result-info">
                    <h4 class="result-title">${anime.title}</h4>
                    <div class="result-meta">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            ${anime.year}
                        </span>
                        <span>${anime.type}</span>
                        <span class="result-rating">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="#ffd700" stroke="#ffd700" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                            </svg>
                            ${anime.rating}
                        </span>
                    </div>
                </div>
            </a>
        `;
    });

    container.innerHTML = html;
}

// Render mobile search results
function renderMobileSearchResults(results) {
    if (!mobileSearchResults) return;

    if (!results || results.length === 0) {
        mobileSearchResults.innerHTML = `
            <div class="search-no-results">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <p>No results found for "${currentSearchTerm}"</p>
            </div>
        `;
        return;
    }

    let html = '';
    results.forEach(anime => {
        html += `
            <a href="/anime/${anime.id}" class="mobile-result-item">
                <div class="mobile-result-image">
                    <img src="${anime.image}" alt="${anime.title}" loading="lazy">
                </div>
                <div class="mobile-result-info">
                    <h4 class="mobile-result-title">${anime.title}</h4>
                    <div class="mobile-result-meta">
                        <span>${anime.year}</span>
                        <span>${anime.type}</span>
                        <span class="mobile-result-rating">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="#ffd700" stroke="#ffd700" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                            </svg>
                            ${anime.rating}
                        </span>
                    </div>
                </div>
            </a>
        `;
    });

    mobileSearchResults.innerHTML = html;
}

// Handle desktop search
if (searchInput) {
    searchInput.addEventListener('input', function(e) {
        const query = e.target.value.trim();
        currentSearchTerm = query;

        // Show/hide clear button
        if (query.length > 0) {
            clearSearch.style.display = 'flex';
        } else {
            clearSearch.style.display = 'none';
            searchResults.classList.remove('active');
            return;
        }

        // Only search if query is at least 2 characters
        if (query.length < 2) {
            searchResultsContent.innerHTML = `
                <div class="search-no-results">
                    <p>Type at least 2 characters to search</p>
                </div>
            `;
            searchResults.classList.add('active');
            return;
        }

        // Show loading state
        searchResultsContent.innerHTML = `
            <div class="search-loading">
                <div class="spinner-small"></div>
                <p>Searching...</p>
            </div>
        `;
        searchResults.classList.add('active');

        // Debounce search
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(async () => {
            const results = await fetchSearchResults(query);
            renderSearchResults(results, searchResultsContent);
        }, 300);
    });

    // Handle clear button
    clearSearch.addEventListener('click', function() {
        searchInput.value = '';
        searchInput.focus();
        clearSearch.style.display = 'none';
        searchResults.classList.remove('active');
    });

    // Handle close results
    if (closeResults) {
        closeResults.addEventListener('click', function() {
            searchResults.classList.remove('active');
        });
    }

    // Close results when clicking outside
    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
            searchResults.classList.remove('active');
        }
    });

    // Handle form submit
    const searchForm = document.getElementById('searchForm');
    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const query = searchInput.value.trim();
            if (query) {
                window.location.href = `/anime-list?search=${encodeURIComponent(query)}`;
            }
        });
    }
}

// Handle mobile search toggle
if (mobileSearchToggle) {
    mobileSearchToggle.addEventListener('click', function() {
        mobileSearchOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
        setTimeout(() => {
            if (mobileSearchInput) {
                mobileSearchInput.focus();
            }
        }, 300);
    });
}

// Handle close mobile search
if (closeMobileSearch) {
    closeMobileSearch.addEventListener('click', function() {
        mobileSearchOverlay.classList.remove('active');
        document.body.style.overflow = '';
        if (mobileSearchInput) {
            mobileSearchInput.value = '';
        }
        if (mobileSearchResults) {
            mobileSearchResults.innerHTML = '';
        }
    });
}

// Handle mobile search input
if (mobileSearchInput) {
    mobileSearchInput.addEventListener('input', function(e) {
        const query = e.target.value.trim();
        currentSearchTerm = query;

        if (!query) {
            mobileSearchResults.innerHTML = '';
            return;
        }

        if (query.length < 2) {
            mobileSearchResults.innerHTML = `
                <div class="search-no-results">
                    <p>Type at least 2 characters to search</p>
                </div>
            `;
            return;
        }

        // Show loading
        mobileSearchResults.innerHTML = `
            <div class="search-loading">
                <div class="spinner-small"></div>
                <p>Searching...</p>
            </div>
        `;

        // Debounce search
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(async () => {
            const results = await fetchSearchResults(query);
            renderMobileSearchResults(results);
        }, 300);
    });

    // Handle enter key
    mobileSearchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            const query = this.value.trim();
            if (query) {
                window.location.href = `/anime-list?search=${encodeURIComponent(query)}`;
            }
        }
    });
}

// Close mobile search with escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && mobileSearchOverlay && mobileSearchOverlay.classList.contains('active')) {
        mobileSearchOverlay.classList.remove('active');
        document.body.style.overflow = '';
        if (mobileSearchInput) {
            mobileSearchInput.value = '';
        }
        if (mobileSearchResults) {
            mobileSearchResults.innerHTML = '';
        }
    }
});

// ==================== END SEARCH FUNCTIONALITY ====================

document.addEventListener('DOMContentLoaded', function() {
    initMobileMenu();
    initBackToTop();
    initNewsletter();
    
    // Check for search parameter in URL for anime-list page
    const urlParams = new URLSearchParams(window.location.search);
    const searchParam = urlParams.get('search');
    
    if (searchParam && window.location.pathname.includes('/anime-list')) {
        const animeSearchInput = document.getElementById('animeSearch');
        if (animeSearchInput) {
            animeSearchInput.value = searchParam;
            // Trigger search if AnimeList exists
            if (window.AnimeList) {
                window.AnimeList.setSearchFromUrl(searchParam);
            }
        }
    }
    
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