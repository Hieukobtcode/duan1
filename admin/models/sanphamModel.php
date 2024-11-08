<?php
    class sanPhamModel{
        public $conn;

        function __construct()
        {
            $this->conn = connDB();
        }

        function list_san_pham(){
            $sql = "select * from danh_mucs order by Id desc";
            return $this->conn->query($sql);
        }

        function them_san_pham($ten_danh_muc , $ngay_tao , $ngay_cap_nhat , $mo_ta){
            $sql = "INSERT INTO danh_mucs (ten_danh_muc, ngay_tao, ngay_cap_nhat, mo_ta) 
            VALUES ('$ten_danh_muc', '$ngay_tao', '$ngay_cap_nhat', '$mo_ta')";
                $stnt = $this->conn->prepare($sql);
            return $stnt->execute();
        }

        function sua_san_pham($id,$ten_danh_muc,$ngay_cap_nhat, $mo_ta){
            $sql = "update danh_mucs set Ten_danh_muc='$ten_danh_muc',Ngay_cap_nhat='$ngay_cap_nhat',Mo_ta='$mo_ta' where Id='$id'";
            $stnt = $this->conn->prepare($sql);
            return $stnt->execute();
        }

        function xoa_san_pham($id){
            $sql = "delete from danh_mucs where id = $id";
            $stnt = $this->conn->prepare($sql);
            return $stnt->execute();
        }

        function tim_san_pham($id){
            $sql = "select * from danh_mucs where id = $id";
            return $this->conn->query($sql);
        }

    
    }
?>