<?php
session_start();
if(isset($_POST["titre0"])) {
    include "../modele/modele.php";
    $IdQuestion = 0;
    while (isset($_POST["titre".$IdQuestion])) {
        $sql = "INSERT into question (idOffre, titre, question, estQCM) VALUES (:idOffre, :titre, :question, :estQCM)";
        $query = $bdd->prepare($sql);
        $query->bindParam(':idOffre', $_GET["idOffre"]);
        $query->bindParam(':titre', $_POST["titre".$IdQuestion]);
        $query->bindParam(':question', $_POST["qestion".$IdQuestion]);
        $query->bindParam(':estQCM', $_POST["estQCM".$IdQuestion]);
        $query->execute();

        $idQuestion = $bdd->lastInsertId();

        $sql = "INSERT into reponse (idQuestion, reponse, estValide) VALUES ( :idQuestion, :reponse, FALSE )";
        $query = $bdd->prepare($sql);
        $query->bindParam(':idQuestion', $idQuestion);

        $tabId = array();
        $IdReponse = 0;
        while (isset($_POST[$IdQuestion."IdReponse".$IdReponse])) {
            $query->bindParam(':reponse', $_POST[$IdQuestion."IdReponse".$IdReponse]);
            $query->execute();
            $IdReponse = $IdReponse + 1;
            array_push($tabId, $bdd->lastInsertId());
        }
        $query->closeCursor();

        $sql = "UPDATE reponse SET estValide = TRUE WHERE idReponse = :idReponse";
        $query = $bdd->prepare($sql);

        foreach ($_POST["checkbox".$IdQuestion] as $valeur) {
            $query->bindParam(':idReponse', $tabId[$valeur]);
            $query->execute();
        }
        $query->closeCursor();
        $IdQuestion = $IdQuestion + 1;
    }

    echo"<script> window.location.href = '../index.php?p=ctrlListeDesOffresParRecruteur' </script>";


}
?>
<html><head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title></title>
</head>
<script>
    var ID = [];
    var IdReponse = "IdReponse"+ID[0];
    var ReponseType = [];
    var nbQCM = 0;
    var nbQCU = 0;
    var idQuestion = 0;
</script>
<body>
<form class="" method="post" action="">
    <div class="Selection">
        <div class="resume">
            <p>Nombre de QCM : <span id="nbQCM"></span></p><br>
            <p>Nombre de QCU : <span id="nbQCU"></span> </p><br>
            <button type="submit" onclick="" class="success">Terminer</button>
            <button type="button" onclick="window.location.href = '../index.php?p=ctrlListeDesOffresParRecruteur'" class="danger">Annuler</button>
        </div>
        <div class="draggable" draggable="true">QCM</div>
        <div class="draggable" draggable="true">QCU</div>
    </div>
    <div class="dropper">
        <span class="fa fa-trash-alt"></span>
    </div>


<script>
    ActualiserCompteur();


    (function() {

        var dndHandler = {

            draggedElement: null, // Propriété pointant vers l'élément en cours de déplacement

            applyDragEvents: function(element) {

                element.draggable = true;

                var dndHandler = this; // Cette variable est nécessaire pour que l'événement "dragstart" ci-dessous accède facilement au namespace "dndHandler"

                element.addEventListener('dragstart', function(e) {
                    dndHandler.draggedElement = e.target; // On sauvegarde l'élément en cours de déplacement
                    e.dataTransfer.setData('text/plain', ''); // Nécessaire pour Firefox
                }, false);

            },

            applyDropEvents: function(dropper) {

                dropper.addEventListener('dragover', function(e) {
                    e.preventDefault(); // On autorise le drop d'éléments
                }, false);

                dropper.addEventListener('dragleave', function() {
                    //lorsque l'élément quitte la zone de drop
                });



                var dndHandler = this; // Cette variable est nécessaire pour que l'événement "drop" ci-dessous accède facilement au namespace "dndHandler"

                dropper.addEventListener('drop', function(e) {

                    var target = e.target,
                        draggedElement = dndHandler.draggedElement, // Récupération de l'élément concerné
                        clonedElement = draggedElement.cloneNode(true); // On créé immédiatement le clone de cet élément

                    while(target.className.indexOf('dropper') == -1) { // Cette boucle permet de remonter jusqu'à la zone de drop parente
                        target = target.parentNode;
                    }

                    target.className = 'dropper'; // Application du design par défaut

                    clonedElement = target.appendChild(clonedElement); // Ajout de l'élément cloné à la zone de drop actuelle
                    clonedElement.id ="divQuestion"+idQuestion;
                    AjouterQuestion(idQuestion);
                    idQuestion = idQuestion + 1;
                    dndHandler.applyDragEvents(clonedElement); // Nouvelle application des événements qui ont été perdus lors du cloneNode()

                    if (target == draggedElement.parentNode){
                        draggedElement.parentNode.removeChild(draggedElement);
                    }

                });

            }

        };

        var elements = document.querySelectorAll('.draggable'),
            elementsLen = elements.length;

        for(var i = 0 ; i < elementsLen ; i++) {
            dndHandler.applyDragEvents(elements[i]); // Application des paramètres nécessaires aux élément déplaçables
        }

        var droppers = document.querySelectorAll('.dropper'),
            droppersLen = droppers.length;

        for(var i = 0 ; i < droppersLen ; i++) {
            dndHandler.applyDropEvents(droppers[i]); // Application des événements nécessaires aux zones de drop
        }

    })();

    function AjouterQuestion(idQuestionParam) {
        divdropper = document.getElementById("divQuestion"+idQuestionParam);
        if (divdropper.innerHTML == "QCM"){
            inputHiddenValue = 0;
            ReponseType.push("checkbox");
            nbQCM = nbQCM + 1;
        }
        else{
            inputHiddenValue = 1;
            ReponseType.push("radio");
            nbQCU = nbQCU + 1;
        }

        ID.push(0);
        ActualiserCompteur();
        divdropper.innerHTML="";

        const inputHidden = document.createElement('input');
        inputHidden.type="hidden";
        inputHidden.name="estQCM"+idQuestionParam;
        inputHidden.id="estQCM"+idQuestionParam;
        inputHidden.value=inputHiddenValue;
        divdropper.appendChild(inputHidden);


        const divQuestion = document.createElement('div');
        divQuestion.id="divQuestion"+idQuestionParam;
        divQuestion.className = "divQuestion";
        divdropper.appendChild(divQuestion);

        const inputText = document.createElement('input');
        inputText.type="text";
        inputText.name="titre"+idQuestionParam;
        inputText.placeholder="Titre";
        divQuestion.appendChild(inputText);

        const inputText2 = document.createElement('textarea');
        inputText2.name="qestion"+idQuestionParam;
        inputText2.placeholder="Question";
        inputText2.rows=5;
        divQuestion.appendChild(inputText2);


        const divReponse = document.createElement('div');
        divReponse.id="divReponse"+idQuestionParam;
        divReponse.className = "divReponse";
        divdropper.appendChild(divReponse);

        const buttonAjouter = document.createElement('button');
        buttonAjouter.type="button";
        buttonAjouter.id="buttonAjouter"+idQuestionParam;
        buttonAjouter.addEventListener("click", function() {AjouterReponse('divReponse'+idQuestionParam, idQuestionParam)} );
        divdropper.appendChild(buttonAjouter);
        buttonAjouterIH = document.getElementById("buttonAjouter"+idQuestionParam);
        buttonAjouterIH.innerHTML = "Ajouter une reponse";
    }

    function ActualiserCompteur(){
        spanNbQCM = document.getElementById('nbQCM');
        spanNbQCM.innerHTML=' '+nbQCM+' ';

        spanNbQCM = document.getElementById('nbQCU');
        spanNbQCM.innerHTML=' '+nbQCU+' ';
    }
    function AjouterReponse (num, idQ) {
        IdReponse = idQ + "IdReponse" + ID[idQ];
        divIdReponse = document.getElementById(num);

        const divReponse = document.createElement('div');
        divIdReponse.appendChild(divReponse);

        const InputText = document.createElement('input');
        InputText.placeholder = "Reponse";
        InputText.type = 'text';
        InputText.name = IdReponse;
        divReponse.appendChild(InputText);

        const checkboxReponse = document.createElement('input');
        checkboxReponse.type = ReponseType[idQ];
        checkboxReponse.name = 'checkbox'+idQ+"[]";
        checkboxReponse.value = ID[idQ];
        divReponse.appendChild(checkboxReponse);

        /*const Sautligne = document.createElement('br');
        divIdReponse.appendChild(Sautligne);*/

        ID[idQ]++;
        IdReponse = idQ + "IdReponse" + ID[idQ];
    }

</script>

</form>
</body></html>
