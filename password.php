<?php
session_start();
require('fonction.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/change.css" rel="stylesheet">
        <link href="css/header&footer.css" rel="stylesheet">
        <link href="css/root&font.css" rel="stylesheet">
        <title>Profil</title>
    </head>

    <body>
        <header>
            <nav class="navMenu">
                <a href="index.php">Accueil</a>
                <a href="inscription.php">Inscription</a>
                <a href="connexion.php">Connexion</a>
                <a href="profil.php">Profil</a>
                <div class="dot"></div>
            </nav>
        </header>
        <main>
        <div class="login-page">
            <div class="form">
			<form method="POST" action="password.php">
				<input class="input" type="password" name="password" placeholder = 'Votre ancien Mot de passe'>
				<input class="input" type="password" name="newpassword" placeholder = 'Votre nouveau Mot de passe'>
				<input class="input" type="password" name="repeatnewpassword" placeholder = 'Répétez votre nouveau Mot de passe'><br/><br/>
				<input class="button1" type="submit" value="Changer de password" name = 'submit' placeholder="submit">
				<button class = 'button'> <a class = 'none' href="profil.php"> Annuler</a></button>
			</form>
            <?php ChangeMdp();?>
            </div>
        </main>
        <footer>
            
        </footer>
    </body>
</html>