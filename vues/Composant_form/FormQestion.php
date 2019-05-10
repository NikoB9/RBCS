<?php
if(isset($_POST["checkbox"])) {
    include "../../modele/modele.php";

    $sql = "INSERT into question (titre, question, estQCM) VALUES ( :titre, :question, :estQCM)";
    $query = $bdd->prepare($sql);
    $query->bindParam(':titre', $_POST["titre"]);
    $query->bindParam(':question', $_POST["qestion"]);
    $query->bindParam(':estQCM', $_GET["estQCM"]);
    $query->execute();

    $idQuestion = $bdd->lastInsertId();

    $sql = "INSERT into reponse (idQuestion, reponse, estValide) VALUES ( :idQuestion, :reponse, FALSE )";
    $query = $bdd->prepare($sql);
    $query->bindParam(':idQuestion', $idQuestion);

    $tabId = array();
    $ID = 0;
    while (isset($_POST["IdReponse" . $ID])) {
        $query->bindParam(':reponse', $_POST["IdReponse" . $ID]);
        $query->execute();
        $ID = $ID + 1;
        array_push($tabId, $bdd->lastInsertId());
    }
    $query->closeCursor();

    $sql = "UPDATE reponse SET estValide = TRUE WHERE idReponse = :idReponse";
    $query = $bdd->prepare($sql);

        foreach ($_POST["checkbox"] as $valeur) {
            echo $tabId[$valeur];
            $query->bindParam(':idReponse', $tabId[$valeur]);
            $query->execute();
        }
    $query->closeCursor();
}
else
    echo "cocher au moins une case !!!";

if ($_GET["estQCM"])
    echo "<script>var typebutton = 'checkbox'</script>";
else
    echo "<script>var typebutton = 'radio'</script>";
?>

<script>
    var ID = 0
    var IdReponse = "IdReponse"+ID
</script>

<html>
<head>
</head>
<body class="container">
<form class="" method="post" action="">
    <input type="text" name="titre" class="" placeholder="titre"></br>
    <input type="text" name="qestion" class="" placeholder="question"></br>

    <div id="divReponse"></div>

    <button type="button" onclick="AjouterReponse()">Ajouter</button>
    <input type="submit" name="valider" class="" value="valider">
</form>
</body>
</html>


<script>

    function AjouterReponse () {
        divIdReponse = document.getElementById('divReponse');

        const InputText = document.createElement('input');
        InputText.type = 'text';
        InputText.name = IdReponse;
        divIdReponse.appendChild(InputText);

        const checkboxReponse = document.createElement('input');
        checkboxReponse.type = typebutton;
        checkboxReponse.name = 'checkbox[]';
        checkboxReponse.value = ID;
        divIdReponse.appendChild(checkboxReponse);

        const Sautligne = document.createElement('br');
        divIdReponse.appendChild(Sautligne);

        ID++
        IdReponse = "IdReponse"+ID
    }
</script>

