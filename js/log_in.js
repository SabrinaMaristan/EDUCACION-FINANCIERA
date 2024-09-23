function logIn() {
    let username = document.forms["form"]["IDuser"].value; //creamos las variables con los nombres para que guarden la informacion del input en el html
    let password = document.forms["form"]["IDpassword"].value;


if (username == "" || password == "") {
    alert("Debe llenar todos los campos");
    return false; // No permite que se envíen los datos, interrumpe el ciclo hasta que se cumplan todas las condiciones.
}

// Verifica si el usuario existe en la base de datos
//Todavía no funciona
if (username.length < 8 || username.length > 20) {
    alert("Tu nombre de usuario debe tener entre 8 y 20 caracteres");
    return false;
}


// Si todo es correcto, muestra un mensaje de bienvenida
alert("¡Bienvenido/a!" + username);
return true;
}
