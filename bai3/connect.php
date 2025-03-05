<?php

$servername = "localhost";
$username = "root";
$password = "";
// Create connection
$conn = new mysqli($servername, $username, $password);

https://www.w3schools.com/php/php_ref_mysqli.asp#:~:text=The%20MySQLi%20functions%20allows%20you,13%20or%20newer.

// Check connection
if ($conn->connect_error) {
//hien thi loi neu ket noi khong duoc
die("Connection failed: " . $conn->connect_error);
}
//neu ket noi thanh cong
echo "Connected successfully";
?>