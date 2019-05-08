<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 17/12/18
 * Time: 19:30
 */


$host   = "remotemysql.com";
$user   = "kQnEQkDgQK";
$pass   = "xfojh8wGkd";
$db     = "kQnEQkDgQK";
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

/*********************************** Functions ***********************************/

?>
