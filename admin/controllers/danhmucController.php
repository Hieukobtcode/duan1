<?php
    class danhMucController{
        public $danhMucModel;
        function __construct()
        {
            $this->danhMucModel = new danhMucModel;
        }

        function hien_thi_danh_muc(){
            $danh_muc = $this->danhMucModel->danh_muc();
            require_once 'views/danhMucView/danhMuc.html';
        }

        function sua_danh_muc($id){
            $gia_tri = $this->danhMucModel->tim_danh_muc($id);
            require_once "views/danhMucView/suaDanhMuc.html";
            if( isset($_POST['btn_sua']) ){
                $id = $_POST['id'];
                $ten_danh_muc = $_POST['ten_danh_muc'];
                $hinh_anh = $POST['hinh_anh'];
                $ngay_tao = date("Y-m-d");
                $ngay_cap_nhat = date("Y-m-d");
                $mo_ta = $POST['mo_ta'];
                if($this->danhMucModel->sua_danh_muc($id,$ten_danh_muc,$hinh_anh,$ngay_tao, $ngay_cap_nhat, $mo_ta)){
                    header('Location:?act=trangChuAdmin');
                    exit();
                }else{
                    echo "Khong the sua";
                }
            }
        }

        function them_danh_muc(){
            require_once 'views/themDanhMuc.html';
            if(isset($_POST['btn_them'])){
                $ten_danh_muc = $_POST['ten_danh_muc'];
                $hinh_anh = $POST['hinh_anh'];
                $ngay_tao = date("Y-m-d");
                $ngay_cap_nhat = date("Y-m-d");
                $mo_ta = $POST['mo_ta'];
                if($this->danhMucModel->them_danh_muc($ten_danh_muc,$hinh_anh,$ngay_tao, $ngay_cap_nhat, $mo_ta)){
                    header('Location:?act=trangChuAdmin');
                    exit();
                }else{
                    echo "Khong the them danh muc";
                }
            }
        }

        function xoa_danh_muc($id){
            if($this->danhMucModel->xoa_danh_muc($id)){
                header('Location:?act=trangChuAdmin');
            }else{
                echo "Khong the xoa danh muc";
            }
        }
    }
?>