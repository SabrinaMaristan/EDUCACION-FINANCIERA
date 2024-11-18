<?php
// Configuración de la base de datos
$servername = "sabrinamaristan.github.io/EDUCACION-FINANCIERA"; // Servidor de la base de datos
$username = "root"; // Usuario de la base de datos
$password = ""; // Contraseña de la base de datos
$dbname = "registration"; // Nombre de la base de datos

// Crear conexión con la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
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

    // Consulta para verificar si el usuario está registrado
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql); // Preparar la consulta
    $stmt->bind_param("s", $user); // Vincular el parámetro
    $stmt->execute(); // Ejecutar la consulta
    $result = $stmt->get_result(); // Obtener el resultado

    // Verificar si se encontró el usuario
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Obtener los datos del usuario
        // Verificar si la contraseña es correcta
        if (password_verify($pass, $row['password'])) {
            $message = "Inicio de sesión exitoso. Redirigiendo..."; // Mensaje de éxito
            echo "<script>
                    alert('$message');
                    window.location.href = 'http://sabrinamaristan.github.io/EDUCACION-FINANCIERA/SPANISH/index.html'; // Redirigir al usuario 
                </script>";         
            exit(); // Salir del script
        } else {
            $message = "Contraseña incorrecta. Inténtelo de nuevo." . $stmt->error; // Mensaje de error de contraseña
        }
    } else {
        $message = "El usuario no está registrado. Verifique los datos."  . $stmt->error; // Mensaje si el usuario no existe
    }

    $stmt->close(); // Cerrar la declaración
}

$conn->close(); // Cerrar la conexión
// Si hay un mensaje, se muestra en una alerta
if (!empty($message)) {
    echo "<script>
            alert('$message');
            window.location.href = 'http://sabrinamaristan.github.io/EDUCACION-FINANCIERA/SPANISH/InicioSesion.html'; // Redirigir de vuelta al formulario
          </script>";
}
?>