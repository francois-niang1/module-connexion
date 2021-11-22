<?php
session_start();
require('fonction.php');
if ($_SESSION['login'] != 'admin'){
    header('Location: index.php');
}
$Bdd = mysqli_connect('localhost', 'francois-niang', '24062000Niangdiop', 'francois-niang_moduleconnexion');
mysqli_set_charset($Bdd, 'utf8');
$Requete = mysqli_query($Bdd, "SELECT * FROM utilisateurs");
$Users = mysqli_fetch_all($Requete, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/admin.css" rel="stylesheet">
        <link href="css/header&footer.css" rel="stylesheet">
        <link href="css/root&font.css" rel="stylesheet">
        <title>Administrateur</title>
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
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Login</th>
                            <th>Mot de Passe</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        echo '<p>Voici la liste des utilisateurs existant</p>
                        <style>
                        p{
                            padding :1%;
                            font-size:1.7em;
                        }
                        </style>';

                        foreach ($Users as $User){
                            echo'<tr><td>'.$User['id'].'</td>';
                            echo'<td>'.$User['nom'].'</td>';
                            echo'<td>'.$User['prenom'].'</td>';
                            echo'<td>'.$User['login'].'</td>';
                            echo'<td>'.$User['password'].'</td>';
                        }
                        ?>
                    </tbody>
            </table>
            </div>
        </main>
        <footer>

        </footer>
    </body>
</html>