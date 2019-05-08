<?php
session_start();
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 11/12/18
 * Time: 08:17
 */
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

        $nomCv = "";


    }

    try{

        //$query = $bdd->query("INSERT INTO Reponses (titre, question, questionAttachment,date, idCategorie, user,email,tel) VALUES ('".addcslashes ( $_POST['titre'] , "'" )."', '".nl2br(addcslashes ( $_POST['pb'] , "'" ))."', '".$nomCouv."', '".date('Y-m-d')."',0 , '".nl2br(addcslashes ( $_POST['name'] , "'" ))."', '".nl2br(addcslashes ( $_POST['email'] , "'" ))."', '".nl2br(addcslashes ( $_POST['tel'] , "'" ))."')");


    }catch (Exception $e){

        echo $e->getMessage();

    }

    echo "plus qu'à update";
}


include "modele/modele.php";
include "modele/fonctions.php";

$user = infosUser($bdd, $_SESSION['id']);

include 'vues/vueTopMenu2.php';
echo "<div style='padding-top: 10vh;padding-bottom: 10vh'>";
echo "user : ";
print_r($user);
include 'vues/vueSignUpForm.php';
echo "</div>";
include 'vues/vueBottomMenu.php';


//Controles
if ($pjCv == false){
    echo "<script>
    document.getElementById('alertPj').innerHTML =
    '<div class=\"alert alert-danger\" role=\"alert\">'
      +'<h4 class=\"alert-heading\">Curriculum Vitae</h4>'
      +'<p>Le type de votre curriculum vitae n\'est pas accepté.</p>'
      +'<hr>'
      +'<p>Les formats acceptés sont : Pdf ; Doc; Docx ; Odt.</p>'
    +'</div>';
</script>";
}
