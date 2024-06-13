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
            Les événements
        </h1>

        <section id="tableau" class="tableau-events">
            <table class="event-table">
                <thead>
                    <tr>
                        <th>N° de l'événement</th>
                        <th>Titre de l'événement</th>
                        <th>Description de l'événement</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->desc }}</td>
                        <td>
                            @if($event->photo)
                                <img src="{{ Storage::url($event->photo) }}" alt="Image de l'événement" style="width: 100px; height: auto;">
                            @else
                                Aucune image disponible
                            @endif
                        </td>
                        <td><input type="radio" name="event_id" value="{{ $event->id }}"></td> 
                    </tr>
                    @endforeach
                </tbody>
            </table>
                <div class="add-event-button">
                    <button type="submit" name="action" value="edit" class="button_ulist">Modifier</button>
                    <button type="submit" name="action" value="delete" class="button_ulist">Supprimer</button>
                </div>
            </form>
        </section>
    </main>
    <footer>
       <p> &copy; - M2L - <time datetime="2023-01-01">2023</time> </p>
    </footer>
</body>
</html>
