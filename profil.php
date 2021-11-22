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
            <div class="Container">
                <div class="login-page">
                    <div class="form">
                        <form action="" method="post" class="login-form">
                            <input class = "button" type="submit" name = "deconnexion" value="Déconnexion" >
                            <?php  Deconnect();
                            DecoOrCo();
                            if ($_SESSION['login'] == 'admin'){
                                echo '<button class = "buttonAdmin"><a class = "text"href="admin.php">Admin</a></button>
                                <style>
                                .buttonAdmin{
                                    letter-spacing: 1px;
                                    font-family:Energy;
                                    text-transform: uppercase;
                                    outline: 0;
                                    background: var(--LightBlue-);
                                    width: 40%;
                                    border: 0;
                                    padding: 5%;
                                    color: var(--Black-);
                                    font-size: 1.2em;
                                    cursor: pointer;
                                    margin-bottom :5%;
                                }
                                .text{
                                    font-family : Energy;
                                    color : var(--White-);
                                    text-decoration : none;
                                }
                                .buttonAdmin:hover{
                                    font-size: 1.2em;
                                    background-color: var(--Blue-);
                                }
                                </style>';
                            }
                            ?>
                            <button class = "change"><a class = "none"href="prenom.php">Changer le Prenom</a></button>
                            <button class = "change"><a class = "none"href="nom.php">Changer le Nom</a></button>
                            <button class = "change"><a class = "none"href="password.php">Changer Le Mot de passe</a></button>
                        </form>
                    </div>
                </div>
                <div class="login-page">
                    <div class="form">
                        <h1><u>Mes Informations</u></h1>
                        <?php Info();?>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <div class="RightFooter">
                Copyright © 2021 François Niang - All Rights Reserved
            </div>
            <div class="LeftFooter">
                Suivre L'actualité de Takahiro
                <a href="https://www.instagram.com/takahiro__arts/"><img class = 'LogoInsta' src="https://www.pngall.com/wp-content/uploads/5/Instagram-Logo-PNG-Image-File.png" alt="logo insta"></a> 
                <a href=""> <img class = 'LogoSnap' src="http://assets.stickpng.com/images/5a4e30612da5ad73df7efe71.png" alt="logo snap"></a>
                <a href="https://www.jc-case.com/"><img class = 'LogoJC' src="https://www.jc-case.com/Files/130058/Img/10/logo-JC.png" alt="logo jc case"></a>
            </div>
        </footer>
    </body>
</html>