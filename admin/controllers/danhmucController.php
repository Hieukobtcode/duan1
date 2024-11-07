<?php
    class danhMucController{
        public $danhMucModel;
        function __construct()
        {
            $this->danhMucModel = new danhMucModel;
        }

        function hien_thi_danh_muc(){
            $danh_muc = $this->danhMucModel->danh_muc();
            require_once 'views/danhMucView/danhMuc.php';
        }

        function sua_danh_muc($id){
            if( isset($_POST['btn_sua']) ){
                $id = $_POST['id'];
                $ten_danh_muc = $_POST['ten_danh_muc'];
                $ngay_cap_nhat = date("Y-m-d");
                $mo_ta = $_POST['mo_ta'];

                if(empty($_FILES['img']['name'])){
                    $hinh_anh='';
                }else{
                    $hinh_anh=$_FILES['img']['name'];
                    $tmp=$_FILES['img']['tmp_name'];
                    move_uploaded_file($tmp,'assets/img/'.$hinh_anh);
                }

                if($this->danhMucModel->sua_danh_muc($id,$ten_danh_muc,$hinh_anh, $ngay_cap_nhat, $mo_ta)){
                    header('Location:?act=danhMuc');
                    exit();
                }else{
                    echo "Khong the sua";
                }
            }
            $danh_muc = $this->danhMucModel->tim_danh_muc($id);
            require_once "views/danhMucView/suaDanhMuc.php";

        }

        function them_danh_muc(){
            if(isset($_POST['btn_them'])){
                $ten_danh_muc = $_POST['ten_danh_muc'];
                $mo_ta = $_POST['mo_ta'];
                $ngay_tao =  (new DateTime())->format("Y-m-d");
                $ngay_cap_nhat =  (new DateTime())->format("Y-m-d");
                $hinh_anh = $_FILES['img']['name'];
                $tmp = $_FILES['img']['tmp_name'];
                move_uploaded_file($tmp,'assets/img/' .$hinh_anh);

                if($this->danhMucModel->them_danh_muc($ten_danh_muc, $hinh_anh,$ngay_tao,$ngay_cap_nhat, $mo_ta)){
                    header('Location:?act=danhMuc');
                    exit();
                }else{
                    echo "Khong the them danh muc";
                }
            }
            require_once 'views/danhMucView/themDanhMuc.php';

        }

        function xoa_danh_muc($id){
            if($this->danhMucModel->xoa_danh_muc($id)){
                header('Location:?act=danhMuc');
            }else{
                echo "Khong the xoa danh muc";
            }
        }

        function trangChuController(){
            require_once 'views/trangChu.html';
        }
    }
?>