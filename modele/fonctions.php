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

function alreadyParticipate($bdd, $offerId, $idUser){
    $bool = false;
    $sql = "SELECT count(*) as bool FROM noteCandidat WHERE  idCandidat like :idUser or idOffre like :idOffre";
    $query = $bdd->prepare($sql);
    $query->bindParam(':idUser', $idUser);
    $query->bindParam(':idOffre', $offerId);

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

function anotherUserExist($mail, $pseudo, $id, $bdd){
    $bool = false;
    $sql = "SELECT count(*) as bool FROM User WHERE (pseudo like TRIM(:pseudo) or mail like TRIM(:mail)) AND id!=:id";
    //echo $sql;
    $query = $bdd->prepare($sql);

    //echo $mail.$pseudo.$id;

    $query->bindParam(':mail', $mail);
    $query->bindParam(':pseudo', $pseudo);
    $query->bindParam(':id', $id);

    //echo $query;

    try{

        if ($query->execute()){

            $fetch = $query->fetch(PDO::FETCH_OBJ);

            //echo "login : ".$user."bool : ".$query->rowCount();


            if($fetch->bool >= 1){
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

    $sql = "INSERT into User (pseudo, mail, mdp) VALUES (TRIM(:pseudo), TRIM(:mail), :mdp)";
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


function addJobOffer($bdd, $idRecruteur, $titre, $couleurFond, $dateDebut, $dateFin, $description, $resume, $chrono, $photoDescriptive, $messageAccepte, $messageRefuse, $adresse, $cp, $ville){

    $insert = -1;

    try{

        $sql = "INSERT INTO JobOffer (beginningDate, closingDate, title, resume, resumeLong, backgroundColor, resumePicture, idUser, chrono, acceptedUserMessage, refusedUserMessage, address, pin_code, city)"
            ." VALUES (STR_TO_DATE(:dd, '%d/%m/%Y'), STR_TO_DATE(:df, '%d/%m/%Y'), :t , :r , :rl, :bc , :rp , :id, :chrono, :acceptedUserMessage, :refusedUserMessage, :address, :pin_code, :city)";

        /*echo $sql;
        echo $dateDebut;
        echo $dateFin;
        echo $chrono;
        echo $idRecruteur;*/

        $query = $bdd->prepare($sql);


        $query = $bdd->prepare($sql);
        $query->bindParam(':dd', $dateDebut);
        $query->bindParam(':df', $dateFin);
        $query->bindParam(':t', $titre);
        $query->bindParam(':r', $resume);
        $query->bindParam(':rl', $description);
        $query->bindParam(':bc', $couleurFond);
        $query->bindParam(':rp', $photoDescriptive);
        $query->bindParam(':id', $idRecruteur);


        $query->bindParam(':chrono', $chrono);
        $query->bindParam(':acceptedUserMessage', $messageAccepte);
        $query->bindParam(':refusedUserMessage', $messageRefuse);
        $query->bindParam(':address', $adresse);
        $query->bindParam(':pin_code', $cp);
        $query->bindParam(':city', $ville);

        /*$sql = "INSERT INTO JobOffer (beginningDate, closingDate, title, resume, resumeLong, backgroundColor, resumePicture, idUser, chrono, acceptedUserMessage, refusedUserMessage, address, pin_code, city)"
            ." VALUES (STR_TO_DATE('".$dateDebut."', '%d/%m/%Y'), STR_TO_DATE('".$dateFin."', '%d/%m/%Y'), '".$titre."' , '".$resume."' , '".$description."', '".$couleurFond."' , '".$photoDescriptive."' , '".$idRecruteur."', '".$chrono."', '".$messageAccepte."', '".$messageRefuse."', '".$adresse."', '".$cp."', '".$ville."')";
*/
        //echo $sql;


        if ($query->execute()){
            $insert = $bdd->lastInsertId();
        }
        else{
            //echo $query->debugDumpParams();
        }
    }
    catch (Exception $e){

        //$query->rollback();
        //echo $e->getMessage();
        //echo "error";

    }

    $query->closeCursor();

    return $insert;
}

function listeDesOffresDembauchesRecruiter($bdd, $idR){


    $sql = "SELECT *, JobOffer.id as idOffre, DATE_FORMAT(beginningDate, '%d/%m/%Y') as dateD, DATE_FORMAT(closingDate, '%d/%m/%Y') as dateF FROM JobOffer INNER JOIN User ON JobOffer.idUser = User.id WHERE idUser = '".$idR."'";

    //echo $sql;

    $query = $bdd->prepare($sql);

    $lesOffres = array();

    try {

        $query->execute();

        $i = 0;

        while ($fetch = $query->fetch(PDO::FETCH_OBJ)){

            //$dateD = date("d-m-Y",strtotime(str_replace('-','/',$fetch->beginningDate)));
            //$dateF = date("d-m-Y",strtotime(str_replace('-','/',$fetch->closingDate)));

            $lesOffres[$i]['id'] = $fetch->idOffre;
            $lesOffres[$i]['dateD'] = $fetch->dateD;
            $lesOffres[$i]['dateF'] = $fetch->dateF;
            $lesOffres[$i]['titre'] = $fetch->title;
            $lesOffres[$i]['resume'] = $fetch->resume;
            $lesOffres[$i]['description'] = $fetch->resumeLong;
            $lesOffres[$i]['couleurFond'] = $fetch->backgroundColor;
            $lesOffres[$i]['image'] = str_replace("imgages","images",$fetch->resumePicture);
            $lesOffres[$i]['recruteur'] = strtoupper($fetch->nom)." ".$fetch->prenom;

            $i++;

        }

        //print_r($lesOffres);

    }
    catch (Exception $e){
        //$query->rollback();
        //echo $e->getMessage();
    }


    $query->closeCursor();

    return $lesOffres;

}


function oneJobOffer($bdd, $idOffre){


    $sql = "SELECT *, DATE_FORMAT(beginningDate, '%d/%m/%Y') as dateD, DATE_FORMAT(closingDate, '%d/%m/%Y') as dateF FROM JobOffer INNER JOIN User ON JobOffer.idUser = User.id WHERE JobOffer.id = '".$idOffre."'";

    //echo $sql;

    $query = $bdd->prepare($sql);

    $oneOffer = array();

    try {

        $query->execute();


        $offre = $query->fetch(PDO::FETCH_OBJ);

        $oneOffer['id'] = $idOffre;
        $oneOffer['dateD'] = $offre->dateD;
        $oneOffer['dateF'] = $offre->dateF;
        $oneOffer['titre'] = $offre->title;
        $oneOffer['resume'] = $offre->resume;
        $oneOffer['description'] = $offre->resumeLong;
        $oneOffer['couleurFond'] = $offre->backgroundColor;
        $oneOffer['image'] = str_replace("imgages","images",$offre->resumePicture);
        $oneOffer['recruteur'] = strtoupper($offre->nom)." ".$offre->prenom;
        $oneOffer['chrono'] = $offre->chrono;
        $oneOffer['acceptedUserMessage'] = $offre->acceptedUserMessage;
        $oneOffer['refusedUserMessage'] = $offre->refusedUserMessage;
        $oneOffer['address'] = $offre->address;
        $oneOffer['pin_code'] = $offre->pin_code;
        $oneOffer['city'] = $offre->City;
        $oneOffer['email'] = $offre->mail;

    }
    catch (Exception $e){
        //$query->rollback();
        //echo $e->getMessage();
    }


    $query->closeCursor();

    return $oneOffer;

}



function listeDesOffresDembauches($bdd){

    /*ON PEUT VOIR LES OFFRES QUI ONT COMMENCEES MAIS PAS CELLES QUI SONT TERMINEES A MOINS D'ETRE SELECTIONNER*/
    /*PREVOIR UN TRIGGER POUR SURPPRIMER AU BOUT DE 1 ANS.*/

    //echo "passe1";

    $sql = "SELECT *, JobOffer.id as idOffre, DATE_FORMAT(beginningDate, '%d/%m/%Y') as dateD, DATE_FORMAT(closingDate, '%d/%m/%Y') as dateF FROM JobOffer INNER JOIN User ON JobOffer.idUser = User.id WHERE closingDate >= '".date("Y-m-d")."'";

    //echo $sql;

    $query = $bdd->prepare($sql);

    $lesOffres = array();

    try {

        $query->execute();

        $i = 0;

        while ($fetch = $query->fetch(PDO::FETCH_OBJ)){

            //$dateD = date("d-m-Y",strtotime(str_replace('-','/',$fetch->beginningDate)));
            //$dateF = date("d-m-Y",strtotime(str_replace('-','/',$fetch->closingDate)));

            $lesOffres[$i]['id'] = $fetch->idOffre;
            $lesOffres[$i]['dateD'] = $fetch->dateD;
            $lesOffres[$i]['dateF'] = $fetch->dateF;
            $lesOffres[$i]['titre'] = $fetch->title;
            $lesOffres[$i]['resume'] = $fetch->resume;
            $lesOffres[$i]['description'] = $fetch->resumeLong;
            $lesOffres[$i]['couleurFond'] = $fetch->backgroundColor;
            $lesOffres[$i]['image'] = str_replace("imgages","images",$fetch->resumePicture);
            $lesOffres[$i]['recruteur'] = strtoupper($fetch->nom)." ".$fetch->prenom;

            $i++;

        }

        //print_r($lesOffres);

    }
    catch (Exception $e){
        //$query->rollback();
        //echo $e->getMessage();
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