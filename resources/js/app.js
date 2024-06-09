import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

document.addEventListener("DOMContentLoaded", e => {
    let dates_footer = document.querySelector("footer p time");

    if (dates_footer) {
        const version = new Date().getFullYear();
        dates_footer.innerText = version;
        dates_footer.setAttribute('datetime', version);
    } else {
        console.error("L'élément <time> n'a pas été trouvé dans le footer.");
    }

    const projectLinks = document.querySelectorAll('.project-link');

    projectLinks.forEach(link => {
        link.addEventListener('mouseenter', () => {
            link.querySelector('img').style.filter = 'brightness(0) invert(1)';
            link.querySelector('.overlay').style.opacity = '1';
        });

        link.addEventListener('mouseleave', () => {
            link.querySelector('img').style.filter = 'none';
            link.querySelector('.overlay').style.opacity = '0';
        });
    });
    
});
