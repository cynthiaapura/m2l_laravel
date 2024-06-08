<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="grille d'image">
    <link rel="shortcut icon" href="./favicon/" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <link rel="stylesheet" href="./css/main.css">
    <title>M2L</title>
</head>
<body>
    <header class="headband">
        <a href="#">
            <img src="./asset/mascotte.png" alt="Logo JO Paris" aria-hidden="true">
        </a>           
        <h1 class="m2l">
            M2L - Maison des Ligues de Lorraine
        </h1>
    
        <nav class="navbar">
            <a href="#event_view" id="event_home" class="button">Tous les événements</a>
            <a href="./inscription.html" id="inscription" class="button">S'inscrire</a>
            <a href="./connection.html" id="connection" class="button">Connexion</a>
        </nav>
    </header>

    <main>
            <div id="bg-texte">
                <p>
                    Maison des Ligues de Lorraine
                </p>
            </div>
            <div id="bg-img"></div>

        <section class="event" id="event_view">
            <h2>
                Prêt(e) à la compétition ? Cliquez sur le bouton pour commencer
            </h2>
            <p>
                Tous les mois profitez de toutes les nouveautés et opportunités. À partir du mois prochain on vous propose toutes les séances de sport sur vos supports préférés.
            </p>
        </section>
        <div class="gallery-primary" role="group" aria-labelledby="event">
            <ul id="event">
                <li><img src="./images/basket.jpg" alt="basketball" class="event-image">
                    Basketball
                </li>
                <li><img src="./images/foot.jpg" alt="football" class="event-image">
                    Football
                </li>
                <li><img src="./images/patinage.jpg" alt="patinage artistique" class="event-image">
                    Patinage artistique
                </li>
                <li><img src="./images/judo.jpg" alt="judo" class="event-image">
                    Judo
                </li>
                <li><img src="./images/golf.jpg" alt="golf" class="event-image">
                    Golf
                </li>
                <li><img src="./images/baseball.jpg" alt="baseball" class="event-image">
                    Baseball
                </li>
                <li><img src="./images/hockey.jpg" alt="hockey" class="event-image">
                    Hockey sur glace
                </li>
                <li><img src="./images/tennis.jpg" alt="tennis" class="event-image">
                    Tennis
                </li>
                <li><img src="./images/volley.jpg" alt="volleyball" class="event-image">
                    Volleyball
                </li>
                <li><img src="./images/rugby.jpg" alt="rugby" class="event-image">
                    Rugby
                </li>
                
            </ul>
        </div>

        <div id="myModal" class="modal">
            <div class="modal-content">
                <figure id="cover">
                    <span class="close">&times;</span>
                    <img id="modalImage" src="" alt="">
                    <figcaption>
                        <h2>
                            Titre de l'evenement
                        </h2>
                        <p>
                            Contenu de l'événement
                        </p>
                    </figcaption>
                </figure>
            </div>
        </div>

        <a href="inscription.html" class="button_account" >
            Cliquez pour vous inscrire
        </a>
    </main>
    <footer>
       <p> &copy; - M2L - <time datetime="2023-01-01">2023</time> </p>
    </footer>
    <script src="./js/app.js"></script>
</body>
</html>