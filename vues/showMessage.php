<!DOCTYPE html>
<html>
<head>
    <title>R.B.C.S.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="assets/css/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/formulaire.css">
    <link rel="stylesheet" href="assets/css/graph.css" type="text/css" media="all" />
    <link rel="icon" type="image/png" href="assets/img/logoRbcs.png" />
    <link rel="shortcut icon" type="image/png" href="assets/img/logoRbcs.png" />


    <link href="assets/css/material-design.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/bootstrap-grid.css">
    <link rel="stylesheet" href="assets/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="assets/jquery-ui/css/smoothness/jquery-ui-1.10.3.custom.css">

</head>
<body>
<?php
include "../modele/modele.php";
include "../modele/fonctions.php";
$offerId = $_GET['id'];
$r = $_GET['r'];
$offre = oneJobOffer($bdd, $offerId);
?>
<div style="background-color: whitesmoke">
<?php

echo "<h3 style='padding: 20px;'>Message de ".$offre['recruteur']." pour l'offre n°".$offre['id']." : ".$offre['titre']."</h3><div style='padding: 20px;'><div style='color: #fff;border-radius:10px;padding: 20px;background-color: #5a6268'>";

if ($r){
    echo nl2br($offre['acceptedUserMessage']);
}
else{
    echo nl2br($offre['refusedUserMessage']);
}

echo "</div></div>";

?>
</div>
</body>
</html>
