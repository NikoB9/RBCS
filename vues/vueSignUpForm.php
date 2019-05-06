<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 11/12/18
 * Time: 08:12
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
</style>

<?php
if (isset($extIncorrect) && $extIncorrect == true){
    echo '
    <div class="row" style="display: flex;flex-direction: row;justify-content: center;">
        <div class="row" style="width: 50%; background: red !important;color: white; font-size: xx-large;border-radius: 20px;text-align: center;padding: 20px">
            <p style="text-align: center">
                L\'extension de la photo de profil est incorrecte.
            </p>
            <p style="text-align: center">
                Les extensions acceptées sont les fichiers jpg/jpeg, png, gif et svg.
            </p>
        </div>
    </div>
    ';

    $extIncorrect = false;
}

if (isset($extIncorrectSkill) && $extIncorrectSkill == true){
    echo '
    <div class="row" style="display: flex;flex-direction: row;justify-content: center;">
        <div class="row" style="width: 50%; background: red !important;color: white; font-size: xx-large;border-radius: 20px;text-align: center;padding: 20px">
            <p style="text-align: center">
                L\'extension de la certification est incorrecte.
            </p>
            <p style="text-align: center">
                La seule extension acceptée est le type PDF.
            </p>
        </div>
    </div>
    ';

    $extIncorrectSkill = false;
}

?>


<form action="" method="post" id="formSignUpComplete" enctype="multipart/form-data" >
    <div class="rowPerso">
        <div class="card" id="cardForm">
            <div class="card-header">
                <h1 class="title">SIGN UP FORM</h1>
            </div>
            <div class="card-body">

                <div class="rowPerso">
                    <div class="colPerso" style="width: 50%;">

                        <fieldset style="border: solid 2px #43687e;display: grid;padding: 10px;">
                            <legend style="text-align: center"><i class="user icon" style="border: none;color: #43687e"></i>Informations personnelles</legend>

                            <label>Prénom : </label>
                            <div class="ui left icon input" style="border-radius: 10px;">
                                <i class="user icon"></i>
                                <input style="background-color:rgba(12, 84, 96, 0.47);" type="text" name="prenom" class="form-control">
                            </div>
                            <label>Nom : </label>
                            <div class="ui left icon input" style="border-radius: 10px;">
                                    <i class="user icon"></i>
                                <input style="background-color:rgba(12, 84, 96, 0.47);" type="text" name="nom" class="form-control">
                            </div>
                            <label>Pseudo : </label>
                            <div class="ui left icon input" style="border-radius: 10px;">
                                        <i class="user icon"></i>
                                <input style="background-color:rgba(12, 84, 96, 0.47);" type="text" name="pseudo" class="form-control">
                            </div>


                            <label>Date de naissance : </label>

                            <div class="ui left icon input" style="border-radius: 10px;">
                                <i class="calendar icon"></i>
                                <input style="background-color:rgba(12, 84, 96, 0.47);text-align: center;z-index: 10" type="text" id="datepickerAnniv" name="anniv" value="<?php echo date("d/m/Y"); ?>" class="form-control">
                                <input style="display: none" type="text" id="datepickerInutile" >
                            </div>

                            <label>Description : </label>

                            <div class="ui left icon input" style="border-radius: 10px;">
                                <i class="address book icon"></i>
                                <textarea style="background-color:rgba(12, 84, 96, 0.47);padding-left: 43px" rows="5" name="description" class="form-control"></textarea>
                            </div>

                        </fieldset>

                        <fieldset style="border: solid 2px #43687e;display: grid;padding: 10px;">
                            <legend style="text-align: center"><i class="archive icon" style="border: none;color: #43687e"></i>Compétences</legend>

                            <div class="colPerso">
                                <table class="ui celled table">
                                    <thead>
                                    <tr>
                                        <th>Compétence</th>
                                        <th>Niveau</th>
                                        <th>Certification</th>
                                    </tr>
                                    </thead>
                                    <tbody id="bodyComp">

                                    <?php

                                    for($i = 0; $i < 50; $i++){
                                        echo "
                                    <tr id=\"rowSkill".$i."\" style='display:none;'>
                                        <td colspan='1'>
                                            <input id=\"libelleSkill".$i."\" type=\"text\" class=\"form-control\">
                                        </td>
                                        <td colspan='1'>
                                            <input id=\"noteSkill".$i."\" type=\"submit\">
                                        </td>
                                        <td colspan='1'>
                                            <input id=\"certifSkill".$i."\" class=\"inputfile\" data-tooltip=\"(pdf)\" style=\"padding-left: 10px;border: inherit;\" type=\"file\" name=\"pjSkill".$i."\">
                                            <label for=\"certifSkill".$i."\" data-tooltip=\"(pdf)\">
                                                <strong>
                                                    <i style=\"border: none;
                                                    padding: 2px;
                                                    margin-right: 10px;
                                                    margin-left: 5px;color: beige;\" class=\"download icon\"></i>
                                                    Pièce officielle (PDF)
                                                </strong>
                                            </label>
                                        </td>
                                    </tr>
                                    ";
                                    }

                                    ?>
                                    <tr>
                                        <td colspan="3" style=";">
                                            <div class="rowPerso">
                                                <?php
                                                include "modele/modele.php";
                                                include "modele/fonctions.php";
                                                //echo '<i class="plus icon" id="btnAddSkill" onclick="addAnAttributeSkill('.nbSkill($bdd,$_SESSION['user']).')"></i>'; ?>
                                                <i class="plus icon" id="btnAddSkill" onclick="addAnAttributeSkill(0)"></i>
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>


                        </fieldset>


                    </div>
                    <div class="colPerso" style="width: 50%">
                        <div class="" style="text-align: center">
                            <input id="file" class="inputfile" data-tooltip="(jpg/jpeg, png, gif, svg)" style="padding-left: 10px;border: inherit;" type="file" name="pj" onchange="readURL(this)">
                            <label for="file" data-tooltip="(jpg/jpeg, png, gif, svg)">
                                <strong>
                                    <i style="border: none;
                                    padding: 2px;
                                    margin-right: 10px;
                                    margin-left: 5px;color: beige;" class="download icon"></i>
                                    Photo de profil (8380Ko/8Mo max)
                                </strong>
                            </label>

                            <div class="rowPerso">
                                <div style="max-width:230px;width:100%;height:calc(100% - 50px);border-radius: 20px;border: solid 2px #1E4C67;min-height: 160px;margin-bottom: 12px;">
                                    <div class="rowPerso">
                                        <div class="colPerso">
                                            <img style="max-width:210px;max-height: 130px" id="blah" alt="Aperçu de l'image" />
                                        </div>
                                    </div>
                                </div>
                                <div class="checkVisible">

                                    <input type="checkbox" value="F" id="checkVisible" name="checkVisible" onclick="displayOrganisation()">
                                    <label for="checkVisible"></label>

                                </div>
                            </div>

                        </div>

                        <fieldset style="border: solid 2px #43687e;display: grid;padding: 10px;">
                            <legend style="text-align: center"><i class="bullhorn icon" style="border: none;color: #43687e"></i>Communication</legend>


                            <label id="labelOrg">Entreprise : </label>
                            <div id="org" class="ui left icon input" style="border-radius: 10px;">
                                <i class="building icon"></i>
                                <input style="background-color:rgba(12, 84, 96, 0.47);" type="text" name="entreprise" class="form-control">
                            </div>

                            <label>Adresse e-mail : </label>
                            <div class="ui left icon input" style="border-radius: 10px;">
                                <i class="mail icon"></i>
                                <input style="background-color:rgba(12, 84, 96, 0.47);" type="text" name="email" class="form-control">
                            </div>

                            <label>Téléphone (fixe) : </label>
                            <div class="ui left icon input" style="border-radius: 10px;">
                                <i class="tty icon"></i>
                                <input style="background-color:rgba(12, 84, 96, 0.47);" type="text" name="email" class="form-control">
                            </div>

                            <label>Téléphone (mobile) : </label>
                            <div class="ui left icon input" style="border-radius: 10px;">
                                <i class="mobile icon"></i>
                                <input style="background-color:rgba(12, 84, 96, 0.47);" type="text" name="email" class="form-control">
                            </div>

                        </fieldset>

                        <fieldset style="border: solid 2px #43687e;display: grid;padding: 10px;">
                            <legend style="text-align: center"><i class="home icon" style="border: none;color: #43687e"></i>Localisation</legend>


                            <div class="rowPerso" style="margin-top: -35px;">

                                <div class="colPerso" style="width: 100%;">

                                    <label>Adresse : </label>

                                    <div class="ui left icon input" style="border-radius: 10px;">
                                        <i class="street view icon"></i>
                                        <input style="background-color:rgba(12, 84, 96, 0.47);" type="text" name="adresse" class="form-control">
                                    </div>

                                </div>

                            </div>
                            <div class="rowPerso" style="margin-top: -35px;">

                                <div class="colPerso">

                                    <label>Code Postal : </label>
                                    <div class="ui left icon input" style="border-radius: 10px;">
                                        <i class="compass icon"></i>
                                        <input style="background-color:rgba(12, 84, 96, 0.47);" type="text" name="cp" class="form-control">
                                    </div>

                                </div>

                                <div class="colPerso">

                                    <label>Ville : </label>
                                    <div class="ui left icon input" style="border-radius: 10px;">
                                        <i class="map marker icon"></i>
                                        <input style="background-color:rgba(12, 84, 96, 0.47);" type="text" name="ville" class="form-control">
                                    </div>

                                </div>

                            </div>


                        </fieldset>
                    </div>
                </div>

            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
</form>