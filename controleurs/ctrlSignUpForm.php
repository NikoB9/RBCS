<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 11/12/18
 * Time: 08:17
 */

if (!empty($_FILES['pj']['name']) && isset($_FILES['pj']['name'])) {
    //$nomFichier = addcslashes ( $_POST['pj'] , "'" );

    $unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
        'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
        'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
        'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
        'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );

    //IMAGE FICHIER
    $couvName = strtr( addcslashes (  $_FILES['pj']['name'] , "'" ) , $unwanted_array );
    //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
    $couvType = $_FILES['pj']['type'];    //Le type du fichier. Par exemple, cela peut être « image/png ».
    $couvSize = $_FILES['pj']['size'];    //La taille du fichier en octets.
    $couvUrlTmp = $_FILES['pj']['tmp_name']; //L'adresse vers le fichier uploadé dans le répertoire temporaire.
    $couvErr = $_FILES['pj']['error'];   //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.

    $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' , 'pdf' , 'doc' , 'docx' , 'odt' , 'mp4');
    //1. strrchr renvoie l'extension avec le point (« . »).
    //2. substr(chaine,1) ignore le premier caractère de chaine.
    //3. strtolower met l'extension en minuscules.
    $extension = strtolower(  substr(  strrchr($couvName, '.')  ,1)  );

    //VERIF EXTENSION
    if ( in_array($extension,$extensions_valides) ){
        //VERIF SI FICHIER EXISTE SI OUI IL FAUT LE RENOMMER
        if (file_exists("upload/".$couvName)){
            $nomCouv = "upload/".$couvName.rand(0,100000).".".$extension;
        }
        else{

            $nomCouv = "upload/".$couvName;

        }

        $transfertCouv = move_uploaded_file($couvUrlTmp, $nomCouv);

        try{

            //$query = $bdd->query("INSERT INTO Reponses (titre, question, questionAttachment,date, idCategorie, user,email,tel) VALUES ('".addcslashes ( $_POST['titre'] , "'" )."', '".nl2br(addcslashes ( $_POST['pb'] , "'" ))."', '".$nomCouv."', '".date('Y-m-d')."',0 , '".nl2br(addcslashes ( $_POST['name'] , "'" ))."', '".nl2br(addcslashes ( $_POST['email'] , "'" ))."', '".nl2br(addcslashes ( $_POST['tel'] , "'" ))."')");


        }catch (Exception $e){

            echo $e->getMessage();

        }

    }
    else{
    }

}
else{
    try{

       // $query = $bdd->query("INSERT INTO Reponses (titre, question, questionAttachment,date, idCategorie, user,email,tel) VALUES ('".addcslashes ( $_POST['titre'] , "'" )."', '".nl2br(addcslashes ( $_POST['pb'] , "'" ))."', null, '".date('Y-m-d')."',0, '".nl2br(addcslashes ( $_POST['name'] , "'" ))."', '".nl2br(addcslashes ( $_POST['email'] , "'" ))."', '".nl2br(addcslashes ( $_POST['tel'] , "'" ))."')");


    }catch (Exception $e){

        echo $e->getMessage();

    }
}


include 'vues/vueTopMenu2.php';
echo "<div style='padding-top: 10vh;padding-bottom: 10vh'>";
include 'vues/vueSignUpForm.php';
echo "</div>";
include 'vues/vueBottomMenu.php';


