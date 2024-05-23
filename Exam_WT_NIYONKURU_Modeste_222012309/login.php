<?php
// Connect to the database (replace with your actual credentials)
$host = 'localhost';
$db = 'test_db';
$user = 'root';
$pass = '';
$conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password'];

// Check if user exists
$stmt = $conn->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    // Valid login, redirect to home page
    header('Location: home.php');
    exit;
} else {
    // Invalid login, display an error message
    echo 'Invalid username or password.';
}
?>
