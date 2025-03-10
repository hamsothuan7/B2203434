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

// Truy vấn dữ liệu từ bảng student và bảng major với JOIN
$sql = "
    SELECT student.id, student.fullname, student.email, student.Birthday, 
           major.id AS major_id, major.name_major 
    FROM student
    LEFT JOIN major ON student.major_id = major.id
";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Tiêu đề bảng HTML
    echo "<h1>Bảng dữ liệu sinh viên và chuyên ngành</h1>";
    echo "<table border=1>
          <tr>
              <th>ID</th>
              <th>Họ tên</th>
              <th>Email</th>
              <th>Ngày sinh</th>
              <th>Mã chuyên ngành</th>
              <th>Tên chuyên ngành</th>
              <th colspan='2'>Hành động</th>
          </tr>";

    // Hiển thị dữ liệu của từng dòng
    while ($row = $result->fetch_assoc()) {
        $date = date_create($row['Birthday']);
        
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["fullname"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $date->format('d-m-Y') . "</td>
                <td>" . $row["major_id"] . "</td>
                <td>" . $row["name_major"] . "</td>
                <td>
                    <form method='post' action='xoa.php'>
                        <input type='submit' name='action' value='Xóa'/>
                        <input type='hidden' name='id' value='" . $row['id'] . "'/>
                    </form>
                </td>
                <td>
                    <form method='post' action='form_sua.php'>
                        <input type='submit' name='action' value='Sửa'/>
                        <input type='hidden' name='id' value='" . $row['id'] . "'/>
                    </form>
                </td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "0 kết quả trả về";
}

// Đóng kết nối
$conn->close();
?>
