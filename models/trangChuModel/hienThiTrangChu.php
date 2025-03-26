<?php
class trangChuModel
{
    public $conn;

    function __construct()
    {
        $this->conn = connDB();
    }

    function danhMuc()
    {
        $sql = "SELECT * FROM danh_mucs";
        return $this->conn->query($sql);
    }

    function chiTietDanhMuc($id)
    {
        $sql = "SELECT * FROM chi_tiet_danh_mucs WHERE id_danh_muc = '$id'";
        return $this->conn->query($sql);
    }
    function sanPham()
    {
        $records_per_page = 10;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $page = max(1, $page);
        $start = ($page - 1) * $records_per_page;

        $sql = "SELECT  san_phams.* , chi_tiet_danh_mucs.mo_ta
                    FROM san_phams
                    JOIN chi_tiet_danh_mucs ON chi_tiet_danh_mucs.id = san_phams.chi_tiet_danh_muc_id
                    LIMIT $start , $records_per_page ";
        return $this->conn->query($sql);
    }
    function sanPhamtang()
    {
        $records_per_page = 10;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $page = max(1, $page);
        $start = ($page - 1) * $records_per_page;

        $sql = "SELECT san_phams.*, chi_tiet_danh_mucs.mo_ta
        FROM san_phams
        JOIN chi_tiet_danh_mucs ON chi_tiet_danh_mucs.id = san_phams.chi_tiet_danh_muc_id
        ORDER BY san_phams.gia_ban ASC
        LIMIT $start, $records_per_page";

        return $this->conn->query($sql);
    }
    function sanPhamgiam()
    {
        $records_per_page = 10;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $page = max(1, $page);
        $start = ($page - 1) * $records_per_page;

        $sql = "SELECT san_phams.*, chi_tiet_danh_mucs.mo_ta
        FROM san_phams
        JOIN chi_tiet_danh_mucs ON chi_tiet_danh_mucs.id = san_phams.chi_tiet_danh_muc_id
        ORDER BY san_phams.gia_ban DESC
        LIMIT $start, $records_per_page";

        return $this->conn->query($sql);
    }

    function kich_thuoc_id($id)
    {
        $sql = "SELECT kich_thuoc_id from chi_tiet_san_pham
                WHERE chi_tiet_san_pham.san_pham_id = '$id' ";
        return $this->conn->query($sql);
    }

    function sanPhams()
    {
        $sql = "SELECT san_phams.*, chi_tiet_danh_mucs.mo_ta
                FROM san_phams
                JOIN chi_tiet_danh_mucs ON chi_tiet_danh_mucs.id = san_phams.chi_tiet_danh_muc_id
                ORDER BY san_phams.luot_xem DESC
                LIMIT 18";
        return $this->conn->query($sql);
    }


    function boSuuTap()
    {
        $sql = "SELECT  san_phams.* , chi_tiet_danh_mucs.mo_ta
                    FROM san_phams
                    JOIN chi_tiet_danh_mucs ON chi_tiet_danh_mucs.id = san_phams.chi_tiet_danh_muc_id
                    ORDER BY san_phams.Id DESC LIMIT 10";
        return $this->conn->query($sql);
    }

    function mau_sac($id)
    {
        $sql = "SELECT DISTINCT mau_sacs.ma_mau , mau_sacs.id FROM mau_sacs
            JOIN chi_tiet_san_pham ON chi_tiet_san_pham.mau_sac_id = mau_sacs.id where chi_tiet_san_pham.san_pham_id = '$id'";
        return $this->conn->query($sql);
    }

    function danhGias()
    {
        $sql = "SELECT * FROM danh_gias
            JOIN nguoi_dungs ON nguoi_dungs.Id = danh_gias.Nguoi_dung_id";
        return $this->conn->query($sql);
    }

    function baiViet()
    {
        $sql = "SELECT * from tin_tucs";
        return $this->conn->query($sql);
    }

    function noiDung()
    {
        $sql = "SELECT * FROM noi_dungs";
        return $this->conn->query($sql);
    }

    function listSanPham()
    {
        $sql = "SELECT san_phams.* , chi_tiet_san_pham.* , mau_sacs.* FROM san_phams 
                    JOIN chi_tiet_san_pham ON chi_tiet_san_pham.san_pham_id = san_phams.Id
                    JOIN mau_sacs on mau_sacs.id = chi_tiet_san_pham.mau_sac_id";
        return $this->conn->query($sql);
    }

    function anhSanPham($id)
    {
        $sql = "SELECT anh FROM chi_tiet_san_pham WHERE san_pham_id = '$id'";
        return $this->conn->query($sql);
    }

    function registerUser($Ten_dang_nhap, $Email, $Mat_khau, $So_dien_thoai)
    {
        // Mã hóa mật khẩu
        $hashedPassword = password_hash($Mat_khau, PASSWORD_DEFAULT);

        // Câu truy vấn SQL để lưu thông tin người dùng
        $sql = "INSERT INTO nguoi_dungs (Ten_dang_nhap, Email, Mat_khau, So_dien_thoai) 
                    VALUES (:Ten_dang_nhap, :Email, :Mat_khau, :So_dien_thoai)";

        $stmt = $this->conn->prepare($sql);

        // Ràng buộc tham số và thực thi truy vấn
        $stmt->bindParam(':Ten_dang_nhap', $Ten_dang_nhap);
        $stmt->bindParam(':Email', $Email);
        $stmt->bindParam(':Mat_khau', $hashedPassword);
        $stmt->bindParam(':So_dien_thoai', $So_dien_thoai);

        return $stmt->execute();
    }
    function checkAcc($Email, $Mat_khau)
    {
        // Chuẩn bị truy vấn để lấy thông tin người dùng theo email
        $sql = "SELECT * FROM nguoi_dungs WHERE Email = :Email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':Email', $Email);
        $stmt->execute();

        // Lấy thông tin người dùng
        $user = $stmt->fetch();
        if ($user) {
            // Kiểm tra mật khẩu
            if (password_verify($Mat_khau, $user['Mat_khau'])) {
                // Xác định vai trò và trạng thái
                if ($user['Vai_tro'] === 'admin' && $user['Trang_thai'] === 'Active') {
                    return 0; // Admin
                } elseif ($user['Vai_tro'] === 'user' && $user['Trang_thai'] === 'Active') {
                    return 1; // User
                } else {
                    return -1; // Tài khoản không hoạt động
                }
            }
        }

        return -1; // Email hoặc mật khẩu không chính xác
    }

    function chiTietSanPham($id)
    {
        $sql = "SELECT san_phams.Id as SPID , san_phams.luot_xem , san_phams.Ten_san_pham , san_phams.Ma_san_pham , san_phams.gia_ban , san_phams.chi_tiet_danh_muc_id , san_phams.Mo_ta , 
                      chi_tiet_danh_mucs.id as danh_muc_id, chi_tiet_danh_mucs.mo_ta
                      FROM san_phams
                      JOIN chi_tiet_danh_mucs ON chi_tiet_danh_mucs.id = san_phams.chi_tiet_danh_muc_id
                      WHERE san_phams.Id = '$id' ";
        return $this->conn->query($sql);
    }

    function anh($id)
    {
        $sql = "SELECT DISTINCT anh  FROM chi_tiet_san_pham
                WHERE san_pham_id = '$id' ";
        return $this->conn->query($sql);
    }

    function kich_thuoc($id)
    {
        $sql = "SELECT DISTINCT  kich_thuocs.id , kich_thuocs.ten_kich_thuoc FROM kich_thuocs
                JOIN chi_tiet_san_pham ON kich_thuocs.id = chi_tiet_san_pham.kich_thuoc_id
                WHERE chi_tiet_san_pham.san_pham_id = '$id'";
        return $this->conn->query($sql);
    }
    function mau_sacs($id)
    {
        $sql = "SELECT DISTINCT  mau_sacs.id as id_mau , mau_sacs.ten_mau , mau_sacs.ma_mau FROM mau_sacs
                JOIN chi_tiet_san_pham ON mau_sacs.id = chi_tiet_san_pham.mau_sac_id
                WHERE chi_tiet_san_pham.san_pham_id = '$id'";
        return $this->conn->query($sql);
    }

    function danh_gias($id)
    {
        $sql = "SELECT danh_gias.* , nguoi_dungs.Ho_ten , nguoi_dungs.Anh_dai_dien FROM danh_gias
                JOIN nguoi_dungs ON nguoi_dungs.Id = danh_gias.Nguoi_dung_id
                WHERE danh_gias.san_pham_id = '$id'";
        return $this->conn->query($sql);
    }

    function sanPhamDeXuat($id)
    {
        $sql = "SELECT san_phams.Id as SPID , san_phams.Ten_san_pham , san_phams.gia_ban , chi_tiet_danh_mucs.mo_ta
                FROM san_phams
                JOIN chi_tiet_danh_mucs ON chi_tiet_danh_mucs.id = san_phams.chi_tiet_danh_muc_id
                WHERE san_phams.chi_tiet_danh_muc_id = '$id'
                LIMIT 10";
        return $this->conn->query($sql);
    }

    function anhDeXuat($id)
    {
        $sql = "SELECT anh FROM chi_tiet_san_pham 
                WHERE chi_tiet_san_pham.san_pham_id = '$id'
                LIMIT 1 ";
        return $this->conn->query($sql);
    }

    function them_lh($ten, $email, $nd, $thoi_gian)
    {
        $sql = "INSERT INTO lien_hes (Ten, Email, Noi_dung, Thoi_gian_gui_lien_he) 
                VALUES ('$ten', '$email', '$nd', '$thoi_gian')";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }

    function list_tin_tuc()
    {
        $sql = "select * from tin_tucs order by Id desc";
        return $this->conn->query($sql);
    }

    function tongSP()
    {
        $sql = " SELECT COUNT(*) FROM san_phams as tong";
        return $this->conn->query($sql);
    }

    function khuyenMai()
    {
        $sql = "SELECT * FROM khuyen_mais";
        return $this->conn->query($sql);
    }

    function allKT()
    {
        $sql = "SELECT * FROM kich_thuocs";
        return $this->conn->query($sql);
    }

    function chiTietBaiViet($id)
    {
        $sql = "SELECT * FROM tin_tucs WHERE Id = '$id' ";
        return $this->conn->query($sql);
    }

    function thongTin($email)
    {
        $sql = "SELECT * FROM nguoi_dungs WHERE Email = '$email'";
        return $this->conn->query($sql);
    }

    function layBinhLuanTheoSanPham($san_pham_id)
    {
        $sql = "SELECT binh_luans.*,nguoi_dungs.Ho_ten,nguoi_dungs.Anh_dai_dien 
      FROM binh_luans
      JOIN nguoi_dungs 
      ON nguoi_dungs.Id=binh_luans.Nguoi_dung_id
      WHERE binh_luans.San_pham_id='$san_pham_id' 
      ORDER BY binh_luans.Id DESC";
        return $this->conn->query($sql);
    }

    function themBinhLuan($san_pham_id, $nguoi_dung_id, $noi_dung, $thoi_gian_tao)
    {

        $sql = "INSERT INTO binh_luans (San_pham_id, Nguoi_dung_id, Noi_dung,Thoi_gian_tao) 
                    VALUES ('$san_pham_id', '$nguoi_dung_id', '$noi_dung', '$thoi_gian_tao')";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }
    function getIdNguoidung($email)
    {
        $sql = "SELECT Id FROM nguoi_dungs WHERE Email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->fetchColumn(); // Trả về giá trị Id nếu có, null nếu không có
    }

    function sPDanhMuc($id)
    {
        $sql = "SELECT danh_mucs.* , chi_tiet_danh_mucs.* , san_phams.* 
                FROM san_phams
                JOIN chi_tiet_danh_mucs ON chi_tiet_danh_mucs.id = san_phams.chi_tiet_danh_muc_id
                JOIN danh_mucs ON chi_tiet_danh_mucs.id_danh_muc = danh_mucs.Id
                WHERE danh_mucs.Id = '$id' ";
        return $this->conn->query($sql);
    }
    function sPChiTietDanhMuc($id)
    {
        $sql = "SELECT danh_mucs.* , chi_tiet_danh_mucs.* , san_phams.* 
                FROM san_phams
                JOIN chi_tiet_danh_mucs ON chi_tiet_danh_mucs.id = san_phams.chi_tiet_danh_muc_id
                JOIN danh_mucs ON chi_tiet_danh_mucs.id_danh_muc = danh_mucs.Id
                WHERE san_phams.chi_tiet_danh_muc_id = '$id' ";
        return $this->conn->query($sql);
    }

    function locDanhMuc($danhMuc)
    {
        $placeholders = implode(',', array_fill(0, count($danhMuc), '?'));
        $sql = "SELECT  san_phams.* , chi_tiet_danh_mucs.mo_ta
                    FROM san_phams
                    JOIN chi_tiet_danh_mucs ON chi_tiet_danh_mucs.id = san_phams.chi_tiet_danh_muc_id
                    WHERE san_phams.chi_tiet_danh_muc_id IN ($placeholders)";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute($danhMuc)) {
            return $stmt;
        };
    }


    function locChiTiet()
    {
        $sql = "SELECT * FROM chi_tiet_danh_mucs";
        return $this->conn->query($sql);
    }

    function locMauSac()
    {
        $sql = "SELECT * FROM mau_sacs";
        return $this->conn->query($sql);
    }

    function locKichThuoc()
    {
        $sql = "SELECT * FROM kich_thuocs";
        return $this->conn->query($sql);
    }


    function banner($id)
    {
        $sql = "SELECT Duong_dan_anh, trang_thai FROM banners WHERE Id = '$id' ";
        return $this->conn->query($sql);
    }

    function sua_thong_tin($ten_dang_nhap, $email, $dia_chi, $ho_ten, $so_dien_thoai, $ngay_sinh, $gioi_tinh, $img)
    {
        $old = $_SESSION['dn'];
        if (empty($img)) {
            $sql = "UPDATE nguoi_dungs SET Ten_dang_nhap = '$ten_dang_nhap' , Email = '$email' , Dia_chi = '$dia_chi' , Ho_ten = '$ho_ten' , 
            So_dien_thoai = '$so_dien_thoai' ,  Ngay_thang_nam_sinh = '$ngay_sinh' ,
            gioi_tinh = '$gioi_tinh' WHERE Email = '$old' ";
        } else {
            $sql = "UPDATE nguoi_dungs SET Ten_dang_nhap = '$ten_dang_nhap' , Email = '$email' , Dia_chi = '$dia_chi' , Ho_ten = '$ho_ten' , 
            So_dien_thoai = '$so_dien_thoai' ,  Ngay_thang_nam_sinh = '$ngay_sinh' ,
            gioi_tinh = '$gioi_tinh' , Anh_dai_dien = '$img' WHERE Email = '$old' ";
        }

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }

    function updatePass($pass, $email)
    {
        $sql = "UPDATE nguoi_dungs SET Mat_khau = '$pass'
        WHERE  Email = '$email' ";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }

    function getPass($email)
    {
        $sql = "SELECT Mat_khau FROM nguoi_dungs WHERE Email = '$email' ";
        return $this->conn->query($sql);
    }

    function themSPVaoGio($NguoiDungId, $sanPhamId, $soLuong, $chi_tiet_san_pham_id)
    {
        $sql = "INSERT INTO gio_hangs ( Nguoi_dung_id , San_pham_id , So_luong , chi_tiet_san_pham_id)
                VALUES ( '$NguoiDungId' , '$sanPhamId' , '$soLuong' , '$chi_tiet_san_pham_id')";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }

    function getChiTietSanPham($sanPhamId, $mauSacId, $kichThuocId)
    {
        $sql = "SELECT id FROM chi_tiet_san_pham 
                WHERE san_pham_id = '$sanPhamId'
                AND mau_sac_id = '$mauSacId'
                AND kich_thuoc_id = '$kichThuocId'";
        return $this->conn->query($sql);
    }

    function idNguoiDung($email)
    {
        $sql = "SELECT Id FROM nguoi_dungs WHERE Email = '$email' ";
        return $this->conn->query($sql);
    }

    function getInfo($id)
    {
        $sql = "SELECT * FROM nguoi_dungs WHERE Id = '$id' ";
        return $this->conn->query($sql);
    }

    function soLuongSanPham($id)
    {
        $sql = "SELECT so_luong_ton_kho FROM chi_tiet_san_pham
                WHERE san_pham_id = '$id' ";
        return $this->conn->query($sql);
    }

    function showGioHang($id_nguoi_dung)
    {
        $sql = "SELECT gio_hangs.id  as id_gio , gio_hangs.Nguoi_dung_id , gio_hangs.San_pham_id ,gio_hangs.chi_tiet_san_pham_id, gio_hangs.So_luong,
                San_phams.* , chi_tiet_san_pham.* , mau_sacs.* , kich_thuocs.* FROM gio_hangs 
                JOIN chi_tiet_san_pham ON chi_tiet_san_pham.id = gio_hangs.chi_tiet_san_pham_id
                JOIN san_phams ON gio_hangs.San_pham_id = san_phams.Id
                JOIN kich_thuocs ON chi_tiet_san_pham.kich_thuoc_id = kich_thuocs.id
                JOIN mau_sacs ON chi_tiet_san_pham.mau_sac_id = mau_sacs.id
                WHERE gio_hangs.Nguoi_dung_id = '$id_nguoi_dung'
                ORDER BY gio_hangs.id DESC ";
        return $this->conn->query($sql);
    }

    function soGioHang($id_nguoi_dung)
    {
        $sql = "SELECT COUNT(id) AS so_san_pham FROM gio_hangs
                WHERE Nguoi_dung_id = '$id_nguoi_dung' ";
        return $this->conn->query($sql);
    }

    function giaTriDonHang($chiTietSanPhamId)
    {
        $sql = "SELECT chi_tiet_san_pham_id FROM gio_hangs";
        return $this->conn->query($sql);
    }

    function laySoLuong($chiTietSanPhamId)
    {
        $sql = "SELECT So_luong FROM gio_hangs 
                WHERE chi_tiet_san_pham_id = '$chiTietSanPhamId' ";
        return $this->conn->query($sql);
    }

    function capNhatSoLuong($chiTietSanPhamId, $soLuong)
    {
        $sql = "UPDATE gio_hangs SET So_luong = '$soLuong' 
        WHERE chi_tiet_san_pham_id = '$chiTietSanPhamId' ";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }

    function soLuongTonKho($sanPhamId, $mauSacId, $kichThuocId)
    {
        $sql = "SELECT so_luong_ton_kho FROM chi_tiet_san_pham
                WHERE san_pham_id = '$sanPhamId' 
                AND mau_sac_id = '$mauSacId' 
                AND kich_thuoc_id = '$kichThuocId' ";
        return $this->conn->query($sql);
    }

    function xoaGioHang($id)
    {
        $sql = "DELETE FROM gio_hangs WHERE id = '$id' ";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }

    function thongTinNguoiDung()
    {
        $sql = "SELECT nguoi_dungs.* , gio_hangs.* 
                FROM gio_hangs
                JOIN nguoi_dungs ON nguoi_dungs.Id = gio_hangs.Nguoi_dung_id";
        return $this->conn->query($sql);
    }
    function themDonHang($NguoiDungId, $maDonHang, $tenNguoiNhan, $sdt, $email, $diaChi, $ghiChu, $tongTien, $phuongThucThanhToan, $ngayDat, $trangThaiDonHang, $khuyenMaiId, $thanhToan)
    {
        $sql = "INSERT INTO don_hangs 
        (Nguoi_dung_id, ma_don_hang, ten_nguoi_nhan, so_dien_thoai_nguoi_nhan, email_nguoi_nhan, dia_chi_nguoi_nhan, ghi_chu, tong_tien, phuong_thuc_thanh_toan, ngay_dat, trang_thai_don_hang_id, khuyen_mai_id , thanh_toan)
        VALUES (:NguoiDungId, :maDonHang, :tenNguoiNhan, :sdt, :email, :diaChi, :ghiChu, :tongTien, :phuongThucThanhToan, :ngayDat, :trangThaiDonHang, :khuyenMaiId , :thanhToan)";

        $stmt = $this->conn->prepare($sql);

        // Ràng buộc giá trị với tham số:
        $stmt->bindParam(':NguoiDungId', $NguoiDungId, PDO::PARAM_INT);
        $stmt->bindParam(':maDonHang', $maDonHang, PDO::PARAM_STR);
        $stmt->bindParam(':tenNguoiNhan', $tenNguoiNhan, PDO::PARAM_STR);
        $stmt->bindParam(':sdt', $sdt, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':diaChi', $diaChi, PDO::PARAM_STR);
        $stmt->bindParam(':ghiChu', $ghiChu, PDO::PARAM_STR);
        $stmt->bindParam(':tongTien', $tongTien, PDO::PARAM_INT);
        $stmt->bindParam(':phuongThucThanhToan', $phuongThucThanhToan, PDO::PARAM_STR);
        $stmt->bindParam(':ngayDat', $ngayDat, PDO::PARAM_STR);
        $stmt->bindParam(':trangThaiDonHang', $trangThaiDonHang, PDO::PARAM_INT);
        $stmt->bindParam(':thanhToan', $thanhToan, PDO::PARAM_STR);

        // Xử lý khuyến mãi ID:
        if ($khuyenMaiId === null || $khuyenMaiId === '') {
            $stmt->bindValue(':khuyenMaiId', null, PDO::PARAM_NULL);
        } else {
            $stmt->bindValue(':khuyenMaiId', $khuyenMaiId, PDO::PARAM_INT);
        }

        $stmt->execute();
        return $this->conn->lastInsertId();
    }


    function complete($id)
    {
        $sql = "SELECT * FROM don_hangs
         WHERE don_hangs.Id = '$id' ";
        return $this->conn->query($sql);
    }

    function completeKhuyenMai($id)
    {
        $sql = "SELECT * FROM don_hangs
        JOIN khuyen_mais ON khuyen_mais.Id = don_hangs.khuyen_mai_id
         WHERE don_hangs.Id = '$id' ";
        return $this->conn->query($sql);
    }

    function chiTietGioHang($donHangId, $sanPhamId, $soLuong, $giaSanPham, $tongGia, $chi_tiet_san_pham_id)
    {
        $sql = "INSERT INTO chi_tiet_don_hangs ( Don_hang_id , San_pham_id , So_luong , Gia_san_pham , Tong_gia_san_pham , chi_tiet_san_pham_id )
                VALUES ( '$donHangId' , '$sanPhamId' , '$soLuong' , '$giaSanPham' , '$tongGia' , '$chi_tiet_san_pham_id' )";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }

    function allDonHang($NguoiDungId)
    {
        $sql = "SELECT don_hangs.* , trang_thai_don_hangs.Id as trang_thai_id , trang_thai_don_hangs.Ten_trang_thai
        FROM don_hangs
        JOIN trang_thai_don_hangs ON trang_thai_don_hangs.Id = don_hangs.trang_thai_don_hang_id
        WHERE don_hangs.Nguoi_dung_id = '$NguoiDungId' 
        ORDER BY don_hangs.Id DESC";
        return $this->conn->query($sql);
    }

    function danhSachDonHangChoXacNhan($NguoiDungId)
    {
        $sql = "SELECT don_hangs.* , trang_thai_don_hangs.Id as trang_thai_id , trang_thai_don_hangs.Ten_trang_thai
        FROM don_hangs
        JOIN trang_thai_don_hangs ON trang_thai_don_hangs.Id = don_hangs.trang_thai_don_hang_id
        WHERE don_hangs.Nguoi_dung_id = '$NguoiDungId' 
        AND don_hangs.trang_thai_don_hang_id = '1'
        ORDER BY don_hangs.Id DESC";
        return $this->conn->query($sql);
    }
    function danhSachDonHangDaXacNhan($NguoiDungId)
    {
        $sql = "SELECT don_hangs.* , trang_thai_don_hangs.Id as trang_thai_id , trang_thai_don_hangs.Ten_trang_thai
        FROM don_hangs
        JOIN trang_thai_don_hangs ON trang_thai_don_hangs.Id = don_hangs.trang_thai_don_hang_id
        WHERE don_hangs.Nguoi_dung_id = '$NguoiDungId' 
        AND don_hangs.trang_thai_don_hang_id = '3'
        ORDER BY don_hangs.Id DESC";
        return $this->conn->query($sql);
    }
    function danhSachDonHangDangGiao($NguoiDungId)
    {
        $sql = "SELECT don_hangs.* , trang_thai_don_hangs.Id as trang_thai_id , trang_thai_don_hangs.Ten_trang_thai
        FROM don_hangs
        JOIN trang_thai_don_hangs ON trang_thai_don_hangs.Id = don_hangs.trang_thai_don_hang_id
        WHERE don_hangs.Nguoi_dung_id = '$NguoiDungId' 
        AND don_hangs.trang_thai_don_hang_id = '4'
        ORDER BY don_hangs.Id DESC";
        return $this->conn->query($sql);
    }
    function danhSachDonHangGiaoHangaThanhCong($NguoiDungId)
    {
        $sql = "SELECT don_hangs.* , trang_thai_don_hangs.Id as trang_thai_id , trang_thai_don_hangs.Ten_trang_thai
        FROM don_hangs
        JOIN trang_thai_don_hangs ON trang_thai_don_hangs.Id = don_hangs.trang_thai_don_hang_id
        WHERE don_hangs.Nguoi_dung_id = '$NguoiDungId' 
        AND don_hangs.trang_thai_don_hang_id = '6'
        ORDER BY don_hangs.Id DESC";
        return $this->conn->query($sql);
    }
    function danhSachDonHangDaHuy($NguoiDungId)
    {
        $sql = "SELECT don_hangs.* , trang_thai_don_hangs.Id as trang_thai_id , trang_thai_don_hangs.Ten_trang_thai
        FROM don_hangs
        JOIN trang_thai_don_hangs ON trang_thai_don_hangs.Id = don_hangs.trang_thai_don_hang_id
        WHERE don_hangs.Nguoi_dung_id = '$NguoiDungId' 
        AND don_hangs.trang_thai_don_hang_id = '8'
        ORDER BY don_hangs.Id DESC";
        return $this->conn->query($sql);
    }
    function danhSachDonHangDaGiao($NguoiDungId)
    {
        $sql = "SELECT don_hangs.* , trang_thai_don_hangs.Id as trang_thai_id , trang_thai_don_hangs.Ten_trang_thai
        FROM don_hangs
        JOIN trang_thai_don_hangs ON trang_thai_don_hangs.Id = don_hangs.trang_thai_don_hang_id
        WHERE don_hangs.Nguoi_dung_id = '$NguoiDungId' 
        AND don_hangs.trang_thai_don_hang_id = '5'
        ORDER BY don_hangs.Id DESC";
        return $this->conn->query($sql);
    }

    function chiTietDonHang($id)
    {
        $sql = "SELECT * FROM chi_tiet_don_hangs 
        JOIN chi_tiet_san_pham ON chi_tiet_san_pham.id = chi_tiet_don_hangs.chi_tiet_san_pham_id
        JOIN san_phams ON san_phams.Id = chi_tiet_don_hangs.san_pham_id
        JOIN mau_sacs ON mau_sacs.id = chi_tiet_san_pham.mau_sac_id
        JOIN kich_thuocs ON kich_thuocs.id = chi_tiet_san_pham.kich_thuoc_id
        WHERE chi_tiet_don_hangs.Don_hang_id = '$id' ";
        return $this->conn->query($sql);
    }

    function chiTietDonHangDanhGia($id)
    {
        $sql = "SELECT chi_tiet_don_hangs.* , chi_tiet_san_pham.anh , mau_sacs.* , kich_thuocs.*,
        san_phams.Id as idSP , san_phams.Ten_san_pham , san_phams.gia_ban 
        FROM chi_tiet_don_hangs 
        JOIN chi_tiet_san_pham ON chi_tiet_san_pham.id = chi_tiet_don_hangs.chi_tiet_san_pham_id
        JOIN san_phams ON san_phams.Id = chi_tiet_don_hangs.san_pham_id
        JOIN mau_sacs ON mau_sacs.id = chi_tiet_san_pham.mau_sac_id
        JOIN kich_thuocs ON kich_thuocs.id = chi_tiet_san_pham.kich_thuoc_id
        WHERE chi_tiet_don_hangs.Don_hang_id = '$id' ";
        return $this->conn->query($sql);
    }

    function donHang($id)
    {
        $sql = "SELECT * FROM don_hangs 
        JOIN trang_thai_don_hangs ON trang_thai_don_hangs.Id = don_hangs.trang_thai_don_hang_id
        WHERE don_hangs.id = '$id' ";
        return $this->conn->query($sql);
    }

    function getSoLuongTrongGio($mauSacId, $kichThuocId)
    {
        $sql = "SELECT So_luong FROM gio_hangs
        JOIN chi_tiet_san_pham ON chi_tiet_san_pham.id = gio_hangs.chi_tiet_san_pham_id
        WHERE chi_tiet_san_pham.mau_sac_id = '$mauSacId'
        AND chi_tiet_san_pham.kich_thuoc_id= '$kichThuocId'";
        return $this->conn->query($sql);
    }

    function xoaChiTietDonHang($id)
    {
        $sql = "DELETE FROM chi_tiet_don_hangs WHERE 
                Don_hang_id = '$id' ";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }

    function xoaDonHang($id)
    {
        $sql = "DELETE FROM don_hangs WHERE Id = '$id' ";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }

    function updateTrangThai($id, $trang_thai_id)
    {
        $sql = "UPDATE don_hangs SET trang_thai_don_hang_id = '$trang_thai_id'
        WHERE Id = '$id' ";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }

    function phuongThucThanhToan($id){
        $sql = "SELECT phuong_thuc_thanh_toan FROM don_hangs 
                WHERE Id = '$id'";
                return $this->conn->query($sql)->fetch();
    }

    function  updateTrangThaiThannhToan($id)
    {
        $sql = "UPDATE don_hangs SET thanh_toan = 'Chưa thanh toán'
                WHERE Id = '$id'";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }

    function themSPYeuThich($nguoiDungId, $sanPhamId)
    {
        $sql = "INSERT INTO san_pham_yeu_thich ( Nguoi_dung_id , San_pham_id )
                VALUES ( '$nguoiDungId' , '$sanPhamId' )";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }


    function listSanPhamYeuThich($nguoiDungId)
    {
        $sql = "SELECT * FROM san_pham_yeu_thich
                JOIN san_phams ON san_pham_yeu_thich.San_pham_id = san_phams.Id
                WHERE san_pham_yeu_thich.Nguoi_dung_id = '$nguoiDungId'";
        return $this->conn->query($sql);
    }

    function remove($sanPhamId)
    {
        $sql = "DELETE FROM san_pham_yeu_thich 
        WHERE San_pham_id = '$sanPhamId' ";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }

    function themDanhGia($sanPhamId, $NguoiDungId, $soDiem, $noiDung, $ngayTao, $chi_tiet_san_pham_id)
    {
        $sql = "INSERT INTO danh_gias ( San_pham_id , Nguoi_dung_id , So_diem_danh_gia , Noi_dung , Thoi_gian_tao , chi_tiet_san_pham_id )
                VALUES ( '$sanPhamId' , '$NguoiDungId' , '$soDiem' , '$noiDung' , '$ngayTao' , '$chi_tiet_san_pham_id')";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }

    function listDanhGia()
    {
        $sql = "SELECT * FROM danh_gias";
        return $this->conn->query($sql);
    }

    function listKhuyenMai()
    {
        $sql = "SELECT * FROM khuyen_mais";
        return $this->conn->query($sql);
    }

    function loaiKhuyenMai($maKhuyeMai)
    {
        $sql = "SELECT Loai_giam_gia FROM khuyen_mais
                WHERE Ma_khuyen_mai = '$maKhuyeMai'";
        return $this->conn->query($sql);
    }

    function capNhatSoLuongTonKho($chiTietSanPhamId, $soLuongTonKho)
    {
        $sql = "UPDATE chi_tiet_san_pham SET so_luong_ton_kho = '$soLuongTonKho'
        WHERE id = '$chiTietSanPhamId' ";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }

    function capNhatTrangThaiThanhCong($id)
    {
        $sql = "UPDATE don_hangs SET trang_thai_don_hang_id = '6' ";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }

    function laySoLuongTonKho($donHangId)
    {
        $sql = "SELECT chi_tiet_san_pham.so_luong_ton_kho as soLuongChiTiet,
                       chi_tiet_don_hangs.So_luong as soLuongSanPham , chi_tiet_don_hangs.chi_tiet_san_pham_id 
                FROM chi_tiet_don_hangs 
                JOIN chi_tiet_san_pham ON chi_tiet_san_pham.id = chi_tiet_don_hangs.chi_tiet_san_pham_id
                WHERE chi_tiet_don_hangs.Don_hang_id =  '$donHangId' ";
        return $this->conn->query($sql);
    }

    function idKhuyenMai($maKhuyenMai)
    {
        $sql = "SELECT Id FROM khuyen_mais WHERE Ma_khuyen_mai = '$maKhuyenMai' ";
        return $this->conn->query($sql);
    }

    function layTrangThaiDonHang($id)
    {
        $sql = "SELECT trang_thai_don_hang_id FROM don_hangs
                WHERE Id = '$id'";
        return $this->conn->query($sql);
    }

    function capNhatLuotXem($id)
    {
        $sql = "UPDATE san_phams set luot_xem = luot_xem +1
                WHERE Id = '$id'";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }

    function capNhatSoLuongTrongGio($id, $soLuongMoi)
    {
        $sql = "UPDATE gio_hangs SET So_luong = '$soLuongMoi' 
                WHERE Id = '$id'";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }

    function layBienTheTheoGioHangId($id)
    {
        $sql = "SELECT chi_tiet_san_pham.so_luong_ton_kho from chi_tiet_san_pham
                JOIN gio_hangs on gio_hangs.chi_tiet_san_pham_id = chi_tiet_san_pham.id
                WHERE gio_hangs.Id = '$id'";
        return $this->conn->query($sql);
    }
}
