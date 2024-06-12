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
        <div class="inscription-form" id="formInscription" role="form" aria-labelledby="formInscription">
            <fieldset>
                <legend>Formulaire d'inscription</legend>
                <form action="{{ route('inscription.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="user-name">Nom *</label>
                    <input type="text" id="user-name" name="name" value="{{ old('name') }}" placeholder="Votre nom" aria-required="true" required>
                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <label for="user-lastname">Prénom *</label>
                    <input type="text" id="user-lastname" name="lastname" value="{{ old('lastname') }}" placeholder="Votre prénom" aria-required="true" required>
                    @error('lastname')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <label for="age">Âge *</label>
                    <input type="text" id="age" name="age" value="{{ old('age') }}" placeholder="Âge" aria-required="true" required>
                    @error('age')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <label for="ville">Ville *</label>
                    <input type="text" id="ville" name="city" value="{{ old('city') }}" placeholder="Ville" aria-required="true" required>
                    @error('city')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Votre mail" aria-required="true" required>
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <label for="password">Votre mot de passe *</label>
                    <input type="password" id="password" name="password" placeholder="Votre mot de passe" aria-required="true" required>
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror
                
                    <label for="photo">Téléchargez votre photo :</label>
                    <input type="file" id="photo" name="photo" accept="image/*">
                    @error('photo')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <button class="button_account" type="submit" aria-label="Valider votre compte">Valider</button>
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
