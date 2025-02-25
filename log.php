<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlbanhang";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Validate input and prevent SQL injection
$email = $conn->real_escape_string($_POST["email"]);
$pass = md5($_POST["pass"]);
$sql = "SELECT id, fullname, email FROM customers WHERE email = '$email' AND password = '$pass'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Start session and set session variables
    session_start();
    $_SESSION['email'] = $row['email'];
    $_SESSION['fullname'] = $row['fullname'];
    $_SESSION['id'] = $row['id'];
    header('Location: Homepage.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    // Redirect to login page after 3 seconds
    header('Refresh: 3;url=login.php');
}
$conn->close();
?>