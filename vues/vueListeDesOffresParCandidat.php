<?php
?>

<style>
    .imgPres{
        max-width: 10vw;
        max-width: 20vh;
    }
    #cardForm{
        margin-bottom: 30px;
        margin-top: 30px;
    }
    th{
        text-align: center !important;
        background: rgba(12, 84, 96, 0.47) !important;
        color: #1E4C67 !important;
    }
    table{
        border: #1E4C67 solid 2px !important;

        width: 80vw !important;
    }
    .button.circular.ui.button{
        padding-top: 10px !important;
        padding-left: 10px !important;
        padding-right: 10px !important;
    }
</style>

<!--Message Acceptation -->

<div class="ui long Message_Acceptation modal" style="background-color: transparent">
    <i class="close icon" style="margin-top: 25vh"></i>
    <div class="header" style="margin-top: 25vh">
        Vous avez été accepté

    </div>

    <div id="Message_Acceptation_content">

    </div>

    <div class="actions">
        <div class="ui red approve button"><i class="trash alternate icon"></i> Fermer </div>
    </div>
</div>

<!--Message refus-->

<div class="ui long Message_refus modal" style="background-color: transparent">
    <i class="close icon" style="margin-top: 25vh"></i>
    <div class="header" style="margin-top: 25vh">
        Vous avez été refusé
    </div>

    <div id="Message_refus_content">

    </div>

    <div class="actions">
        <div class="ui red approve button"><i class="trash alternate icon"></i> Fermer </div>
    </div>
</div>

<h1 class="title">Mes Candidatures</h1>

<div class="rowPerso">
    <table class="ui celled table">
        <thead>
        <tr>
            <th>Offre</th>
            <th>Note</th>
            <th>Réponse</th>
        </tr>
        </thead>
        <tbody id="bodyComp">




<?php if (!empty($listeOffres )){  foreach ($listeOffres as $offre){
    ?>

        <tr>
            <td colspan='1' style="cursor: pointer" <?php echo "onclick=\"window.location.href='?p=ctrlShowOffer&offerId=".$offre['id']."'\""; ?>>
                <?php echo $offre['title'];?>
            </td>
            <td colspan='1' style="cursor: pointer" <?php echo "onclick=\"window.location.href='vues/form_generate/ConsulterResultatQC.php?idOffre=".$offre['id']."&idCandidat=".$_SESSION['id']."'\""; ?>>
                <?php echo $offre['note'].' %';?>
            </td>
            <td colspan='1' style="text-align: center;">
                <?php
                if ($offre['accepted'] == 1){
                    echo "<button type=\"reset\" data-tooltip=\"Message d'acceptation\" onclick=\"showAcceptedMessage('".$offre['id']."')\" class=\"circular ui green icon button\">"; ?>

                        <i class="envelope icon"></i>
                    </button>
                <?php
                }
                elseif ($offre['accepted'] == ''){
                    echo "En Attente..";
                }
                else {
                    echo "<button type=\"reset\" data-tooltip=\"Message de refus\" onclick=\"showRefusedMessage('".$offre['id']."')\" class=\"circular ui red icon button \">"; ?>

                    <i class="envelope icon"></i>
                    </button>
                    <?php
                }
                ?>
            </td>
        </tr>

    <?php
}}
else{
    echo "<tr><td colspan='3' style='text-align: center'>Vous n'avez postulé à aucune offre pour le moment</td> </tr>";
}
?>
        </tbody>
    </table>
</div>
