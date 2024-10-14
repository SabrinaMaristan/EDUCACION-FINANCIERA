<?php
// Include database connection
$servername = "localhost";
$dbname = "registration";  // Your database name
$username = "root";   // Default XAMPP username
$password = "";       // Default XAMPP password (empty)

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username and password are not empty
    if (empty($username) || empty($password)) {
        header("Location: index.html?error=Please fill in all fields");
        exit();
    }

    // Prepare SQL query to fetch user
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Start a session and set user details (successful login)
            session_start();
            $_SESSION['username'] = $user['username'];
            header("Location: register.html"); // Redirect to a welcome or dashboard page
        } else {
            // Incorrect password
            header("Location: index.html?error=Incorrect password");
        }
    } else {
        // User not found
        header("Location: index.html?error=User does not exist");
    }

    $stmt->close();
    $conn->close();
}
?>