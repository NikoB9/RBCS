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

        /*}
        else{
            //alert("C'est un autre navigateur");

            pdffile=input.files[0];

            pdffile_url=URL.createObjectURL(pdffile);
            $('#viewer').attr('src',pdffile_url);
            $('#blah').attr('style','visibility:hidden;');

        }*/
        /*

        if(!document.getElementById('blah').complete){*/

        //}

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

    corpsEnglish.display = "block";
    corpsFrench.display = "none";

}