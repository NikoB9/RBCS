<?php
include "modele/modele.php";
include "modele/fonctions.php";
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 11/12/18
 * Time: 08:17
 */
$user = infosUser($bdd, $_SESSION['id']);

$pjCv = true;
$pjProfilePc = true;

if (isset($_POST['userInfos'])){
    if (!empty($_FILES['pjCv']['name']) && isset($_FILES['pjCv']['name'])) {
        //$nomFichier = addcslashes ( $_POST['cvPj'] , "'" );

        $unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );

        //IMAGE FICHIER
        //$cvName = strtr( addcslashes (  $_FILES['cvPj']['name'] , "'" ) , $unwanted_array );
        $cvName = strtr( addcslashes (  $_POST['cv'] , "'" ) , $unwanted_array );
        //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
        $cvType = $_FILES['pjCv']['type'];    //Le type du fichier. Par exemple, cela peut être « image/png ».
        $cvSize = $_FILES['pjCv']['size'];    //La taille du fichier en octets.
        $cvUrlTmp = $_FILES['pjCv']['tmp_name']; //L'adresse vers le fichier uploadé dans le répertoire temporaire.
        $cvErr = $_FILES['pjCv']['error'];   //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.

        //$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' , 'pdf' , 'doc' , 'docx' , 'odt' , 'mp4');
        $extensions_valides = array('pdf', 'doc' , 'docx' , 'odt');
        //1. strrchr renvoie l'extension avec le point (« . »).
        //2. substr(chaine,1) ignore le premier caractère de chaine.
        //3. strtolower met l'extension en minuscules.
        $extension = strtolower(  substr(  strrchr($cvName, '.')  ,1)  );

        //VERIF EXTENSION
        if ( in_array($extension,$extensions_valides) ){
            //VERIF SI FICHIER EXISTE SI OUI IL FAUT LE RENOMMER
            if (file_exists("users_resume/".$cvName)){
                $nomCv = "users_resume/".$cvName.rand(0,100000).".".$extension;
                while (file_exists($nomCv)){
                    $nomCv = "users_resume/".$cvName.rand(0,100000).".".$extension;
                }
            }
            else{

                $nomCv = "users_resume/".$cvName;

            }

            $transfertCouv = move_uploaded_file($cvUrlTmp, $nomCv);



        }
        else{
            $pjCv = false;
        }

    }
    else{

        $nomCv = $user['cv'];


    }

    if (!empty($_FILES['profilePic']['name']) && isset($_FILES['profilePic']['name'])) {
        //$nomFichier = addcslashes ( $_POST['cvPj'] , "'" );

        $unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );

        //IMAGE FICHIER
        $ppName = strtr( addcslashes (  $_FILES['profilePic']['name'] , "'" ) , $unwanted_array );
        //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
        $ppType = $_FILES['profilePic']['type'];    //Le type du fichier. Par exemple, cela peut être « image/png ».
        $ppSize = $_FILES['profilePic']['size'];    //La taille du fichier en octets.
        $ppUrlTmp = $_FILES['profilePic']['tmp_name']; //L'adresse vers le fichier uploadé dans le répertoire temporaire.
        $ppErr = $_FILES['profilePic']['error'];   //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.

        //$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' , 'pdf' , 'doc' , 'docx' , 'odt' , 'mp4');
        $extensions_valides = array('jpg' , 'jpeg' , 'gif' , 'png' , 'ico' , 'svg');
        //1. strrchr renvoie l'extension avec le point (« . »).
        //2. substr(chaine,1) ignore le premier caractère de chaine.
        //3. strtolower met l'extension en minuscules.
        $extension = strtolower(  substr(  strrchr($ppName, '.')  ,1)  );

        //VERIF EXTENSION
        if ( in_array($extension,$extensions_valides) ){
            //VERIF SI FICHIER EXISTE SI OUI IL FAUT LE RENOMMER
            if (file_exists("profiles_img/".$ppName)){
                $nomPp = "profiles_img/".$ppName.rand(0,100000).".".$extension;
                while (file_exists($nomPp)){
                    $nomPp = "profiles_img/".$ppName.rand(0,100000).".".$extension;
                }
            }
            else{

                $nomPp = "profiles_img/".$ppName;

            }

            $transfertCouv = move_uploaded_file($ppUrlTmp, $nomPp);



        }
        else{
            $pjProfilePc = false;
        }

    }
    else{

        $nomPp = $user['profilePic'];


    }
    if (!empty($_FILES['pjCvNew']['name']) && isset($_FILES['pjCvNew']['name'])) {
        //$nomFichier = addcslashes ( $_POST['cvPj'] , "'" );

        $unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );

        //IMAGE FICHIER
        //$cvName = strtr( addcslashes (  $_FILES['cvPj']['name'] , "'" ) , $unwanted_array );
        $cvName = strtr( addcslashes (  $_POST['cvNew'] , "'" ) , $unwanted_array );
        //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
        $cvType = $_FILES['pjCvNew']['type'];    //Le type du fichier. Par exemple, cela peut être « image/png ».
        $cvSize = $_FILES['pjCvNew']['size'];    //La taille du fichier en octets.
        $cvUrlTmp = $_FILES['pjCvNew']['tmp_name']; //L'adresse vers le fichier uploadé dans le répertoire temporaire.
        $cvErr = $_FILES['pjCvNew']['error'];   //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.

        //$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' , 'pdf' , 'doc' , 'docx' , 'odt' , 'mp4');
        $extensions_valides = array('pdf', 'doc' , 'docx' , 'odt');
        //1. strrchr renvoie l'extension avec le point (« . »).
        //2. substr(chaine,1) ignore le premier caractère de chaine.
        //3. strtolower met l'extension en minuscules.
        $extension = strtolower(  substr(  strrchr($cvName, '.')  ,1)  );

        //VERIF EXTENSION
        if ( in_array($extension,$extensions_valides) ){

            //suppression ancien cv avant insertion
            unlink($user['cv']);

            //VERIF SI FICHIER EXISTE SI OUI IL FAUT LE RENOMMER
            if (file_exists("users_resume/".$cvName)){
                $nomCv = "users_resume/".$cvName.rand(0,100000).".".$extension;
                while (file_exists($nomCv)){
                    $nomCv = "users_resume/".$cvName.rand(0,100000).".".$extension;
                }
            }
            else{

                $nomCv = "users_resume/".$cvName;

            }

            $transfertCouv = move_uploaded_file($cvUrlTmp, $nomCv);



        }
        else{
            $pjCv = false;
        }

    }
    else{

        $nomCv = $user['cv'];


    }

    if (!empty($_FILES['profilePicNew']['name']) && isset($_FILES['profilePicNew']['name'])) {
        //$nomFichier = addcslashes ( $_POST['cvPj'] , "'" );

        $unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );

        //IMAGE FICHIER
        $ppName = strtr( addcslashes (  $_FILES['profilePicNew']['name'] , "'" ) , $unwanted_array );
        //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
        $ppType = $_FILES['profilePicNew']['type'];    //Le type du fichier. Par exemple, cela peut être « image/png ».
        $ppSize = $_FILES['profilePicNew']['size'];    //La taille du fichier en octets.
        $ppUrlTmp = $_FILES['profilePicNew']['tmp_name']; //L'adresse vers le fichier uploadé dans le répertoire temporaire.
        $ppErr = $_FILES['profilePicNew']['error'];   //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.

        //$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' , 'pdf' , 'doc' , 'docx' , 'odt' , 'mp4');
        $extensions_valides = array('jpg' , 'jpeg' , 'gif' , 'png' , 'ico' , 'svg');
        //1. strrchr renvoie l'extension avec le point (« . »).
        //2. substr(chaine,1) ignore le premier caractère de chaine.
        //3. strtolower met l'extension en minuscules.
        $extension = strtolower(  substr(  strrchr($ppName, '.')  ,1)  );

        //VERIF EXTENSION
        if ( in_array($extension,$extensions_valides) ){

            //Suppression de l'ancienne photo de profile
            unlink ($user['profilePic']);

            //VERIF SI FICHIER EXISTE SI OUI IL FAUT LE RENOMMER

            if (file_exists("profiles_img/".$ppName)){
                $nomPp = "profiles_img/".$ppName.rand(0,100000).".".$extension;
                while (file_exists($nomPp)){
                    $nomPp = "profiles_img/".$ppName.rand(0,100000).".".$extension;
                }
            }
            else{

                $nomPp = "profiles_img/".$ppName;

            }

            $transfertCouv = move_uploaded_file($ppUrlTmp, $nomPp);



        }
        else{
            $pjProfilePc = false;
        }

    }
    else{

        $nomPp = $user['profilePic'];


    }

    try{

        $userAlreadyExist = false;
        if (!anotherUserExist($_POST['mail'], $_POST['pseudo'], $_SESSION['id'], $bdd)){
            if($pjProfilePc && $pjCv){

                //echo "avant if";

                //echo "rec1 : ".$_POST['recruteur'] ;
                $recruteur = ($_POST['recruteur'] == 1) ? 0 : 1;

                //echo "rec2 : ".$recruteur;

                //echo "apres if";
                editUSer($bdd,$_SESSION['id'],$_POST['prenom'],$_POST['nom'],$_POST['pseudo'],$_POST['naissance'],$_POST['description'], $nomCv, $nomPp,
                    $recruteur, $_POST['entreprise'], $_POST['mail'],$_POST['telFix'],$_POST['tel'],$_POST['adresse'],$_POST['code_postal'],$_POST['ville']);
                //echo "enregistrement données";
            }
        }
        else{
            $userAlreadyExist = true;
        }


    }catch (Exception $e){

        echo $e->getMessage();

    }

}

$user = infosUser($bdd, $_SESSION['id']);

include 'vues/vueTopMenu2.php';
echo "<div style='padding-top: 10vh;padding-bottom: 10vh'>";
//echo "user : ";
//print_r($user);
include 'vues/vueSignUpForm.php';
echo "</div>";
include 'vues/vueBottomMenu.php';
include 'vues/vueLateralMenu.php';

//Controles
if ($pjCv == false){
    echo "<script>
    document.getElementById('alertPj').innerHTML =
    '<div class=\"alert alert-danger\" role=\"alert\">'
      +'<h4 class=\"alert-heading\">Curriculum Vitae</h4>'
      +'<p>Le format de votre curriculum vitae n\'est pas accepté.</p>'
      +'<hr>'
      +'<p>Les formats acceptés sont : Pdf ; Doc; Docx ; Odt.</p>'
    +'</div>';
</script>";
}
elseif ($pjProfilePc == false){
    echo "<script>
    document.getElementById('alertPjPp').innerHTML =
    '<div class=\"alert alert-danger\" role=\"alert\">'
      +'<h4 class=\"alert-heading\">Photo de profil</h4>'
      +'<p>Le format de votre photo de profil n\'est pas accepté.</p>'
      +'<hr>'
      +'<p>Les formats acceptés sont : Jpg ; Jpeg ; Gif ; Png ; Ico ; Svg.</p>'
    +'</div>';
</script>";
}
elseif ($userAlreadyExist){
    echo "<script>
    document.getElementById('alertPjPp').innerHTML =
    '<div class=\"alert alert-danger\" role=\"alert\">'
      +'<h4 class=\"alert-heading\">Utilisateur existant</h4>'
      +'<p>Vous avez essayé de modifier votre pseudo ou votre adresse de messagerie et nous n\'y voyons pas d\'inconvénient.</p>'
      +'<hr>'
      +'<p>Cependant le pseudo ou l\'adresse de messagerie choisie est déjà assigné(e) à un autre utilisateur.</p>'
    +'</div>';
</script>";
}


