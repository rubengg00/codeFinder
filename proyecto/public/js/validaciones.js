
// Validación del formulario de cambio de contraseña
function submitFormContraseña() {
    let password = document.getElementById('password').value;
    let passwordConfirm = document.getElementById('password-confirm').value;
    let passwordAntigua = document.getElementById('passwordAntigua').value;

    console.log(passAntigua);
    

    let error = document.getElementById('msgError');

    if (password.trim() == "" || passwordConfirm.trim() == "" || passwordAntigua.trim() == "") {
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
    } else{
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


// Validación del formulario de creación de publicaciones
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

// Validacón del formulario de Login
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
    } else if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))) {
        error.innerHTML = "";
        error.innerHTML += "Debes introducir un correo válido";
        $('#msgError').show();
        error.onmouseover = () => {
            $('#msgError').hide(1000);
        }
    }else{
        document.getElementById('formLogin').submit();
    }
}

// Validación para el formulario de Registro 

function iniciar(){
    validar();
}


function validacionNombre(){
    let nombre=document.getElementById("name").value;
    let msgName = document.getElementById('msgName');
    if (nombre.trim()=="") {
        msgName.innerHTML = "";
        msgName.innerHTML += "Debes introducir un nombre";
        $('#msgName').show();
        msgName.onmouseover = () => {
            $('#msgName').hide();
        }
        return false;
    }else{
        msgName.innerHTML = "";
        $('#msgName').hide();
    }
    return true;
}


function validacionUsername()
{
    let username = document.getElementById('username').value;
    let msgUsername = document.getElementById('msgUsername');
    if (username.trim()=="") {
        msgUsername.innerHTML = "";
        msgUsername.innerHTML += "Debes introducir un nombre de usuario";
        $('#msgUsername').show();
        msgUsername.onmouseover = () => {
            $('#msgUsername').hide();
        }
        return false;
    }else if(username.length <6){
        msgUsername.innerHTML = "";
        msgUsername.innerHTML += "Mínimo de caracteres permitidos: 6";
        $('#msgUsername').show();
        msgUsername.onmouseover = () => {
            $('#msgUsername').hide();
        }
        return false;
    }else{
        msgUsername.innerHTML = "";
        $('#msgUsername').hide();
    }
    return true;
}


function validacionCorreo()
{
    let email = document.getElementById('email').value;
    let msgEmail = document.getElementById('msgEmail');

    if (email.trim()=="") {
        msgEmail.innerHTML = "";
        msgEmail.innerHTML += "Debes introducir un correo";
        $('#msgEmail').show();
        msgEmail.onmouseover = () => {
            $('#msgEmail').hide();
        }
        return false;
    }else if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))){
        msgEmail.innerHTML = "";
        msgEmail.innerHTML += "Correo introducido no válido";
        $('#msgEmail').show();
        msgEmail.onmouseover = () => {
            $('#msgEmail').hide();
        }
        return false;
    }else{
        msgEmail.innerHTML = "";
        $('#msgEmail').hide();
    }
    return true;
}

function validacionContraseña()
{
    let password = document.getElementById('password').value;
    let passwordConfirm = document.getElementById('password-confirm').value;
    let msgPassword = document.getElementById('msgPassword');

    if (password.trim()=="" || passwordConfirm.trim()=="") {
        msgPassword.innerHTML = "";
        msgPassword.innerHTML += "Debes introducir ambas contraseñas";
        $('#msgPassword').show();
        msgPassword.onmouseover = () => {
            $('#msgPassword').hide();
        }
        return false;
    }else if(password.length<8 || passwordConfirm.length<8){
        msgPassword.innerHTML = "";
        msgPassword.innerHTML += "Mínimo de caracteres permitidos: 8";
        $('#msgPassword').show();
        msgPassword.onmouseover = () => {
            $('#msgPassword').hide();
        }
        return false;
    }else if(!(password == passwordConfirm))
    {
        msgPassword.innerHTML = "";
        msgPassword.innerHTML += "Las contraseñas no coinciden";
        $('#msgPassword').show();
        msgPassword.onmouseover = () => {
            $('#msgPassword').hide();
        }
        return false;
    }else{
        msgPassword.innerHTML = "";
        $('#msgPassword').hide();
    }
    return true;

}

function validacionTodos()
{
    validacionNombre();
    validacionUsername();
    validacionCorreo();
    validacionContraseña();

    if (validacionNombre() && validacionUsername() && validacionCorreo() && validacionContraseña())
    {
        return true;  
    }else{
        return false;
    }

}

function validar(e){

    if (validacionTodos()) {
        document.getElementById('formRegister').submit();
    }else{
        e.preventDefault();
    }

}


// Validacion para creacion de nueva categoría

function submitCategoriaNueva()
{
    validacionCategoriaNueva();
}

function validacionNombreCategoria()
{
    let nombre = document.getElementById('name').value;
    let msgError = document.getElementById('msgError');

    if (nombre.trim()=="") {
        msgError.innerHTML = "";
        msgError.innerHTML += "Debes introducir un nombre";
        $('#msgError').show();
        msgError.onmouseover = () => {
            $('#msgError').hide(1000);
        }
        return false;
    }else{
        msgError.innerHTML = "";
        $('#msgError').hide();
    }

    return true;
}


function validacionFotoCategoria()
{
    let foto = document.getElementById('fotoPerfil').value;
    let msgError1 = document.getElementById('msgError1');
    let patron = new RegExp('^.*\.(jpg|jpeg|JPG|PNG|png|svg|SVG)$');


    if (foto.trim()=="") {
        msgError1.innerHTML = "";
        msgError1.innerHTML += "Debes introducir un logo para la categoría nueva";
        $('#msgError1').show();
        msgError1.onmouseover = () => {
            $('#msgError1').hide(1000);
        }
        return false;
    }else if(!(patron.test(document.getElementById('fotoPerfil').value))){
        msgError1.innerHTML = "";
        msgError1.innerHTML += "No es un formato válido de imagen";
        $('#msgError1').show();
        msgError1.onmouseover = () => {
            $('#msgError1').hide(1000);
        }
        return false;
    }else{
        msgError1.innerHTML = "";
        $('#msgError1').hide();
    }

    return true;

}


function validacionTodasCategoria()
{
    validacionNombreCategoria();
    validacionFotoCategoria();

    if (validacionNombreCategoria() && validacionFotoCategoria())
    {
        return true;  
    }else{
        return false;
    }

}

function validacionCategoriaNueva(e){

    if (validacionTodasCategoria()) {
        document.getElementById('formNewCategoria').submit();
    }else{
        e.preventDefault();
    }

}
