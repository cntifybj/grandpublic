document.addEventListener('DOMContentLoaded', () => {
    const images = window.advisoriesImagesUrl;
    const container = document.querySelector('.slide-container');
    let currentIndex = 0;

    if (images && container) {
        // Créer les slides initialement
        images.forEach((img, index) => {
            const slide = document.createElement('div');
            slide.className = 'slide';
            slide.style.backgroundImage = `url('${img}')`;
            slide.style.transform = `translateX(${100 * (index - currentIndex)}%)`;
            container.appendChild(slide);
        });

        const slides = document.querySelectorAll('.slide');

        // Fonction pour faire défiler les slides
        function nextSlide() {
            currentIndex = (currentIndex + 1) % images.length;
            slides.forEach((slide, index) => {
                slide.style.transform = `translateX(${100 * (index - currentIndex)}%)`;
            });
        }

        // Démarrer le défilement automatique
        setInterval(nextSlide, 5000);
    }


    const gridToggles = document.querySelectorAll('.grid-toggle');
    const videoItems = document.querySelectorAll('.video-item');

    gridToggles.forEach(toggle => {
        toggle.addEventListener('click', e => {
            e.preventDefault();

            gridToggles.forEach(btn => {
                const svg = btn.querySelector('svg');
                if (svg) {
                    svg.classList.remove('fill-[#ee1a3b]');
                    svg.classList.add('dark:fill-white');
                }
            });

            const svg = toggle.querySelector('svg');
            if (svg) {
                svg.classList.remove('dark:fill-white');
                svg.classList.add('fill-[#ee1a3b]');
            }

            const cols = toggle.getAttribute('data-cols');
            if (cols) {
                videoItems.forEach(item => {
                    item.classList.remove('lg:col-span-4', 'lg:col-span-3');
                    item.classList.add(cols === '3' ? 'lg:col-span-4' : 'lg:col-span-3');
                });
            }
        });
    });

    const paginationContainer = document.querySelector('nav[aria-label="Pagination"]');

    if (paginationContainer) {
        // Supprimer le texte descriptif
        const descriptiveText = paginationContainer.querySelector('p');
        if (descriptiveText) {
            descriptiveText.remove();
        }

        // Fonction pour mettre à jour les styles
        function styleActivePage() {
            const links = paginationContainer.querySelectorAll('span[aria-current="page"], a');

            links.forEach(link => {
                // Style de base pour tous les liens
                if (link.tagName === 'A') {
                    link.classList.add('px-4', 'py-2', 'text-sm', 'border', 'rounded-lg', 'hover:bg-[#ee1a3b]', 'hover:text-white', 'dark:text-white');
                }

                // Style pour la page active
                if (link.getAttribute('aria-current') === 'page') {
                    link.classList.add('bg-[#ee1a3b]', 'text-white', 'border-[#ee1a3b]', 'dark:text-white');
                }
            });
        }

        // Observer uniquement les changements pertinents
        const observer = new MutationObserver(styleActivePage);
        observer.observe(paginationContainer, {
            childList: true,
            subtree: true,
            attributeFilter: ['aria-current']
        });

        // Style initial
        styleActivePage();
    }


    // Sélectionne uniquement les éléments <a> dans le conteneur #category-bar
    const categoryBar = document.querySelector('#category-bar');
    const categoryLinks = categoryBar.querySelectorAll('li a');

    // Parcours chaque lien et écoute l'événement de clic
    categoryLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Empêche le comportement par défaut du lien

            // Supprime la classe 'active' de tous les liens dans la barre de catégories
            categoryLinks.forEach(link => link.classList.remove('active'));

            // Ajoute la classe 'active' au lien cliqué
            this.classList.add('active');

            const category = this.getAttribute('data-category');
            const url = new URL(window.location.href);
            url.searchParams.set('filter', category);
            window.location.href = url.toString();
        });
    });
});