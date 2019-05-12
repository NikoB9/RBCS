<?php
include "../../modele/modele.php";

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
            <button type="submit" onclick="" class="success">Terminer</button>
        </div>
    </div>


    <div class="dropper">
        <?php

        $sqlReponseCandidat =  'SELECT idReponse FROM reponseCandidat WHERE idCandidat = :idCandidat';
        $query = $bdd->prepare($sqlReponseCandidat);
        $query->bindParam(':idCandidat', $_GET["idCandidat"]);
        $query->execute();

        $tabIdReponse = array();
        while  ($row = $query->fetch(PDO::FETCH_OBJ)) {
            array_push($tabIdReponse, $row->idReponse);
        }
        $query->closeCursor();

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

                $sql2 =  'SELECT idReponse, idQuestion, reponse, estValide FROM reponse WHERE idQuestion = :idQuestion';
                $query = $bdd->prepare($sql2);
                $query->bindParam(':idQuestion', $row['idQuestion']);
                $query->execute();
                echo '<div class="divReponse">';
                    while  ($row = $query->fetch(PDO::FETCH_OBJ)) {
                        if (in_array($row->idReponse, $tabIdReponse)) {
                            if ($row->estValide){
                                echo  '<label><span class="like-input background-green">'.$row->reponse.'</span><input type="'.$typebutton.'" name="checkbox'.$idQuestion.'[]" value="'.$row->idReponse.'" checked disabled> </input> </label>';
                            }
                            else{
                                echo  '<label><span class="like-input background-red">'.$row->reponse.'</span><input type="'.$typebutton.'" name="checkbox'.$idQuestion.'[]" value="'.$row->idReponse.'" checked disabled> </input> </label>';
                            }
                        }
                        else{
                            if ($row->estValide){
                                echo  '<label><span class="like-input background-green-l">'.$row->reponse.'</span><input type="'.$typebutton.'" name="checkbox'.$idQuestion.'[]" value="'.$row->idReponse.'" disabled> </input> </label>';
                            }
                            else{
                                echo  '<label><span class="like-input background-blue">'.$row->reponse.'</span><input type="'.$typebutton.'" name="checkbox'.$idQuestion.'[]" value="'.$row->idReponse.'" disabled> </input> </label>';
                            }
                        }
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


