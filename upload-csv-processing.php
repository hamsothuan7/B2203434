<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlbanhang";
// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);
// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Kiểm tra xem có file được upload không
if (isset($_FILES['csvFile']) && $_FILES['csvFile']['error'] == UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['csvFile']['tmp_name'];
    $fileName = $_FILES['csvFile']['name'];
    $fileSize = $_FILES['csvFile']['size'];
    $fileType = $_FILES['csvFile']['type'];
    // Kiểm tra định dạng tập tin
    $allowedExts = array("csv");
    $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
    if (in_array($fileExt, $allowedExts)) {
        // Đọc tập tin CSV
        if (($handle = fopen($fileTmpPath, "r")) !== FALSE) {
            fgetcsv($handle); // Bỏ qua dòng tiêu đề
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                // Gán giá trị cho các biến
                $id = $data[0];
                $fullname = $data[1];
                $email = $data[2];
                $password = md5($data[3]); // Mã hóa mật khẩu
                $img_profile = $data[4];

                // Thực hiện truy vấn SQL để chèn dữ liệu
                $sql = "INSERT INTO customers (id, fullname, email, password, img_profile) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssss", $id, $fullname, $email, $password, $img_profile);
                $stmt->execute();
            }
            fclose($handle);
            echo "File CSV đã được xử lý thành công.";
            $csv = array();
            $name_file = $fileName;
            $lines = file($name_file, FILE_IGNORE_NEW_LINES);
            //dua du lieu tu file csv vao mang:
            foreach ($lines as $key => $value) {
                $csv[$key] = str_getcsv($value);
            }
//in mang
echo '<pre>';
print_r($csv);
echo '</pre>';
        } else {
            echo "Lỗi khi mở tập tin CSV.";
        }
    } else {
        echo "Chỉ chấp nhận tập tin CSV.";
    }
} else {
    echo "Không có tập tin nào được upload.";
}
$conn->close();
?>