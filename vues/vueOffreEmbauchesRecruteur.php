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
            <td colspan='1'>
                <div class="rowPerso">
                    <?php echo $uneOffre['titre'];?>
                </div>
            </td>
            <td colspan='1' style="text-align: center;">
                <button type='reset' data-tooltip="Visualiser le commentaire" onclick="commentaireControl('$row->id')" data-position="top right" class="circular ui icon button ">
                <i class="edit icon"></i>
                </button>
            </td>
        </tr>

    <?php
}
?>
        </tbody>
    </table>
</div>
