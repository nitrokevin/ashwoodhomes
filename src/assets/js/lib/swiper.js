// Import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

// Import styles bundle
import 'swiper/css/bundle';

window.addEventListener('load', function () {
    // Check if there are any elements with the 'swiper-container' class
    const swiperContainers = document.querySelectorAll('.swiper.slide-carousel');
    
    if (swiperContainers.length) {
        // Loop through each element and initialize a Swiper instance
        swiperContainers.forEach(function (container) {
            const swiper = new Swiper(container, {
                direction: 'horizontal',
                parallax: true,
                loop: true,
                  slidesPerView: 1,
                    spaceBetween: 0,
                observer: true, // Enable observation
                observeParents: true, // Also observe parent elements
                pagination: {
                    el: container.querySelector('.swiper-pagination'), // Use container-specific selectors
                    clickable: true,
                },
                navigation: {
                    nextEl: container.querySelector('.swiper-button-next'),
                    prevEl: container.querySelector('.swiper-button-prev'),
                },
             
                speed: 1600,
                  on: {
                    setTranslate(swiper, translate) {
                      swiper.wrapperEl.style.transitionTimingFunction = 'cubic-bezier(0.5, 0, 0.3, 1)';
                    },
                  },
            });

            // Optional: Trigger an update to ensure correct sizing on load
            swiper.update();
        });
    }
});
