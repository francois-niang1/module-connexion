<?php 
session_start();
require('fonction.php'); 

if(!isset($_SESSION['login'])){
    header('Location: connexion.php');
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/profil.css" rel="stylesheet">
        <link href="css/header&footer.css" rel="stylesheet">
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
                <form action="" method="post" class="login-form">
                    <input class = "button" type="submit" name = "deconnexion" value="Déconnexion" >           
                </form>
                <?php  Deconnect(); 
                DecoOrCo();?>
            </div>
        </main>
        <footer>
            
        </footer>
    </body>
</html>