<?php
class danhMucController
{
    public $danhMucModel;
    function __construct()
    {
        $this->danhMucModel = new danhMucModel;
    }

    function hien_thi_danh_muc()
    {
        $danh_muc = $this->danhMucModel->danh_muc();
        require_once 'views/danhMucView/listdanhMuc.php';
    }

    function sua_danh_muc($id)
    {
        $danh_muc = $this->danhMucModel->tim_danh_muc($id)->fetch();
        if (isset($_POST['btn_sua'])) {
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $ngay_cap_nhat = date("Y-m-d");
            $mo_ta = $_POST['mo_ta'];
            $trang_thai=$_POST['trang_thai'];
            $error = [];
            if (empty($ten_danh_muc)) {
                $error['ten_danh_muc'] = "Tên danh mục không được để trống";
            }

            if (empty($error)) {
                if ($this->danhMucModel->sua_danh_muc($id, $ten_danh_muc, $ngay_cap_nhat,$trang_thai, $mo_ta)) {
                    echo "<script>window.location.href = '?act=danhMuc';</script>";
                    exit();
                } else {
                    echo "Khong the sua";
                }
            } else {
                require_once 'views/danhMucView/suaDanhMuc.php';
            }
        }
        require_once "views/danhMucView/suaDanhMuc.php";
    }

    function them_danh_muc()
    {
        if (isset($_POST['btn_them'])) {
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
            $ngay_tao =  (new DateTime())->format("Y-m-d");
            $ngay_cap_nhat =  (new DateTime())->format("Y-m-d");
            $error = [];
            if (empty($ten_danh_muc)) {
                $error['ten_danh_muc'] = "Tên danh mục không được để trống";
            }

            if (empty($error)) {
                if ($this->danhMucModel->them_danh_muc($ten_danh_muc, $ngay_tao, $ngay_cap_nhat,$mo_ta)) {
                    echo "<script>window.location.href = '?act=danhMuc';</script>";
                    exit();
                } else {
                    echo "Khong the them danh muc";
                }
            } else {
                require_once 'views/danhMucView/themDanhMuc.php';
            }
        }
        require_once 'views/danhMucView/themDanhMuc.php';
    }

    function xoa_danh_muc($id)
    {
        if ($this->danhMucModel->xoa_danh_muc($id)) {
            echo "<script>window.location.href = '?act=danhMuc';</script>";
        } else {
            echo "Khong the xoa danh muc";
        }
    }

    function trangChuController()
    {
        require_once 'views/trangChu.php';
    }
}
