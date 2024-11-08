<?php
    class lienHeModel{
        public $conn;

        function __construct()
        {
            $this->conn = connDB();
        }

        function lien_he(){
            $sql = "select * from lien_hes";
            return $this->conn->query($sql);
        }
        function xoa_lien_he($id){
            $sql = "delete from lien_hes where id = $id";
            $stnt = $this->conn->prepare($sql);
            return $stnt->execute();
        }

        function tim_lien_he($id){
            $sql = "select * from lien_hes where id = $id";
            return $this->conn->query($sql);
        }

        function trang_thai_lien_he(){
            $sql = "select * from lien_hes where Trang_thai='new'";
            return $this->conn->query($sql);
        }

    
    }
?>