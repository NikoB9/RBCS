<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 19/12/18
 * Time: 10:21
 */
?>


<div id="topMenuDiv2">
    <?php
    if ($user['profilePic'] == ""){ ?>
        <img id="menuUser"  onclick="window.location.href = '?deconnexion'" src="assets/img/userIcon.png">
    <?php }else{
        echo "<img id=\"menuUser\"  onclick=\"window.location.href = '?deconnexion'\" src=\"".$user['profilePic']."\">";
    }
    ?>
    <!--<img id="deconnexion"  onclick="window.location.href = '?deconnexion'" src="assets/img/shutdown2.png">-->
</div>
