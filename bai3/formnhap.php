<!DOCTYPE HTML>
<html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlsv";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Truy vấn bảng major để lấy danh sách chuyên ngành
$sql = "SELECT id, name_major FROM major";
$result = $conn->query($sql);
?>

<body>
    <form action="luu.php" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        Birthday: <input type="date" name="birth"><br>
        
        <!-- Dropdown để chọn chuyên ngành -->
        Major: 
        <select name="major_id">
            <option value="">Chọn chuyên ngành</option>
            <?php
            if ($result->num_rows > 0) {
                // Duyệt qua danh sách chuyên ngành và hiển thị trong thẻ <option>
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['name_major'] . "</option>";
                }
            } else {
                echo "<option value=''>Không có chuyên ngành nào</option>";
            }
            ?>
        </select><br>

        <input type="submit" value="Lưu">
    </form>
</body>

</html>
