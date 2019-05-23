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
</style>


<form action="" method="post" id="formSignUpComplete" enctype="multipart/form-data" >
    <div class="rowPerso">
        <div class="card" id="cardForm">
            <div class="card-header">
                <h1 class="title">SIGN UP FORM</h1>
            </div>
            <div class="card-body">

                <div id="alertOldPassword">
                </div>
                <div id="alertSecondPassword">
                </div>


                <input type="hidden" name="userPwd">

                <div class="rowPerso">

                    <div class="colPerso" style="width: 50%;">

                        <fieldset style="border: solid 2px #43687e;padding: 10px;">
                            <div class="colPersoInput">
                                <label for="oldPwd">Ancien mot de passe : </label>
                                <div class="ui left icon input" style="border-radius: 10px;">
                                    <i class="lock icon"></i>
                                    <input id="oldPwd" style="background-color:rgba(12, 84, 96, 0.47);" type="password" name="oldPwd" class="form-control">
                                </div>
                            </div>

                            <div class="colPersoInput">
                                <label for="newPwd">Nouveau mot de passe : </label>
                                <div class="ui left icon input" style="border-radius: 10px;">
                                    <i class="lock icon"></i>
                                    <input id="newPwd" style="background-color:rgba(12, 84, 96, 0.47);" type="password" name="newPwd" class="form-control">
                                </div>
                            </div>

                            <div class="colPersoInput">
                                <label for="newPwdVerif">Répétez le nouveau mot de passe : </label>
                                <div class="ui left icon input" style="border-radius: 10px;">
                                    <i class="lock icon"></i>
                                    <input id="newPwdVerif" style="background-color:rgba(12, 84, 96, 0.47);" type="password" name="newPwdVerif" class="form-control">
                                </div>
                            </div>

                    </div>

                </div>

            </div>
            <div class="card-footer">
                <div class="colPerso">
                    <button type="submit" class="btn btn-success">Enregister</button>
                    <button type="reset" class="btn btn-danger">Annuler</button>
                </div>
            </div>
        </div>
    </div>
</form>
