<?php
// Định nghĩa hàm tính giai thừa
function giaiThua($n) {
    if ($n == 0 || $n == 1) return 1; 
    return $n * giaiThua($n - 1);
}
// Chạy thử với 10!
$n = 10;
echo "Giai thừa của $n là: " . giaiThua($n);
?>
