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
            <a href="inscription.html" id="inscription" class="button">S'inscrire</a>
            <a href="#connection" id="connection" class="button">Connexion</a>
        </nav>
    </header>
    <main>
        <section class="form" id="formSection">

            <div class="connection-form" id="user_connection" role="form" aria-labelledby="user_connection">
                <fieldset>
                    <legend>
                        Connectez-vous à votre compte
                    </legend>
                    <form action="#" method="post">

                    <label for="email-co">Mail *</label>
                    <input type="email" id="email-co" name="email-co" 
                    placeholder="Votre mail" aria-required="true" >

                    <label for="password-co">Mot de passe *</label>
                    <input type="password" id="password-co" name="password-co" 
                    placeholder="Votre mot de passe" aria-required="true" >
                
                    <button class="button_account" type="submit" value="Envoyer" aria-label="Connexion à votre compte">
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