// Inicialización de la Librería Responsive Tables
  $( document ).ready( function() {
      window.responsiveTables.init();
  } );

// Inicialización de la Librería HighLighting
  hljs.initHighlightingOnLoad();


// Toggle del formulario de edición de perfil

  function runEffect1(){
    $("#formPerfil").toggle('drop');
  }

  $("#editPerfil").click(function(){
    runEffect1();
  });


// Toggle para la creación de categorias:
function runEffect(){
  $("#formCategoria").toggle('fade');
}

$("#create").click(function(){
  runEffect();
});


$(document).ready(function(){
  $('.pagination').addClass('pagination justify-content-center');
})



