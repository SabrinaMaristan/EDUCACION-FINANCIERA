document.getElementById("registerForm").addEventListener("submit", function(event) {
    let username = document.forms["registerForm"]["username"].value; // Updated to use the correct name attribute
    let password = document.forms["registerForm"]["password"].value;

    if (username == "" || password == "") {
        alert("Debe llenar todos los campos");
        event.preventDefault(); // Prevent form submission
        return false;
    }

    if (username.length < 8 || username.length > 20) {
        alert("Tu nombre de usuario debe tener entre 8 y 20 caracteres");
        event.preventDefault(); // Prevent form submission
        return false;
    }

    // If everything is correct, show a welcome message
    alert("¡Bienvenido/a " + username + "!");
    return true; // Allow form submission
});
