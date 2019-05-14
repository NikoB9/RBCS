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

<h1 class="title">APPLICANTS</h1>

<div class="rowPerso">
    <table class="ui celled table">
        <thead>
        <tr>
            <th>Candidat</th>
            <th>Note</th>
            <th>Sélection</th>
        </tr>
        </thead>
        <tbody id="bodyComp">




<?php foreach ($lesCandidats as $candidat){
    ?>

        <tr>
            <td colspan='1' style="cursor: pointer" <?php echo "onclick=\"window.location.href='?p=ctrlShowUser&userId=".$candidat['id']."'\""; ?>>
                <?php echo $candidat['nom']." ".$candidat['prenom'];?>
            </td>
            <td colspan='1' style="cursor: pointer" <?php echo "onclick=\"window.location.href='vues/form_generate/ConsulterResultatQC.php?idOffre=".$_GET['offerId']."&idCandidat=".$candidat['id']."'\""; ?>>
                <?php echo $candidat['note'];?>
            </td>
            <td colspan='1' style="text-align: center;">
                <?php
                if ($candidat['accepted'] === 1){
                    echo "<i class=\"check icon\"></i>";
                }
                elseif ($candidat['accepted'] === 0){
                    echo "<i class=\"delete icon\"></i>";
                }
                else {
                    ?>
                    <button type='reset' data-tooltip="Accepter le candidat" onclick=""
                            class="circular ui green icon button ">
                        <i class="check icon"></i>
                    </button>
                    <button type='reset' data-tooltip="Refuser le candidat" onclick=""
                            class="circular ui red icon button ">
                        <i class="delete icon"></i>
                    </button>
                    <?php
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
