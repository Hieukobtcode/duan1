<?php
class khuyenMaiController
{
    public $khuyenMaiModel;
    function __construct()
    {
        $this->khuyenMaiModel = new khuyenMaiModel;
    }

    function hien_thi_khuyen_mai()
    {
        $khuyen_mai = $this->khuyenMaiModel->khuyen_mai();
        require_once 'views/khuyenMaiView/listKhuyenMai.php';
    }

    function sua_khuyen_mai($id)
    {
        $khuyen_mai = $this->khuyenMaiModel->tim_khuyen_mai($id)->fetch();
        if (isset($_POST['btn_sua'])) {

            $tenKhuyenMai =$_POST['tenKhuyenMai'];
            $maKhuyenMai =$_POST['maKhuyenMai'];
            $loaiGiamGia =$_POST['loaiGiamGia'];
            $giaTriGiamGia =$_POST['giaTriGiamGia'];
            $moTa =$_POST['moTa'];
            $ngayBatDau =$_POST['ngayBatDau'];
            $ngayKetThuc =$_POST['ngayKetThuc'];
            $trangThai =$_POST['trangThai'];
            
            $error = [];
            if (empty($tenKhuyenMai)) {
                $error['tenKhuyenMai'] = "Không được để trống";
            }

            if (empty($maKhuyenMai)) {
                $error['maKhuyenMai'] = "Không được để trống";
            }

            if (empty($loaiGiamGia)) {
                $error['loaiGiamGia'] = "Không được để trống";
            }

            if (empty($giaTriGiamGia)) {
                $error['giaTriGiamGia'] = "Không được để trống";
            }

            if (empty($moTa)) {
                $error['moTa'] = "Không được để trống";
            }

            if (empty($ngayBatDau)) {
                $error['ngayBatDau'] = "Không được để trống";
            }

            if (empty($ngayKetThuc)) {
                $error['ngayKetThuc'] = "Không được để trống";
            }
            
            if (empty($error)) {
                if ($this->khuyenMaiModel->sua_khuyen_mai($id,$tenKhuyenMai,$maKhuyenMai,$loaiGiamGia,$giaTriGiamGia,$moTa,$ngayBatDau,$ngayKetThuc,$trangThai)) {
                    echo "<script>window.location.href = '?act=khuyenMai';</script>";
                    exit();
                } else {
                    echo "Khong the sua";
                }
            } else {
                require_once 'views/khuyenMaiView/suaKhuyenMai.php';
            }
        }
        require_once 'views/khuyenMaiView/suaKhuyenMai.php';
    }

    function them_khuyen_mai()
    {
        if (isset($_POST['btn_them'])) {

            $tenKhuyenMai =$_POST['tenKhuyenMai'];
            $maKhuyenMai =$_POST['maKhuyenMai'];
            $loaiGiamGia =$_POST['loaiGiamGia'];
            $giaTriGiamGia =$_POST['giaTriGiamGia'];
            $moTa =$_POST['moTa'];
            $ngayBatDau =$_POST['ngayBatDau'];
            $ngayKetThuc =$_POST['ngayKetThuc'];

            $error = [];
            if (empty($tenKhuyenMai)) {
                $error['tenKhuyenMai'] = "Không được để trống";
            }

            if (empty($maKhuyenMai)) {
                $error['maKhuyenMai'] = "Không được để trống";
            }

            if (empty($loaiGiamGia)) {
                $error['loaiGiamGia'] = "Không được để trống";
            }

            if (empty($giaTriGiamGia)) {
                $error['giaTriGiamGia'] = "Không được để trống";
            }

            if (empty($moTa)) {
                $error['moTa'] = "Không được để trống";
            }

            if (empty($ngayBatDau)) {
                $error['ngayBatDau'] = "Không được để trống";
            }

            if (empty($ngayKetThuc)) {
                $error['ngayKetThuc'] = "Không được để trống";
            }

            if (empty($error)) {
                if ($this->khuyenMaiModel->them_khuyen_mai($tenKhuyenMai,$maKhuyenMai,$loaiGiamGia,$giaTriGiamGia,$moTa,$ngayBatDau,$ngayKetThuc)) {
                    echo "<script>window.location.href = '?act=khuyenMai';</script>";
                    exit();
                } else {
                    echo "Khong the them khuyen mai";
                }
            } else {
                require_once 'views/khuyenMaiView/themKhuyenMai.php';
            }
        }
        $all=$this->khuyenMaiModel->san_pham_khuyen_mai()->fetchAll();
        require_once 'views/khuyenMaiView/themKhuyenMai.php';
    }

    function xoa_khuyen_mai($id)
    {
        if ($this->khuyenMaiModel->xoa_khuyen_mai($id)) {
            header('Location:?act=khuyenMai');
        } else {
            echo "Khong the xoa khuyen mai";
        }
    }

    function chiTietKhuyenMai($id){
        $khuyen_mai=$this->khuyenMaiModel->tim_khuyen_mai($id)->fetch();
        require_once 'views/khuyenMaiView/chiTietKhuyenMai.php';
    }
}
