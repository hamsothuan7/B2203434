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

$id = $_POST['id'];

// Truy vấn để lấy thông tin sinh viên
$sql_student = "SELECT * FROM student st WHERE id='" . $id . "'";
$result_student = $conn->query($sql_student);
$row_student = $result_student->fetch_assoc();

// Truy vấn bảng major để lấy danh sách chuyên ngành
$sql_major = "SELECT * FROM major";

$result_major = $conn->query($sql_major);
?>

<body>
    <form action="sua.php" method="post">
        ID: <input type="text" name="id" value="<?php echo $row_student['id']; ?>" readonly><br>
        Name: <input type="text" name="fullname" value="<?php echo $row_student['fullname']; ?>"><br>
        E-mail: <input type="text" name="email" value="<?php echo $row_student['email']; ?>"><br>
        Birthday: <input type="date" name="birth" value="<?php echo $row_student['Birthday']; ?>"><br>

        <!-- Dropdown để chọn chuyên ngành -->
        Major: 
        <select name="major_id">
            <option value="">Chọn chuyên ngành</option>
            <?php
            if ($result_major->num_rows > 0) {
                // Duyệt qua danh sách chuyên ngành và hiển thị trong thẻ <option>
                while($row_major = $result_major->fetch_assoc()) {
                    // Đặt selected nếu chuyên ngành hiện tại trùng với major_id của sinh viên
                    $selected = ($row_student['major_id'] == $row_major['id']) ? "selected" : "";
                    echo "<option value='" . $row_major['id'] . "' " . $selected . ">" . $row_major['name_major'] . "</option>";
                }
            } else {
                echo "<option value=''>Không có chuyên ngành nào</option>";
            }
            ?>
        </select><br>

        <input type="submit" value="Cập nhật">
    </form>
</body>

</html>
