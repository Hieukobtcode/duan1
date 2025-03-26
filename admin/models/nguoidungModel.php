<?php
    class nguoiDungModel{
        public $conn;

        function __construct()
        {
            $this->conn = connDB();
        }

        function nguoi_dung(){
            $sql = "select * from nguoi_dungs";
            return $this->conn->query($sql);
        }

        function them_nguoi_dung($ten_nguoi_dung, $hinh_anh, $email, $mat_khau, $thoi_gian_tao, $ho, $ten, $so_dien_thoai, $dia_chi, $ngay_sinh, $vai_tro, $trang_thai){
            $sql = "INSERT INTO nguoi_dungs (Ten_dang_nhap, Anh_dai_dien, Email, Mat_khau, Thoi_gian_tao, Ho, Ten, So_dien_thoai, Dia_chi, Ngay_thang_nam_sinh, Vai_tro, Trang_thai) 
            VALUES ('$ten_nguoi_dung', '$hinh_anh', '$email', '$mat_khau', '$thoi_gian_tao', '$ho', '$ten', '$so_dien_thoai', '$dia_chi', '$ngay_sinh', '$vai_tro', '$trang_thai')";
                $stnt = $this->conn->prepare($sql);
            return $stnt->execute();
        }

        function sua_nguoi_dung($id, $ten_nguoi_dung, $hinh_anh, $email, $mat_khau, $thoi_gian_tao, $ho, $ten, $so_dien_thoai, $dia_chi, $ngay_sinh, $vai_tro, $trang_thai){
            if(empty($hinh_anh)){
                $sql = "update nguoi_dungs set Ten_dang_nhap = '$ten_nguoi_dung', Email = '$email' , Mat_khau = '$mat_khau' , Thoi_gian_tao = '$thoi_gian_tao', Ho = '$ho' Ten = '$ten', So_dien_thoai = '$so_dien_thoai', Dia_chi = '$dia_chi', Ngay_thang_nam_sinh = '$ngay_sinh', Vai_tro = '$vai_tro', Trang_thai = '$trang_thai' where Id  = $id";
            }else{
                $sql = "update nguoi_dungs set Ten_dang_nhap = '$ten_nguoi_dung', Hinh_anh = '$hinh_anh' , Email = '$email' , Mat_khau = '$mat_khau' , Thoi_gian_tao = '$thoi_gian_tao', Ho = '$ho' Ten = '$ten', So_dien_thoai = '$so_dien_thoai', Dia_chi = '$dia_chi', Ngay_thang_nam_sinh = '$ngay_sinh', Vai_tro = '$vai_tro', Trang_thai = '$trang_thai' where Id  = $id";
            }
            $stnt = $this->conn->prepare($sql);
            return $stnt->execute();
        }

        function xoa_nguoi_dung($id){
            $sql = "delete from nguoi_dungs where id = $id";
            $stnt = $this->conn->prepare($sql);
            return $stnt->execute();
        }

        function tim_nguoi_dung($id){
            $sql = "select * from nguoi_dungs where id = $id";
            return $this->conn->query($sql);
        }

        
    
    }
?>