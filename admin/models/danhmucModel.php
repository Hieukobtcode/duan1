<?php
    class danhMucModel{
        public $conn;

        function __construct()
        {
            $this->conn = connDB();
        }

        function danh_muc(){
            $sql = "select * from danh_mucs order by Id desc";
            return $this->conn->query($sql);
        }

        function them_danh_muc($ten_danh_muc, $hinh_anh , $ngay_tao , $ngay_cap_nhat , $mo_ta){
            $sql = "INSERT INTO danh_mucs (ten_danh_muc, hinh_anh, ngay_tao, ngay_cap_nhat, mo_ta) 
            VALUES ('$ten_danh_muc', '$hinh_anh', '$ngay_tao', '$ngay_cap_nhat', '$mo_ta')";
                $stnt = $this->conn->prepare($sql);
            return $stnt->execute();
        }

        function sua_danh_muc($id,$ten_danh_muc,$hinh_anh,$ngay_cap_nhat, $mo_ta){
            if(empty($hinh_anh)){
                $sql = "update danh_mucs set Ten_danh_muc = '$ten_danh_muc', Ngay_cap_nhat = '$ngay_cap_nhat' , Mo_ta = '$mo_ta' where Id  = $id";
            }else{
                $sql = "update danh_mucs set Ten_danh_muc = '$ten_danh_muc', Hinh_anh = '$hinh_anh' , Ngay_cap_nhat = '$ngay_cap_nhat' , Mo_ta = '$mo_ta' where Id  = $id";
            }
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