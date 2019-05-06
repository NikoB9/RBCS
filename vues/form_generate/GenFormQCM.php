<?php
include "../../modele/modele.php";

?>
<html>
<head>
</head>
<body class="container">

<?php

$sql =  'SELECT idQuestion, titre, question, estQCM FROM question';
foreach  ($bdd->query($sql) as $row) {
    if ($row['estQCM'])
        $typebutton="checkbox";
    else
        $typebutton="radio";
    print '<form class="" method="post" action="">';
    print  '<h3>'.$row['titre'].' </h3>';
    print  '<p>'.$row['question'].' </p>';

    $sql2 =  'SELECT idReponse, idQuestion, reponse FROM reponse where idQuestion = :idQuestion';
    $query = $bdd->prepare($sql2);
    $query->bindParam(':idQuestion', $row['idQuestion']);
    $query->execute();
    while  ($row = $query->fetch(PDO::FETCH_OBJ)) {

        print  '<label>'.$row->reponse.' </label> <input type="'.$typebutton.'" name="checkbox" valeur"'.$row->idReponse.'" > </input></br>';


    }
    print '<input type="submit" name="valider" class="" value="valider"></form>';
}

?>

</body>
</html>
