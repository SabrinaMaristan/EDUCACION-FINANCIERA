// JavaScript file for form validation
document.getElementById("registerForm").addEventListener("submit", function(event) {
    // Basic validation to ensure username and password meet basic criteria
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;


    function verifica() {
    // Verifica si todos los campos están completados
    if (username == "" || password == "" ) {
        alert("Debe llenar todos los campos");
        event.preventDefault(); // No permite que se envíen los datos, interrumpe el ciclo hasta que se cumplan todas las condiciones.
    } else if (username.length < 8 || username.length > 20) {
        alert("Tu nombre de usuario debe tener entre 8 y 20 caracteres");
        event.preventDefault();
    }
}

    if (verifica()) {
    // Si todo es correcto, muestra un mensaje de bienvenida
    alert("¡Bienvenido/a! Ahora tienes una cuenta.");
    alert("No lo olvides: NOMBRE DE USUARIO: " + username + ", y tu CONTRASEÑA: " + password);
    return true;
    }
    
});
