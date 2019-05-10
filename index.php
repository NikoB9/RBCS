<?php
session_start();

//Activation affichage des erreurs
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__. '/.log_error');
error_reporting(E_ALL & ~E_NOTICE);
?>
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
    <div class="ui pageloader">
        <div class="ui active dimmer">
            <div class="ui medium text loader">Chargement ...</div>
        </div>
        <p></p>
    </div>




    <div class="ui basic modal failAddUser">
        <div class="ui icon header">
            <i class="refresh icon"></i>
            Toutes nos excuses,
            <br>
            Un problème est survenu lors de l'enregistrement de votre compte.
        </div>
        <div class="actions">
            <div class="ui green ok button">
                <i class="checkmark icon"></i>
                Ok
            </div>
        </div>
    </div>

    <div class="ui basic modal 2differentPasswords">
        <div class="ui icon header">
            <i class="refresh icon"></i>
            Les deux mots de passe sont différents.
            <br>
            Pour rappel, un mod de passe sûr comprend des symnoles (courants) et des caractères alpha-numériques.
        </div>
        <div class="actions">
            <div class="ui green ok button">
                <i class="checkmark icon"></i>
                Ok
            </div>
        </div>
    </div>

    <div class="ui basic modal userExist">
        <div class="ui icon header">
            <i class="refresh icon"></i>
            Toutes nos excuses,
            <br>
            Un utilisateur du même pseudo existe déjà.
        </div>
        <div class="actions">
            <div class="ui green ok button">
                <i class="checkmark icon"></i>
                Ok
            </div>
        </div>
    </div>

    <div class="ui basic modal unknownAccount">
        <div class="ui icon header">
            <i class="refresh icon"></i>
            <br>
            Ce compte est inconnu.
            <br>
        </div>
        <div class="actions">
            <div class="ui green ok button">
                <i class="checkmark icon"></i>
                Ok
            </div>
        </div>
    </div>


    <div class="ui basic modal badUSername">
        <div class="ui icon header">
            <i class="refresh icon"></i>
            <br>
            L'indentifiant incorrect (mail ou username).
            <br>
        </div>
        <div class="actions">
            <div class="ui green ok button">
                <i class="checkmark icon"></i>
                Ok
            </div>
        </div>
    </div>


    <div class="ui basic modal badMdp">
        <div class="ui icon header">
            <i class="refresh icon"></i>
            <br>
            Mot de passe incorrect.
            <br>
        </div>
        <div class="actions">
            <div class="ui green ok button">
                <i class="checkmark icon"></i>
                Ok
            </div>
        </div>
    </div>




    <script>
        //Navigateur --> IE ou Autre
        /*function msieversion() {

            var ua = window.navigator.userAgent;
            //alert(ua);
            var msie = ua.indexOf("MSIE ");
            // Si c'est Internet Explorer, affiche le numéro de version
            if (msie > -1 || !!navigator.userAgent.match(/Trident.*rv\:11\./)){


                window.location.href = 'pages/loginIE.php';
            }
            else{
                //alert("C'est un autre navigateur");

                window.location.href = 'pages/login.php';

            }

        }*/
    </script>



    <?php


    if(isset($_POST['logoutid']) || $_GET['deconnexion'])
    {
        session_destroy();
        unset($_SESSION);
        //echo "<script>msieversion()</script>";
    }

    if (isset($_SESSION['user'])){
        $session_login = $_SESSION['user'];

        //Récupération de l'id de l'utilisateur connecté
        //$session_id = GetIdFromLabel($session_login, $bdd);
        //print_r($_GET);

        if(isset($_GET['p']))
        {
            if(file_exists("controleurs/".$_GET['p'].".php"))
            {
                include("controleurs/".$_GET['p'].".php");
            }
            else
            {
                include('controleurs/ctrlAccueil.php');
            }
        }
        else
        {
            include('controleurs/ctrlAccueil.php');
        }
    }
    else {

        //include($pages['login']);
        ///echo "<script>msieversion()</script>";
        include 'controleurs/ctrlAccueil.php';
    }

    ?>


    <script type="text/javascript" src="assets/jquery-ui/js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="assets/jquery-ui/js/jquery.ui.datepicker-fr.js"></script>
    <script type="text/javascript" src="assets/jquery-ui/js/jquery-ui-1.10.3.custom.js"></script>

    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/semantic.min.js"></script>

    <script src='assets/js/jquery.dataTables.min.js'></script>
    <script src='assets/js/dataTables.semanticui.min.js'></script>
    <script src='assets/js/jquery-ui.min.js'></script>
    <!-- Include AmCharts -->
    <script type="text/javascript" src="assets/js/amcharts/amcharts.js"></script>
    <script type="text/javascript" src="assets/js/amcharts/pie.js"></script>
    <script type="text/javascript" src="assets/js/amcharts/serial.js"></script>
    <script type="text/javascript" src="assets/js/amcharts/plugins/export/export.min.js"></script>

    <script type="text/javascript" src="assets/js/graph.js"></script>

    <script type="text/javascript" src="assets/js/main.js"></script>

<!--
    <?php if (@$failAddUser == true) echo "<script type=\"text/javascript\">ShowModalRequest('.failAddUser')</script>";
    if (@$twoDifferentsPasswords == true) echo "<script type=\"text/javascript\">ShowModalRequest('.2differentPasswords')</script>";
    if (@$userExistAlready == true) echo "<script type=\"text/javascript\">ShowModalRequest('.userExist')</script>";
    if (@$unknownAccount == true) echo "<script type=\"text/javascript\">ShowModalRequest('.unknownAccount')</script>";
    if (@$badUSername == true) echo "<script type=\"text/javascript\">ShowModalRequest('.badUSername')</script>";
    if (@$badMdp == true) echo "<script type=\"text/javascript\">ShowModalRequest('.badMdp')</script>";
    ?>-->



</body>
</html> 
