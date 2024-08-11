function signUp() {
    let nombre = document.forms["formulario"]["IDnombre_del_usuario"].value; //creamos las variables con los nombres para que guarden la informacion del input en el html
    let nom_usuario = document.forms["formulario"]["IDusuario"].value;
    let contrasenia = document.forms["formulario"]["IDcontrasenia"].value;

    //Velifica mediante el id que el formulario (en este caso) sea completado. 
    if(nombre == ""){
        alert("Debe llenar todos los campos")
        return false; // no permite que se envien los datos, interrumpe el ciclo hasta que se cumplan todas las condiciones.
    }

    if (nom_usuario.length < 8 || nom_usuario.length > 20)
    {
        alert("Tu nombre de usuario debe tener entre 8 y 20 caracteres");
        return false;
    }

    if (contrasenia == ""){
        alert("You need to field all the blanks")
        return false;
    }

    alert("Bienvenido/a! Ahora tienes una cuenta!")
    alert("No los olvides! NOMBRE DE USUARIO: " + nom_usuario + ", y tu CONTRASEÑA: " + contrasenia)
    return true;

}