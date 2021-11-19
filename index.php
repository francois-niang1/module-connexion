<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/index.css" rel="stylesheet">
        <link href="css/header&footer.css" rel="stylesheet">
        <link href="css/root&font.css" rel="stylesheet">
        <title>Accueil</title>
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
            <div class = 'Container'>
                <div class="Part1">
                    <div class="Left">
                        <p class='Txt1'>"Welcome In Takahiro World's" <br> <?php if(isset($_SESSION['login'])){echo $_SESSION['login'];}?> Si tu es amateur de manga
                            et d'art ce monde est fait pour toi !!! </p>
                    </div>
                    <div class="Right">
                        <img class = 'Img1' src="image/Moi.PNG" alt="Moi" width = '27.6%' heigth = '27.6%' >
                    </div>
                </div>
                <div class="Part2">
                    <div class="Left">
                        <p class='Txt2'>Envie d'un poster ? <br> Personnaliser ?<br>
                        Une Coque ?<br> Un Cadre ?<br> Ou même une paire de chaussure ? <br>
                        Et bien bonne nouvelle !! Ne cherche plus tu es au bon endroit :) </p>
                    </div>
                    <div class="Right2">
                        <img class = 'Img2' src="image/DBZ.PNG" alt="Moi" width = '22%' >
                        <img class = 'Img2' src="image/DemonSlayer" alt="Moi" width = '22%'  >
                        <img class = 'Img2' src="image/Nanatsu.PNG" alt="Moi" width = '23%'  >
                    </div>
                </div>
                <div class='Part1'>
                    <?php
                        if(!isset($_SESSION['login'])){
                            echo"
                            <div class='Left'>
                                <p class='Txt3' > Connecte toi pour profiter de reductions et points fidélités <br>
                                Tu n'as pas de compte ? c'est pas grave inscris toi juste ici ;) </p>
                                <div class='DivButton'>
                                    <button  class='Button'><a  class='Button' href='connexion.php'>Connexion</a></button>
                                    <button  class='Button'><a  class='Button' href='inscription.php'>Inscription</a></button>
                                </div>
                            </div>";
                        }
                    ?>
                    <?php
                    if(isset($_SESSION['login'])){
                        echo"
                        <div class = 'Left1'>
                            <img class = 'Img3' src='image/SNK.png' alt='Moi' width = '22%'>
                            <img class = 'Img3' src='image/Portrait.png' alt='Moi' width = '27%'>
                            <img class = 'Img3' src='image/shoes.png' alt='Moi' width = '27%'>
                        </div>";
                    }
                    ?>
                    <div class='Right2'>
                        <img class = 'Img3' src="image/Eren.png" alt="Moi" width = '29%'  >
                        <img class = 'Img3' src="image/Gojo.png" alt="Moi" width = '29%'  >
                        <img class = 'Img3' src="image/VegetaXBulma.png" alt="Moi" width = '29%'  >
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