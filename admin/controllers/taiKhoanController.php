<?php
class taiKhoanController
{
    public $taiKhoanModel;
    function __construct()
    {
        $this->taiKhoanModel = new taiKhoanModel;
    }

    function hien_thi_quan_tri()
    {
        $quan_tri = $this->taiKhoanModel->list_tai_khoan_quan_tri();
        require_once 'views/taiKhoan/quanTri/listQuanTri.php';
    }

    function sua_quan_tri($id)
    {
        $quan_tri = $this->taiKhoanModel->tim_quan_tri($id)->fetch();
        if (isset($_POST['btn_sua'])) {
            $ten_dang_nhap = $_POST['ten_dang_nhap'];
            $email = $_POST['email'];
            $trang_thai=$_POST['trang_thai'];
            $so_dien_thoai=$_POST['so_dien_thoai'];
            $error = [];
            if (empty($ten_dang_nhap)) {
                $error['ten_dang_nhap'] = "Tên đăng nhập không được để trống";
            }
            if (empty($email)) {
                $error['email'] = "Email không được để trống";
            }
            if (empty($so_dien_thoai)) {
                $error['so_dien_thoai'] = "Số điện thoại không được để trống";
            }

            if (empty($error)) {
                if ($this->taiKhoanModel->sua_quan_tri($id,$ten_dang_nhap,$so_dien_thoai,$email,$trang_thai)) {
                    header('Location:?act=listQuanTri');
                    exit();
                } else {
                    echo "Khong the sua";
                }
            } else {
                require_once 'views/taiKhoan/quanTri/suaQuanTri.php';
            }
        }
        require_once 'views/taiKhoan/quanTri/suaQuanTri.php';
    }

    function them_quan_tri()
    {
        if (isset($_POST['btn_them_quan_tri'])) {
            $ten_dang_nhap = $_POST['ten_dang_nhap'];
            $email = $_POST['email'];
            $ngay_tao =  (new DateTime())->format("Y-m-d");
            $mat_khau = password_hash('123@456', PASSWORD_BCRYPT);
            $vai_tro='admin';
            $error = [];
            if (empty($ten_dang_nhap)) {
                $error['ten_dang_nhap'] = "Tên đăng nhập không được để trống";
            }
            if(empty($email)){
                $error['email'] = "Email không được để trống";
            }

            if (empty($error)) {
                if ($this->taiKhoanModel->them_quan_tri($ten_dang_nhap, $mat_khau , $email,$ngay_tao,$vai_tro)) {
                    header('Location:?act=listQuanTri');
                    exit();
                } else {
                    echo "Khong the them";
                }
            } else {
                require_once 'views/taiKhoan/quanTri/themQuanTri.php';
            }
        }
        require_once 'views/taiKhoan/quanTri/themQuanTri.php';
    }

    function xoa_pass($id)
    {
        $pass = password_hash('123@456', PASSWORD_BCRYPT);
        if ($this->taiKhoanModel->xoa_pass($id,$pass)) {
            header('Location:?act=listQuanTri');
            echo '<script>alert("Reset mật khẩu thành")<script>';
        } else {
            echo "Khong the reset pass";
        }
    }

    function listKhachHang()
    {
        $listKhachHang = $this->taiKhoanModel->listKhachHang();
        require_once 'views/taiKhoan/khachHang/listKhachHang.php';
    }

    function sua_khach_hang($id)
    {
        $khach_hang = $this->taiKhoanModel->tim_khach_hang($id)->fetch();
        if (isset($_POST['btn_sua'])) {
            $ten_dang_nhap = $_POST['ten_dang_nhap'];
            $email = $_POST['email'];
            $ho_ten = $_POST['ho_ten'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $dia_chi = $_POST['dia_chi'];
            $ngay_thang_nam_sinh = $_POST['ngay_thang_nam_sinh'];
            $trang_thai=$_POST['trang_thai'];

            $anh_dai_dien=$_FILES['anh_dai_dien']['name'];
            $tmp=$_FILES['anh_dai_dien']['tmp_name'];
            move_uploaded_file($tmp, __DIR__ . '/../../assets/img/' . $anh_dai_dien);
            $error = [];
            if (empty($ten_dang_nhap)) {
                $error['ten_dang_nhap'] = "Tên đăng nhập không được để trống";
            }
            if (empty($email)) {
                $error['email'] = "Email không được để trống";
            }
            if (empty($ho_ten)) {
                $error['ho_ten'] = "Họ tên không được để trống";
            }
            if (empty($so_dien_thoai)) {
                $error['so_dien_thoai'] = "Số điện thoại không được để trống";
            }
            if (empty($dia_chi)) {
                $error['dia_chi'] = "Địa chỉ thoại không được để trống";
            }
            if (empty($ngay_thang_nam_sinh)) {
                $error['ngay_thang_nam_sinh'] = "Ngày tháng năm sinh thoại không được để trống";
            }
            

            if (empty($error)) {
                if ($this->taiKhoanModel->sua_khach_hang($id,$ten_dang_nhap,$email,$ho_ten,$anh_dai_dien,$so_dien_thoai,$dia_chi,$ngay_thang_nam_sinh,$trang_thai)) {
                    header('Location:?act=listKhachHang');
                    exit();
                } else {
                    echo "Khong the sua";
                }
            } else {
                require_once 'views/taiKhoan/khachHang/suaKhachHang.php';
            }
        }
        require_once 'views/taiKhoan/khachHang/suaKhachHang.php';
    }

    function chiTietKhachHang($id){
        $KhachHang = $this->taiKhoanModel->tim_khach_hang($id)->fetch();
        require_once 'views/taiKhoan/khachHang/chiTietKhachHang.php';
    }
}

