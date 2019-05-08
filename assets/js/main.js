$(document).ready(function() {
  $('a[data-toggle="popup"]').each(function() {
      $(this).popup({
          popup: $(this).attr('data-content'),
          position: $(this).attr('data-position'),
          on: 'click'
      })
  });
    $(function() {
    $("table #sortable-code").sortable({ opacity: 0.8, cursor: 'move', update: function() {
        var order = $(this).sortable("serialize");
        $.post("pages/edit_codes.php", order, function(theResponse){
          console.log("Le code a été édité avec succès");
        });
      }
      });
    });



    $('.tabular.menu .item').tab();
    $('.ui.accordion').accordion();
    $('.ui.dropdown').dropdown({
    forceSelection: false,
    transition    : 'fade up'
  });
  $('.menu .ui.dropdown').dropdown({
  forceSelection: false,
  transition    : 'drop'
});
    $('.ui.checkbox').checkbox();
    $('.ui.progress').progress();

    $('#showToggle').hide();
    $('#hideToggle').show();
    $('#hideToggle').click(function() {
        $('#hideToggle').hide();
        $('#showToggle').show();
        $('#sideMenu').addClass('hide');
    });
    $('#showToggle').click(function() {
        $('#showToggle').hide();
        $('#hideToggle').show();
        $('#sideMenu').removeClass('hide');
    });

    var tableservice = $('table#services').DataTable( {
        "lengthChange": false,
        "pageLength": 100,
        "language": {
          "zeroRecords": "Aucun résultat",
          "info": "page _PAGE_ sur _PAGES_",
          "infoEmpty": "Aucun résultat",
          "infoFiltered": "(filtré parmis  _MAX_ resultats)",
          "paginate": {
                "first":      "Premier",
                "last":       "Dernier",
                "next":       "Suivant",
                "previous":   "Précédent"
            },
            "search": "Rechercher:"
        }
    } );




    $(".pageloader").fadeOut("slow");

});
$('.logoutlink').on('click', function () { $('#logoutform').submit(); });
$('#subbutton').on('click', function () { $(this).addClass("loading"); });
$('.negative').on('show', function(){ $( "#subbutton" ).removeClass("loading"); });
function Subform(form)
{
   $('#' + form).submit();
}


function MenuNav(page)
{
  $( "#" + page )/*.addClass("active");*/
}
function ShowModalRequest(modal)
{
  $('.ui.basic.modal' + modal).modal({inverted: true}).modal('show');
}


//Affichage du formaulaire ajout/depot vente
//prend en paramètres le nom de l'utilisateur
/*function add_formVente(nomUser)
{
  $("#addFormVente_content").load("pages/addFormVente.php?nomUser=" + nomUser);
  $('.ui.long.addFormVente.modal').modal({
    onVisible: function(){
        $('.ui.long.addFormVente.modal').modal('refresh');
        $('body').addClass('scrolling');
    },
    observeChanges: true,
    transition: 'fade up'}).modal('show').addClass('scrolling active');
}*/

//Affiche du formulaire de dépot
//prend en paramètres le nom de l'utilisateur
/*function add_formDepot(nomUser)
{
  $("#addFormDepot_content").load("pages/addFormDepot.php?nomUser=" + nomUser);
  $('.ui.long.addFormDepot.modal').modal({
    onVisible: function(){
        $('.ui.long.addFormDepot.modal').modal('refresh');
        $('body').addClass('scrolling');
    },
    observeChanges: true,
    transition: 'fade up'}).modal('show')//.addClass('scrolling active');
}*/



//Affichage des paramètres du compte
function param_compte()
{
  $("#param_compte_content").load("pages/parametres_compte.php");
  $('.ui.long.param_compte.modal').modal({
    onVisible: function(){
        $('.ui.long.param_compte.modal').modal('refresh');
        $('body').addClass('scrolling');
    },
    observeChanges: true,
    transition: 'fade up'}).modal('show')//.addClass('scrolling active');
}


//Affiche du formulaire d'edition de permis
function edit_permis(idPermis, idService)
{
    $("#editPermis_content").load("pages/edit_permis.php?idPermis=" + idPermis + "&idService=" + idService);
    $('.ui.long.editPermis.modal').modal({
        onVisible: function(){
            $('.ui.long.editPermis.modal').modal('refresh');
            $('body').addClass('scrolling');
        },
        observeChanges: true,
        transition: 'fade up'}).modal('show')//.addClass('scrolling active');
}

//APERCU FICHIER
function readURL(input) {
    if (input.files && input.files[0]) {

        var ua = window.navigator.userAgent;
        //alert(ua);
        var msie = ua.indexOf("MSIE ");
        // Si c'est Internet Explorer, affiche le numéro de version
        //if (msie > -1 || !!navigator.userAgent.match(/Trident.*rv\:11\./)){


        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result)
                .attr('alt', 'aperçu de ce fichier non disponible');
        };

        reader.readAsDataURL(input.files[0]);


    }
}

//LANGUE FRANCAISE
function  frenchLanguage(){
    var btnEnglish = document.getElementById("englishBtn").style;
    var btnFrench = document.getElementById("frenshBtn").style;
    var corpsEnglish = document.getElementById("englishNews").style;
    var corpsFrench = document.getElementById("frenchNews").style;

    btnEnglish.background = "#0c5460";
    btnEnglish.color = "Black";
    btnFrench.background = "#04282c";
    btnFrench.color = "white";
    btnEnglish.boxShadow = "transparent 0.01em 0.0em 0em";
    btnFrench.boxShadow = "rgb(255, 255, 255) 0.01em 0.0em .6em";
    btnEnglish.textShadow = "rgb(255, 255, 255) 0.01em 0.0em .6em";
    btnFrench.textShadow = "black 0.1em 0.1em 0.2em";

    corpsEnglish.display = "none";
    corpsFrench.display = "block";
}

//LANGUE ANGLAISE
function englishLanguage() {
    var btnEnglish = document.getElementById("englishBtn").style;
    var btnFrench = document.getElementById("frenshBtn").style;
    var corpsEnglish = document.getElementById("englishNews").style;
    var corpsFrench = document.getElementById("frenchNews").style;

    btnFrench.background = "#0c5460";
    btnFrench.color = "Black";
    btnEnglish.background = "#04282c";
    btnEnglish.color = "white";
    btnFrench.boxShadow = "transparent 0.01em 0.0em 0em";
    btnEnglish.boxShadow = "rgb(255, 255, 255) 0.01em 0.0em .6em";
    btnFrench.textShadow = "rgb(255, 255, 255) 0.01em 0.0em .6em";
    btnEnglish.textShadow = "black 0.1em 0.1em 0.2em";

    corpsEnglish.display = "block";
    corpsFrench.display = "none";

}

function signup() {

    //alert("test");
    var signup = document.getElementById("signUp").style;
    signup.borderTopColor = "#04282c";

}

function signupDown() {

    //alert("test");
    var signup = document.getElementById("signUp").style;
    signup.borderTopColor = "#0c5460";
    signup.textShadow = "rgb(255, 255, 255) 0.01em 0.0em .6em";

}

function signin() {

    //alert("test");
    var signin = document.getElementById("signIn").style;
    signin.borderTopColor = "#04282c";

}

function signinDown() {

    //alert("test");
    var signin = document.getElementById("signIn").style;
    signin.borderTopColor = "#0c5460";
    signin.textShadow = "rgb(255, 255, 255) 0.01em 0.0em .6em";
}

function clickSignUp(){
    var signup = document.getElementById("divSignUp");
    var signin = document.getElementById("divSignIn");
    var formSignUp = document.getElementById("formSignUp");
    var formSignIn = document.getElementById("formSignIn");
    signup.style.display = "none";
    formSignUp.style.display = "block";
    signin.style.display = "block";
    formSignIn.style.display = "none";
}

function clickSignIn(){
    var signup = document.getElementById("divSignUp");
    var signin = document.getElementById("divSignIn");
    var formSignUp = document.getElementById("formSignUp");
    var formSignIn = document.getElementById("formSignIn");
    signup.style.display = "block";
    formSignUp.style.display = "none";
    signin.style.display = "none";
    formSignIn.style.display = "block";
}

function resetForm(form) {
    //alert("ok1");
    document.getElementById(form).reset();
    //alert("ok2");
}

function submitForm(form) {
    //alert("ok1");
    document.getElementById(form).submit();
    //alert("ok2");
}

function displayOrganisation(){

    var input = document.getElementById("org");
    var label = document.getElementById("labelOrg");

    if (input.style.display == 'none'){
        input.style.display = "block";
        label.style.display = "block";
    }
    else{
        input.style.display = "none";
        label.style.display = "none";
    }

}



$(document).ready(function() {
    $("#datepicker1").datepicker({
        dateFormat: 'dd/mm/yy',
        changeMonth: true
        , changeYear: true
        , yearRange: '-1:+1'
    });
});

$(document).ready(function() {
    $( "#datepickerAnniv" ).datepicker({
        dateFormat: 'dd/mm/yy',
        defaultDate: "+1w",
        numberOfMonths: 2,
        changeMonth: true,
        changeYear: true,
        yearRange: '-100:+0',
        maxDate: '+0Y',
        onClose: function( selectedDate ) {
            $( "#datepickerInutile" ).datepicker( "option", "minDate", selectedDate );
        }
    });
    $( "#datepickerInutile" ).datepicker({
        dateFormat: 'dd/mm/yy',
        defaultDate: "+1w",
        numberOfMonths: 2,
        changeMonth: true,
        changeYear: true,
        maxDate: '+0Y',
        onClose: function( selectedDate ) {
            $( "#datepickerAnniv" ).datepicker( "option", "maxDate", selectedDate );
        }
    });
});


//AjaxAddSkil
function addSkillAjax(libelleSkill){
    alert(libelleSkill);
    /*$.post(
        'modele/addSkillMinim.php', // script php
        {
            //libelleSkill : $("#delete").val(),  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
            libelleSkill : libelleSkill,

        },
        function(data){
            if(data == 'Success'){
                // Le membre est connecté. Ajoutons lui un message dans la page HTML.
                alert("bingo");
            }
            else{
                // Le membre n'a pas été connecté. (data vaut ici "failed")
                alert("raté : " + data );
            }
        },
        'text' // Nous souhaitons recevoir "Success" ou "Failed", donc on indique text !
    );*/
    $.ajax({
        url : 'modele/addSkillMinim.php',
        type : 'POST',
        data : 'libelleSkill=' + libelleSkill,
        //data : 'email=' + email + '&contenu=' + contenu_mail, // On fait passer nos variables, exactement comme en GET, au script more_com.php
        dataType : 'html',
        success : function(code_html, statut){ // success est toujours en place, bien sûr !
            alert(statut);
        },

        error : function(resultat, statut, erreur){
            alert(erreur);
        }

    });
}

/*

//Ajout de compétences
function addAnAttributeSkill(){

    //alert('passe');
    var lastSkill = document.getElementById('idAttr').innerHTML;
    alert(lastSkill);

    var libelleSkill = document.getElementById("libelleSkill" + lastSkill).value;
    /!*var noteSkill = document.getElementById("noteSkill" + lastSkill); //TEST
    var certifSkill = document.getElementById("certifSkill" + lastSkill);*!/
    var rowSkill = document.getElementById("rowSkill" + lastSkill);

    //alert(libelleSkill);

    var lastSkillInc = parseInt(lastSkill) + 1;

    //var rowSkillInc = document.getElementById("rowSkill" + lastSkillInc).style.display;

    //alert(rowSkillInc);



    if (lastSkill == 0){
        if (libelleSkill != 0){
            //alert('passeIF');
            //Enregistrement en BDD de la compétences
            addSkillAjax(libelleSkill);

            //Nouvelle ligne

            document.getElementById("rowSkill" + lastSkillInc).style.display = "table-row";

            //alert('newLine');
            //alert(document.getElementById("rowSkill" + lastSkillInc).style.display);
        }
        else {
            //alert('passeElse');
            rowSkill.style.display = "table-row";
        }
        document.getElementById('idAttr').innerText = parseInt(lastSkill) + 1;

    }
    else {

        alert('passeElse');

        if(libelleSkill != 0){
            //Enregistrement en BDD de la compétence
            //alert('passeElsePiF');

            addSkillAjax(libelleSkill);

            //New Line
            document.getElementById("rowSkill" + lastSkillInc).style.display = "table-row";

            document.getElementById('idAttr').innerText = parseInt(lastSkill) + 1;

        }
    }



}*/
