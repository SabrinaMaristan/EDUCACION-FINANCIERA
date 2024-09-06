function signUp() {
    // Creamos las variables con los nombres para que guarden la información del input en el HTML
    let nom_usuario = document.forms["formulario"]["IDusuario"].value;
    let contrasenia = document.forms["formulario"]["IDcontrasenia"].value;
    let contrasenia_verificacion = document.forms["formulario"]["IDcontrasenia_verificacion"].value;

    // Verifica si todos los campos están completados
    if (nom_usuario == "" || contrasenia == "" || contrasenia_verificacion == "") {
        alert("Debe llenar todos los campos");
        return false; // No permite que se envíen los datos, interrumpe el ciclo hasta que se cumplan todas las condiciones.
    }

    // Verifica la longitud del nombre de usuario
    if (nom_usuario.length < 8 || nom_usuario.length > 20) {
        alert("Tu nombre de usuario debe tener entre 8 y 20 caracteres");
        return false;
    }

    // Verifica si las contraseñas coinciden
    if (contrasenia !== contrasenia_verificacion) {
        alert("Las contraseñas no coinciden");
        return false;
    }

    // Si todo es correcto, muestra un mensaje de bienvenida
    alert("¡Bienvenido/a! Ahora tienes una cuenta.");
    alert("No lo olvides: NOMBRE DE USUARIO: " + nom_usuario + ", y tu CONTRASEÑA: " + contrasenia);
    return true;
}
