<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 17/12/18
 * Time: 19:32
 */


function userExist($user,$bdd){
    $bool = false;
    $sql = "SELECT count(*) as bool FROM User WHERE  pseudo like :login or mail like :login";
    $query = $bdd->prepare($sql);
    $query->bindParam(':login', $user);

    //echo $query;

    try{

        if ($query->execute()){

            $fetch = $query->fetch(PDO::FETCH_OBJ);

            //echo "login : ".$user."bool : ".$query->rowCount();


            if($fetch->bool == 1){
                $bool = true;
            }

        }
        else{
            echo "rate";
        }
    }
    catch (Exception $e){
        //$query->rollback();
         //echo $e->getMessage();
    }
    $query->closeCursor();

    return $bool;

}

function pwdExist($pwd,$bdd){

    $bool = false;

    $sql = "SELECT  count(*) as bool FROM User WHERE mdp like :mdp";
    //echo $sql;
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

    $bool = -1;

    $sql = "INSERT into User (pseudo, mail, mdp) VALUES (:pseudo, :mail, :mdp)";
    $query = $bdd->prepare($sql);
    $query->bindParam(':pseudo', $user);
    $query->bindParam(':mail', $ad);
    $query->bindParam(':mdp', $pwd);

    if ($query->execute()){

        $bool = $bdd->lastInsertID();


    }

    $query->closeCursor();

    return $bool;

}


function compteExist($user, $pwd,$bdd){

    $id = -1;

    $sql = "SELECT id FROM User WHERE  mdp like :mdp AND (pseudo like :login or mail like :login)";
    $query = $bdd->prepare($sql);
    $query->bindParam(':mdp', $pwd);
    $query->bindParam(':login', $user);
    if ($query->execute()){

        $fetch = $query->fetch(PDO::FETCH_OBJ);
        if ($query->execute()){

            $fetch = $query->fetch(PDO::FETCH_OBJ);

            //echo "login : ".$user."bool : ".$query->rowCount();

            if($query->rowCount() == 1){
                $id = $fetch->id;
            }

        }
        else{
            echo "rate";
        }

    }

    $query->closeCursor();

    return $id;

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

    $sql = "SELECT *, DATE_FORMAT(beginningDate, '%d/%m/%Y') as dateD, DATE_FORMAT(closingDate, '%d/%m/%Y') as dateF FROM JobOffer INNER JOIN User ON JobOffer.idUser = User.id WHERE closingDate >= '".date("Y-m-d")."'";

    //echo $sql;

    $query = $bdd->prepare($sql);

    $lesOffres = array();

    try {

        $query->execute();

        $i = 0;

        while ($fetch = $query->fetch(PDO::FETCH_OBJ)){

            //$dateD = date("d-m-Y",strtotime(str_replace('-','/',$fetch->beginningDate)));
            //$dateF = date("d-m-Y",strtotime(str_replace('-','/',$fetch->closingDate)));

            $lesOffres[$i]['dateD'] = $fetch->dateD;
            $lesOffres[$i]['dateF'] = $fetch->dateF;
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

function infosUser($bdd, $idUser){

    /*ON PEUT VOIR LES OFFRES QUI ONT COMMENCEES MAIS PAS CELLES QUI SONT TERMINEES A MOINS D'ETRE SELECTIONNER*/
    /*PREVOIR UN TRIGGER POUR SURPPRIMER AU BOUT DE 1 ANS.*/

    //echo "passe1";

    $sql = "SELECT *, DATE_FORMAT(naissance,'%d/%m/%Y') as dateNaissance FROM User u WHERE u.id = '".$idUser."'";

    //echo $sql;

    $query = $bdd->prepare($sql);

    $infos = array();
    try {

        $query->execute();


        $user = $query->fetch(PDO::FETCH_OBJ);

        //print_r($infos);

        $infos = array(

            "prenom" => $user->prenom,
            "nom" => $user->nom,
            "pseudo" => $user->pseudo,
            "description" => $user->description,
            "mail" => $user->mail,
            "tel" => $user->tel,
            "mdp" => $user->mdp,
            "profilePic" => $user->profilePic,
            "recruteur" => $user->recruteur,
            "telFix" => $user->telFix,
            "naissance" => $user->dateNaissance,
            "cv" => $user->cv,
            "entreprise" => $user->entreprise,
            "adresse" => $user->adresse,
            "code_postal" => $user->code_postale,
            "ville" => $user->ville,
        );

        //print_r($infos);



        //print_r($lesOffres);

    }
    catch (Exception $e){
        //$bdd->rollback();
        //echo $e->getMessage();
    }


    $query->closeCursor();

    return $infos;


}

function editUSer($bdd, $id, $prenom,$nom,$pseudo,$naissance,$description,$nomCv, $nomPp,
    $recruteur,$entreprise,$mail,$telFix,$tel,$adresse,$code_postal,$ville){


    $sql = "UPDATE User "
        ." SET `prenom`=:prenom,"
        ." `nom`=:nom,"
        ." `pseudo`=:pseudo,"
        ." `description`=:description,"
        ." `mail`=:mail,"
        ." `tel`=:tel,"
        ." `profilePic`=:profilePic,"
        ." `recruteur`=:recruteur,"
        ." `telFix`=:telFix,"
        ." `naissance`=STR_TO_DATE(:naissance, '%d/%m/%Y'),"
        ." `entreprise`=:entreprise,"
        ." `adresse`=:adresse,"
        ." `code_postale`=:code_postale,"
        ." `ville`=:ville,"
        ." `cv`=:cv"

        ." WHERE id=:id";

    $query = $bdd->prepare($sql);
    $query->bindParam(':prenom',$prenom);
    $query->bindParam(':nom',$nom);
    $query->bindParam(':pseudo',$pseudo);
    $query->bindParam(':description',$description);
    $query->bindParam(':mail',$mail);
    $query->bindParam(':tel',$tel);
    $query->bindParam(':profilePic',$nomPp);
    $query->bindParam(':recruteur',$recruteur);
    $query->bindParam(':telFix',$telFix);
    $query->bindParam(':naissance',$naissance);
    $query->bindParam(':entreprise',$entreprise);
    $query->bindParam(':adresse',$adresse);
    $query->bindParam(':code_postale',$code_postal);
    $query->bindParam(':ville',$ville);
    $query->bindParam(':cv',$nomCv);
    $query->bindParam(':id',$id);

    $query->execute();
    $query->closeCursor();

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
/*function nbSkill($bdd,$user){

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

}*/