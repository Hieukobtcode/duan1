<?php
class bannerController
{
    public $bannerModel;
    function __construct()
    {
        $this->bannerModel = new bannerModel;
    }

    function hien_thi_banner()
    {
        $banner = $this->bannerModel->banner();
        require_once 'views/bannerView/listBanner.php';
    }

    function sua_banner($id)
    {
        $banner = $this->bannerModel->tim_banner($id)->fetch();
        if (isset($_POST['btn_sua'])) {
            $tieu_de = $_POST['tieu_de'];
            $trang_thai=$_POST['trang_thai'];

            $img = $_FILES['img']['name'];
            $tmp = $_FILES['img']['tmp_name'];
            move_uploaded_file($tmp, './assets/img/' . $img);

            $error = [];
            if (empty($tieu_de)) {
                $error['tieu_de'] = "Tiêu đề không được để trống";
            }
           
            if (empty($error)) {
                if ($this->bannerModel->sua_banner($id,$tieu_de, $img, $trang_thai)) {
                    echo "<script>window.location.href = '?act=banner';</script>";
                    exit();
                } else {
                    echo "Khong the sua";
                }
            } else {
                require_once 'views/bannerView/suaBanner.php';
            }
        }
        require_once 'views/bannerView/suaBanner.php';
    }

    function them_banner()
    {
        if (isset($_POST['btn_them'])) {
            $tieu_de = $_POST['tieu_de'];
            $img = $_FILES['img']['name'];
            $tmp = $_FILES['img']['tmp_name'];
            move_uploaded_file($tmp, './assets/img/' . $img);

            $error = [];
            if (empty($tieu_de)) {
                $error['tieu_de'] = "Tiêu đề không được để trống";
            }
            if (empty($img)) {
                $error['img'] = "Ảnh không được để trống";
            }

            if (empty($error)) {
                if ($this->bannerModel->them_banner($tieu_de, $img)) {
                    echo "<script>window.location.href = '?act=banner';</script>";
                    exit();
                } else {
                    echo "Khong the them";
                }
            } else {
                require_once 'views/bannerView/themBanner.php';
            }
        }
        require_once 'views/bannerView/themBanner.php';
    }

    function xoa_banner($id)
    {
        if ($this->bannerModel->xoa_banner($id)) {
            echo "<script>window.location.href = '?act=banner';</script>";
        } else {
            echo "Khong the xoa banner";
        }
    }
}
