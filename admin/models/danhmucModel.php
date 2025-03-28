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

        function them_danh_muc($ten_danh_muc , $ngay_tao , $ngay_cap_nhat , $mo_ta){
            $sql = "INSERT INTO danh_mucs (ten_danh_muc, ngay_tao, ngay_cap_nhat, mo_ta) 
            VALUES ('$ten_danh_muc', '$ngay_tao', '$ngay_cap_nhat', '$mo_ta')";
                $stnt = $this->conn->prepare($sql);
            return $stnt->execute();
        }

        function sua_danh_muc($id,$ten_danh_muc,$ngay_cap_nhat,$trang_thai, $mo_ta){
            $sql = "update danh_mucs set Ten_danh_muc='$ten_danh_muc',Ngay_cap_nhat='$ngay_cap_nhat',trang_thai ='$trang_thai',Mo_ta='$mo_ta' where Id='$id'";
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