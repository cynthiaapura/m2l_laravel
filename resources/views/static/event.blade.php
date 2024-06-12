<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="grille d'image">
    <link rel="shortcut icon" href="{{ asset('favicon/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>M2L</title>
</head>
<body>
    <header class="headband">
        <a href="{{ url('/') }}">
            <img src="{{ asset('photo/mascotte.png') }}" alt="Logo JO Paris" aria-hidden="true">
        </a>           
        <h1 class="m2l">
            M2L - Maison des Ligues de Lorraine
        </h1>
    
        <nav class="navbar">
            <a href="{{ url('/#event_view') }}" id="event" class="button">Tous les événements</a>
            <a href="{{ url('/inscription') }}" id="inscription" class="button">S'inscrire</a>
            <a href="{{ url('/connection') }}" id="connection" class="button">Connexion</a>
        </nav>
    </header>
    <main>
        <h1 class="h1_title">
            Ajouter un événement
        </h1>
        <div class="desc">
            <fieldset>
                <legend>
                    Votre événement
                </legend>
                <form action="{{ route('events.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="loading_img">
                        <label for="photo">
                            Téléchargez votre photo :
                            <input type="file" id="photo" name="photo" accept="image/*">
                        </label>
                        <img id="photo-preview" src="#" alt="Photo de profil" style="display: none; max-width: 300px; margin: 0 auto;">
                    </div>

                    <label for="event-name">Nom de l'événement *</label>
                    <input type="text" id="event-name" name="name" placeholder="Événement" aria-required="true" required>
    
                    <label for="event-desc">Description *</label>
                    <input type="text" id="event-desc" name="desc" placeholder="Description" aria-required="true" required>

                    @if(session('success'))
                        <p style="color: green;">{{ session('success') }}</p>
                        <button class="button_account" type="button" onclick="window.location.href='{{ url('/events') }}'" aria-label="Voir tous les événements">
                            Voir tous les événements
                        </button>
                    @endif

                    <div class="add-event-button">
                        <a href="{{ route('page_user.index') }}" class="button_account">Valider</a>
                    </div>
                </form>
            </fieldset>
        </div>
    </main>
    <footer>
        <p> &copy; - M2L - <time datetime="2023-01-01">2023</time> </p>
    </footer>
    <script src="{{ asset ('/js/previewPhoto.js') }}"></script>

</body>
</html>