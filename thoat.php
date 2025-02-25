<?php
session_start();

// Xóa toàn bộ session
session_unset();
session_destroy();

// Xóa cookie nếu có
if (isset($_COOKIE['user_id'])) {
    setcookie('user_id', '', time() - 3600, "/");
}
if (isset($_COOKIE['username'])) {
    setcookie('username', '', time() - 3600, "/");
}

// Điều hướng về trang đăng nhập
header("Location: log.php");
exit();
?>
