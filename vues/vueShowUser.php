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
    .colPersoInput{
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    #imgPro{
        max-width:210px;
        max-height: 130px;
        border-radius: 10px;
        border: 1px solid blue;
    }
</style>


<form action="" method="post" id="formSignUpComplete" enctype="multipart/form-data" >

    <div class="rowPerso">
        <?php if (file_exists($userToShow['profilePic'])){
            echo '<img id="imgPro" src="'.$userToShow['profilePic'].'" alt="Photo non disponible" />';
        }
        else{
            echo '<img id="imgPro" src="assets/img/userIcon.png" alt="Photo non disponible" />';
        } ?>
    </div>

    <br>


    <div class="rowPerso">


        <div class="card" id="cardForm">
            <div class="card-header">
                <h1 class="title"><?php echo $userToShow['nom']." ".$userToShow['prenom'] ?></h1>
            </div>
            <div class="card-body">


                <input type="hidden" name="userInfos">

                <div class="rowPerso">

                    <div class="colPerso" style="width: 50%;">

                        <fieldset style="border: solid 2px #43687e;padding: 10px;">
                            <legend style="text-align: center"><i class="user icon" style="border: none;color: #43687e"></i>Informations personnelles</legend>

                            <div class="colPersoInput">
                                <label for="pseudo">Pseudo : </label>
                                <div class="ui left icon input" style="border-radius: 10px;">
                                    <i class="user icon"></i>
                                    <input id="pseudo" style="background-color:rgba(12, 84, 96, 0.47);"  disabled="true" type="text" name="pseudo" class="form-control" value="<?php echo $userToShow["pseudo"] ?>">
                                </div>
                            </div>

                            <div class="colPersoInput">
                                <label>Date de naissance : </label>

                                <div class="ui left icon input" style="border-radius: 10px;">
                                    <i class="calendar icon"></i>
                                    <input style="background-color:rgba(12, 84, 96, 0.47);text-align: center;z-index: 10" type="text" id="" name="naissance"
                                           value="<?php $date = ($userToShow["naissance"] == '') ? "Non ajoutée" : $userToShow["naissance"]; echo $date?>"
                                           class="form-control" disabled="true">
                                </div>
                            </div>

                            <div class="colPersoInput">
                                <label>Description : </label>

                                <p>
                                    <?php echo nl2br($userToShow["description"]) ?></textarea>
                                </p>
                            </div>

                        </fieldset>

                        <fieldset style="border: solid 2px #43687e;padding: 10px;">
                            <legend style="text-align: center"><i class="archive icon" style="border: none;color: #43687e"></i>Compétences</legend>

                            <div class="colPerso">
                                <?php if(!file_exists($userToShow["cv"])){?>

                                    <p>
                                        Le candidat n'a pas ajouté de Curriculum vitae
                                    </p>

                                <?php }else{
                                    //$nomCv = explode ( "/" , $userToShow["cv"] );
                                    echo "<a href='".$userToShow["cv"]."' target='_blank' <button type=\"button\" class=\"btn btn-info\"><i style=\"border: none;
                                                        padding: 2px;
                                                        margin-right: 10px;
                                                        margin-left: 5px;color: cornflowerblue;\" class=\"download icon\"></i>".substr(strrchr($userToShow["cv"], '/'),1)."</button></a>"; ?>

                                <?php } ?>
                            </div>


                        </fieldset>


                        <fieldset style="border: solid 2px #43687e;padding: 10px;">
                            <legend style="text-align: center"><i class="bullhorn icon" style="border: none;color: #43687e"></i>Communication</legend>


                            <?php if ($userToShow['recruteur']){
                                echo '
                            <div class="colPersoInput">
                            <label id="labelOrg">Entreprise : </label>
                            <div id="org" class="ui left icon input" style="border-radius: 10px;">
                                <i class="building icon"></i>
                                <input disabled="true" style="background-color:rgba(12, 84, 96, 0.47);" type="text" name="entreprise" class="form-control" value="'.$userToShow['entreprise'].'">
                            </div>
                            </div>';
                            }
                            else{
                                echo '<label id="labelOrg" style="display: none">Entreprise : </label>
                            <div id="org" class="ui left icon input" style="border-radius: 10px;display: none">
                                <i class="building icon"></i>
                                <input disabled="true" style="background-color:rgba(12, 84, 96, 0.47);" type="text" name="entreprise" class="form-control" value="'.$userToShow['entreprise'].'">
                            </div>';
                            }?>

                            <div class="colPersoInput">
                                <label>Adresse e-mail : </label>
                                <div class="ui left icon input" style="border-radius: 10px;">
                                    <i class="mail icon"></i>
                                    <input disabled="true" style="background-color:rgba(12, 84, 96, 0.47);" type="text" name="mail" class="form-control" value="<?php echo $userToShow['mail'] ?>">
                                </div>
                            </div>

                            <div class="colPersoInput">
                                <label>Téléphone (fixe) : </label>
                                <div class="ui left icon input" style="border-radius: 10px;">
                                    <i class="tty icon"></i>
                                    <input disabled="true" style="background-color:rgba(12, 84, 96, 0.47);" type="text" name="telFix" class="form-control" value="<?php echo $userToShow['telFix'] ?>">
                                </div>
                            </div>

                            <div class="colPersoInput">
                                <label>Téléphone (mobile) : </label>
                                <div class="ui left icon input" style="border-radius: 10px;">
                                    <i class="mobile icon"></i>
                                    <input disabled="true" style="background-color:rgba(12, 84, 96, 0.47);" type="text" name="tel" class="form-control" value="<?php echo $userToShow['tel'] ?>">
                                </div>
                            </div>

                        </fieldset>

                        <fieldset style="border: solid 2px #43687e;padding: 10px;">
                            <legend style="text-align: center"><i class="home icon" style="border: none;color: #43687e"></i>Localisation</legend>


                            <div class="rowPerso" style="margin-top: -35px;">

                                <div class="colPerso" style="width: 100%;">

                                    <div class="colPersoInput">
                                        <label>Adresse : </label>

                                        <div class="ui left icon input" style="border-radius: 10px;">
                                            <i class="street view icon"></i>
                                            <input disabled="true" style="background-color:rgba(12, 84, 96, 0.47);" type="text" name="adresse" class="form-control" value="<?php echo $userToShow['adresse'] ?>">
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="rowPerso" style="margin-top: -35px;">

                                <div class="colPerso">

                                    <label>Code Postal : </label>
                                    <div class="ui left icon input" style="border-radius: 10px;">
                                        <i class="compass icon"></i>
                                        <input disabled="true" style="background-color:rgba(12, 84, 96, 0.47);" type="text" name="code_postal" class="form-control" value="<?php echo $userToShow['code_postal'] ?>">
                                    </div>

                                </div>

                                <div class="colPerso">

                                    <label>Ville : </label>
                                    <div class="ui left icon input" style="border-radius: 10px;">
                                        <i class="map marker icon"></i>
                                        <input disabled="true" style="background-color:rgba(12, 84, 96, 0.47);" type="text" name="ville" class="form-control" value="<?php echo $userToShow['ville'] ?>">
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
