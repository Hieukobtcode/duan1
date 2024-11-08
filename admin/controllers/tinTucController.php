<?php
class tinTucController
{
    public $tinTucModel;
    function __construct()
    {
        $this->tinTucModel = new tinTucModel;
    }

    function hien_thi_tin_tuc()
    {
        $tin_tuc = $this->tinTucModel->list_tin_tuc();
        require_once 'views/baiVietView/listTinTuc.php';
    }

    function them_tin_tuc()
    {
        if (isset($_POST['btn_them'])) {
            $tieu_de = $_POST['tieu_de'];
            $thoi_gian_tao = date("Y-m-d");
            $noi_dung = $_POST['noi_dung'];
            $thoi_gian_cap_nhat = date("Y-m-d");
            
            $img = $_FILES['img']['name'];
            $tmp = $_FILES['img']['tmp_name'];
            move_uploaded_file($tmp, __DIR__ . '/../../assets/img/' .$img);

            $error = [];
            if (empty($tieu_de)) {
                $error['tieu_de'] = "Tiêu đề không được để trống";
            }
            if (empty($noi_dung)) {
                $error['noi_dung'] = "Nội dung không được để trống";
            }

            if (empty($error)) {
                if ($this->tinTucModel->them_tin_tuc($tieu_de, $noi_dung, $thoi_gian_tao, $thoi_gian_cap_nhat, $img)) {
                    header('Location:?act=baiViet');
                    exit();
                } else {
                    echo "Khong the them";
                }
            } else {
                require_once "views/baiVietView/themTinTuc.php";
            }
        }
        require_once "views/baiVietView/themTinTuc.php";
    }

    function sua_tin_tuc($id)
    {
        $tin_tuc = $this->tinTucModel->tim_tin_tuc($id)->fetch();
        if (isset($_POST['btn_sua'])) {
            $tieu_de = $_POST['tieu_de'];
            $thoi_gian_cap_nhat = date("Y-m-d");
            $noi_dung = $_POST['noi_dung'];
            $trang_thai = $_POST['trang_thai'];

            $img = $_FILES['img']['name'];
            $tmp = $_FILES['img']['tmp_name'];
            move_uploaded_file($tmp, __DIR__ . '/../../assets/img/' . $img);

            $error = [];
            if (empty($tieu_de)) {
                $error['tieu_de'] = "Tiêu đề không được để trống";
            }
            if (empty($noi_dung)) {
                $error['noi_dung'] = "Nội dung không được để trống";
            }

            if (empty($error)) {
                if ($this->tinTucModel->sua_tin_tuc($id,$tieu_de, $noi_dung, $thoi_gian_cap_nhat, $img, $trang_thai)) {
                    header('Location:?act=baiViet');
                    exit();
                } else {
                    echo "Khong the them";
                }
            } else {
                require_once "views/baiVietView/suaTinTuc.php";
            }
        }
        require_once "views/baiVietView/suaTinTuc.php";
    }

    function xoa_tin_tuc($id)
    {
        if ($this->tinTucModel->xoa_tin_tuc($id)) {
            header('Location:?act=baiViet');
        } else {
            echo "Khong the xoa tin tuc";
        }
    }
}
