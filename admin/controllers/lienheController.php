<?php
    class lienHeController{
        public $lienHeModel;
        function __construct()
        {
            $this->lienHeModel = new lienHeModel;
        }

        function hien_thi_lien_he(){
            $lien_he = $this->lienHeModel->lien_he();
            require_once 'views/lienHeView/listLienHe.php';
        }
        function xoa_lien_he($id){
            if($this->lienHeModel->xoa_lien_he($id)){
                header('Location:?act=lienHe');
            }else{
                echo "Khong the xoa lien he";
            }
        }

        function trangChuController(){
            require_once 'views/trangChu.html';
        }

        
    }
?>