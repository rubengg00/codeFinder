// Inicialización de la Librería Responsive Tables
  $( document ).ready( function() {
      window.responsiveTables.init();
  } );

// Inicialización de la Librería HighLighting
  hljs.initHighlightingOnLoad();


// Toggle del formulario de edición de perfil

  function runEffect(){
    $("#formPerfil").toggle('drop');
  }

  $("#editPerfil").click(function(){
    runEffect();
  });