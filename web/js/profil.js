$(function(){
$('#close-connexion').bind('click',function(e){
    $("#message").hide();
  });
setTimeout(function() {
             $("#message").hide();
            }, 180000);
 $('#change_photo').on('change',function(e){
  var files = this.files,
imgType;
var allowedTypes = ['png', 'jpg', 'jpeg', 'gif'];

imgType = files[0].name.split('.');
imgType = imgType[imgType.length - 1];
if(allowedTypes.indexOf(imgType) != -1) {
  createThumbnail(files[0]);
  $('#form-photo').submit();
}
});
  function createThumbnail(file) {
  var reader = new FileReader();
  reader.onload = function() {
  var imgElement = $('#photo');
  imgElement.attr('src',this.result);
  imgElement.show();
};
reader.readAsDataURL(file);
}
});
