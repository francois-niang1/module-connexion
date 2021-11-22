<?php
function New_user(){ // Fonction permettant d'ajouter les user a la base de donnee
    $Bdd = mysqli_connect('localhost', 'francois-niang', '24062000Niangdiop', 'francois-niang_moduleconnexion'); // Appeller la bdd
    mysqli_set_charset($Bdd, 'utf8'); // Intégrer tous les char

    if (!empty($_POST['login']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['password'])){
        $Login = $_POST['login'];
        $Nom = $_POST['nom'];
        $Prenom = $_POST['prenom'];
        $Mdp = $_POST['password'];
        $ConfirmMdp = $_POST['ConfirmMdp'];
        $Requete2 = mysqli_query($Bdd, "SELECT * FROM `utilisateurs` WHERE login = '".$Login."'");
        $Row=mysqli_num_rows($Requete2);
        if($Row == 1){ //Gestion d'erreur 'Si le Login utilisant est existant'
            echo '<p>Ce Login existe déjà</p> <style>p{color :var(--Red-); font-size:1.4em;}</style>';
        }
        else if ($Mdp == $ConfirmMdp){ //Gestion d'erreur 'Mot de passe similaire'
            $Requete = mysqli_query($Bdd, "INSERT INTO `utilisateurs`(login, prenom, nom, password) VALUES ('$Login','$Prenom','$Nom','$Mdp')"); // Déclarer la requête
            header('Location: connexion.php');
        }
        else {
            echo '<p>"Mot de passe non identique. Réessayez !"</p> <style>p{color :var(--Red-); font-size:1.4em;}</style>';
        }
    }//Gestion d'erreur 'Champs Vides'
    else if (isset($_POST['login'])  || isset($_POST['nom'])  || isset($_POST['prenom']) || isset($_POST['password'])  || isset($_POST['ConfirmMdp'])){
        echo '<p>Remplir TOUS les champs</p><style>p{color : var(--Red-); font-size: 1.4em;}</style>';
    }


}


function Connect(){ // Fonction permettant la connexion des users
    if (isset($_POST['connexion'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        if ($login != NULL && $password != NULL) { //Selection des Users
            $Bdd = mysqli_connect('localhost', 'francois-niang', '24062000Niangdiop', 'francois-niang_moduleconnexion');
            mysqli_set_charset($Bdd, 'utf8');
            $Requete = mysqli_query($Bdd, "SELECT * FROM utilisateurs WHERE login='".$login."' && password='".$password."'");
            $Rows = mysqli_num_rows($Requete);

            if ($Rows==1) {//verification de l'existance du User et s'il se connecte avec le bon Login et password
                $_SESSION ['login'] = $login;
                header('Location: profil.php');
            }
            else{
                echo "<p>Login ou Mot de Passe incorrect</p><style>p{color : var(--Red-); font-size: 1.4em;}</style>";
            }
        }
        else {//Gestion d'erreur 'Champs Vides'
            echo "<p>Veuillez remplir TOUS les champs</p><style>p{color : var(--Red-); font-size: 1.4em;}</style>";
        }
    }
}


function Deconnect(){ // Fonction permettant la deconnexion des users
    if (isset($_POST['deconnexion'])) {
        session_destroy();
        header('Location: index.php');
    }
}

function DecoOrCo(){// Fonction permettant de savoir si le user est connecté ou pas
    if (isset($_SESSION['login'])){
        echo '<p class ="p">Bienvenu(e),<br>'.$_SESSION['login'].' Vous êtes connecté</p>
            <style>
            .p{
                font-size:1.4em;
                padding : 2%;
            }
            </style>';
    }

}

function ChangePrenom(){
    if (isset($_SESSION['login'])) {
        $username = $_SESSION['login'];
        if (isset($_POST['submit'])) {
            $prenom = $_POST['prenom'];
            $newprenom = $_POST['newprenom'];
            $repeatnewprenom = $_POST['repeatnewprenom'];
            if ($prenom && $newprenom && $repeatnewprenom) {
                if ($newprenom == $repeatnewprenom) {
                    $Bdd = mysqli_connect('localhost', 'francois-niang', '24062000Niangdiop', 'francois-niang_moduleconnexion') or die('Erreur');
                    $Requete = mysqli_query($Bdd, "SELECT * FROM utilisateurs WHERE login = '$username' AND prenom = '$prenom'");
                    $rows = mysqli_num_rows($Requete);
                    if ($rows==1) {
                        $newpre = mysqli_query($Bdd, "UPDATE utilisateurs SET prenom='$newprenom' WHERE login='$username'");
                        die("Votre prénom a bien été modifié. Vous pouvez retourner dans l'onglet Profil juste <a href='profil.php'>ici</a>.");
                    }
                    else{
                        echo "<p>Votre ancien prénom est incorrect</p><style>p{color : var(--Red-); font-size: 1.4em;}</style>";
                    }
                }
                else{
                    echo "<p>Les deux champs doivent être identiques</p><style>p{color : var(--Red-); font-size: 1.4em;}</style>";
                }
            }
            else{
                echo "<p>Veuillez saisir tous les champs</p><style>p{color : var(--Red-); font-size: 1.4em;}</style>";
            }
        }
    }
    else{
        header("Location:connexion.php");
    }
}

function ChangeMdp(){
    if (isset($_SESSION['login'])) {
        $username = $_SESSION['login'];
        if (isset($_POST['submit'])) {
            $password = $_POST['password'];
            $newpassword = $_POST['newpassword'];
            $repeatnewpassword = $_POST['repeatnewpassword'];
            if ($password && $newpassword && $repeatnewpassword) {
                if ($newpassword == $repeatnewpassword) {
                    $Bdd = mysqli_connect('localhost', 'francois-niang', '24062000Niangdiop', 'francois-niang_moduleconnexion') or die('Erreur');
                    $Requete = mysqli_query($Bdd, "SELECT * FROM utilisateurs WHERE login = '$username' AND password = '$password'");
                    $rows = mysqli_num_rows($Requete);
                    if ($rows==1) {
                        $newpass = mysqli_query($Bdd, "UPDATE utilisateurs SET password='$newpassword' WHERE login='$username'");
                        die("Votre Mot de passe a bien été modifié. Vous pouvez retourner dans l'onglet Profil juste <a href='profil.php'>ici</a>.");
                    }
                    else{
                        echo "<p>Votre ancien mot de passe est incorrect</p><style>p{color : var(--Red-); font-size: 1.4em;}</style>";
                    }
                }
                else{
                    echo "<p>Les deux champs doivent être identiques</p><style>p{color : var(--Red-); font-size: 1.4em;}</style>";
                }
            }
            else{
                echo "<p>Veuillez saisir tous les champs</p><style>p{color : var(--Red-); font-size: 1.4em;}</style>";
            }
        }
    }
    else{
        header("Location:connexion.php");
    }
}

function ChangeNom(){
    if (isset($_SESSION['login'])) {
        $username = $_SESSION['login'];
        if (isset($_POST['submit'])) {
            $nom = $_POST['nom'];
            $newnom = $_POST['newnom'];
            $repeatnewnom = $_POST['repeatnewnom'];
            if ($nom && $newnom && $repeatnewnom) {
                if ($newnom == $repeatnewnom) {
                    $Bdd = mysqli_connect('localhost', 'francois-niang', '24062000Niangdiop', 'francois-niang_moduleconnexion') or die('Erreur');
                    $Requete = mysqli_query($Bdd, "SELECT * FROM utilisateurs WHERE login = '$username' AND nom = '$nom'");
                    $rows = mysqli_num_rows($Requete);
                    if ($rows==1) {
                        $newpass = mysqli_query($Bdd, "UPDATE utilisateurs SET nom='$newnom' WHERE login='$username'");
                        die("Votre prénom a bien été modifié. Vous pouvez retourner dans l'onglet Profil juste <a href='profil.php'>ici</a>.");
                    }
                    else{
                        echo "Votre ancien nom est incorrect";
                    }
                }
                else{
                    echo "Les deux champs doivent être identiques";
                }
            }
            else{
                echo "Veuillez saisir tous les champs";
            }
        }
    }
    else{
        header("Location:connexion.php");
    }
}

function Info(){
    if (isset($_SESSION['login'])){
        $ConnectedUser = $_SESSION['login'];
        $Bdd = mysqli_connect('localhost', 'francois-niang', '24062000Niangdiop', 'francois-niang_moduleconnexion') or die('Erreur');
        $Requete = mysqli_query($Bdd, "SELECT `login`, `prenom`, `nom` FROM utilisateurs WHERE `login`= '$ConnectedUser'");
        $rows = mysqli_num_rows($Requete);
        if ($rows == 1){
            $Users = mysqli_fetch_all($Requete, MYSQLI_ASSOC);
            foreach ($Users as $User){
                echo'<h2 class = "p1">Nom : '.$User['nom'].'<br></h2>';
                echo'<h2 class = "p2">Prenom : '.$User['prenom'].'<br></h2>';
                echo'<h2 class = "p3">Login : '.$User['login'].'</h2>';
            }
        }
    }
}
?>