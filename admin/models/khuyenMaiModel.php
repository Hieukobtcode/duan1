<?php
    class khuyenMaiModel{
        public $conn;

        function __construct()
        {
            $this->conn = connDB();
        }

        function khuyen_mai(){
            $sql = "select * from khuyen_mais order by Id desc";
            return $this->conn->query($sql);
        }

        function them_khuyen_mai($tenKhuyenMai,$maKhuyenMai,$loaiGiamGia,$giaTriGiamGia,$mo_ta,$ngayBatDau,$ngayKetThuc){
            $sql = "INSERT INTO khuyen_mais (ten_khuyen_mai,Ma_khuyen_mai,Loai_giam_gia,Gia_tri_giam_gia,mo_ta,Ngay_bat_dau,Ngay_ket_thuc) 
            VALUES ('$tenKhuyenMai','$maKhuyenMai','$loaiGiamGia','$giaTriGiamGia','$mo_ta','$ngayBatDau','$ngayKetThuc')";
            $stnt = $this->conn->prepare($sql);
            return $stnt->execute();
        }

        function sua_khuyen_mai($id,$tenKhuyenMai,$maKhuyenMai,$loaiGiamGia,$giaTriGiamGia,$moTa,$ngayBatDau,$ngayKetThuc,$trangThai){
            $sql = "update khuyen_mais set 
            ten_khuyen_mai = '$tenKhuyenMai',
            Ma_khuyen_mai = '$maKhuyenMai',
            Loai_giam_gia = '$loaiGiamGia',
            Gia_tri_giam_gia = '$giaTriGiamGia',
            mo_ta = '$moTa',
            Ngay_bat_dau = '$ngayBatDau',
            Ngay_ket_thuc = '$ngayKetThuc',
            Trang_thai = '$trangThai'
            where Id = '$id'";
            $stnt = $this->conn->prepare($sql);
            return $stnt->execute();
        }

        function xoa_khuyen_mai_trong_san_pham($id) {
            $sql = "UPDATE san_phams SET khuyen_mai_id = NULL WHERE khuyen_mai_id = '$id'";
            $stnt = $this->conn->prepare($sql);
            return $stnt->execute();
        }
        
        function xoa_khuyen_mai($id){
            $this->xoa_khuyen_mai_trong_san_pham($id);
            $sql = "delete from khuyen_mais where Id = '$id'";
            $stnt = $this->conn->prepare($sql);
            return $stnt->execute();
        }

        function tim_khuyen_mai($id){
            $sql = "select * from khuyen_mais where id = $id";
            return $this->conn->query($sql);
        }
        
        function san_pham_khuyen_mai() {
            $sql ='SELECT * FROM khuyen_mais JOIN san_phams ON khuyen_mais.Id=san_phams.khuyen_mai_id;';
            return $this->conn->query($sql);            
        }   
    
    }
?>