<!DOCTYPE HTML>
<html>
<body>
<h2>Form nhập thông tin</h2>
<form action="" method="post">
    Name: <input type="text" name="name" required><br><br>
    E-mail: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    Ngày sinh: <input type="date" name="dob" required><br><br>
    <input type="submit" name="submit" value="Gửi">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $dob = htmlspecialchars($_POST["dob"]);

    echo "<h2>Thông tin bạn đã nhập:</h2>";
    echo "Tên: " . $name . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Mật khẩu: " . $password . "<br>";
    echo "Ngày sinh: " . $dob . "<br>";
}
?>
</body>
</html>
