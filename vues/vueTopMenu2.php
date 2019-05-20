<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 19/12/18
 * Time: 10:21
 */
?>

<div id="topMenuDiv2">

    <div class="divMenuLateralBtn" onclick="diplayMenuLateral()">
        <svg class="ham menuLateral" viewBox="0 0 100 100" width="80" onclick="this.classList.toggle('active')">
            <path
                    class="line top"
                    d="m 30,33 h 40 c 13.100415,0 14.380204,31.80258 6.899646,33.421777 -24.612039,5.327373 9.016154,-52.337577 -12.75751,-30.563913 l -28.284272,28.284272" />
            <path
                    class="line middle"
                    d="m 70,50 c 0,0 -32.213436,0 -40,0 -7.786564,0 -6.428571,-4.640244 -6.428571,-8.571429 0,-5.895471 6.073743,-11.783399 12.286435,-5.570707 6.212692,6.212692 28.284272,28.284272 28.284272,28.284272" />
            <path
                    class="line bottom"
                    d="m 69.575405,67.073826 h -40 c -13.100415,0 -14.380204,-31.80258 -6.899646,-33.421777 24.612039,-5.327373 -9.016154,52.337577 12.75751,30.563913 l 28.284272,-28.284272" />
        </svg>
    </div>


    <div class="UserMenudropdown">
        <?php
        if ($user['profilePic'] == ""){ ?>
            <button class="UserMenudropbtn"><img id="iconMenuUser"  src="assets/img/userIcon.png"></button>
        <?php }else{
            echo "<button class=\"UserMenudropbtn\"><img id=\"iconMenuUser\" src=\"".$user['profilePic']."\"></button>";
        }
        ?>
        <div class="UserMenudropdown-content">
            <a href="?deconnexion"><img src="assets/img/shutdown2.png" width="20px" height="20px">&nbsp;Se déconnecter</a>
            <a href="?p=ctrlSignUpForm"><img src="assets/img/resume.svg" width="20px" height="20px">&nbsp;Modifier mon profil</a>
            <!--<a href="#">Link 3</a>-->
        </div>
    </div>
    <!--<img id="deconnexion"  onclick="window.location.href = '?deconnexion'" src="assets/img/shutdown2.png">-->
</div>
