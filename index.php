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
</head>
<body>
    <div class="ui pageloader">
        <div class="ui active dimmer">
            <div class="ui medium text loader">Chargement ...</div>
        </div>
        <p></p>
    </div>




    <!--<div class="ui basic modal notSend">
        <div class="ui icon header">
            <i class="refresh icon"></i>
            Toutes nos excuses,
            <br>
            Un problème est survenu lors de l'envoie.
            <br>
            Veuillez vérifier les champs du formulaire.
        </div>
        <div class="actions">
            <div class="ui green ok button">
                <i class="checkmark icon"></i>
                Ok
            </div>
        </div>
    </div>-->




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
    /*if(isset($_POST['logoutid']))
    {
        session_destroy();
        echo "<script>msieversion()</script>";
    }*/

    if(isset($_SESSION['postulant']))
    {
        $session_login = $_SESSION['postulant'];

        if(isset($_POST['p']))
        {
            if(file_exists("controleurs/".$_POST['p'].".php"))
            {
                include("controleurs/".$_POST['p'].".php");
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
    elseif (isset($_SESSION['recruteur'])){
        $session_login = $_SESSION['recruteur'];

        //Récupération de l'id de l'utilisateur connecté
        //$session_id = GetIdFromLabel($session_login, $bdd);
        if(isset($_POST['p']))
        {
            if(file_exists("controleurs/".$_POST['p'].".php"))
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
    <?php/* if (@$send == true) echo "<script type=\"text/javascript\">ShowModalRequest('.send')</script>";
    if (@$notSend == true) echo "<script type=\"text/javascript\">ShowModalRequest('.notSend')</script>";
*/
    ?>-->
</body>
</html> 
