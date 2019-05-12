<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 11/05/19
 * Time: 16:00
 */
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
    th{
        text-align: center !important;
        background: rgba(12, 84, 96, 0.47) !important;
        color: #1E4C67 !important;
    }
    table{
        border: #1E4C67 solid 2px !important;
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
    #conteneurImg{
        max-width:230px;
        width:100%;
        height:calc(100% - 50px);
        border-radius: 20px;
        border: solid 2px #1E4C67;
        min-height: 160px;
        margin-bottom: 12px;
    }
    #ui-datepicker-div{
        z-index: 10!important;
    }
</style>


<form action="" method="post" id="formSignUpComplete" enctype="multipart/form-data" >
    <div class="rowPerso">
        <div class="card" id="cardForm">
            <div class="card-header">
                <h1 class="title">JOB OFFER FORM</h1>
            </div>
            <div class="card-body">
                <?php
                if($user['recruteur'] == 1){
                ?>

                <div class="alert alert-warning" role="alert">
                    <h4 class="alert-heading">Attention!</h4>
                    <p>Une fois enregistrer le formulaire ne peut être modifié.</p>
                </div>


                <div id="alertDescriptiveImg">
                </div>
                <div id="alertChrono">
                </div>


                <input type="hidden" name="addOffer">

                <div class="rowPerso">

                    <div class="colPerso" style="width: 50%;">

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

                        <fieldset style="border: solid 2px #43687e;padding: 10px;">
                            <legend style="text-align: center"><i class="building vial" style="border: none;color: #43687e"></i>Formulaire de test</legend>


                            <div class="rowPerso" style="margin-top: -35px;">

                                <div class="colPerso" style="width: 100%;">

                                    <div class="colPersoInput">
                                        <label>Temps maximal (en secondes) : </label>

                                        <div class="ui left icon input" style="border-radius: 10px;">
                                            <i class="clock icon"></i>
                                            <input style="background-color:rgba(12, 84, 96, 0.47);" type="text" name="chrono" class="form-control" value="">
                                        </div>
                                    </div>

                                </div>

                                <div class="colPerso" style="margin-top: 20px">

                                    <button type="button" class="btn btn-info"><strong>Créer un test</strong></button>

                                </div>

                            </div>


                        </fieldset>


                    </div>
                    <div class="colPerso" style="width: 50%">
                        <div class="" style="text-align: center">
                            <input id="file" class="inputfile" data-tooltip="(jpg/jpeg, png, gif, svg)" style="padding-left: 10px;border: inherit;" type="file" name="resumePicture" onchange="readURL(this)">
                            <label for="file" data-tooltip="(jpg/jpeg, png, gif, svg)">
                                <strong>
                                    <i style="border: none;
                                    padding: 2px;
                                    margin-right: 10px;
                                    margin-left: 5px;color: beige;" class="download icon"></i>
                                    Photo descriptive (8380Ko/8Mo max)
                                </strong>
                            </label>

                            <div class="rowPerso">
                                <div id="conteneurImg">
                                    <div class="rowPerso">
                                        <div class="colPerso">
                                            <img style="max-width:210px;max-height: 130px" id="blah" alt="Aperçu de l'image" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <fieldset style="border: solid 2px #43687e;padding: 10px;">
                            <legend style="text-align: center"><i class="bullhorn icon" style="border: none;color: #43687e"></i>Communication</legend>


                            <div class="colPersoInput">
                                <label>Message pour les profils acceptés : </label>

                                <div class="ui left icon input" style="border-radius: 10px;">
                                    <i class="envelope icon"></i>
                                    <textarea style="background-color:rgba(12, 84, 96, 0.47);padding-left: 43px" rows="5" name="profilAccepted" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="colPersoInput">
                                <label>Message pour les profils refusés : </label>

                                <div class="ui left icon input" style="border-radius: 10px;">
                                    <i class="envelope icon"></i>
                                    <textarea style="background-color:rgba(12, 84, 96, 0.47);padding-left: 43px" rows="5" name="profilRefused" class="form-control"></textarea>
                                </div>
                            </div>

                        </fieldset>

                        <fieldset style="border: solid 2px #43687e;padding: 10px;">
                            <legend style="text-align: center"><i class="building icon" style="border: none;color: #43687e"></i>Localisation du poste</legend>


                            <div class="rowPerso" style="margin-top: -35px;">

                                <div class="colPerso" style="width: 100%;">

                                    <div class="colPersoInput">
                                        <label>Adresse : </label>

                                        <div class="ui left icon input" style="border-radius: 10px;">
                                            <i class="street view icon"></i>
                                            <input style="background-color:rgba(12, 84, 96, 0.47);" type="text" name="adresse" class="form-control" value="">
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="rowPerso" style="margin-top: -35px;">

                                <div class="colPerso">

                                    <label>Code Postal : </label>
                                    <div class="ui left icon input" style="border-radius: 10px;">
                                        <i class="compass icon"></i>
                                        <input style="background-color:rgba(12, 84, 96, 0.47);" type="text" name="code_postal" class="form-control" value="">
                                    </div>

                                </div>

                                <div class="colPerso">

                                    <label>Ville : </label>
                                    <div class="ui left icon input" style="border-radius: 10px;">
                                        <i class="map marker icon"></i>
                                        <input style="background-color:rgba(12, 84, 96, 0.47);" type="text" name="ville" class="form-control" value="">
                                    </div>

                                </div>

                            </div>


                        </fieldset>
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <div class="colPerso">
                    <button type="submit" class="btn btn-success">Enregister</button>
                    <button type="reset" class="btn btn-danger">Annuler</button>
                </div>
            </div>

            <?php
            }
            else{

                echo "
                <div class=\"alert alert-danger\" role=\"alert\">
                    <h4 class=\"alert-heading\">Hum Hum !</h4>
                    <p>Vous n'êtes pas autorisé à utiliser cette fonctionnalité.</p>
                    <hr>
                    <p class=\"mb-0\">Nous nous réservons le droit de vous bannir en cas de récidive.</p>
                </div>";
                //FERMETURE BODY ET FOOTER VIDE
                echo "</div>
                <div class=\"card-footer\"></div>";

            }
            ?>
        </div>
    </div>
</form>
