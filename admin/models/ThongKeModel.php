<?php
class ThongKeModel {
    public $conn;

    // Hàm khởi tạo kết nối CSDL
    function __construct()
    {
        $this->conn = $this->connDB();
    }

    function connDB() {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=du_an_1', 'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Kết nối thất bại: " . $e->getMessage();
        }
    }

    // Phương thức thống kê tổng doanh thu
    public function getTongDoanhThu() {
        $query = "SELECT SUM(tong_tien) AS tong_doanh_thu FROM don_hangs WHERE thanh_toan = 'Đã thanh toán'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['tong_doanh_thu'] ? $result['tong_doanh_thu'] : 0;
    }

    // Phương thức lấy tổng số đơn hàng
    public function getTongDonHang() {
        $query = "SELECT COUNT(*) AS tong_don_hang FROM don_hangs WHERE thanh_toan = 'Đã thanh toán'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['tong_don_hang'] ? $result['tong_don_hang'] : 0;
    }

    // Phương thức lấy số lượng đơn hàng chưa thanh toán
    public function getTongDonHangChuaThanhToan() {
        $query = "SELECT COUNT(*) AS tong_don_hang_chua_thanh_toan FROM don_hangs WHERE thanh_toan = 'Chưa thanh toán'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['tong_don_hang_chua_thanh_toan'] ? $result['tong_don_hang_chua_thanh_toan'] : 0;
    }

    // Phương thức lấy danh sách đơn hàng theo trạng thái
    public function getDonHangByTrangThai() {
        $query = "SELECT trang_thai_don_hang_id, COUNT(*) AS so_luong FROM don_hangs GROUP BY trang_thai_don_hang_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Phương thức lấy doanh thu theo ngày
    public function getDoanhThuTheoNgay() {
        $query = "
            SELECT 
                DATE(ngay_dat) AS ngay, 
                SUM(tong_tien) AS doanh_thu
            FROM don_hangs
            WHERE thanh_toan = 'Đã thanh toán'
            GROUP BY DATE(ngay_dat)
            ORDER BY ngay ASC
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
