<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="grille d'image">
    <link rel="shortcut icon" href="{{ asset('favicon/') }}" type="image/x-icon">
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
        <a href="#">
            <img src="{{ asset('images/mascotte.png') }}" alt="Logo JO Paris" aria-hidden="true">
        </a>           
        <h1 class="m2l">
            M2L - Maison des Ligues de Lorraine
        </h1>
    
        <nav class="navbar">
            <a href="{{ route('home') }}" id="event_home" class="button">Tous les événements</a>
            <a href="{{ route('inscription.create') }}" id="inscription" class="button">S'inscrire</a>
            <a href="{{ route('login.form') }}" id="connection" class="button">Connexion</a>
        </nav>
    </header>
    <main class="validate_main">
        <h1 class="validate_h1">
            Merci vous êtes inscrit !
            <br>
            Votre formulaire a été soumis avec succès.
        </h1>
        
        <section class="photo_inscription">
            <div class="photo_info">
                @if($user->photo)
                    <img src="{{ Storage::url($user->photo) }}" alt="Photo de profil">
                @endif
            </div>

            <div class="info">
                <ul>
                    <li class="list_info">Nom : {{ $user->name }}</li>
                    <li class="list_info">Prénom : {{ $user->lastname }}</li>
                    <li class="list_info">Âge : {{ $user->age }}</li>
                    <li class="list_info">Ville : {{ $user->city }}</li>
                    <li class="list_info">Mail : {{ $user->email }}</li>
                </ul>
            </div>
        </section>
        
        <a href="{{ auth()->check() ? route('page_user.index') : route('home') }}" class="button_account">
            {{ auth()->check() ? 'Voir vos événements' : 'Retour à la page d\'accueil' }}      
        </a>
    </main>
    <footer>
        <p> &copy; - M2L - <time datetime="2023-01-01">2023</time> </p>
    </footer>
</body>
</html>