$(document).ready(function() {


$( "span.menu" ).click(function() {
                     $( "ul.nav1" ).slideToggle( 300, function() {
                     // Animation complete.
                      });
                     });

$('#modal').on('shown.bs.modal', function () {
  $('#modal').focus();
  $(this).appendTo("body");
})

$('#ModalUpload').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
   $.getScript('//cdn.jsdelivr.net/isotope/1.5.25/jquery.isotope.min.js',function(){

  /* activate jquery isotope */
  $('#posts').imagesLoaded( function(){
    $('#posts').isotope({
      itemSelector : '.item'
    });
  });
    $('#posts').imagesLoaded( function(){
    $('#posts').isotope({
      itemSelector : '.item-grids'
    });
  });



  
});


document.querySelector("html").classList.add('js');


// initialisation des variables
var fileInput  = document.querySelector( ".input-file" ),  
    button     = document.querySelector( ".input-file-trigger" ),
    the_return = document.querySelector(".file-return");
 console.log(fileInput);
// action lorsque la "barre d'espace" ou "Entrée" est pressée
button.addEventListener( "keydown", function( event ) {
    if ( event.keyCode == 13 || event.keyCode == 32 ) {
        fileInput.focus();
    }
});

// action lorsque le label est cliqué
button.addEventListener( "click", function( event ) {
   fileInput.focus();
   return false;
});
 
// affiche un retour visuel dès que input:file change
fileInput.addEventListener( "change", function( event ) {  
    the_return.innerHTML = this.value;  
});

});