<?php
?>

<style>
    .colPerso{
        padding: calc(2vw - 7px);
    }
    .icon{
        opacity: 10;
        color: black;
        border-right: solid 0.5px rgba(0, 0, 0, 0.5);
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
</style>

$oneOffer['id'] = $idOffre;
$oneOffer['dateD'] = $offre->dateD;
$oneOffer['dateF'] = $offre->dateF;
$oneOffer['titre'] = $offre->title;
$oneOffer['resume'] = $offre->resume;
$oneOffer['description'] = $offre->resumeLong;
$oneOffer['couleurFond'] = $offre->backgroundColor;
$oneOffer['image'] = str_replace("imgages","images",$offre->resumePicture);
$oneOffer['recruteur'] = strtoupper($offre->nom)." ".$offre->prenom;
$oneOffer['chrono'] = $offre->chrono;
$oneOffer['acceptedUserMessage'] = $offre->acceptedUserMessage;
$oneOffer['refusedUserMessage'] = $offre->refusedUserMessage;
$oneOffer['address'] = $offre->address;
$oneOffer['pin_code'] = $offre->pin_code;
$oneOffer['city'] = $offre->City;

<h1 class="title">JOB OFFER N°<?php echo $offre['id'] ?> : <?php echo $offre['titre'] ?></h1>

<div class="rowPerso">
    <div class="card" id="cardForm">
        <div class="card-header">
            <h3 class="title">Offre valable du <?php echo $offre['dateD'] ?> au <?php echo $offre['dateF'] ?></h3>
        </div>
        <div class="card-body">

                    <fieldset style="border: solid 2px #43687e;padding: 10px;">
                        <legend style="text-align: center"><i class="briefcase icon" style="border: none;color: #43687e"></i>Informations générales</legend>

                        <div class="colPersoInput">
                            <label for="title">Titre : </label>
                            <div class="ui left icon input" style="border-radius: 10px;">
                                <i class="user icon"></i>
                                <input id="title" style="background-color:rgba(12, 84, 96, 0.47);" type="text" name="title" class="form-control" value="">
                            </div>
                        </div>

                        <div class="colPersoInput">
                            <label for="backgoundColor">Couleur de l'annonce : </label>
                            <div class="ui left icon input" style="border-radius: 10px;">
                                <i class="tint icon"></i>
                                <input style="background-color:rgba(12, 84, 96, 0.47);" id="backgoundColor" type="color" value="#fad345" name="backgoundColor" class="form-control">
                            </div>
                        </div>

                        <div class="colPersoInput">
                            <label>Début de l'offre : </label>

                            <div class="ui left icon input" style="border-radius: 10px;">
                                <i class="calendar icon"></i>
                                <input style="background-color:rgba(12, 84, 96, 0.47);text-align: center;z-index: 10!important;" type="text" id="datepickerDebut" name="beginningDate"
                                       value="<?php $date = date("d/m/Y") ; echo $date?>"
                                       class="form-control">
                            </div>
                        </div>

                        <div class="colPersoInput">
                            <label>Fin de l'offre : </label>

                            <div class="ui left icon input" style="border-radius: 10px;">
                                <i class="calendar icon"></i>
                                <input style="background-color:rgba(12, 84, 96, 0.47);text-align: center;z-index: 8!important;" type="text" id="datepickerFin" name="closingDate"
                                       value="<?php $date = date("d/m/Y") ; echo $date?>"
                                       class="form-control">
                            </div>
                        </div>

                        <div class="colPersoInput">
                            <label>Description complète : </label>

                            <div class="ui left icon input" style="border-radius: 10px;">
                                <i class="address book icon"></i>
                                <textarea style="background-color:rgba(12, 84, 96, 0.47);padding-left: 43px" rows="5" name="resumeLong" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="colPersoInput">
                            <label>Résumé à afficher : </label>

                            <div class="ui left icon input" style="border-radius: 10px;">
                                <i class="address book icon"></i>
                                <textarea style="background-color:rgba(12, 84, 96, 0.47);padding-left: 43px" rows="5" name="resume" class="form-control"></textarea>
                            </div>
                        </div>

                    </fieldset>




        </div>
        <div class="card-footer">
            <div class="colPerso">
                <button type="submit" class="btn btn-success">Participer au test</button>
            </div>
        </div>
    </div>
</div>
