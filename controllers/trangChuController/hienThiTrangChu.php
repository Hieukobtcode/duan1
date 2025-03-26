<?php
class trangChuController
{
    public $trangChuModel;

    function __construct()
    {
        $this->trangChuModel = new trangChuModel();
    }

    function hienThiTrangChu()
    {

        if (isset($_SESSION['dn'])) {
            $nguoiDungId  = $this->trangChuModel->idNguoiDung($_SESSION['dn'])->fetch()['Id'];
            $soGioHang = $this->trangChuModel->soGioHang($nguoiDungId)->fetch();
            $showGioHangs = $this->trangChuModel->showGioHang($nguoiDungId)->fetchAll();
        }

        $banner1 = $this->trangChuModel->banner(15)->fetch();
        $banner2 = $this->trangChuModel->banner(14)->fetch();
        $banner3 = $this->trangChuModel->banner(13)->fetch();
        $banner4 = $this->trangChuModel->banner(12)->fetch();
        $khuyenMais = $this->trangChuModel->khuyenMai()->fetchAll();
        $danhMucs = $this->trangChuModel->danhMuc()->fetchAll();
        $danhGias = $this->trangChuModel->danhGias()->fetchAll();
        $baiViets = $this->trangChuModel->baiViet()->fetchAll();
        $noiDung = $this->trangChuModel->noiDung()->fetch();
        $boSuuTaps = $this->trangChuModel->boSuuTap()->fetchAll();
        $sanPhams = $this->trangChuModel->sanPhams()->fetchAll();

        require_once 'views/trangChu.php';
    }

    function listSanPham()
    {
        $nguoiDungId  = $this->trangChuModel->idNguoiDung($_SESSION['dn'])->fetch()['Id'];
        $soGioHang = $this->trangChuModel->soGioHang($nguoiDungId)->fetch();
        $showGioHangs = $this->trangChuModel->showGioHang($nguoiDungId)->fetchAll();
        if (isset($_POST['btn_loc'])) {
            $danhMuc = $_POST['danhMuc'];
            $sanPhams = $this->trangChuModel->locDanhMuc($danhMuc)->fetchAll();
        } else {
            $sanPhams = $this->trangChuModel->sanPham()->fetchAll();
        }
        $locMauSacs = $this->trangChuModel->locMauSac()->fetchAll();
        $locKichThuocs = $this->trangChuModel->locKichThuoc()->fetchAll();
        $locChiTiets = $this->trangChuModel->locChiTiet()->fetchAll();
        $kichThuocs = $this->trangChuModel->allKT()->fetchAll();
        $danhMucs = $this->trangChuModel->danhMuc()->fetchAll();
        $danhGias = $this->trangChuModel->danhGias()->fetchAll();
        $baiViets = $this->trangChuModel->baiViet()->fetchAll();
        $noiDung = $this->trangChuModel->noiDung()->fetch();
        require_once 'views/listSanPham.php';
    }

    function login()
    {
        $danhMucs = $this->trangChuModel->danhMuc()->fetchAll();
        $noiDung = $this->trangChuModel->noiDung()->fetch();

        if (isset($_POST['btn_register'])) {
            // Lấy thông tin từ form
            $Ten_dang_nhap = $_POST['Ten_dang_nhap'];
            $Email = $_POST['Email'];
            $Mat_khau = $_POST['Mat_khau'];
            $So_dien_thoai = $_POST['So_dien_thoai'];

            // Gọi model đăng ký người dùng
            if ($this->trangChuModel->registerUser($Ten_dang_nhap, $Email, $Mat_khau, $So_dien_thoai)) {
                echo "Đăng ký thành công!";
                header("Location: ?act=login");
            } else {
                echo "Đăng ký không thành công!";
            }
        } elseif (isset($_POST['btn_login'])) {
            $email = $_POST['Email'];
            $password = $_POST['Mat_khau'];

            if (($this->trangChuModel->checkAcc($email, $password)) == 0) {
                $_SESSION['admin'] = $email;
                echo '<script> window.location = "?act=trangChu"; </script>';
            } elseif (($this->trangChuModel->checkAcc($email, $password)) == 1) {
                $_SESSION['dn'] = $email;
                echo '<script> window.location = "./"; </script>';
                exit();
            } else {
                echo "<script>alert('Lỗi: Không thể đăng nhập');</script>";
            }
        }

        require_once 'views/login.php';
    }

    function logout()
    {
        session_unset();
        session_destroy();
        echo '<script> window.location = "./"; </script>';
    }

    function chiTietSanPham($id)
    {
        $this->trangChuModel->capNhatLuotXem($id);
        $nguoiDungId  = $this->trangChuModel->idNguoiDung($_SESSION['dn'])->fetch()['Id'];

        if (isset($_POST['btn_gio_hang'])) {
            $sanPhamId = $_GET['id'];
            $soLuong = $_POST['quantity'];
            $mauSacId = $_POST['color'];
            $kichThuocId = $_POST['size'];
            $giaTriDonHangs = $this->trangChuModel->giaTriDonHang($id)->fetchAll();

            if (empty($mauSacId) || empty($kichThuocId) || empty($soLuong) || $soLuong == 0) {
                echo "<script>alert('Hãy chọn đầy đủ thông tin')</script>";
            } else {
                $soLuongSanPhamTrongGio = $this->trangChuModel->getSoLuongTrongGio($mauSacId, $kichThuocId)->fetch()['So_luong'];
                $soLuongTonKho = $this->trangChuModel->soLuongTonKho($sanPhamId, $mauSacId, $kichThuocId)->fetch()['so_luong_ton_kho'];
                if ($soLuong + $soLuongSanPhamTrongGio > $soLuongTonKho) {
                    echo "<script>alert('Số lượng sản phẩm trong giỏ của bạn vượt quá số lượng còn lại của sản phẩm')</script>";
                } else {

                    if ($soLuong > $soLuongTonKho) {
                        echo "<script>alert('Bạn đã chọn quá số lượng sản phẩm trong kho. Sản phẩm hiện tại còn $soLuongTonKho')</script>";
                    } else {
                        $chiTietSanPhamId = $this->trangChuModel->getChiTietSanPham($sanPhamId, $mauSacId, $kichThuocId)->fetch()['id'];
                        $data = false;
                        foreach ($giaTriDonHangs as $giaTriDonHang) {
                            if ($giaTriDonHang['chi_tiet_san_pham_id'] == $chiTietSanPhamId) {
                                $soLuongDonHang = $this->trangChuModel->laySoLuong($chiTietSanPhamId)->fetch()['So_luong'];
                                $soLuongMoi = $soLuongDonHang + $soLuong;
                                $this->trangChuModel->capNhatSoLuong($chiTietSanPhamId, $soLuongMoi);
                                $data = true;
                                break; // Thoát khỏi vòng lặp vì đã cập nhật
                            }
                        }

                        // Nếu chưa tồn tại sản phẩm thì thêm mới
                        if (!$data) {
                            if ($this->trangChuModel->themSPVaoGio($nguoiDungId, $sanPhamId, $soLuong, $chiTietSanPhamId)) {
                            }
                        }
                    }
                }
            }
        }

        // Lấy thông tin hiển thị
        $soGioHang = $this->trangChuModel->soGioHang($nguoiDungId)->fetch();
        $showGioHangs = $this->trangChuModel->showGioHang($nguoiDungId)->fetchAll();
        $soLuongTonKho = 0;
        $tongs = $this->trangChuModel->soLuongSanPham($id)->fetchAll();
        $binh_luans = $this->trangChuModel->layBinhLuanTheoSanPham($id)->fetchAll();
        $noiDung = $this->trangChuModel->noiDung()->fetch();
        $danhMucs = $this->trangChuModel->danhMuc()->fetchAll();
        $sanPhams = $this->trangChuModel->chiTietSanPham($id)->fetch();
        $anhs = $this->trangChuModel->anh($id);
        $kichThuocs = $this->trangChuModel->kich_thuoc($id);
        $mauSacs = $this->trangChuModel->mau_sacs($id);
        $danhGias = $this->trangChuModel->danh_gias($id)->fetchAll();

        // Load view chi tiết sản phẩm
        require_once 'views/chiTietSanPham.php';
    }

    function them_lh()
    {
        $nguoiDungId  = $this->trangChuModel->idNguoiDung($_SESSION['dn'])->fetch()['Id'];
        $soGioHang = $this->trangChuModel->soGioHang($nguoiDungId)->fetch();
        $showGioHangs = $this->trangChuModel->showGioHang($nguoiDungId)->fetchAll();
        $noiDung = $this->trangChuModel->noiDung()->fetch();
        $danhMucs = $this->trangChuModel->danhMuc()->fetchAll();
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_lh'])) {
            // Lấy dữ liệu từ form
            $ten = $_POST['ten_lh'];
            $email = $_POST['email_lh'];
            $nd = $_POST['nd'];

            // Lấy thời gian hiện tại
            $thoi_gian = date('Y-m-d H:i:s');

            if ($this->trangChuModel->them_lh($ten, $email, $nd, $thoi_gian)) {
                echo '<script> window.location = "./"; </script>';
            } else {
                echo "Có lỗi xảy ra, vui lòng thử lại.";
            }
        }
        require_once 'views/lienhe.php';
    }

    function baiViet()
    {
        if (isset($_SESSION['dn'])) {
            $nguoiDungId  = $this->trangChuModel->idNguoiDung($_SESSION['dn'])->fetch()['Id'];
            $soGioHang = $this->trangChuModel->soGioHang($nguoiDungId)->fetch();
            $showGioHangs = $this->trangChuModel->showGioHang($nguoiDungId)->fetchAll();
        }
        $danhMucs = $this->trangChuModel->danhMuc()->fetchAll();
        $danhGias = $this->trangChuModel->danhGias()->fetchAll();
        $baiViets = $this->trangChuModel->baiViet()->fetchAll();
        $noiDung = $this->trangChuModel->noiDung()->fetch();
        require_once 'views/baiViet.php';
    }

    function chiTietBaiViet($id)
    {
        $danhMucs = $this->trangChuModel->danhMuc()->fetchAll();
        $noiDung = $this->trangChuModel->noiDung()->fetch();
        $baiViet = $this->trangChuModel->chiTietBaiViet($id)->fetch();
        require_once 'views/chiTietBaiViet.php';
    }

    function thongTin()
    {
        $nguoiDungId  = $this->trangChuModel->idNguoiDung($_SESSION['dn'])->fetch()['Id'];
        $soGioHang = $this->trangChuModel->soGioHang($nguoiDungId)->fetch();
        $showGioHangs = $this->trangChuModel->showGioHang($nguoiDungId)->fetchAll();
        $danhMucs = $this->trangChuModel->danhMuc()->fetchAll();
        $noiDung = $this->trangChuModel->noiDung()->fetch();
        require_once 'views/thongTinNguoiDung.php';
    }
    function diaChi()
    {
        $nguoiDungId  = $this->trangChuModel->idNguoiDung($_SESSION['dn'])->fetch()['Id'];
        $soGioHang = $this->trangChuModel->soGioHang($nguoiDungId)->fetch();
        $showGioHangs = $this->trangChuModel->showGioHang($nguoiDungId)->fetchAll();
        $danhMucs = $this->trangChuModel->danhMuc()->fetchAll();
        $noiDung = $this->trangChuModel->noiDung()->fetch();
        require_once 'views/diaChi.php';
    }

    function sPDanhMuc($id)
    {
        $nguoiDungId  = $this->trangChuModel->idNguoiDung($_SESSION['dn'])->fetch()['Id'];
        $soGioHang = $this->trangChuModel->soGioHang($nguoiDungId)->fetch();
        $showGioHangs = $this->trangChuModel->showGioHang($nguoiDungId)->fetchAll();
        $danhMucs = $this->trangChuModel->danhMuc()->fetchAll();
        $danhGias = $this->trangChuModel->danhGias()->fetchAll();
        $baiViets = $this->trangChuModel->baiViet()->fetchAll();
        $noiDung = $this->trangChuModel->noiDung()->fetch();
        require_once 'views/sPDanhMuc.php';
    }
    function chiTietDanhMuc($id)
    {
        $nguoiDungId  = $this->trangChuModel->idNguoiDung($_SESSION['dn'])->fetch()['Id'];
        $soGioHang = $this->trangChuModel->soGioHang($nguoiDungId)->fetch();
        $showGioHangs = $this->trangChuModel->showGioHang($nguoiDungId)->fetchAll();
        $danhMucs = $this->trangChuModel->danhMuc()->fetchAll();
        $danhGias = $this->trangChuModel->danhGias()->fetchAll();
        $baiViets = $this->trangChuModel->baiViet()->fetchAll();
        $noiDung = $this->trangChuModel->noiDung()->fetch();
        require_once 'views/chiTietDanhMuc.php';
    }

    function thongTintk()
    {
        $nguoiDungId  = $this->trangChuModel->idNguoiDung($_SESSION['dn'])->fetch()['Id'];
        $soGioHang = $this->trangChuModel->soGioHang($nguoiDungId)->fetch();
        $showGioHangs = $this->trangChuModel->showGioHang($nguoiDungId)->fetchAll();
        $danhMucs = $this->trangChuModel->danhMuc()->fetchAll();
        $noiDung = $this->trangChuModel->noiDung()->fetch();
        require_once 'views/thongTinTaiKhoan.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_sua'])) {
            $ten_dang_nhap = htmlspecialchars($_POST['account_username']);
            $email = filter_var($_POST['account_email'], FILTER_VALIDATE_EMAIL);
            $dia_chi = htmlspecialchars($_POST['dia_chi']);
            $ho_ten = htmlspecialchars($_POST['account_fullname']);
            $so_dien_thoai = htmlspecialchars($_POST['account_phone']);
            $ngay_sinh = $_POST['account_dob'];
            $gioi_tinh = $_POST['account_gender'];

            // Kiểm tra năm sinh hợp lệ
            if (!empty($ngay_sinh)) {
                $currentYear = (int)date('Y');
                $birthYear = (int)date('Y', strtotime($ngay_sinh));
                $age = $currentYear - $birthYear;

                if ($age < 0 || $age > 150) {
                    echo "<script>alert('Ngày sinh không hợp lệ. Vui lòng nhập năm sinh chính xác!');</script>";
                    echo '<script>window.location = "./?act=thongTinTk";</script>';
                    exit;
                }
            } else {
                echo "<script>alert('Vui lòng nhập ngày sinh!');</script>";
                echo '<script>window.location = "./?act=thongTinTk";</script>';
                exit;
            }

            // Xử lý upload ảnh
            $img = $_FILES['img']['name'];
            $tmp = $_FILES['img']['tmp_name'];
            if ($img) {
                move_uploaded_file($tmp, './admin/assets/img/' . $img);
            }

            // Kiểm tra và cập nhật mật khẩu
            if (!empty($_POST['current_password']) && !empty($_POST['new_password']) && !empty($_POST['confirm_password'])) {
                $current_password = $_POST['current_password'];
                $new_password = $_POST['new_password'];
                $confirm_password = $_POST['confirm_password'];

                $passDB = $this->trangChuModel->getPass($_SESSION['dn'])->fetch();
                if (!password_verify($current_password, $passDB['Mat_khau'])) {
                    echo '<script>alert("Mật khẩu không chính xác");</script>';
                } elseif ($confirm_password !== $new_password) {
                    echo '<script>alert("Mật khẩu không trùng khớp");</script>';
                } else {
                    // Mã hóa mật khẩu trước khi lưu
                    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                    if ($this->trangChuModel->updatePass($hashed_password, $_SESSION['dn'])) {
                        echo '<script>window.location = "./?act=thongTinTk";</script>';
                        exit;
                    } else {
                        echo '<script>alert("Không thể cập nhật mật khẩu");</script>';
                    }
                }
            }

            // Kiểm tra thông tin bắt buộc
            if (empty($ten_dang_nhap) || empty($email) || empty($dia_chi) || empty($ho_ten) || empty($so_dien_thoai)) {
                echo "<script>alert('Vui lòng điền đầy đủ thông tin!');</script>";
                echo '<script>window.location = "./?act=thongTinTk";</script>';
                exit;
            }

            // Cập nhật thông tin người dùng
            if ($this->trangChuModel->sua_thong_tin($ten_dang_nhap, $email, $dia_chi, $ho_ten, $so_dien_thoai, $ngay_sinh, $gioi_tinh, $img)) {
                $_SESSION['dn'] = $email;
                echo '<script>window.location = "./?act=thongTinTk";</script>';
                exit;
            } else {
                echo "Lỗi cập nhật thông tin!";
            }
        }
    }

    function chiTietGioHang()
    {
        $nguoiDungId = $this->trangChuModel->idNguoiDung($_SESSION['dn'])->fetch()['Id'];
        $showGioHangs = $this->trangChuModel->showGioHang($nguoiDungId)->fetchAll();
        if (isset($_POST['btn_update_so_luong'])) {
            $soLuongs = $_POST['quantity'];

            foreach ($soLuongs as $gioHangId => $soLuongMoi) {
                // Lấy thông tin sản phẩm và số lượng tồn kho
                $tonKho = $this->trangChuModel->layBienTheTheoGioHangId($gioHangId)->fetch()['so_luong_ton_kho'];

                if ($soLuongMoi <= $tonKho) {
                    // Cập nhật nếu số lượng mới <= tồn kho
                    $this->trangChuModel->capNhatSoLuongTrongGio($gioHangId, $soLuongMoi);
                } else {
                    // Thông báo lỗi nếu số lượng vượt quá tồn kho
                    echo '<script>alert("Số lượng yêu cầu vượt quá tồn kho!");</script>';
                }
            }

            header('Location:?act=chiTietGioHang');
            exit();
        }


        // Lấy lại dữ liệu từ database sau khi cập nhật
        $soGioHang = $this->trangChuModel->soGioHang($nguoiDungId)->fetch();
        $danhMucs = $this->trangChuModel->danhMuc()->fetchAll();
        $noiDung = $this->trangChuModel->noiDung()->fetch();
        $chiTietGioHangs = $this->trangChuModel->showGioHang($nguoiDungId)->fetchAll();

        // Hiển thị trang giỏ hàng
        require_once 'views/chiTietGioHang.php';
    }


    function thanhToan()
    {
        $check = true;
        $nguoiDungId  = $this->trangChuModel->idNguoiDung($_SESSION['dn'])->fetch()['Id'];
        $showGioHangs = $this->trangChuModel->showGioHang($nguoiDungId)->fetchAll();
        $soGioHang = $this->trangChuModel->soGioHang($nguoiDungId)->fetch();
        $thongTinNguoiDung = $this->trangChuModel->getInfo($nguoiDungId)->fetch();
        $danhMucs = $this->trangChuModel->danhMuc()->fetchAll();
        $noiDung = $this->trangChuModel->noiDung()->fetch();
        $chiTietGioHangs = $this->trangChuModel->showGioHang($nguoiDungId)->fetchAll();
        foreach ($chiTietGioHangs as $chiTietGioHang) {
            if ($chiTietGioHang['So_luong'] > $chiTietGioHang['so_luong_ton_kho']) {
                $check = false;
                break;
            }
        }
        $gioHang = [];
        foreach ($showGioHangs as $key => $showGioHang) {
            $gioHang[] = [
                "name" => $showGioHang['Ten_san_pham'],    // Tên sản phẩm
                "price" => $showGioHang['gia_ban'],        // Giá sản phẩm
                "quantity" => $showGioHang['So_luong'],    // Số lượng
                "color" => $showGioHang['ten_mau'],        // Màu sắc
                "size" => $showGioHang['ten_kich_thuoc']       // Kích thước
            ];
        }

        if (isset($_POST['btn_thanh_toan'])) {
            $check = true; // Khởi tạo trạng thái kiểm tra

            // Lặp qua các sản phẩm trong giỏ hàng để kiểm tra số lượng
            foreach ($chiTietGioHangs as $chiTietGioHang) {
                if ($chiTietGioHang['So_luong'] > $chiTietGioHang['so_luong_ton_kho']) {
                    $check = false; // Đặt trạng thái sai nếu vượt quá số lượng tồn kho
                    break; // Dừng kiểm tra nếu phát hiện lỗi
                }
            }

            if (!$check) {
                echo '<script>alert("Số lượng sản phẩm không đủ trong kho!");</script>';
                require_once 'views/thanhToan.php';
            }
            $tenNguoiNhan = $_POST['ho_ten'];
            $email = $_POST['email'];
            $sdt = $_POST['sdt'];
            $diaChi = $_POST['dia_chi'];
            $ghiChu = $_POST['ghi_chu'];
            $phuongThucThanhToan = $_POST['payment_method'];
            $ngayDat = date('Y-m-d H:i:s');
            $trangThaiDonHang = 1;
            $nguoiDungId  = $this->trangChuModel->idNguoiDung($_SESSION['dn'])->fetch()['Id'];
            $maDonHang = 'DH-' . rand(1000, 9999);
            $listKhuyenMais = $this->trangChuModel->listKhuyenMai()->fetchAll();
            $tongTien = str_replace(',', '',  $_POST['tongTien']);
            $khuyenMaiId = null;

            if (isset($_POST['giam_gia'])) {
                foreach ($listKhuyenMais as $key => $listKhuyenMai) {
                    if ($_POST['giam_gia'] == $listKhuyenMai['Ma_khuyen_mai']) {
                        $loaiKhuyenMai = $this->trangChuModel->loaiKhuyenMai($_POST['giam_gia'])->fetch()['Loai_giam_gia'];
                        if ($loaiKhuyenMai == 'percent') {
                            $tongTien = str_replace(',', '',  $_POST['tongTien'] * ((100 - $listKhuyenMai['Gia_tri_giam_gia']) / 100));
                            $_SESSION['khuyen_mai'] = $listKhuyenMai['Gia_tri_giam_gia'] . '%';
                        } else {
                            $tongTien =  str_replace(',', '',  $_POST['tongTien'] - $listKhuyenMai['Gia_tri_giam_gia']);
                            $_SESSION['khuyen_mai'] = $listKhuyenMai['Gia_tri_giam_gia'] . '₫';
                        }
                    }
                }
            } else {
                $tongTien = str_replace(',', '',  $_POST['tongTien']);
            }

            $error = [];

            if (empty($tenNguoiNhan)) {
                $error['ho_ten'] = "Không được để trống";
            }
            if (empty($email)) {
                $error['email'] = "Không được để trống";
            }
            if (empty($sdt)) {
                $error['sdt'] = "Không được để trống";
            }
            if (empty($diaChi)) {
                $error['dia_chi'] = "Không được để trống";
            }

            if (empty($error)) {
                $config = [
                    "app_id" => 2553, // App ID từ môi trường test
                    "key1" => "PcY4iZIKFCIdgZvA6ueMcMHHUbRLYjPL", // Key1 từ môi trường test
                    "key2" => "kLtgPl8HHhfvMuDHPwKfgfsY4Ydm9eIz", // Key2 từ môi trường test
                    "endpoint" => "https://sb-openapi.zalopay.vn/v2/create" // Endpoint test
                ];

                if ($phuongThucThanhToan == 'Chuyển khoản') {
                    try {
                        // Chuẩn bị thông tin giao dịch
                        $transID = rand(0, 1000000); // ID giao dịch ngẫu nhiên
                        $order = [
                            "app_id" => $config["app_id"],
                            "app_trans_id" => date("ymd") . "_" . $transID, // Mã giao dịch duy nhất
                            "app_user" => $tenNguoiNhan,
                            "amount" => $tongTien,
                            "description" => "Thanh toán đơn hàng #$maDonHang",
                            "embed_data" => json_encode(['redirecturl' => 'http://localhost/Du_an_1/?act=complete']),
                            "item" => json_encode($gioHang),
                            "bank_code" => "CC",
                            "app_time" => round(microtime(true) * 1000)
                        ];

                        // Tạo MAC
                        $data = $order["app_id"] . "|" . $order["app_trans_id"] . "|" . $order["app_user"] . "|" . $order["amount"]
                            . "|" . $order["app_time"] . "|" . $order["embed_data"] . "|" . $order["item"];
                        $order["mac"] = hash_hmac("sha256", $data, $config["key1"]);

                        // Gửi yêu cầu tới ZaloPay
                        $context = stream_context_create([
                            "http" => [
                                "header" => "Content-type: application/x-www-form-urlencoded\r\n",
                                "method" => "POST",
                                "content" => http_build_query($order)
                            ]
                        ]);

                        $response = file_get_contents($config["endpoint"], false, $context);
                        $result = json_decode($response, true);

                        if ($result["return_code"] == 1) {
                            // Lưu thông tin đơn hàng tạm thời vào session
                            $_SESSION['don_hang'] = [
                                'nguoiDungId' => $nguoiDungId,
                                'maDonHang' => $maDonHang,
                                'tenNguoiNhan' => $tenNguoiNhan,
                                'sdt' => $sdt,
                                'email' => $email,
                                'diaChi' => $diaChi,
                                'ghiChu' => $ghiChu,
                                'tongTien' => $tongTien,
                                'phuongThucThanhToan' => $phuongThucThanhToan,
                                'ngayDat' => $ngayDat,
                                'trangThaiDonHang' => $trangThaiDonHang,
                                'khuyenMaiId' => $khuyenMaiId,
                                'gioHang' => $showGioHangs
                            ];

                            // Chuyển hướng tới URL thanh toán
                            header("Location: " . $result["order_url"]);
                            exit();
                        } else {
                            echo "Không thể tạo giao dịch thanh toán: " . $result["return_message"];
                        }
                    } catch (Exception $e) {
                        echo "Đã xảy ra lỗi: " . $e->getMessage();
                    }
                } else {
                    $idDonHang = $this->trangChuModel->themDonHang($nguoiDungId, $maDonHang, $tenNguoiNhan, $sdt, $email, $diaChi, $ghiChu, $tongTien, $phuongThucThanhToan, $ngayDat, $trangThaiDonHang, $khuyenMaiId, 'Chưa thanh toán');
                    if ($idDonHang) {
                        foreach ($showGioHangs as $key => $showGioHang) {
                            if ($this->trangChuModel->chiTietGioHang($idDonHang, $showGioHang['san_pham_id'], $showGioHang['So_luong'], $showGioHang['gia_ban'], $showGioHang['gia_ban'] * $showGioHang['So_luong'], $showGioHang['chi_tiet_san_pham_id'])) {
                                $this->trangChuModel->capNhatSoLuongTonKho($showGioHang['chi_tiet_san_pham_id'],  $showGioHang['so_luong_ton_kho'] - $showGioHang['So_luong']);
                                $_SESSION['id_don_hang'] = $idDonHang;
                                header('Location:?act=complete');
                            }
                        }
                    }
                }
            }
        }
        require_once 'views/thanhToan.php';
    }
    function xoaGioHang($id)
    {
        if ($this->trangChuModel->xoaGioHang($id)) {
            echo "<script>window.location.href = '?act=chiTietGioHang';</script>";
        }
    }

    function complete()
    {
        if (isset($_GET['act']) && $_GET['act'] == 'complete' && isset($_SESSION['don_hang'])) {
            $donHang = $_SESSION['don_hang'];

            // Kiểm tra trạng thái giao dịch từ ZaloPay (thực hiện yêu cầu tới API kiểm tra)
            $status = true; // Giả sử giao dịch thành công (thay bằng logic kiểm tra thực tế)

            if ($status) {
                $idDonHang = $this->trangChuModel->themDonHang(
                    $donHang['nguoiDungId'],
                    $donHang['maDonHang'],
                    $donHang['tenNguoiNhan'],
                    $donHang['sdt'],
                    $donHang['email'],
                    $donHang['diaChi'],
                    $donHang['ghiChu'],
                    $donHang['tongTien'],
                    $donHang['phuongThucThanhToan'],
                    $donHang['ngayDat'],
                    $donHang['trangThaiDonHang'],
                    $donHang['khuyenMaiId'],
                    'Đã thanh toán'
                );

                if ($idDonHang) {
                    foreach ($donHang['gioHang'] as $item) {
                        $this->trangChuModel->chiTietGioHang(
                            $idDonHang,
                            $item['san_pham_id'],
                            $item['So_luong'],
                            $item['gia_ban'],
                            $item['gia_ban'] * $item['So_luong'],
                            $item['chi_tiet_san_pham_id']
                        );

                        $this->trangChuModel->capNhatSoLuongTonKho(
                            $item['chi_tiet_san_pham_id'],
                            $item['so_luong_ton_kho'] - $item['So_luong']
                        );
                    }

                    unset($_SESSION['don_hang']);
                    $_SESSION['id_don_hang'] = $idDonHang;
                    header('Location:?act=success');
                }
            } else {
                echo "Giao dịch không thành công.";
            }
        }

        $complete = $this->trangChuModel->complete($_SESSION['id_don_hang'])->fetch();
        $danhMucs = $this->trangChuModel->danhMuc()->fetchAll();
        $noiDung = $this->trangChuModel->noiDung()->fetch();
        $nguoiDungId  = $this->trangChuModel->idNguoiDung($_SESSION['dn'])->fetch()['Id'];
        $soGioHang = $this->trangChuModel->soGioHang($nguoiDungId)->fetch();
        $showGioHangs = $this->trangChuModel->showGioHang($nguoiDungId)->fetchAll();
        require_once 'views/complete.php';
    }

    function donHang()
    {
        $danhMucs = $this->trangChuModel->danhMuc()->fetchAll();
        $noiDung = $this->trangChuModel->noiDung()->fetch();
        $nguoiDungId  = $this->trangChuModel->idNguoiDung($_SESSION['dn'])->fetch()['Id'];
        $soGioHang = $this->trangChuModel->soGioHang($nguoiDungId)->fetch();
        $showGioHangs = $this->trangChuModel->showGioHang($nguoiDungId)->fetchAll();
        $dsDonHangs = $this->trangChuModel->danhSachDonHangChoXacNhan($nguoiDungId)->fetchAll();
        $daXacNhans = $this->trangChuModel->danhSachDonHangDaXacNhan($nguoiDungId)->fetchAll();
        $daGiaos = $this->trangChuModel->danhSachDonHangDaGiao($nguoiDungId)->fetchAll();
        $dangGiaos = $this->trangChuModel->danhSachDonHangDangGiao($nguoiDungId)->fetchAll();
        $alls = $this->trangChuModel->allDonHang($nguoiDungId)->fetchAll();
        $thanhCongs = $this->trangChuModel->danhSachDonHangGiaoHangaThanhCong($nguoiDungId)->fetchAll();
        $daHuys = $this->trangChuModel->danhSachDonHangDaHuy($nguoiDungId)->fetchAll();
        require_once 'views/danhSachDonHang.php';
    }

    function huyDonHang($id)
    {
        $chiTietDonHangs = $this->trangChuModel->laySoLuongTonKho($id)->fetchAll();

        foreach ($chiTietDonHangs as $key => $chiTietDonHang) {
            $soLuongMoi = $chiTietDonHang['soLuongChiTiet'] + $chiTietDonHang['soLuongSanPham'];

            // Cập nhật số lượng tồn kho
            $capNhatTonKho = $this->trangChuModel->capNhatSoLuongTonKho($chiTietDonHang['chi_tiet_san_pham_id'], $soLuongMoi);
            if (!$capNhatTonKho) {
                echo "Cập nhật số lượng tồn kho thất bại cho sản phẩm ID: " . $chiTietDonHang['chi_tiet_san_pham_id'];
                return;
            }
        }
        $trangThaiDonHang = $this->trangChuModel->layTrangThaiDonHang($id)->fetch()['trang_thai_don_hang_id'];
        $phuongThucThanhToan = $this->trangChuModel->phuongThucThanhToan($id)['phuong_thuc_thanh_toan'];
        if ($trangThaiDonHang != 1) {
            echo "<script>alert('Đơn hàng đã được xác nhận')</script>";
            header('Location:?act=order');
        } else {
            if ($phuongThucThanhToan == 'Chuyển khoản') {
                if ($this->trangChuModel->updateTrangThai($id, 8)) {
                    if ($this->trangChuModel->updateTrangThaiThannhToan($id)) {
                        header('Location:?act=order');
                    }
                }
            } else {
                if ($this->trangChuModel->updateTrangThai($id, 8)) {
                    header('Location:?act=order');
                }
            }
        }
    }


    function chiTietDonHang($id)
    {
        $danhMucs = $this->trangChuModel->danhMuc()->fetchAll();
        $noiDung = $this->trangChuModel->noiDung()->fetch();
        $nguoiDungId  = $this->trangChuModel->idNguoiDung($_SESSION['dn'])->fetch()['Id'];
        $soGioHang = $this->trangChuModel->soGioHang($nguoiDungId)->fetch();
        $showGioHangs = $this->trangChuModel->showGioHang($nguoiDungId)->fetchAll();
        $chiTietDonHangs = $this->trangChuModel->chiTietDonHang($id)->fetchAll();
        $donHang = $this->trangChuModel->donHang($id)->fetch();
        require_once 'views/chiTietDonHang.php';
    }

    function listSanPhamYeuThich()
    {
        $danhMucs = $this->trangChuModel->danhMuc()->fetchAll();
        $noiDung = $this->trangChuModel->noiDung()->fetch();
        $nguoiDungId  = $this->trangChuModel->idNguoiDung($_SESSION['dn'])->fetch()['Id'];
        $soGioHang = $this->trangChuModel->soGioHang($nguoiDungId)->fetch();
        $showGioHangs = $this->trangChuModel->showGioHang($nguoiDungId)->fetchAll();
        $listSPYeuThichs = $this->trangChuModel->listSanPhamYeuThich($nguoiDungId)->fetchAll();
        require_once 'views/account_wishlist.php';
    }
    function themSPYeuThich()
    {
        // Kiểm tra xem yêu cầu có dữ liệu POST không
        if (isset($_POST['sanPhamId'])) {
            $sanPhamId = intval($_POST['sanPhamId']); // Chuyển đổi ID sản phẩm thành số nguyên
            $nguoiDungId = $this->trangChuModel->idNguoiDung($_SESSION['dn'])->fetch()['Id'];

            // Lấy danh sách sản phẩm yêu thích của người dùng
            $listSPYeuThichs = $this->trangChuModel->listSanPhamYeuThich($nguoiDungId)->fetchAll();

            // Kiểm tra sản phẩm đã có trong danh sách yêu thích chưa
            foreach ($listSPYeuThichs as $sanPhamYeuThich) {
                if ($sanPhamYeuThich['San_pham_id'] == $sanPhamId) {
                    echo 'exists'; // Nếu đã tồn tại
                    return;
                }
            }

            // Thêm sản phẩm vào danh sách yêu thích
            if ($this->trangChuModel->themSPYeuThich($nguoiDungId, $sanPhamId)) {
                echo 'success'; // Thêm thành công
            } else {
                echo 'error'; // Thêm thất bại
            }
        } else {
            echo 'error'; // Không nhận được dữ liệu POST
        }
    }

    function remove($id)
    {
        if ($this->trangChuModel->remove($id)) {
            header('LOcation:?act=SpYeuThich');
        }
    }

    function danhGia($id)
    {
        if (isset($_POST['btn_rate'])) {
            $sanPhamId = $_POST['san_pham_id'];
            $nguoiDungId  = $this->trangChuModel->idNguoiDung($_SESSION['dn'])->fetch()['Id'];
            $sODiem = $_POST['rating'];
            $noiDung = $_POST['comment'];
            $thoiGianTao = date("Y-m-d");
            $chiTietId = $_GET['id'];
            $chi_tiet_san_pham_id = $_POST['chi_tiet_id'];
            if ($this->trangChuModel->themDanhGia($sanPhamId, $nguoiDungId, $sODiem, $noiDung, $thoiGianTao, $chi_tiet_san_pham_id)) {
                header('Location:?act=danhGia&id=' . $chiTietId);
            }
        }
        $danhMucs = $this->trangChuModel->danhMuc()->fetchAll();
        $noiDung = $this->trangChuModel->noiDung()->fetch();
        $nguoiDungId  = $this->trangChuModel->idNguoiDung($_SESSION['dn'])->fetch()['Id'];
        $soGioHang = $this->trangChuModel->soGioHang($nguoiDungId)->fetch();
        $showGioHangs = $this->trangChuModel->showGioHang($nguoiDungId)->fetchAll();
        $chiTietDonHangs = $this->trangChuModel->chiTietDonHangDanhGia($id)->fetchAll();
        $listDanhGia = $this->trangChuModel->listDanhGia()->fetchAll();
        require_once 'views/danhGia.php';
    }

    function capNhatTrangThaiThanhCong($id)
    {
        if ($this->trangChuModel->capNhatTrangThaiThanhCong($id)) {
            header('Location:?act=order');
        } else {
            echo 'Khong the cap nhat trang thai';
        }
    }
}
