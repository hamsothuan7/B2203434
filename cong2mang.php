<?php
// Hàm cộng hai mảng cùng độ dài
function congHaiMang($a, $b) {
    if (count($a) != count($b)) {
        return "Lỗi: Hai mảng không có cùng độ dài!";
    }
    $ketQua = [];
    for ($i = 0; $i < count($a); $i++) {
        $ketQua[] = $a[$i] + $b[$i];
    }
    return $ketQua;
}
// Khai báo hai mảng cần tính
$a = [344, 224, 223, 7737, 9922, -828];
$b = [-344, -324, 123, 773, -9922, 828];
// Gọi hàm và hiển thị kết quả
$ketQua = congHaiMang($a, $b);
if (is_array($ketQua)) {
    echo "Kết quả cộng hai mảng: " . implode(", ", $ketQua);
} else {
    echo $ketQua; // Hiển thị lỗi nếu có
}
?>
