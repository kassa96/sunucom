	$(function (){
   $('.article_link').each( function(){
   $(this).on('mouseenter',function(e){
    $(this).find('.article_contenu').slideDown();
    $(this).find('.article_presentation').hide();
    return false;
  });
   $(this).on('mouseleave',function(e){
    $(this).find('.article_contenu').hide();
    $(this).find('.article_presentation').show();
    return false;
  });
  });

});