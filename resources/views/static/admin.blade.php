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
            <a href="{{ url('/#connection') }}" id="connection" class="button">Connexion</a>
        </nav>
    </header>
    <main>
        <h1 class="h1_title">
            Les employés et les événements
        </h1>
        <section id="tableau" class="tableau-events">
                <table class="event-table">
                    <caption>Employés</caption>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Age</th>
                            <th>Ville</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($latestUsers as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->lastname }}</td>
                            <td>{{ $user->age }}</td>
                            <td>{{ $user->city }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <button class="button_ulist">
                    <a href="{{ route('user_list.index') }}">Gérer les employés</a>
                </button>        
        </section>
        <section id="tableau" class="tableau-events">
            <table class="event-table">
                <caption>Évenements</caption>
                <thead>
                    <tr>
                        <th>N° de l'événement</th>
                        <th>Titre de l'événement</th>
                        <th>Description de l'événement</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($latestEvents as $event)
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->desc }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button class="button_ulist">
                <a href="{{ route('page_user.index') }}">Gérer les événements</a>
            </button>        
        </section>
    </main>
    <footer>
        &copy; - M2L - <time datetime="2023-01-01">2023</time>
    </footer>
</body>
</html>
