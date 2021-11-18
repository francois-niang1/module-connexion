<?php 
session_start(); 
if(isset($_SESSION['login'])){
    header('Location: profil.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/inscription.css" rel="stylesheet">
        <link href="css/header&footer.css" rel="stylesheet">
        <title>Inscription</title>
    </head>
    <body>
        <header>

        </header>
        <main>
        <div class="login-page">
            <div class="form">
                <form action="" method="post" class="login-form">
                    <input class='input' type="text" id="login" name="login" placeholder="Login ou email"/>
                    <input class='input' type="text" id="nom" name="nom" placeholder="Nom"/>
                    <input class='input' type="text" id="prenom" name="prenom" placeholder="Prénom"/>
                    <input class='input' type="password" id="password" name="password" placeholder="Mot de passe"/>
                    <input class='input' type="password" id="ConfirmMdp" name="ConfirmMdp" placeholder=" Confirmer le Mot de passe"/>
                    <input class = "button" type="submit" value="S'incrire">
                    <p class="message">Vous avez déjà un compte ? <a href="connexion.php">Connectez vous !</a></p>
                </form>
                <?php 
                require ('fonction.php');
                New_user();

                if (isset($_POST["Mdp"]) != isset($_POST["ConfirmMdp"])){
                   echo '<p>"Mot de passe non identique. Réessayez !"</p> <style>p{color :var(--Red-); font-size:1.4em;}</style>';
                }
                // if (!empty($_POST['login']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['password'])){
                //     echo '';
                // }
                // else {
                //     echo 'Remplissez tous les champs';
                // }
                Check_Log();
                ?>
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

