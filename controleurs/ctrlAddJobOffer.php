<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 18/12/18
 * Time: 08:38
 */
include "modele/modele.php";
include "modele/fonctions.php";
$user = infosUser($bdd, $_SESSION['id']);

$badResumePicture = false;
$badChrono = false;
$insert = -1;

if (isset($_POST['addOffer'])){
    if (isset($_FILES['resumePicture']['name']) && !empty($_FILES['resumePicture']['name'])) {
        //$nomFichier = addcslashes ( $_POST['cvPj'] , "'" );

        $unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );

        //IMAGE FICHIER
        //$cvName = strtr( addcslashes (  $_FILES['cvPj']['name'] , "'" ) , $unwanted_array );
        $rpName = strtr( addcslashes (  $_FILES['resumePicture']['name'] , "'" ) , $unwanted_array );
        //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
        $rpType = $_FILES['resumePicture']['type'];    //Le type du fichier. Par exemple, cela peut être « image/png ».
        $rpSize = $_FILES['resumePicture']['size'];    //La taille du fichier en octets.
        $rpUrlTmp = $_FILES['resumePicture']['tmp_name']; //L'adresse vers le fichier uploadé dans le répertoire temporaire.
        $rpErr = $_FILES['resumePicture']['error'];   //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.

        //$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' , 'pdf' , 'doc' , 'docx' , 'odt' , 'mp4');
        $extensions_valides = array('jpg' , 'jpeg' , 'gif' , 'png' , 'ico' , 'svg');
        //1. strrchr renvoie l'extension avec le point (« . »).
        //2. substr(chaine,1) ignore le premier caractère de chaine.
        //3. strtolower met l'extension en minuscules.
        $extension = strtolower(  substr(  strrchr($rpName, '.')  ,1)  );

        //VERIF EXTENSION
        if ( in_array($extension,$extensions_valides) ){
            //VERIF SI FICHIER EXISTE SI OUI IL FAUT LE RENOMMER
            if (file_exists("jobOffer_pictures/".$rpName)){
                $resumePicture = "jobOffer_pictures/".$rpName.rand(0,100000).".".$extension;
                while (file_exists($rpName)){
                    $resumePicture = "jobOffer_pictures/".$rpName.rand(0,100000).".".$extension;
                }
            }
            else{

                $resumePicture = "jobOffer_pictures/".$rpName;

            }

            $transfertCouv = move_uploaded_file($rpUrlTmp, $resumePicture);



        }
        else{
            $badResumePicture = true;
        }

    }
    else{

        $resumePicture = "";


    }

    try{

        if (preg_match("/^[1-9][0-9]*$/",  $_POST['chrono'])){
            if(!$badResumePicture){


                //echo "apres if";
                $insert = addJobOffer($bdd,$_SESSION['id'],$_POST['title'],$_POST['backgoundColor'],$_POST['beginningDate'],$_POST['closingDate'],$_POST['resumeLong'],
                    $_POST['resume'], $_POST['chrono'],$resumePicture,$_POST['profilAccepted'],$_POST['profilRefused'],$_POST['adresse'],$_POST['code_postal'],$_POST['ville']);
                //echo "enregistrement données : ".$insert;
                //print_r($_POST);
                echo $insert;
            }
        }
        else{
            $badChrono = true;
        }


    }catch (Exception $e){

        echo $e->getMessage();

    }

}


include 'vues/vueTopMenu2.php';
echo "<div style='padding-top: 10vh;padding-bottom: 10vh'>";
include "vues/vueAddJobOfferForm.php";
echo "</div>";
include 'vues/vueBottomMenu.php';
include 'vues/vueLateralMenu.php';


//Controles
if ($badResumePicture){
    echo "<script>
    document.getElementById('alertDescriptiveImg').innerHTML =
    '<div class=\"alert alert-danger\" role=\"alert\">'
      +'<h4 class=\"alert-heading\">Photo descriptive</h4>'
      +'<p>Le format de votre photo de description n\'est pas accepté.</p>'
      +'<hr>'
      +'<p>Les formats acceptés sont : Jpg ; Jpeg ; Gif ; Png ; Ico ; Svg.</p>'
    +'</div>';
</script>";
}

if ($badChrono){
    echo "<script>
    document.getElementById('alertChrono').innerHTML =
    '<div class=\"alert alert-danger\" role=\"alert\">'
      +'<h4 class=\"alert-heading\">Temps maximal du test</h4>'
      +'<p>Le format du champ est invalide. Vous n\'avez le droit d\'entrer un NOMBRE de secondes.</p>'
      +'<hr>'
      +'<p>Le premier chiffre ne peut pas être un 0.</p>'
    +'</div>';
</script>";
}
