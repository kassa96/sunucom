$(function(){
 
   $('#password1').bind('blur',function(){
  $("#erreur-inscription").hide();
 verifInput("password1");
});
 $('#password2').bind('blur',function(){
  $("#erreur-inscription").hide();
 verifInput("password2");
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
            verifInput("email")+
            verifInput("password1")+
            verifInput("password2");
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
   if(name_input=="password1")
   resultat=verifPassword1(valeur); 
 else if(name_input=="password2"){
 var password1_value=$('#password1').val();
 resultat=verifPassword2(valeur,password1_value);
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

function verifPassword1(password1){
  if (typeof password1 === 'undefined') {
    message="Veuillez saisir votre mot de passe !";
    return false;
  }
  password1=password1.trim();
  if (password1.length==0) {
message="mot de passe vide : veuillez le saisir !";
    return false;
  } 
if (password1.length<7) {
message="mot de passe trés courte : le mot de passe doit avoir au moins 7 caractéres !";
    return false;
  }
return true;
}
function verifPassword2(password2,password1){
  if (typeof password2 === 'undefined') {
    message="Veuillez retaper votre mot de passe !";
    return false;
  }
  password2=password2.trim();
  if (password2.length==0) {
message="mot de passe vide : veuillez le retaper !";
    return false;
  } 
if (password2.length!=password1.length) {
message="les deux mots de passe doivent etre identiques !";
    return false;
  }
return true;
}
