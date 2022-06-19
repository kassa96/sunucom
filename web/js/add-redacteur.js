 var message="";
  $(function(){
   $('#type-profession').bind('change',function(){
    if ($(this).val()=="etudiant") {
      $('#label-metier').text("Vous étez dans quelle filiére ou faculté ?");
      $('#label-lieu').text("Dans quelle université vous avez étudié ? ");
        $("#panel-lieu").show();
      $('#panel-metier').show();
    }
    else if ($(this).val()=="diplome") {
     $('#label-metier').text("Quel est votre type de diplome ? ");
      $('#label-lieu').text("L'université ou vous avez eu cette diplome ? ");
        $("#panel-lieu").show();
      $('#panel-metier').show();
    }
    if ($(this).val()=="professeur") {
      $('#label-metier').text("Quelle matiére enseigné vous ? ");
      $('#label-lieu').text("Vous étes profésseur dans quelle établissement ? ");
        $("#panel-lieu").show();
      $('#panel-metier').show();
    }
    if ($(this).val()=="salarie") {
      $('#label-metier').text("Quelle est votre poste ou métier ? ");
      $('#label-lieu').text("Dans quelle entreprise vous travaillez ? ");
        $("#panel-lieu").show();
      $('#panel-metier').show();
    }
    else if ($(this).val()=="amateur") {
      $("#panel-lieu").hide();
      $('#panel-metier').hide();

    }
    else{

    } 
});
  $('#metier').bind('blur',function(){
    $("#erreur-redacteur").hide();
 verifInput("metier");
});
  $('#lieu').bind('blur',function(){
    $("#erreur-redacteur").hide();
 verifInput("lieu");
});
 
 $('#redacteur-btn').bind('click',function(){
  var resultat=false;
  resultat=verifInput("metier")+
            verifInput("lieu");
  if(!resultat){
$("#erreur-redacteur").show();
 return false;
  }
  else{
    $("#erreur-redacteur").hide();
  }
 // return false;
});
});
function verifInput(name_input){
var resultat;
name_input=name_input.trim();
var _name="#"+name_input;
var panel_name="#panel-"+name_input;
var error_name="#error-"+name_input;
var valeur=$(_name).val();
   if(name_input=="metier")
   resultat=verifMetier(valeur); 
 else if(name_input=="lieu"){
 resultat=verifLieu(valeur);
 }
 
  if(!resultat){
    if(!$(panel_name).hasClass('has-error'))
    {
    $(panel_name).addClass('has-error');
    }
    
    $(error_name).html(message)
                    .show();
  }
  else{
    $(panel_name).removeClass('has-error');
    $(error_name).hide();
  }
  return resultat;
}

function verifMetier(metier){
  if (typeof metier === 'undefined') {
    message="Veuillez saisir votre faculté si vous étes étudiant ou votre profession !";
    return false;
  }
  metier=metier.trim();
  if (metier.length==0) {
        message="Veuillez saisir votre faculté si vous étes étudiant ou votre profession !";

    return false;
  } 
return true;
}
function verifLieu(lieu){
  if (typeof lieu === 'undefined') {
    message="Veuillez saisir votre université ou l'entreprise où vous travailléz !";
    return false;
  }
  lieu=lieu.trim();
  if (lieu.length==0) {
message="Veuillez saisir votre université ou l'entreprise où vous travailléz !";
    return false;
  } 
return true;
}