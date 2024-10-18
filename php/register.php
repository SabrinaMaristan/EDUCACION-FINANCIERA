<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conexión a la base de datos MySQL
$servername = "localhost";
$username = "root"; // Nombre de usuario por defecto en XAMPP
$password = ""; // Contraseña por defecto en XAMPP
$dbname = "registration";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Comprobar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y sanitizar los inputs del formulario
    $user = htmlspecialchars(trim($_POST['username']));
    $pass = htmlspecialchars(trim($_POST['password']));

    // Encriptar la contraseña para mayor seguridad
    $hashed_password = password_hash($pass, PASSWORD_BCRYPT);

    // Preparar la sentencia SQL para evitar inyecciones SQL
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $user, $hashed_password);

    // Ejecutar la sentencia
    if ($stmt->execute()) {
        // Guardar mensaje en la sesión
        $_SESSION['message'] = "¡Bienvenido/a! Ahora tienes una cuenta. NOMBRE DE USUARIO: $user.";
        // Redirigir a index.html después del registro exitoso
        header("Location: ..\SPANISH\index.html");
    } else {
        echo "Error: " . $stmt->error;
    }



    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
}
?>
