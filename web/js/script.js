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


});