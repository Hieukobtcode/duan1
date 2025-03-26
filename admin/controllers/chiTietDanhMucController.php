<?php
class ChiTietDanhMucController
{
    public $chiTietDanhMucModel;
    function __construct()
    {
        $this->chiTietDanhMucModel = new chiTietDanhMucModel;
    }

    function hien_thi_chi_tiet_danh_muc()
    {
        $list_chi_tiet_danh_muc = $this->chiTietDanhMucModel->chi_tiet_danh_muc();
        require_once 'views/ChiTietDanhMucView/listChiTietDanhMuc.php';
    }

    function sua_chi_tiet_danh_muc($id)
    {
        $chi_tiet_danh_muc = $this->chiTietDanhMucModel->tim_chi_tiet_danh_muc($id)->fetch();
        $danh_mucs = $this->chiTietDanhMucModel->danh_muc()->fetchAll();
        if (isset($_POST['btn_sua'])) {
            $mo_ta = $_POST['mo_ta'];
            $danh_muc = $_POST['danh_muc'];
            $error = [];
            if (empty($mo_ta)) {
                $error['mo_ta'] = "Mô tả không được để trống";
            }

            if (empty($error)) {
                if ($this->chiTietDanhMucModel->sua_chi_tiet_danh_muc($id, $mo_ta, $danh_muc)) {
                    echo "<script>window.location.href = '?act=chiTietDanhMuc';</script>";
                    exit();
                } else {
                    echo "Khong the sua";
                }
            } else {
                require_once 'views/ChiTietDanhMucView/suaChiTietDanhMuc.php';
            }
        }
        require_once 'views/ChiTietDanhMucView/suaChiTietDanhMuc.php';
    }

    function them_chi_tiet_danh_muc()
    {
        $danh_muc = $this->chiTietDanhMucModel->danh_muc();
        if (isset($_POST['btn_them'])) {
            $mo_ta = $_POST['mo_ta'];
            $danh_muc = $_POST['danh_muc'];
            $error = [];
            if (empty($mo_ta)) {
                $error['mo_ta'] = "Mô tả không được để trống";
            }

            if (empty($error)) {
                if ($this->chiTietDanhMucModel->them_chi_tiet_danh_muc($mo_ta, $danh_muc)) {
                    echo "<script>window.location.href = '?act=chiTietDanhMuc';</script>";
                    exit;
                } else {
                    echo "Khong the them chi tiet danh muc";
                }
            } else {
                require_once 'views/ChiTietDanhMucView/themChiTietDanhMuc.php';
            }
        }
        require_once 'views/ChiTietDanhMucView/themChiTietDanhMuc.php';
    }

    function xoa_chi_tiet_danh_muc($id)
    {
        if ($this->chiTietDanhMucModel->xoa_chi_tiet_danh_muc($id)) {
            header('Location:?act=chiTietDanhMuc');
            echo "<script>
            window.location.href = '?act=chiTietDanhMuc';    
            </script>";
        } else {
            echo "Khong the xoa chi tiet danh muc";
        }
    }
}
