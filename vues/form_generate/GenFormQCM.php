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
    header('Location: /RBCS/vues/form_generate/ConsulterResultatQC.php?idOffre='.$_GET["idOffre"].'&idCandidat='.$_GET["idCandidat"]);
}


?>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body class="container">
    <form class="" method="post" action="">
    <div class="selection"> <!-- a metre sur le coté gauche et fixe (comme la div rouge du form drag and drop)-->
        <div>
            <p>Du texte</p>
            <p>Encore du texte</p>
            <button type="" onclick="" class="success">Terminer</button>
        </div>
    </div>


    <div class="dropper">
        <?php

        $sql =  'SELECT idQuestion, titre, question, estQCM FROM question WHERE idOffre = '.$_GET["idOffre"];
        $idQuestion = 0;
        foreach  ($bdd->query($sql) as $row) {
            echo '<div>';
                if ($row['estQCM'])
                    $typebutton="radio";
                else
                    $typebutton="checkbox";
                echo '<div class="divQuestion">';
                    echo  '<h3 class="like-input">'.$row['titre'].' </h3>';
                    echo  '<p class="like-input">'.$row['question'].' </p>';
                echo '</div>';

                $sql2 =  'SELECT idReponse, idQuestion, reponse FROM reponse WHERE idQuestion = :idQuestion';
                $query = $bdd->prepare($sql2);
                $query->bindParam(':idQuestion', $row['idQuestion']);
                $query->execute();
                echo '<div class="divReponse">';
                    while  ($row = $query->fetch(PDO::FETCH_OBJ)) {
                        echo  '<label><span class="like-input">'.$row->reponse.'</span><input type="'.$typebutton.'" name="checkbox'.$idQuestion.'[]" value="'.$row->idReponse.'" > </input> </label>';
                    }
                echo '</div>';
                $idQuestion = $idQuestion + 1;
            echo '</div>';
        }
        ?>
    </div>

    </form>
</body>
</html>
