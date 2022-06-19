$(function(){
  $('#email').bind('blur',function(){
    $("#erreur-connexion").hide();
 verifInput("email");
});
  $('#password').bind('blur',function(){
    $("#erreur-connexion").hide();
 verifInput("password");
});
 
 $('#connexion-btn').bind('click',function(){
  var resultat=false;
  resultat=verifInput("email")+
            verifInput("password");
  if(!resultat){
$("#erreur-connexion").show();

  }
  else{
    $("#erreur-connexion").hide();
     $("#form-connexion").submit();
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
   if(name_input=="email")
   resultat=verifEmail(valeur); 
 else if(name_input=="password"){
 resultat=verifPassword(valeur);
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
function verifPassword(password){
  if (typeof password === 'undefined') {
    message="Veuillez saisir votre mot de passe !";
    return false;
  }
  password=password.trim();
  if (password.length<5) {
message="mot de passe vide : veuillez le saisir !";
    return false;
  } 

return true;
}