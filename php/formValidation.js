// JavaScript file for form validation
document.getElementById("registerForm").addEventListener("submit", function(event) {
    // Basic validation to ensure username and password meet basic criteria
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;

    // Checking minimum length for username and password
    if (username.length < 5) {
        alert("Username must be at least 5 characters long.");
        event.preventDefault(); // Prevent form submission
    } else if (password.length < 8) {
        alert("Password must be at least 8 characters long.");
        event.preventDefault(); // Prevent form submission
    } else if (!/[A-Z]/.test(password) || !/[0-9]/.test(password)) {
        alert("Password must contain at least one uppercase letter and one number.");
        event.preventDefault(); // Prevent form submission
    }
});
