<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 11/05/19
 * Time: 13:34
 */
?>
<style>
    #lateralMenu{
        position: fixed;
        top: 0;
        left: 0;
        width: 200px;
        height: 75vh;
        background: #1E4C67;
        z-index: 10;
        margin-top: 15vh;
        margin-bottom: 10vh;
        background: linear-gradient(to right, rgba(255,255,255,0) 30%, rgba(255,255,255,1) 100% ), url("assets/img/fond1.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        display: none;
        overflow: auto;
    }

    .card.perso{
        margin-bottom: 10px;
        margin-right: 20px;
        margin-left: 0;
        z-index: 18;
        width: 70px !important;
    }

    .rowPerso.menuL .card.perso .card-body{
        padding: 0;
        padding-top: 5px;
        padding-bottom: 5px;
        text-align: center;
    }

    .rowPerso.menuL .card.perso .card-footer{
        padding: 0;
        text-align: center;
    }

    .colPerso{
        padding: calc(2vw - 7px);
    }

</style>

<div id="lateralMenu">
    <div class="colPerso menuL">

        <div class="rowPerso menuL">

            <a href="?p=ctrlSignUpForm">
                <div class="card perso">

                    <div class="card-body">
                        <img src="assets/img/resume.svg" width="40px" height="40px">
                    </div>
                    <div class="card-footer">
                        Profil
                    </div>
                </div>
            </a>

            <a href="?p=ctrlOffreEmbauches">
                <div class="card perso">
                    <div class="card-body">
                        <img src="assets/img/postulant.jpeg" width="40px" height="40px">
                    </div>
                    <div class="card-footer">
                        Offres
                    </div>
                </div>
            </a>

        </div>

        <br>

        <div class="rowPerso">

        </div>

    </div>
</div>