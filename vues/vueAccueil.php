<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 11/12/18
 * Time: 08:12
 */
?>
<style>
    body{
        overflow: auto;
    }
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
    #signUp {
        width: 0;
        height: 0;
        border-top: 100px solid #0b4f5a;
        border-left: 300px solid transparent;
        top: 0;
        position: absolute;
        right: 0;
        color: black;
        text-shadow: rgb(255, 255, 255) 0.01em 0.0em .6em;
        transition: linear all .3s;
        font-size: 18px;
        font-weight: bolder;
    }

    #signUpBtn, #signUpBtnBis {
        position: absolute;
        top: 0;
        right: 0;
        width: 200px;
        height: 80px;
        z-index: 1;
        text-align: center;
        font-weight: bold;
        color: black !important;
        text-shadow: rgb(255, 255, 255) 0.01em 0.0em .6em;
        padding-left: 70px;
        padding-bottom: 10px;
        transition: linear all .3s;
    }

    #signUpBtn:hover, #signUpBtnBis:hover  {

        cursor:pointer;
        color: white !important;
        text-shadow: black 0.1em 0.1em 0.2em;
        transition: linear all .3s;

    }


    #signIn {
        width: 0;
        height: 0;
        border-top: 100px solid #0b4f5a;
        border-left: 300px solid transparent;
        top: 0;
        position: absolute;
        right: 0;
        font-size: 18px;
        color: black;
        transition: linear all .3s;
        text-shadow: rgb(255, 255, 255) 0.01em 0.0em .6em;
        font-weight: bolder;
    }

    #signInBtn, #signInBtnBis {
        position: absolute;
        top: 0;
        right: 0;
        width: 200px;
        height: 80px;
        z-index: 1;
        text-align: center;
        font-weight: bold;
        color: black !important;
        text-shadow: rgb(255, 255, 255) 0.01em 0.0em .6em;
        padding-left: 70px;
        transition: linear all .3s;
        padding-bottom: 10px;

    }

    #signInBtn:hover, #signInBtnBis:hover  {

        cursor:pointer;
        color: white !important;
        text-shadow: black 0.1em 0.1em 0.2em;
        transition: linear all .3s;

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
        right: 10px;
        position: absolute;
        display: flex;
        flex-direction: column;
        justify-content: center;
        height: 100%;
        top: 0;
        width: 140px;
    }
    #developpeuse{
        width: 150px;
        height: 125px;
        margin-top: 70px;
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
        text-shadow: black 0.1em 0.1em 0.2em
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
    .validate{
        width: 45px;
        height: 45px;
        background: url(assets/img/check.png);
        background-repeat: no-repeat;
        background-position: center;
        background-size: 30px;
        position: absolute;
        top: 11vw;
        right: 8vw;
        border: solid 2px #66cd42;
        border-radius: 15px;
        background-color: rgba(174, 229, 230, 0.3);
        transition: linear all .3s;

    }
    .cancel{
        width: 45px;
        height: 45px;
        background: url("assets/img/cancel.png");
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        border: solid 2px #fb1f1f;
        border-radius: 15px;
        background-color: rgba(174, 229, 230, 0.3);
        position: absolute;
        top: 11vw;
        transition: linear all .3s;
        right: 3.9vw;
    }
    .validate:hover{
        cursor: pointer;
        background-image: url("assets/img/checkReverse.png");
        background-color: #66cd42;
        border: solid 2px rgb(61, 79, 97);
        transition: linear all .3s;

    }
    .cancel:hover{
        cursor: pointer;
        background-image: url("assets/img/cancelReverse.png");
        background-color: #fb1f1f;
        border: solid 2px rgb(61, 79, 97);
        transition: linear all .3s;
    }
    .reset, .reset:before, reset:after{
        height: 100%;
        width: 100%;
        margin: 0;
        padding: 0;
        background: transparent;
        z-index: 2;
        color: transparent;
        border: none;
        transition: linear all .3s;
    }
    #divSignIn{
        display: none;
        transition: linear all .3s;
    }
    #divSignUp, #divSignUp:hover, #divSignIn:hover,
    #frenshBtn, #frenshBtn:hover,
    #englishBtn, #englishBtn:hover, #englishNews:hover, #frenchNews, #frenchNews:hover{
        transition: linear all .3s;
    }

    #englishNews{
        display: none;
        transition: linear all .3s;
    }
    .icon{
        color: #8fc7ff;
        margin-bottom: 8px !important;
    }
    #rowInput1{
        padding-left: 30px !important;
        margin-bottom: 50px;
        position: absolute;
        top: 1vw;
        right: 20vw;
        width: 280px;
        background: rgba(12, 84, 96, 0.47);
        padding: 8px;
        padding-right: 40px !important;
        border-radius: 15px;
    }
    #rowInput2{
        padding-left: 30px !important;
        margin-bottom: 50px;
        position: absolute;
        right: 9vw;
        top: 6.5vw;
        width: 280px;
        background: rgba(12, 84, 96, 0.47);padding: 8px;
        padding: 8px;
        padding-right: 40px !important;
        border-radius: 15px;
    }
    #rowInput3{
        padding-left: 30px !important;
        margin-bottom: 50px;
        position: absolute;
        top: 0.5vw;
        right: 20vw;
        width: 280px;
        background: rgba(12, 84, 96, 0.47);
        padding: 8px;
        padding-right: 40px !important;
        border-radius: 15px;
    }#rowInput4{
         padding-left: 30px !important;
         margin-bottom: 50px;
         position: absolute;
         right: 13vw;
         top: 5vw;
         width: 280px;
         background: rgba(12, 84, 96, 0.47);
         padding: 8px;
         padding-right: 40px !important;
         border-radius: 15px;
     }#rowInput5{
       padding-left: 30px !important;
       margin-bottom: 50px;
       position: absolute;
       right: 6vw;
       top: 9.45vw;
       width: 280px;
       background: rgba(12, 84, 96, 0.47);
       padding: 8px;
       padding-right: 40px !important;
       border-radius: 15px;
      }
    #rowInput6{
        padding-left: 30px !important;
        margin-bottom: 50px;
        position: absolute;
        right: 0.2vw;
        top: 13.9vw;
        width: 280px;
        background: rgba(12, 84, 96, 0.47);
        padding: 8px;
        padding-right: 40px !important;
        border-radius: 15px;
    }
    input[type="text"], input[type="password"], input[type="mail"]{
        padding: 8px;
    }
    #formSignUp{
        display: none;
    }
</style>

<img src="assets/img/analytics-3088958_960_720.jpg" class="imgFond" />
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/background.js" type="text/javascript"></script>

<div id="triangle-bottomright"></div>
<div id="triangle-topright"></div>
<div id="divSignUp">
    <div id="signUp"></div>
    <div id="signUpBtn" class="rowPerso" onmouseover="signup()" onmouseout="signupDown()" onclick="clickSignUp()">
        <div onmouseover="signup()" onmouseout="signupDown()" onclick="clickSignUp()" id="signUpBtnBis" class="colPerso" style="font-weight: bolder;color: ghostwhite">
            SIGN UP
        </div>
    </div>
</div>
<div id="divSignIn">
    <div id="signIn"></div>
    <div id="signInBtn" class="rowPerso" onclick="clickSignIn()" onmouseover="signin()" onmouseout="signinDown()">
        <div onmouseover="signin()" onmouseout="signinDown()" onclick="clickSignIn()" id="signInBtnBis" class="colPerso" style="font-weight: bolder;color: ghostwhite">
            SIGN IN
        </div>
    </div>
</div>


<div id="contentDeveloppeuse">
    <img src="assets/img/2000px-201706_PC_silhouette.svg.png" id="developpeuse">
</div>


<div class="card" id="infos">
    <div class="card-header">
        Recruit Bests Computer Scientists
    </div>
    <div class="card-body" style="font-size: medium;padding-bottom: 0;">
        <div class="rowPerso">
            <div onclick="frenchLanguage()" id="frenshBtn" class="colPerso" style="cursor:pointer;width: 50%;background: #04282c; border-right: 0.5px solid rgba(255,255,255,0.7);color: ghostwhite;box-shadow: rgb(255, 255, 255) 0.01em 0.0em .6em;">
                Français
            </div>
            <div onclick="englishLanguage()" id="englishBtn" class="colPerso" style="cursor:pointer;width: 50%;background: #0c5460;color:black; border-left: 0.5px solid rgba(255,255,255,0.7);text-shadow: rgb(255, 255, 255) 0.01em 0.0em .6em;">
                English
            </div>
        </div>
    </div>
    <div class="card-body" id="frenchNews" style="font-size: medium;">

        <p>Plateforme dédiée aux informaticiens en recherche d'emploi et aux recruteurs.</p>
        <p>Tester dans un premier temps sur les compétences inscrites, les recruteurs peuvent observer le niveau des postulants ainsi que leurs certificiations.</p>
        <p>Une fois la sélection effectuée il est possible de construire votre propre test pour départager les candidats avant de les rencontrer.</p>

    </div>
    <div class="card-body" id="englishNews" style="font-size: medium;">

        <p>Platform dedicated to computer scientists seeking employment and recruiters.</p>
        <p>First of all, testing on their skills listed, recruiters can observe the level of the applicants and their certifications.</p>
        <p>Once the selection is made, it is possible to build your own test to decide bests candidates before meeting him.</p>

    </div>
</div>

<div class="colPerso">
    <form action="" method="post" id="formSignIn">

        <input type="hidden" name="signin" value="signin">

        <div class="rowPerso" id="rowInput1">
            <div class="colPerso">
                <i class="user icon"></i>
            </div>
            <div class="colPerso">
                <input type="text" name="username" class="form-control" placeholder="Username" style="width: 230px">
            </div>
        </div>
        <br>
        <div class="rowPerso" id="rowInput2">
            <div class="colPerso">
                <i class="lock icon"></i>
            </div>
            <div class="colPerso">
                <input type="password" name="pwd" class="form-control" placeholder="Password" style="width: 230px">
            </div>
        </div>
        <br>
        <div class="validate" data-tooltip="Se Connecter" onclick="submitForm('formSignIn')">
        </div>
        <div class="cancel" data-tooltip="Annuler" onclick="resetForm('formSignIn');">
        </div>
    </form>
    <form action="" method="post" id="formSignUp">

        <input type="hidden" name="signup" value="signup">

        <div class="rowPerso" id="rowInput3">
            <div class="colPerso">
                <i class="mail icon"></i>
            </div>
            <div class="colPerso">
                <input type="mail" name="mail" class="form-control" placeholder="@-mail" style="width: 230px">
            </div>
        </div>
        <div class="rowPerso" id="rowInput4">
            <div class="colPerso">
                <i class="user icon"></i>
            </div>
            <div class="colPerso">
                <input type="text" name="user" class="form-control" placeholder="Username" style="width: 230px">
            </div>

        </div>
        <br>
        <div class="rowPerso" id="rowInput5">
            <div class="colPerso">
                <i class="lock icon"></i>
            </div>
            <div class="colPerso">
                <input type="password" name="pwd1" class="form-control" placeholder="Password" style="width: 230px">
            </div>
        </div>

        <div class="rowPerso" id="rowInput6">
            <div class="colPerso">
                <i class="lock icon"></i>
            </div>
            <div class="colPerso">
                <input type="password" name="pwd2" class="form-control" placeholder="Repeat Password" style="width: 230px">
            </div>
        </div>

        <br>
        <div class="validate" style="top: 19vw;right: 6vw;" data-tooltip="S'enregistrer" onclick="submitForm('formSignUp')">
        </div>
        <div class="cancel" style="top: 19vw;right: 1.9vw;" data-tooltip="Annuler" onclick="resetForm('formSignUp');">
        </div>
    </form>
    </div>

    <script>

    </script>