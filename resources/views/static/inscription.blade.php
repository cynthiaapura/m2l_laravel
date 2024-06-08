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
        <a href="./index.html">
            <img src="./asset/mascotte.png" alt="Logo JO Paris" aria-hidden="true">
        </a>           
        <h1 class="m2l">
            M2L - Maison des Ligues de Lorraine
        </h1>
    
        <nav class="navbar">
            <a href="index.html#event_view" id="event" class="button">Tous les événements</a>
            <a href="#inscription" id="inscription" class="button">S'inscrire</a>
            <a href="./connection.html" id="connection" class="button">Connexion</a>
        </nav>
    </header>

    <main>
        <div class="inscription-form" id="formInscription" role="form" aria-labelledby="formInscription">
            <fieldset>
                <legend>
                    Formulaire d'inscription
                </legend>
                <form action="#" method="post">

                <label for="user-name">Nom *</label>
                <input type="text" id="user-name" name="Nom"
                placeholder="Votre nom" aria-required="true">

                <label for="user-lastname">Prénom *</label>
                <input type="text" id="user-lastname" name="Prénom" 
                placeholder="Votre prenom" aria-required="true">

                <label for="age">Age *</label>
                <input type="text" id="age" name="Age" 
                placeholder="Age" aria-required="true">

                <label for="ville">Ville *</label>
                <input type="text" id="ville" name="ville" 
                placeholder="Ville" aria-required="true">

                <label for="email">Email *</label>
                <input type="email" id="email" name="votre email" 
                placeholder="Votre mail" aria-required="true">

                <label for="password">Votre mot de passe *</label>
                <input type="password" id="password" name="votre mot de passe" 
                placeholder="Votre mot de passe" aria-required="true">
            
                <label for="photo">
                    Téléchargez votre photo :
                <input type="file" id="photo" name="photo" accept="image/*">
                </label>
                
                <button class="button_account" type="submit" value="Envoyer" aria-label="Valider votre compte">
                    Valider
                </button>

                </form>
            
            </fieldset>
        </div>
    </main>
    <footer>
        M2L - 2024
    </footer>
</body>
</html>