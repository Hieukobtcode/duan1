<?php
    class danhMucModel{
        public $conn;

        function __construct()
        {
            $this->conn = connDB();
        }

        function danh_muc(){
            $sql = "select * from danh_mucs";
            return $this->conn->query($sql);
        }

        function them_danh_muc($ten_danh_muc, $hinh_anh , $mo_ta){
            $sql = "insert into danh_mucs value(null, '$ten_danh_muc' , '$hinh_anh' , null , null , '$mo_ta')";
            $stnt = $this->conn->prepare($sql);
            return $stnt->execute();
        }

        function sua_danh_muc($id,$ten_danh_muc,$hinh_anh,$ngay_tao, $ngay_cap_nhat, $mo_ta){
            $sql = "update danh_mucs set id=$id , ten_danh_muc = '$ten_danh_muc', hinh_anh = '$hinh_anh' mo_ta = '$mo_ta";
            $stnt = $this->conn->prepare($sql);
            return $stnt->execute();
        }

        function xoa_danh_muc($id){
            $sql = "delete from danh_mucs where id = $id";
            $stnt = $this->conn->prepare($sql);
            return $stnt->execute();
        }

        function tim_danh_muc($id){
            $sql = "select * from danh_mucs where id = $id";
            return $this->conn->query($sql);
        }

    
    }
?>