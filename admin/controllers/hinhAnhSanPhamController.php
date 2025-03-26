<?php
class hinhAnhSPController
{
    public $hinhAnhSPModel;
    function __construct()
    {
        $this->hinhAnhSPModel = new hinhAnhSPModel;
    }

    function hien_thi_hinh_anh_sp()
    {
        $hinh_anh = $this->hinhAnhSPModel->list_hinh_anh_sp();
        require_once 'views/hinhAnhSanPhamView/listHinhAnhSanPham.php';
    }

    function sua_hinh_anh_sp($id)
    {
        $hinh_anh = $this->hinhAnhSPModel->tim_hinh_anh($id)->fetch();
        if (isset($_POST['btn_sua'])) {
            $img = $_FILES['img']['name'];
            $tmp = $_FILES['img']['tmp_name'];
            move_uploaded_file($tmp,'./assets/img/' .$img);
            $mo_ta=$_POST['mo_ta'];
           
            if (empty($error)) {
                if ($this->hinhAnhSPModel->sua_hinh_anh_sp($id,$img,$mo_ta)) {
                    echo "<script>window.location.href = '?act=listHinhAnhSP';</script>";
                    exit();
                } else {
                    echo "Khong the sua";
                }
            } else {
                require_once 'views/hinhAnhSanPhamView/suaHinhAnhSanPham.php';
            }
        }
        require_once 'views/hinhAnhSanPhamView/suaHinhAnhSanPham.php';
    }

    function them_hinh_anh_sp()
    {
        if (isset($_POST['btn_them_hinh_anh_sp'])) {
            $img = $_FILES['img']['name'];
            $tmp = $_FILES['img']['tmp_name'];
            move_uploaded_file($tmp,'./assets/img/' .$img);
            $mo_ta=$_POST['mo_ta'];

            if (empty($error)) {

                if ($this->hinhAnhSPModel->them_hinh_anh_sp($img,$mo_ta)) {
                    echo "<script>window.location.href = '?act=listHinhAnhSP';</script>";
                    exit();
                } else {
                    echo "Khong the them";
                }

            } else {
                require_once 'views/hinhAnhSanPhamView/themHinhAnhSanPham.php';
            }
        }
        require_once 'views/hinhAnhSanPhamView/themHinhAnhSanPham.php';
    }

    function xoa_hinh_anh_sp($id)
    {
        if ($this->hinhAnhSPModel->xoa_hinh_anh_sp($id)) {
            echo "<script>window.location.href = '?act=listHinhAnhSP';</script>";
        } else {
            echo "Khong the xoa hinh anh";
        }
    }
    
}

