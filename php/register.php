<?php
// Configuración de la base de datos
$servername = "localhost"; // Servidor de la base de datos
$username = "root"; // Usuario de la base de datos
$password = ""; // Contraseña de la base de datos
$dbname = "registration"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Inicializar variable para el mensaje
$message = "";

// Comprobar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $user = $_POST['username']; // Nombre de usuario
    $pass = $_POST['password']; // Contraseña

    // Verificar si el nombre de usuario ya existe en la base de datos
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql); // Preparar la consulta
    $stmt->bind_param("s", $user); // Vincular el parámetro
    $stmt->execute(); // Ejecutar la consulta
    $result = $stmt->get_result(); // Obtener el resultado

    // Comprobar si se encontró un usuario con el mismo nombre
    if ($result->num_rows > 0) {
        $message = "El nombre de usuario ya existe. Por favor, elija otro. Si este es su nombre de usuario, inicie sesión."; // Mensaje si el nombre ya existe
    } else {
        // Encriptar la contraseña
        $hashedPassword = password_hash($pass, PASSWORD_DEFAULT); // Encriptar la contraseña

        // Insertar el nuevo usuario en la base de datos
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql); // Preparar la consulta
        $stmt->bind_param("ss", $user, $hashedPassword); // Vincular los parámetros

        if ($stmt->execute()) { // Ejecutar la consulta
            $message = "Registro exitoso. Redirigiendo..."; // Mensaje de éxito
            echo "<script>
                    alert('$message');
                    window.location.href = 'http://localhost/SPANISH/index.html'; // Redirección
                  </script>";
            exit(); // Salir del script
        } else {
            $message = "Error al registrar el usuario: " . $stmt->error; // Mensaje de error en la inserción
        }
    }

    $stmt->close(); // Cerrar la declaración
}

$conn->close(); // Cerrar la conexión

// Si hay un mensaje, se muestra en una alerta
if (!empty($message)) {
    echo "<script>
            alert('$message');
            window.location.href = 'http://localhost/SPANISH/Registrarse.html'; // Redirigir de vuelta al formulario
          </script>";
}
?>
