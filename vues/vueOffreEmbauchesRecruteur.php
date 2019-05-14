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

<h1 class="title">MY JOB OFFERS</h1>

<div class="rowPerso">
    <table class="ui celled table">
        <thead>
        <tr>
            <th>Titre (affichage de l'offre au clic)</th>
            <th>Edition</th>
        </tr>
        </thead>
        <tbody id="bodyComp">




<?php foreach ($lesOffres as $uneOffre){
    ?>

        <tr>
            <td colspan='1' style="cursor: pointer" <?php echo "onclick=\"window.location.href='?p=ctrlShowOffer&offerId=".$uneOffre['id']."'\""; ?>>
                <?php echo $uneOffre['titre'];?>
            </td>
            <td colspan='1' style="text-align: center;">
                <button type='reset' data-tooltip="Modifier l'offre" onclick="" class="circular ui blue icon button ">
                <i class="edit icon"></i>
                </button>
                <button type='reset' data-tooltip="Supprimer l'offre" onclick=""  class="circular ui red icon button ">
                    <i class="trash icon"></i>
                </button>
                <button type='reset' data-tooltip="Sélection des candidats" <?php echo "onclick=\"window.location.href='?p=ctrlApplicants&offerId=".$uneOffre['id']."'\""; ?>  class="circular ui green icon button ">
                    <i class="users icon"></i>
                </button>
            </td>
        </tr>

    <?php
}
?>
        </tbody>
    </table>
</div>
