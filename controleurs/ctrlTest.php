<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 18/12/18
 * Time: 08:38
 */
include "modele/modele.php";
include "modele/fonctions.php";
$idUser = $_SESSION['id'];
$offerId = $_GET['offerId'];

/*echo "<script>alert('".$offerId."')</script>";*/
$participationEffectuee = alreadyParticipate($bdd, $offerId, $idUser);

$url = ($participationEffectuee) ? "vues/form_generate/ConsulterResultatQC.php?idOffre=".$offerId."&idCandidat=".$idUser."" : "vues/form_generate/GenFormQCM.php?idOffre=".$offerId."&idCandidat=".$idUser."" ;
/*echo "<script>alert('".$url."')</script>";*/

echo "<script>window.location.href='".$url."'</script>";

