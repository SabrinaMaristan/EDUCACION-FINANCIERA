// JavaScript file for form validation
document.getElementById("registerForm").addEventListener("submit", function(event) {
    // Prevent the default form submission
    event.preventDefault(); 

    // Basic validation to ensure username and password meet basic criteria
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;

    // Checking minimum length for username and password
    if (username.length < 5) {
        alert("El nombre de usuario debe tener al menos 5 caracteres.");
    } else if (password.length < 8) {
        alert("La contraseña debe tener al menos 8 caracteres.");
    } else if (!/[A-Z]/.test(password) || !/[0-9]/.test(password)) {
        alert("La contraseña debe contener al menos una letra mayúscula y un número.");
    } else {
        // If validation passes, submit the form normally
        this.submit(); // Esto permitirá que el formulario se envíe al servidor
    }
});
