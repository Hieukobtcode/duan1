<?php
    class binhLuanModel{
        public $conn;

        function __construct()
        {
            $this->conn = connDB();
        }

        function binh_luan(){
            $sql = "select * from binh_luans 
            JONIN San_phams on san_phams.id = binh_luans.San_pham_id
            JONIN Nguoi_dungs on Nguoi_dungs.id = binh_luans.Nguoi_dung_id";
            
            return $this->conn->query($sql);
        }
        function xoa_binh_luan($id){
            $sql = "delete from binh_luans where id = $id";
            $stnt = $this->conn->prepare($sql);
            return $stnt->execute();
        }


    
    }
?>