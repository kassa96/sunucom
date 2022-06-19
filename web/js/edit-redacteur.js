$(function(){
  $('#name').bind('blur',function(){
 $("#erreur-inscription").hide();
 verifInput("name");
});
  $('#metier').bind('blur',function(){
 $("#erreur-inscription").hide();
 verifInput("metier");
});
  $('#email').bind('blur',function(){
  $("#erreur-inscription").hide();
 verifInput("email");
});
  $('#masculin').bind('click',function(){
  $("#erreur-inscription").hide();
 $("#error-genre").hide();
});
  $('#feminin').bind('click',function(){
  $("#erreur-inscription").hide();
 $("#error-genre").hide();
});
 $('#inscrire-btn').bind('click',function(){
  var resultat=false;
  var genre=$('#masculin').is(':checked')+$('#feminin').is(":checked");
  if(!genre){
    if(!$("#panel-genre").hasClass('has-error'))
    {
    $("#panel-genre").addClass('has-error');
    }
    
    $("#error-genre").show();
  }
  else{
    $("#panel-genre").removeClass('has-error');
    $("#error-genre").hide();
  }
  resultat=genre+ verifInput("name")+
            verifInput("email");
  if(!resultat){
$("#erreur-inscription").text("Votre formulaire est mal remplie !Veuillez corriger les champs en rouge ")
                        .show();
                         
  }
  else{
    $("#erreur-inscription").hide();
     $("#form-inscription").submit(function(){
    });
  }
  return false;
});
});
function verifInput(name_input){
var resultat;
name_input=name_input.trim();
var _name="#"+name_input;
var panel_name="#panel-"+name_input;
var error_name="#error-"+name_input;
var valeur=$(_name).val();
  if (name_input=="name") 
  resultat=verifName(valeur);
  else if(name_input=="email")
   resultat=verifEmail(valeur); 
 else if(name_input=="metier")
   resultat=verifMetier(valeur); 
 
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
function verifMetier(name){
  if (typeof name === 'undefined') {
    message="Veuillez saisir votre profession ,lieu de travail et diplome !";
    return false;
  }
  name=name.toLowerCase();
  name=name.trim();
  if (name.length==0) {
message="votre profession ,lieu de travail et diplome vide : veuillez les saisir !";
    return false;
  }
  if (name.length<5) {
message=" votre profession ,lieu de travail et diplome doivent faire au moins 5 caractaires !";
    return false;  
}
  var result = name.indexOf(' ');
if (result == -1) {
  message="veuillez séparer votre profession ,lieu de travail et diplome  par une espace et des conjonctions !";
    return false;                                                                              
}
return true;
}
function verifName(name){
  if (typeof name === 'undefined') {
    message="Veuillez saisir votre prénom et nom !";
    return false;
  }
  name=name.toLowerCase();
  name=name.trim();
  if (name.length==0) {
message="prénom et nom vide : veuillez les saisir !";
    return false;
  }
  if (name.length<5) {
message=" votre prénom et nom doivent faire au moins 5 caractaires !";
    return false;  
}
  var result = name.indexOf(' ');
if (result == -1) {
  message="veuillez séparer votre prénom et nom par une espace !";
    return false;                                                                              
}
return true;
}
function verifEmail(mail){
  if (typeof mail === 'undefined') {
    message="Veuillez saisir votre email !";
    return false;
  }
  mail=mail.trim();
  if (mail.length==0) {
message="email vide : veuillez le saisir !";
    return false;
  } 
if (!(/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/.test(mail))) {
message="email incorrecte Veuillez saisir une bonne email !";
    return false; 
}

return true;
}
function verifGenre(masculin,feminin){
  if (typeof masculin === 'undefined') {
    message="Veuillez selectionner votre genre !";
    return false;
  }
  if (typeof feminin === 'undefined') {
    message="Veuillez selectionner votre genre !";
    return false;
  }  
return true;
}