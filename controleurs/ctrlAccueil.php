<?php
session_start();
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 11/12/18
 * Time: 08:18
 */

include "modele/modele.php";
include "modele/fonctions.php";

echo "<style>body{opacity: 1;}</style>";

if (isset($_POST['signin']) && $_POST['signin'] = 'signin'){
    //echo '<script>alert("'.$_POST['signin'].'")</script>';

    $username = $_POST['username'];
    $mdp = $_POST['pwd'];

    /*
     * PSEUDO OU EMAIL!!!!!!!!
     *
     */

    $id = compteExist($username, $mdp, $bdd);
    //
    //echo $id;
    if ($id !== -1){

        $_SESSION['user'] = $username;
        $_SESSION['id'] = $id;

        //PAGE DES OFFRES D EMBAUCHES
        //$page = "ctrlOffreEmbauches";
        ?>


        <script>
            window.location.href = '?p=ctrlOffreEmbauches';
        </script>

        <?php
    }
    else{

        $userExist = userExist($username, $bdd);
        $pwdExist = pwdExist($mdp, $bdd);
        //echo "userExist".$userExist;
        //echo "pwdExist".$pwdExist;

        if(!$userExist && !$pwdExist){
            //APPEL DU MESSAGE DANS LA PAGE D'INDEX
            $unknownAccount = true;
            echo '<script>alert("Compte inconnu.")</script>';
        }
        elseif(!$userExist){
            //APPEL DU MESSAGE DANS LA PAGE D'INDEX
            $badUSername = true;
            echo '<script>alert("Login incorrect.")</script>';
        }
        else{
            //APPEL DU MESSAGE DANS LA PAGE D'INDEX
            $badMdp = true;
            echo '<script>alert("Mot de passe incorrect.")</script>';
        }
    }


}
elseif (isset($_POST['signup']) && $_POST['signup'] = 'signup'){

    $user = $_POST['user'];
    $mdp = $_POST['pwd1'];
    $mdpVerif = $_POST['pwd2'];
    $ad = $_POST['mail'];

    $userExist = userExistAndEmail($user, $ad, $bdd);

    if(!$userExist && $mdp == $mdpVerif){

        $id = ajouterUtilisateur($user,$ad,$mdp, $bdd);
        if ($id !== -1){
            //APPEL INDEX AVEC APPEL CTRL FORMULAIRE INSCRIPTION EN PARAMETRE POST


            $page = 'ctrlSignUpForm';

            $_SESSION['user'] = $user;
            $_SESSION['id'] = $id;




            echo"<script>
                window.location.href = '?p=".$page."';
            </script>";


        }
        else{
            //APPEL DU MESSAGE DANS LA PAGE D'INDEX
            $failAddUser = true;
            echo '<script>alert("Echec de l\'enregistrement du compte utilisateur.")</script>';
        }
    }
    elseif (!$userExist){
        //APPEL DU MESSAGE DANS LA PAGE D'INDEX
        $twoDifferentsPasswords = true;
        echo '<script>alert("Les deux mots de passe sont différents.")</script>';
    }
    else{
        //APPEL DU MESSAGE DANS LA PAGE D'INDEX
        $userExistAlready = true;
        echo '<script>alert("L\'utilisateur existe déjà.")</script>';
    }


}

include 'vues/vueAccueil.php';
?>


