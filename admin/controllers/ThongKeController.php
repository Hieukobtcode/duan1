<?php
class ThongKeController {
    public $ThongKeModel;

    function __construct() {
        $this->ThongKeModel = new ThongKeModel();
    }

    public function thongke() {
        $tongDoanhThu = $this->ThongKeModel->getTongDoanhThu();
        $tongDonHang = $this->ThongKeModel->getTongDonHang();
        $tongDonHangChuaThanhToan = $this->ThongKeModel->getTongDonHangChuaThanhToan();
        $doanhThuTheoNgay = $this->ThongKeModel->getDoanhThuTheoNgay();
        $donHangTheoTrangThai = $this->ThongKeModel->getDonHangByTrangThai();

        // Xử lý dữ liệu thành mảng có key là trạng thái đơn hàng
        $trangThaiDonHang = [];
        foreach ($donHangTheoTrangThai as $donHang) {
            $trangThaiDonHang[$donHang['trang_thai_don_hang_id']] = $donHang['so_luong'];
        }

        require_once './views/trangChu.php';
    }
}
?>
