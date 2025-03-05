<?php
class SinhVien {
    // Thuộc tính của sinh viên
    private $mssv;
    private $hoten;
    private $ngaysinh;
    // Hàm khởi tạo
    public function __construct($mssv, $hoten, $ngaysinh) {
        $this->mssv = $mssv;
        $this->hoten = $hoten;
        $this->ngaysinh = $ngaysinh;
    }
    // Hàm hủy (tự động gọi khi script kết thúc)
    public function __destruct() {
        echo "<br>Đối tượng SinhVien {$this->hoten} đã bị hủy!";
    }
    // Setter và Getter cho MSSV
    public function setMSSV($mssv) {
        $this->mssv = $mssv;
    }
    public function getMSSV() {
        return $this->mssv;
    }
    // Setter và Getter cho Họ Tên
    public function setHoTen($hoten) {
        $this->hoten = $hoten;
    }
    public function getHoTen() {
        return $this->hoten;
    }
    // Setter và Getter cho Ngày Sinh
    public function setNgaySinh($ngaysinh) {
        $this->ngaysinh = $ngaysinh;
    }
    public function getNgaySinh() {
        return $this->ngaysinh;
    }
    // Hàm tính tuổi từ ngày sinh
    public function tinhTuoi() {
        $ngaySinh = new DateTime($this->ngaysinh);
        $hienTai = new DateTime();
        $tuoi = $hienTai->diff($ngaySinh)->y;
        return $tuoi;
    }
}
// Khai báo đối tượng sinh viên với thông tin cá nhân
$sv = new SinhVien("b2203446", "Huynh Nhat Kha", "2004-03-30");
// Hiển thị thông tin sinh viên
echo "<h2>Thông tin Sinh Viên:</h2>";
echo "MSSV: " . $sv->getMSSV() . "<br>";
echo "Họ tên: " . $sv->getHoTen() . "<br>";
echo "Ngày sinh: " . $sv->getNgaySinh() . "<br>";
echo "Tuổi: " . $sv->tinhTuoi() . " tuổi<br>";
?>
