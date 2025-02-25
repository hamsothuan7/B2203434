<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlbanhang";
// Kết nối CSDL
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['id'])) {
    echo "Bạn chưa đăng nhập!";
    exit();
}
$user_id = $_SESSION['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $old_password = md5($_POST['old_password']); // Băm mật khẩu cũ
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    // Lấy mật khẩu hiện tại từ CSDL
    $sql = "SELECT password FROM customers WHERE id = '$user_id'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $current_password = $row['password'];
        // Kiểm tra mật khẩu cũ có khớp không
        if ($old_password != $current_password) {
            echo "Mật khẩu cũ không đúng!";
        } elseif ($new_password != $confirm_password) {
            echo "Mật khẩu mới không khớp!";
        } elseif ($old_password == md5($new_password)) {
            echo "Mật khẩu mới không được giống mật khẩu cũ!";
        } else {
            // Cập nhật mật khẩu mới (băm với md5)
            $hashed_new_password = md5($new_password);
            $update_sql = "UPDATE customers SET password='$hashed_new_password' WHERE id='$user_id'";
            if ($conn->query($update_sql) === TRUE) {
                echo "Đổi mật khẩu thành công!";
            } else {
                echo "Lỗi cập nhật mật khẩu: " . $conn->error;
            }
        }
    } else {
        echo "Không tìm thấy người dùng!";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Đổi Mật Khẩu</title>
</head>
<body>
    <h2>Đổi Mật Khẩu</h2>
    <form method="POST" action="">
        <label for="old_password">Mật khẩu cũ:</label>
        <input type="password" name="old_password" required><br><br>

        <label for="new_password">Mật khẩu mới:</label>
        <input type="password" name="new_password" required><br><br>

        <label for="confirm_password">Nhập lại mật khẩu mới:</label>
        <input type="password" name="confirm_password" required><br><br>

        <button type="submit">Đổi mật khẩu</button>
    </form>
</body>
</html>
