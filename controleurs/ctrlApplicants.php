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

$offerId = $_GET['offerId'];

//VALIDATION DUN UTILISATEUR
$update = false;
if(isset($_GET['accepted'])) {
    $update = answeredToUser($bdd, $offerId, $_GET['idCandidat'], $_GET['accepted']);
    //echo $update;
}
//echo $update;

$lesCandidats = listeDesCandidats($bdd, $offerId);


//print_r($lesCandidats);


include 'vues/vueTopMenu2.php';
echo "<div style='padding-top: 10vh;padding-bottom: 10vh'>";
include "vues/vueApplicants.php";
echo "</div>";
include 'vues/vueBottomMenu.php';
include 'vues/vueLateralMenu.php';

if($update){
    echo "<script>
    document.getElementById('choixUtilisateur').innerHTML =
    '<div class=\"alert alert-success\" role=\"alert\">'
      +'<h4 class=\"alert-heading\">Réponse envoyée</h4>'
      +'<p>L\'utilisateur vient d\'être averti de votre réponse.</p>'
  +'</div>';
</script>";
}