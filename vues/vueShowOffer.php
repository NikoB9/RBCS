<?php
?>

<style>
    .colPerso{
        padding: calc(2vw - 7px);
    }
    #btnAddSkill{
        border: 2px solid;
        border: 2px solid;
        font-size: 50px;
        color: #1E4C67;
        border-radius: 30px;
        padding-bottom: 67px;
        padding-left: 24px;
        padding-right: 60px;
        background: rgba(12, 84, 96, 0.47);
    }
    #btnAddSkill:hover{
        cursor: pointer;
        color: rgba(255, 254, 255, 1) !important;
        background: #1E4C67;
    }
    .colPersoInput{
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
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
    #imgFieldset{
        max-width: 150px;
        max-height: 150px;
    }
</style>


<h1 class="title">JOB OFFER N°<?php echo $offre['id'] ?> : <?php echo $offre['titre'] ?></h1>

<div class="rowPerso">
    <div class="card" id="cardForm">
        <div class="card-header">
            <h3 class="title">Offre valable du <?php echo $offre['dateD'] ?> au <?php echo $offre['dateF'] ?></h3>
        </div>
        <div class="card-body" style="background-color: <?php echo $offre['couleurFond']; ?>">

            <fieldset style="border: solid 2px #43687e;padding: 10px;">
                <legend style="text-align: center"><?php
                    $legend = ($offre['image'] != '') ? "<img id=\"imgFieldset\" src=\"".$offre['image']."\">" : "<i class=\"briefcase icon\" style=\"border: none;color: #43687e\"></i>Informations générales";
                    echo $legend;?></legend>

                <div class="colPersoInput">
                    <p>
                        <?php
                        echo nl2br($offre['description']);
                        ?>
                    </p>
                </div>

                <br>

                <div class="colPersoInput">

                    <p>
                        <?php
                        echo "Recruteur : ".$offre['recruteur'];
                        ?>
                    </p>

                    <p>
                        <?php
                        echo "Contact : ".$offre['email'];
                        ?>
                    </p>
                </div>

            </fieldset>



            <fieldset style="border: solid 2px #43687e;padding: 10px;">
                <legend style="text-align: center"><i class="building icon" style="border: none;color: #43687e"></i>Localisation du poste</legend>

                <div class="colPersoInput">

                    <p>
                        <?php
                        echo "<i class=\"street view icon\"></i>&nbsp;".$offre['address'];
                        ?>
                    </p>

                    <p>
                        <?php
                        echo "<i class=\"compass icon\"></i></i>&nbsp;".$offre['pin_code'];
                        ?>
                    </p>
                    <p>
                        <?php
                        echo "<i class=\"map marker icon\"></i>&nbsp;".$offre['city'];
                        ?>
                    </p>
                </div>

            </fieldset>


        </div>
        <div class="card-footer">
            <div class="colPerso">
                <button type="submit" class="btn btn-success" onclick="window.location.href = '?p=ctrlTest&offerId=<?php echo $offre['id'] ?>'">Participer au test</button>
            </div>
        </div>
    </div>
</div>
