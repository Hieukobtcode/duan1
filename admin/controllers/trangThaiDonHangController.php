<?php
class trangThaiDonHangController
{
    public $trangThaiDonHangModel;
    
    function __construct()
    {
        $this->trangThaiDonHangModel = new trangThaiDonHangModel;
    }

    function hien_trang_thai_don_hang()
    {
        $trang_thai_don_hang = $this->trangThaiDonHangModel->trang_thai_don_hang();
        require_once 'views/trangThaiDonHangView/listtrangThaiDonHang.php';
    }

    function sua_trang_thai_don_hang($id)
    {
        $trang_thai_don_hang = $this->trangThaiDonHangModel->tim_trang_thai_don_hang($id)->fetch();
        
        if (isset($_POST['btn_sua'])) {
            $Ten_trang_thai = $_POST['Ten_trang_thai'];           
            $error = [];
            
            if (empty($Ten_trang_thai)) {
                $error['Ten_trang_thai'] = "Tên danh mục không được để trống";
            }

            if (empty($error)) {
                if ($this->trangThaiDonHangModel->sua_trang_thai_don_hang($id, $Ten_trang_thai)) {
                    echo "<script>window.location.href = '?act=trangThaiDonHang';</script>";
                    exit();
                } else {
                    echo "Không thể sửa";
                }
            }
        }
        
        require_once 'views/trangThaiDonHangView/suatrangThaiDonHang.php';
    }

    function them_trang_thai_don_hang()
    {
        if (isset($_POST['btn_them'])) {
            $Ten_trang_thai = $_POST['Ten_trang_thai'];
            $error = [];
            
            if (empty($Ten_trang_thai)) {
                $error['Ten_trang_thai'] = "Tên danh mục không được để trống";
            }

            if (empty($error)) {
                if ($this->trangThaiDonHangModel->them_trang_thai_don_hang($Ten_trang_thai)) {
                    echo "<script>window.location.href = '?act=trangThaiDonHang';</script>";
                    exit();
                } else {
                    echo "Không thể thêm danh mục";
                }
            }
        }
        
        require_once 'views/trangThaiDonHangView/themtrangThaiDonHang.php';
    }

    function xoa_trang_thai_don_hang($id)
    {
        if ($this->trangThaiDonHangModel->xoa_trang_thai_don_hang($id)) {
            echo "<script>window.location.href = '?act=trangThaiDonHang';</script>";
            } else {
            echo "Không thể xóa danh mục";
        }
    }

    function trangChuController()
    {
        require_once 'views/trangChu.php';
    }
}
