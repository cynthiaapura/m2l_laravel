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
                <legend>Modifier le membre</legend>
                <form action="{{ isset($user) ? route('user.update', ['id' => $user->id]) : '' }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <label for="current-photo">Photo actuelle :</label><br>
                    @if(isset($user) && $user->photo)
                        <img src="{{ asset('storage/' . $user->photo) }}" alt="Photo actuelle de l'utilisateur" style="max-width: 200px;"><br>
                    @endif

                    <label for="user-name">Nom</label>
                    <input type="text" id="user-name" name="name" value="{{ isset($user) ? $user->name : old('name') }}" placeholder="Votre nom" aria-required="true">
                
                    <label for="user-lastname">Prénom</label>
                    <input type="text" id="user-lastname" name="lastname" value="{{ isset($user) ? $user->lastname : old('lastname') }}" placeholder="Votre prénom" aria-required="true">
                
                    <label for="age">Âge</label>
                    <input type="text" id="age" name="age" value="{{ isset($user) ? $user->age : old('age') }}" placeholder="Âge" aria-required="true">
                
                    <label for="ville">Ville</label>
                    <input type="text" id="ville" name="city" value="{{ isset($user) ? $user->city : old('city') }}" placeholder="Ville" aria-required="true">
                
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ isset($user) ? $user->email : old('email') }}" placeholder="Votre mail" aria-required="true">
                
                    <label for="password">Votre mot de passe *</label>
                    <input type="password" id="password" name="password" placeholder="Votre mot de passe" aria-required="true">
                
                    <label for="photo">Téléchargez votre photo :</label>
                    <input type="file" id="photo" name="photo" accept="image/*">

                    <button class="button_account" type="submit" aria-label="Valider les modifs">Valider les modifications</button>
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
