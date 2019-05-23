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
            <p onclick="window.history.back()" style="cursor: pointer; padding: 10px;margin: 10px;border: solid 2px black;border-radius: 10px; text-align: center">Sortir</p>
            <p id="note"></p>
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
        $noteTotle = 0;
        $nbQuestion = 0;
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

                $sql2 =  'SELECT  COUNT(estValide) As mReponse FROM reponse WHERE idQuestion = :idQuestion AND estValide = false';
                $query = $bdd->prepare($sql2);
                $query->bindParam(':idQuestion', $row['idQuestion']);
                $query->execute();
                $Ans =  $query->fetch(PDO::FETCH_OBJ);
                $nbMauvaiseReponse = $Ans->mReponse;

                $sql2 =  'SELECT idReponse, idQuestion, reponse, estValide FROM reponse WHERE idQuestion = :idQuestion';
                $query = $bdd->prepare($sql2);
                $query->bindParam(':idQuestion', $row['idQuestion']);
                $query->execute();

                $nbBonneReponse = $query->rowCount() - $nbMauvaiseReponse;

                $note = 0;
                echo '<div class="divReponse">';
                    while  ($row = $query->fetch(PDO::FETCH_OBJ)) {
                        if (in_array($row->idReponse, $tabIdReponse)) {
                            if ($row->estValide){
                                $note = $note + (1 / $nbBonneReponse);
                                echo  '<label><span class="like-input background-green">'.$row->reponse.'</span><input type="'.$typebutton.'" name="checkbox'.$idQuestion.'[]" value="'.$row->idReponse.'" checked disabled> </input> </label>';
                            }
                            else{
                                $note = $note - (1 / 2);
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
            $nbQuestion = $nbQuestion + 1 ;
            $noteTotle = $noteTotle + max(0, $note) ;
        }

        $notePourcentage = $noteTotle / $nbQuestion * 100 ;

        echo"<script>document.getElementById(\"note\").innerHTML='Note : ".$noteTotle." / $nbQuestion   |   ".$notePourcentage." %' </script>";


        $sql2 =  'SELECT * FROM noteCandidat WHERE idCandidat = :idCandidat AND idOffre = :idOffre';
        $query = $bdd->prepare($sql2);
        $query->bindParam(':idCandidat', $_GET["idCandidat"]);
        $query->bindParam(':idOffre', $_GET["idOffre"]);
        $query->execute();

        if($query->rowCount() < 1){
            $sql = "INSERT into noteCandidat (idCandidat, idOffre, note) VALUES (:idCandidat, :idOffre, :note)";
            $query = $bdd->prepare($sql);
            $query->bindParam(':idCandidat', $_GET["idCandidat"]);
            $query->bindParam(':idOffre', $_GET["idOffre"]);
            $query->bindParam(':note', $notePourcentage);
            $query->execute();
        }

        ?>
    </div>

    </form>
</body>
</html>

