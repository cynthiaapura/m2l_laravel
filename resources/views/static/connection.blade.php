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
            <a href="{{ url('/#') }}" id="connection" class="button">Connexion</a>
        </nav>
    </header>
    <main>
        <section class="form" id="formSection">

            <div class="connection-form" id="user_connection" role="form" aria-labelledby="user_connection">
                <fieldset>
                    <legend>
                        Connectez-vous à votre compte
                    </legend>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('loginOk') }}" method="post">
                        @csrf
                        <label for="email-co">Mail *</label>
                        <input type="email" id="email-co" name="email" 
                        placeholder="Votre mail" aria-required="true" >

                        <label for="password-co">Mot de passe *</label>
                        <input type="password" id="password-co" name="password" 
                        placeholder="Votre mot de passe" aria-required="true" >
                    
                        <button class="button_account" type="submit" aria-label="Connexion à votre compte">
                            Connexion à votre compte
                        </button>
                    </form>
                </fieldset>
            </div>

        </section>
    </main>
    <footer>
        &copy; - M2L - <time datetime="2023-01-01">2023</time>
    </footer>
</body>
</html>
