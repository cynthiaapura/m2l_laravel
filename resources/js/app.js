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

document.addEventListener("DOMContentLoaded", () => {
    // Récupérer les éléments avec la classe "event-image"
    var images = document.querySelectorAll('.event-image');

    // Récupérer la modale
    var modal = document.getElementById('myModal');

    // Récupérer l'élément pour fermer la modale
    var span = document.getElementsByClassName("close")[0];

    // Ajouter un gestionnaire d'événements à chaque image
    images.forEach(function (image) {
        image.addEventListener('click', function () {
            // Afficher la modale
            modal.style.display = "block";
            // Mettre à jour l'image de la modale avec l'image cliquée
            document.getElementById('modalImage').src = image.src;
        });
    });

    // Fermer la modale quand on clique sur le bouton de fermeture
    span.onclick = function () {
        modal.style.display = "none";
    };

    // Fermer la modale quand on clique en dehors de celle-ci
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
});
