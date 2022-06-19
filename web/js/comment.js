$(function(){
   setTimeout(function() {
     $.post(
            'http://localhost/micro_blog_economie/article/lecteur/'+$('#number').val(), 
            {
            },

            function(code_html){ 
              if (code_html=="deja-lue") {

              }else if (code_html=="lue") {
               var nbre=$('#lecteur_input').val();
            nbre=parseInt(nbre);
            nbre=nbre+1;
            $('#nbre_lecteur').text(nbre+" lecteurs"); 
            if(nbre==1)       
            $('#nbre_lecteur').attr('title',nbre+" personne a lue cette article");
            else
            $('#nbre_lecteur').attr('title',nbre+" personnes ont lue cette article");
              }
});
           
            }, 30000);
 $('.close-reponse').each(function(){
     $(this).parents('.commentaire').find('.success-reponse').hide();
});
  $('#close-comment').bind('click',function(e){
    $("#success-comment").hide();
  });
  $('.reponse-link').each(function(){
$(this).bind('click',function(e){
  e.preventDefault();
  $('.reponse-input').each(function(){
     $(this).hide();
    });
  $(this).parents('.commentaire').find('.reponse-input').show();
  return false;
});
});
  $('.reponse-input').each(function(){
$(this).bind('keyup',function(e){
      e.preventDefault();
        if(e.keyCode==13){

if($(this).val()!=""){
  var comment=$(this);
  var errorReponse=$(this).parents('.commentaire').find(".error-reponse"); 
  var successReponse=$(this).parents('.commentaire').find(".success-reponse");
  var article=$(this).parents('.commentaire').find(".number").val();
  var contenu=$(this).val();
  var reponse=$(this).parents('.commentaire').find(".reponse-name").val();
     $.post(
            'http://localhost/micro_blog_economie/comment/add', 
            {
                article : article,  
                contenu : contenu,
                reponse  : reponse
            },

            function(code_html){ 
              if (code_html=="no-user") {
            errorReponse.html('Veuillez vous connectez  <a href=http://localhost/micro_blog_economie/user/connexion>ici</a>  pour envoyer votre réponse ! ');
            errorReponse.show();  
            successReponse.hide();
           }
           else if(code_html=="no-comment"){
           errorReponse.text('Veuillez écrire votre réponse ! ');
            successReponse.hide();
          errorReponse.show();
           }
           else{
           errorReponse.hide();
            $('#liste-comment').append(code_html);
            comment.val("");
            comment.hide();
            successReponse.show();
            setTimeout(function() {
             successReponse.hide();
            }, 1000);
            var nbre=$('#nbre_comment_input').val();
            nbre=parseInt(nbre);
            nbre=nbre+1;
            $('#nbre_comment').text(nbre+" commentaires");
           }
            },

            'text' 
         );

    }
        }
});
});
	$("#add-comment").bind('click',function(){

		if ($('.image_user_comment').hasClass('no-profil')) {
			$("#error-profil").show();
		}
		else $("#error-profil").hide();

	}).bind('keyup',function(e){
		e.preventDefault();
        if(e.keyCode==13){
if($(this).val()!=""){
	     
		 $.post(
            'http://localhost/micro_blog_economie/comment/add', 
            {
                article : $('#number').val(),  
                contenu : $('#add-comment').val()
            },

            function(code_html){ 
            	if (code_html=="no-user") {
           	$("#error-profil").html('Veuillez vous connectez  <a href=http://localhost/micro_blog_economie/user/connexion>ici</a>  pour envoyer un commentaire ! ');
           	$("#error-profil").show();	
            $("#success-comment").hide();
           }
           else if(code_html=="no-comment"){
           	$("#error-profil").text('Veuillez écrire un commentaire ! ');
            $("#success-comment").hide();
            $("#error-profil").show();
           }
           else{
            $("#error-profil").hide();
            $('#liste-comment').append(code_html);
            $('#add-comment').val("");
            $("#success-comment").show();
             setTimeout(function() {
             $("#success-comment").hide();
            }, 10000);
            var nbre=$('#nbre_comment_input').val();
            nbre=parseInt(nbre);
            nbre=nbre+1;
            $('#nbre_comment').text(nbre+" commentaires");
           }
            },

            'text' 
         );

		}
        }
		
});
});