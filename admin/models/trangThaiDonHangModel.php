<?php
    class trangThaiDonHangModel{
        public $conn;

        function __construct()
        {
            $this->conn = connDB();
        }

        function trang_thai_don_hang(){
            $sql = "select * from trang_thai_don_hangs order by Id desc";
            return $this->conn->query($sql);
        }

        function them_trang_thai_don_hang($Ten_trang_thai ){
            $sql = "INSERT INTO trang_thai_don_hangs (Ten_trang_thai) 
            VALUES ('$Ten_trang_thai')";
                $stnt = $this->conn->prepare($sql);
            return $stnt->execute();
        }

        function sua_trang_thai_don_hang($id,$Ten_trang_thai){
            $sql = "update trang_thai_don_hangs set Ten_trang_thai='$Ten_trang_thai' where Id='$id'";
            $stnt = $this->conn->prepare($sql);
            return $stnt->execute();
        }

        function xoa_trang_thai_don_hang($id){
            $sql = "delete from trang_thai_don_hangs where id = $id";
            $stnt = $this->conn->prepare($sql);
            return $stnt->execute();
        }

        function tim_trang_thai_don_hang($id){
            $sql = "select * from trang_thai_don_hangs where id = $id";
            return $this->conn->query($sql);
        }

    
    }
?>