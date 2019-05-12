<?php
include "../../modele/modele.php";
if(isset($_POST["checkbox0"])) {
    $IdQuestion = 0;
    while (isset($_POST["checkbox".$IdQuestion])) {

        $sql = "INSERT into reponseCandidat (idCandidat, idReponse) VALUES ( :idCandidat, :idReponse)";
        $query = $bdd->prepare($sql);
        $query->bindParam(':idCandidat', $_GET["idCandidat"] );

        foreach ($_POST["checkbox".$IdQuestion] as $valeur) {
            $query->bindParam(':idReponse', $valeur);
            $query->execute();
        }
        $query->closeCursor();
        $IdQuestion = $IdQuestion + 1;
    }
}
?>
<html>
<head>
</head>
<body class="container">

<?php
print '<form class="" method="post" action="">';

$sql =  'SELECT idQuestion, titre, question, estQCM FROM question WHERE idOffre = '.$_GET["idOffre"];
$idQuestion = 0;
foreach  ($bdd->query($sql) as $row) {
    if ($row['estQCM'])
        $typebutton="checkbox";
    else
        $typebutton="radio";
    print  '<h3>'.$row['titre'].' </h3>';
    print  '<p>'.$row['question'].' </p>';

    $sql2 =  'SELECT idReponse, idQuestion, reponse FROM reponse WHERE idQuestion = :idQuestion';
    $query = $bdd->prepare($sql2);
    $query->bindParam(':idQuestion', $row['idQuestion']);
    $query->execute();
    while  ($row = $query->fetch(PDO::FETCH_OBJ)) {

        print  '<label>'.$row->reponse.' </label> <input type="'.$typebutton.'" name="checkbox'.$idQuestion.'[]" valeur"'.$row->idReponse.'" > </input></br>';


    }
    $idQuestion = $idQuestion + 1;
}
print '<input type="submit" name="valider" class="" value="valider"></form>';
?>

</body>
</html>
