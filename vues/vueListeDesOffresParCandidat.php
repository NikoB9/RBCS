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




<?php foreach ($listeOffres as $offre){
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
                    echo "Accepté(e)";
                }
                elseif ($offre['accepted'] == 0){
                    echo "Refusé(e)";
                }
                else {
                    echo "En Attente..";
                }
                ?>
            </td>
        </tr>

    <?php
}
?>
        </tbody>
    </table>
</div>
