<?php
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form values
    $username = $_POST['username'];
    $password = $_POST['pass'];
    // Connect to the database
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "projekt";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT * FROM logins WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists in the logins table
    if ($result->num_rows > 0 && password_verify($password, $result->fetch_assoc()['lozinka'])){
     
        header("Location: administracija.php");
        exit();
    } else {
        // User does not exist, display an error message
        echo "Invalid username or password";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>