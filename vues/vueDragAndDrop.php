<?php
?>
<html><head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,900,900i" rel="stylesheet">
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

    <div class="header">
        HEADER
    </div>

    <div class="Selection">
        <div>
            <p>Nombre de QCM : <span id="nbQCM"></span></p><br>
            <p>Nombre de QCU : <span id="nbQCU"></span> </p><br>
            <button type="button" onclick="" class="success">Terminer</button>
            <button type="button" onclick="" class="danger">Annuler</button>
        </div>
        <div class="draggable" draggable="true">QCM</div>
        <div class="draggable" draggable="true">QCU</div>
    </div>

    <div class="dropper">
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
                    AjouterQuestion(idQuestion)
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
            ReponseType.push("checkbox");
            nbQCM = nbQCM + 1;
        }
        else{
            ReponseType.push("radio");
            nbQCU = nbQCU + 1;
        }
        ID.push(0);
        ActualiserCompteur();
        divdropper.innerHTML="";

        const inputText = document.createElement('input');
        inputText.type="text";
        inputText.name="titre";
        inputText.placeholder="titre";
        divdropper.appendChild(inputText);

        const Sautligne = document.createElement('br');
        divdropper.appendChild(Sautligne);

        const inputText2 = document.createElement('input');
        inputText2.type="text";
        inputText2.name="qestion";
        inputText2.placeholder="qestion";
        divdropper.appendChild(inputText2);

        const divReponse = document.createElement('div');
        divReponse.id="divReponse"+idQuestionParam;
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
        IdReponse = "IdReponse" + ID[idQ];
        divIdReponse = document.getElementById(num);
        const InputText = document.createElement('input');
        InputText.placeholder = "Reponse";
        InputText.type = 'text';
        InputText.name = IdReponse;
        divIdReponse.appendChild(InputText);

        const checkboxReponse = document.createElement('input');
        checkboxReponse.type = ReponseType[idQ];
        checkboxReponse.name = 'checkbox[]';
        checkboxReponse.value = ID[idQ];
        divIdReponse.appendChild(checkboxReponse);

        const Sautligne = document.createElement('br');
        divIdReponse.appendChild(Sautligne);

        ID[idQ]++;
        IdReponse = "IdReponse" + ID[idQ];
    }

</script>


</body></html>
