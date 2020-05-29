// Inicialización de la Librería Responsive Tables
  $( document ).ready( function() {
      window.responsiveTables.init(); 
      AOS.init();     
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


// Toggle para la edicion de post
function runEffect2(){
  $("#transicion").toggle('fade');
  runEffect3();
}

function runEffect3(){
  $("#editPost").toggle('fade');
}

$("#editar").click(function(){
  runEffect2();
});


window.onload = () =>{
  setInterval(function(){
    $('#alertContraseña').hide(1000);
    }, 3000);
}

