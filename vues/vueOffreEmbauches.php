<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 18/12/18
 * Time: 08:39
 */
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
</style>

<h1 class="title">JOB OFFERS</h1>

<?php foreach ($lesOffres as $uneOffre){
?>
    <div class="rowPerso">
        <div class="card" id="cardForm" style="background: <?php echo $uneOffre['couleurFond'] ?>;opacity: 1;">
            <div class="card-header">
                <?php echo $uneOffre['titre'] ?>
            </div>
            <div class="card-body">
                <!--<b><u>Offre</u> :</b>-->

                <div class="rowPerso">
                    <div class="colPerso">
                        <img class="imgPres" src="<?php echo $uneOffre['image'] ?>" alt="aucune photo de présentation">
                    </div>
                    <div class="colPerso" style="margin-left: 2vw;">
                        <?php echo $uneOffre['resume'] ?>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                Offre valable du <?php echo $uneOffre['dateD'] ?> au <?php echo $uneOffre['dateF'] ?>
                Recruteur : <?php echo $uneOffre['recruteur'] ?>
            </div>
        </div>
    </div>
<?php
}
