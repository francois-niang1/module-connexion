<?php 
function New_user(){
    $Bdd = mysqli_connect('localhost', 'root', '', 'moduleconnexion'); // Appeller la bdd
    mysqli_set_charset($Bdd, 'utf8'); // Intégrer tous les char

    if (!empty($_POST['login']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['password'])){
        $Login = $_POST['login'];
        $Nom = $_POST['nom'];
        $Prenom = $_POST['prenom'];
        $Mdp = $_POST['password'];
        $ConfirmMdp = $_POST['ConfirmMdp'];
        if ($Mdp == $ConfirmMdp){
            $Requete = mysqli_query($Bdd, "INSERT INTO `utilisateurs`(login, prenom, nom, password) VALUES ('$Login','$Prenom','$Nom','$Mdp')"); // Déclarer la requête
            header('Location: connexion.php');
        }
    }

    else {
        echo 'Remplissez tous les champs';
    }

}


function Check_Log(){
    $Bdd = mysqli_connect('localhost', 'root', '', 'moduleconnexion'); 
    mysqli_set_charset($Bdd, 'utf8'); 
    if (isset($_POST['login'])){
        $Login = $_POST['login'];
        $Requete = mysqli_query($Bdd, "SELECT `login` FROM `utilisateurs`");
        $Log = mysqli_fetch_all($Requete, MYSQLI_ASSOC);
        if ($Login == $Log){
        echo '<p>Cet Utilisateur existe déjà</p><style>p{color : var(--Red-); font-size: 1.4em;}</style>';
        }
    }
}

function Connect(){
    if (isset($_POST['connexion'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        if ($login != NULL && $password != NULL) {
            $Bdd = mysqli_connect('localhost', 'root', '', 'moduleconnexion');
            mysqli_set_charset($Bdd, 'utf8');
            $Requete = mysqli_query($Bdd, "SELECT * FROM utilisateurs WHERE login='".$login."' && password='".$password."'");
            $Rows = mysqli_num_rows($Requete);
            if ($Rows==1) {
                $_SESSION['login'] = $login;
                header('Location: profil.php');
            }
            
            else if ($login == 'admin' && $password == 'admin') { 
                header('Location: admin.php');
            }
    
            else{
                echo "<p>Login ou Mot de Passe incorrect</p><style>p{color : var(--Red-); font-size: 1.4em;}</style>";
            }
        }
    }    
}

function Error(){
    if (isset($_POST['connexion'])) {
        if (isset($_POST['login']) == NULL || isset($_POST['password']) == NULL){
            echo 'Veuillez saisir tous les champs.';
        }
    }
    
}

function Deconnect(){
    if (isset($_POST['deconnexion'])) {
        session_destroy();
        header('Location: index.php');
    }
}

function DecoOrCo(){
    if (isset($_SESSION['login'])){
        echo 'Bienvenu(e),'.$_SESSION['login'].' Vous êtes connecté';
    }
    else {
        echo "Vous n'êtes pas connecté";
    }
}


?>