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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    // Dùng Prepared Statements để chống SQL Injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Đăng nhập thành công!";
    } else {
        echo "Sai tài khoản hoặc mật khẩu!";
    }
}
?>
