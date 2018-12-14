<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 11/12/18
 * Time: 08:12
 */
?>
<style>
    img.imgFond {
        position:fixed;
        top:0;
        left:0;
        z-index:-1;

        /*-webkit-filter: blur(5px);
        -moz-filter: blur(5px);
        -o-filter: blur(5px);
        -ms-filter: blur(5px);
        filter: blur(5px);*/
    }
    #triangle-bottomright {
        width: 1500px;
        height: 0;
        /*border-bottom: 350px solid #384c7e;*/
        border-bottom: 350px solid #384c7e;
        border-left: 1300px solid transparent;
        position: fixed;
        bottom: 0;
        right: 0;
        opacity: 0.2;
    }
    #triangle-topright {
        width: 1500px;
        position: fixed;
        top: 0;
        right: 0;
        height: 0;
        /*border-top: 420px solid #384c7e;*/
        border-top: 420px solid #384c7e;
        border-left: 1300px solid transparent;
        opacity: 0.2;
    }
    #contentDeveloppeuse{
        right: 15px;
        position: absolute;
        display: flex;
        flex-direction: column;
        justify-content: center;
        height: 100%;
        top: 0;
    }
    #developpeuse{
        width: 150px;
        height: 125px;
    }
    #infos{
        position: absolute;
        width: 300px;
        left: 5vw;
        background: rgba(12, 84, 96, 0.47);
        color: White;
        font-size: x-large;
        font-weight: bold;
        text-align: center;
        top: 5vw;
    }
    .rowPerso{
        display: flex;
        flex-direction: row;
        justify-content: center;
    }
    .colPerso{
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    #englishNews{
        display: none;
    }
</style>

<img src="assets/img/analytics-3088958_960_720.jpg" class="imgFond" />
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/background.js" type="text/javascript"></script>

<div id="triangle-bottomright"></div>
<div id="triangle-topright"></div>

<div id="contentDeveloppeuse">
    <img src="assets/img/2000px-201706_PC_silhouette.svg.png" id="developpeuse">
</div>


<div class="card" id="infos">
    <div class="card-header">
        Recruit Bests Computer Scientists
    </div>
    <div class="card-body" style="font-size: medium;padding-bottom: 0;">
        <div class="rowPerso">
            <div onclick="frenchLanguage()" id="frenshBtn" class="colPerso" style="cursor:pointer;width: 50%;background: #04282c; border-right: 0.5px solid black;color: ghostwhite">
                Français
            </div>
            <div onclick="englishLanguage()" id="englishBtn" class="colPerso" style="cursor:pointer;width: 50%;background: #0c5460; border-left: 0.5px solid black;">
                English
            </div>
        </div>
    </div>
    <div class="card-body" id="frenchNews" style="font-size: medium;">

        <p>Plateforme dédiée aux informaticiens (auto-entrepreneurs compris) en recherche d'emploi et aux recruteurs.</p>
        <p>Tester dans un premier temps sur les compétences inscrites, les recruteurs peuvent observer le niveau des postulants ainsi que leurs certificiations.</p>
        <p>Une fois la sélection effectuée il est possible de construire votre propre test pour départager les candidats avant de les rencontrer.</p>

    </div>
    <div class="card-body" id="englishNews" style="font-size: medium;">

        <p>Platform dedicated to computer scientists seeking employment and recruiters.</p>
        <p>First of all, testing on their skills listed, recruiters can observe the level of the applicants and their certifications.</p>
        <p>Once the selection is made, it is possible to build your own test to decide bests candidates before meeting him.</p>

    </div>
</div>

<script>

</script>