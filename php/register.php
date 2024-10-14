<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//Esto es por si php no funciona, tira error

// Connecting to the MySQL database
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP
$dbname = "registration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); //se verifican las variables.

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form inputs
    $user = htmlspecialchars($_POST['username']);
    $pass = htmlspecialchars($_POST['password']);

    // Hash the password for security-encripta
    $hashed_password = password_hash($pass, PASSWORD_BCRYPT);//encripta 

    // Prepare the SQL statement to prevent SQL injection - envia los datos a servidor
    //stmt: statement - declaración
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)"); //signos de preguntas porque esos datos varian segun el usuario
    $stmt->bind_param("ss", $user, $hashed_password);//guarda la contraseña encriptada

    // Execute the statement
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
