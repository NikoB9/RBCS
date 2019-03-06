<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 17/12/18
 * Time: 19:32
 */


function userExist($user,$bdd){

    $bool = false;

    $sql = "SELECT  count(*) as bool FROM User WHERE  pseudo like :login or mail like :login";
    $query = $bdd->prepare($sql);
    $query->bindParam(':login', $user);

    //echo $query;

    if ($query->execute()){

        $fetch = $query->fetch(PDO::FETCH_OBJ);

        //echo "login : ".$user."bool : ".$fetch->bool;

        if($fetch->bool == 1){
            $bool = true;
        }

    }
    else{
        echo "rate";
    }
    $query->closeCursor();

    return $bool;

}

function pwdExist($pwd,$bdd){

    $bool = false;

    $sql = "SELECT  count(*) as bool FROM User WHERE  mdp like :mdp";
    $query = $bdd->prepare($sql);
    $query->bindParam(':mdp', $pwd);

    if ($query->execute()){

        $fetch = $query->fetch(PDO::FETCH_OBJ);
        if($fetch->bool == 1){
            $bool = true;
        }

    }
    $query->closeCursor();

    return $bool;

}


function ajouterUtilisateur($user,$ad,$pwd,$bdd){

    $bool = false;

    $sql = "INSERT into User (pseudo, mail, mdp) VALUES (:pseudo, :mail, :mdp)";
    $query = $bdd->prepare($sql);
    $query->bindParam(':pseudo', $user);
    $query->bindParam(':mail', $ad);
    $query->bindParam(':mdp', $pwd);

    if ($query->execute()){

        $bool = true;

    }
    $query->closeCursor();

    return $bool;

}


function compteExist($user, $pwd,$bdd){

    $bool = false;

    $sql = "SELECT  count(*) as bool FROM User WHERE  mdp like :mdp AND (pseudo like :login or mail like :login)";
    $query = $bdd->prepare($sql);
    $query->bindParam(':mdp', $pwd);
    $query->bindParam(':login', $user);
    if ($query->execute()){

        $fetch = $query->fetch(PDO::FETCH_OBJ);
        if($fetch->bool == 1){
            $bool = true;
        }

    }

    $query->closeCursor();

    return $bool;

}



function ajouterOffreDembauche($bdd,$dateDebut, $dateFin, $titre, $resume, $description, $couleurFond, $photoDescriptive, $idRecruteur){


    $dateDebutSql = date("Y-m-d H:i:s",strtotime(str_replace('/','-',$dateDebut)));
    $dateFinSql = date("Y-m-d H:i:s",strtotime(str_replace('/','-',$dateFin)));

    $sql = "INSERT INTO JobOffer (beginningDate, closingDate, title, resume, resumeLong, backgroundColor, resumePicture, idUser)"
        ." VALUES (:dd, :df, :t , :r , :rl, :bc , :rp , :id)";

    $query = $bdd->prepare($sql);
    $query->bindParam(':dd', $dateDebutSql);
    $query->bindParam(':df', $dateFinSql);
    $query->bindParam(':t', $titre);
    $query->bindParam(':r', $resume);
    $query->bindParam(':rl', $description);
    $query->bindParam(':bc', $couleurFond);
    $query->bindParam(':rp', $photoDescriptive);
    $query->bindParam(':id', $idRecruteur);

    if ($query->execute){
        return true;
    }
    else{

        //$query->rollback();
        return false;

    }

    $query->closeCursor();
}


function listeDesOffresDembauches($bdd){

    /*ON PEUT VOIR LES OFFRES QUI ONT COMMENCEES MAIS PAS CELLES QUI SONT TERMINEES A MOINS D'ETRE SELECTIONNER*/
    /*PREVOIR UN TRIGGER POUR SURPPRIMER AU BOUT DE 1 ANS.*/

    //echo "passe1";

    $sql = "SELECT * FROM JobOffer INNER JOIN User ON JobOffer.idUser = User.id WHERE closingDate >= '".date("Y-m-d")."'";

    //echo $sql;

    $query = $bdd->prepare($sql);

    $lesOffres = array();

    try {

        $query->execute();

        $i = 0;

        while ($fetch = $query->fetch(PDO::FETCH_OBJ)){

            $dateD = date("d-m-Y",strtotime(str_replace('-','/',$fetch->beginningDate)));
            $dateF = date("d-m-Y",strtotime(str_replace('-','/',$fetch->closingDate)));

            $lesOffres[$i]['dateD'] = $dateD;
            $lesOffres[$i]['dateF'] = $dateF;
            $lesOffres[$i]['titre'] = $fetch->title;
            $lesOffres[$i]['resume'] = $fetch->resume;
            $lesOffres[$i]['description'] = $fetch->resumeLong;
            $lesOffres[$i]['couleurFond'] = $fetch->bacgkroundColor;
            $lesOffres[$i]['image'] = str_replace("imgages","images",$fetch->resumePicture);
            $lesOffres[$i]['recruteur'] = strtoupper($fetch->nom)." ".$fetch->prenom;

            $i++;

        }

        //print_r($lesOffres);

    }
    catch (Exception $e){
        //$query->rollback();
     //   echo $e->getMessage();
    }


    $query->closeCursor();

    return $lesOffres;


}

//ajouter compétence min
/*function addSkillMin($bdd,$user, $libelle){

    $sql = "INSERT INTO Skill (libelle)"
        ." VALUES (:l)";
    $query = $bdd->prepare($sql);
    $query->bindParam(':l', $libelle);

    if ($query->execute){

        $lastId = $query->lastInsertID();

        $sql = "INSERT INTO AddSkill (idUser, idSkill)"
            ." VALUES (:u, :l)";

        $query = $bdd->prepare($sql);
        $query->bindParam(':u', $user);
        $query->bindParam(':l', $lastId);
        if ($query->execute){
            return true;
        }
        else{
            //$query->rollback();
            return false;
        }
    }
    else{
        //$query->rollback();
        return false;
    }

    $query->closeCursor();

}*/

//Nb Compétence
function nbSkill($bdd,$user){

    $sql = "SELECT max(idSkill) as nbSkill FROM AddSkill INNER JOIN User ON User.id = AddSkill.idUser"
        ." WHERE User.pseudo like ':u'";

    echo "<alert>".$sql."</alert>";
    echo "<alert>".$user."</alert>";


    try{

        $query = $bdd->prepare($sql);
        $query->bindParam(':u', $user);

        if ($query->execute() && $query->rowCount() != 0){
            $fetch = $query->fetch(PDO::FETCH_OBJ);

            echo "<alert>".$fetch->nbSkill."</alert>";

            return $fetch->nbSkill;
        }
        else{
            echo "<alert>0</alert>";
            return 0;
        }
    }
    catch (Exception $e){
        echo "<alert>".$e->getMessage()."</alert>";
        return 0;
    }


    $query->closeCursor();

}