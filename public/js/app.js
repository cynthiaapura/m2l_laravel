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