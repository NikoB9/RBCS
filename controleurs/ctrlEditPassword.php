<?php
include "modele/modele.php";
include "modele/fonctions.php";
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 11/12/18
 * Time: 08:17
 */
$user = infosUser($bdd, $_SESSION['id']);

$alertOldPassword = false;
$alertSecondPassword = false;


if (isset($_POST['userPwd'])){


    try{

        if (pwdExist($_POST['oldPwd'],$bdd)){
            if($_POST['newPwd'] == $_POST['newPwdVerif']){

                $insert = editPasword($bdd, $user['id'], $_POST['newPwd']);
            }
            else{
                $alertSecondPassword = true;
            }
        }
        else{
            $alertOldPassword = true;
        }


    }catch (Exception $e){

        echo $e->getMessage();

    }

}

$user = infosUser($bdd, $_SESSION['id']);

include 'vues/vueTopMenu2.php';
echo "<div style='padding-top: 10vh;padding-bottom: 10vh'>";
//echo "user : ";
//print_r($user);
include 'vues/vueEditPassword.php';
echo "</div>";
include 'vues/vueBottomMenu.php';
include 'vues/vueLateralMenu.php';

//Controles
if ($alertOldPassword){
    echo "<script>
    document.getElementById('alertOldPassword').innerHTML =
    '<div class=\"alert alert-danger\" role=\"alert\">'
      +'<h4 class=\"alert-heading\">Ancien Mot de passe</h4>'
      +'<p>Le mot de passe entré n\'est pas votre mot de passe actuel.</p>'
    +'</div>';
</script>";
}
elseif ($alertSecondPassword){
    echo "<script>
    document.getElementById('alertSecondPassword').innerHTML =
    '<div class=\"alert alert-danger\" role=\"alert\">'
      +'<h4 class=\"alert-heading\">Attention!</h4>'
      +'<p>La confirmation de mot de passe est différente du mot de passe saisi.</p>'
    +'</div>';
</script>";
}
elseif (isset($insert) && $insert){
    echo "<script>
    document.getElementById('alertSecondPassword').innerHTML =
    '<div class=\"alert alert-success\" role=\"alert\">'
      +'<h4 class=\"alert-heading\" style=\"text-align:center\">Mot de passe modifié avec succès!</h4>'
    +'</div>';
</script>";
}


