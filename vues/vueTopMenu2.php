<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 19/12/18
 * Time: 10:21
 */
?>

<div id="topMenuDiv2">
    <div class="UserMenudropdown">
        <?php
        if ($user['profilePic'] == ""){ ?>
            <button class="UserMenudropbtn"><img id="iconMenuUser"  onclick="window.location.href = '?deconnexion'" src="assets/img/userIcon.png"></button>
        <?php }else{
            echo "<button class=\"UserMenudropbtn\"><img id=\"iconMenuUser\"  onclick=\"window.location.href = '?deconnexion'\" src=\"".$user['profilePic']."\"></button>";
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
