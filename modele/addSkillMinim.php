<?php
session_start();
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 24/12/18
 * Time: 08:38
 */


$host   = "localhost";
$user   = "root";
$pass   = "azerty";
$db     = "RBCS";
$today  = date("Y-m-d");
try // Connexion à la base de données avec PDO
{
    $bdd = new PDO('mysql:host='.$host.';dbname='.$db.';charset=utf8', $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $bdd->exec("SET CHARACTER SET utf8");
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}


$user = $_SESSION['user'];
$libelle = $_POST['libelleSkill'];

//ajouter compétence min

try{

    $sql = "INSERT INTO Skill (libelle)"
        ." VALUES (:l)";
    $query = $bdd->prepare($sql);
    $query->bindParam(':l', $libelle);

    if ($query->execute()){

        $lastId = $query->lastInsertID();

        $sql = "INSERT INTO AddSkill (idUser, idSkill)"
            ." VALUES (:u, :l)";

        $query = $bdd->prepare($sql);
        $query->bindParam(':u', $user);
        $query->bindParam(':l', $lastId);
        if ($query->execute){
        }
        else{
            //$query->rollback();
            echo "Failed1";
        }
    }
    else{
        //$query->rollback();
        echo "Failed2";
    }

    echo "Success";
}
catch (Exception $e){
    echo $e->getMessage();
}



$query->closeCursor();

