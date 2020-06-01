// Validación del formulario de cambio de contraseña
function submitFormContraseña() {
    let password = document.getElementById('password').value;
    let passwordConfirm = document.getElementById('password-confirm').value;
    let error = document.getElementById('msgError');

    if (password.trim() == "" || passwordConfirm.trim() == "") {
        // alert('Ambos campos son obligatorios');
        error.innerHTML = "";
        error.innerHTML = "Los campos son obligatorios";
        $('#msgError').show();
        error.onmouseover = () => {
            $('#msgError').hide(1000);
        }
    } else if (!(password == passwordConfirm)) {
        // alert('Las contraseñas no coinciden');
        error.innerHTML = "";
        error.innerHTML = "Las contraseñas no coinciden";
        $('#msgError').show();
        error.onmouseover = () => {
            $('#msgError').hide(1000);
        }
    } else {
        document.getElementById('formContraseña').submit();
    }
}


// Validación del formulario del edit del perfil
function submitFormPerfil() {
    let name = document.getElementById('name').value;
    let nickname = document.getElementById('username').value;
    let email = document.getElementById('email').value;
    let error = document.getElementById('msgError1')

    if (name.trim() == "" || nickname.trim() == "" || email.trim() == "") {
        error.innerHTML = "";
        error.innerHTML += "No puedes dejar ningún campo vacío";
        $('#msgError1').show();
        error.onmouseover = () => {
            $('#msgError1').hide(1000);
        }
    } else {
        document.getElementById('formPerfil').submit();
    }
}


// Validación del formulario de búsqueda
function submitFormBusqueda() {
    let input = document.getElementById('input').value;

    if (input.trim() == "") {
        alert('Debes introducir algún valor para realizar la búsqueda');
    } else {
        document.getElementById('form').submit();
    }
}



function submitFormCreatePost()
{
    let titulo = document.getElementById('title').value;
    let categoria_id = document.getElementById('categoria_id').value;
    let descripcion = document.getElementById('descripcion').value;
    let contenido = document.getElementById('contenido').value; 
    let error = document.getElementById('msgError'); 

    if (titulo.trim() == "" || categoria_id.trim() == "" || descripcion.trim() == "" || contenido.trim() == "") {
        error.innerHTML = "";
        error.innerHTML += "No puedes dejar ningún campo vacío";
        $('#msgError').show();
        error.onmouseover = () => {
            $('#msgError').hide(1000);
        }
    } else {
        document.getElementById('formCreate').submit();
    }

}


function submitFormLogin()
{
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let error = document.getElementById('msgError');

    if (email.trim() == "" || password.trim() == "") {
        error.innerHTML = "";
        error.innerHTML += "Debes introducir ambos campos";
        $('#msgError').show();
        error.onmouseover = () => {
            $('#msgError').hide(1000);
        }
    } else {
        document.getElementById('formLogin').submit();
    }
}
