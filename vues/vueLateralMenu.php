<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 11/05/19
 * Time: 13:34
 */
?>
<style>

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

            <a href="">
                <div class="card perso">
                    <div class="card-body">
                        <img src="assets/img/pin-code.svg" width="40px" height="40px">
                    </div>
                    <div class="card-footer">
                        Mot de passe
                    </div>
                </div>
            </a>

        </div>

        <div class="rowPerso menuL">

            <a href="?p=ctrlOffreEmbauches">
                <div class="card perso">

                    <div class="card-body">
                        <img src="assets/img/online-job-search-symbol.svg" width="40px" height="40px">
                    </div>
                    <div class="card-footer">
                        Postuler
                    </div>
                </div>
            </a>

            <a href="?p=ctrlListeDesOffresParCandidat">
                <div class="card perso">
                    <div class="card-body">
                        <img src="assets/img/job-search-symbol-with-a-man-and-bars-graphic.svg" width="40px" height="40px">
                    </div>
                    <div class="card-footer">
                        Candidatures
                    </div>
                </div>
            </a>

        </div>

        <?php
        if($user['recruteur'] == 1) {
            ?>

            <div class="rowPerso menuL">

                <a href="?p=ctrlListeDesOffresParRecruteur">
                    <div class="card perso">

                        <div class="card-body">
                            <img src="assets/img/list-with-possible-workers-to-choose.svg" width="40px" height="40px">
                        </div>
                        <div class="card-footer">
                            Mes annonces
                        </div>
                    </div>
                </a>

                <a href="?p=ctrlAddJobOffer">
                    <div class="card perso">
                        <div class="card-body">
                            <img src="assets/img/applicants.svg" width="40px" height="40px">
                        </div>
                        <div class="card-footer">
                            Nouvelle offre
                        </div>
                    </div>
                </a>

            </div>

            <?php
        } else {
         ?>
            <div class="rowPerso menuL">

                <a>

                    <div class="card perso" style="background-color: red;opacity: 0.50;cursor: not-allowed;color: white">

                        <div class="card-body">
                            <img src="assets/img/list-with-possible-workers-to-choose.svg" width="40px" height="40px">
                        </div>
                        <div class="card-footer">
                            Mes annonces
                        </div>
                    </div>

                </a>
                <a>

                    <div class="card perso" style="background-color: red;opacity: 0.50;cursor: not-allowed;color: white">
                        <div class="card-body">
                            <img src="assets/img/applicants.svg" width="40px" height="40px">
                        </div>
                        <div class="card-footer">
                            Nouvelle offre
                        </div>
                    </div>

                </a>

            </div>
        <?php
        }
        ?>


        <br>

        <div class="rowPerso">

        </div>

    </div>
</div>