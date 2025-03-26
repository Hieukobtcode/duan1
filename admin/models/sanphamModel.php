<?php
class sanPhamModel
{
    public $conn;

    function __construct()
    {
        $this->conn = connDB();
    }

    function list_san_pham()
    {
        $sql = "select * from san_phams";
        return $this->conn->query($sql);
    }

    function them_san_pham($ma_san_pham, $ten_san_pham, $mo_ta, $chi_tiet_danh_muc_id, $khuyen_mai,$gia_ban,$gia_nhap,$gia_khuyen_mai)
    {
        $sql = "INSERT INTO san_phams (Ma_san_pham, Ten_san_pham, Mo_ta, chi_tiet_danh_muc_id, khuyen_mai_id , gia_ban , gia_nhap , gia_khuyen_mai) 
            VALUES ('$ma_san_pham', '$ten_san_pham', '$mo_ta', '$chi_tiet_danh_muc_id','$khuyen_mai', '$gia_ban' , '$gia_nhap' , '$gia_khuyen_mai')";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }

    function listDanhMuc()
    {
        $sql = "select * from chi_tiet_danh_mucs";
        return  $this->conn->query($sql);
    }
    function findDanhMuc($id)
    {
        $sql = "select * from chi_tiet_danh_mucs where id_san_pham ='$id'";
        return $this->conn->query($sql);
    }
    function sua_san_pham($id, $ma_san_pham, $ten_san_pham, $mo_ta, $chi_tiet_danh_muc_id, $trang_thai, $khuyen_mai,$gia_nhap,$gia_ban,$gia_khuyen_mai)
    {
        $sql = "update san_phams set 
            Ma_san_pham='$ma_san_pham', 
            Ten_san_pham='$ten_san_pham',
            Mo_ta='$mo_ta',
            chi_tiet_danh_muc_id = '$chi_tiet_danh_muc_id',
            Trang_thai = '$trang_thai', 
            Khuyen_mai_id ='$khuyen_mai',
            gia_nhap = '$gia_nhap',
            gia_ban = '$gia_ban',
            gia_khuyen_mai = '$gia_khuyen_mai'
            where Id='$id'";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }

    function update_danh_gia($id){
        $sql = "UPDATE danh_gias SET San_pham_id = NULL WHERE San_pham_id = '$id'";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }

    function update_binh_luan($id){
        $sql = "UPDATE binh_luans SET San_pham_id = NULL WHERE San_pham_id = '$id'";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }

    function xoa_san_pham($id)
    {
        $this->update_danh_gia($id);
        $this->update_binh_luan($id);
        $sql = "delete from san_phams where Id = $id";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }

    function tim_san_pham($id)
    {
        $sql = "select * from san_phams 
        JOIN chi_tiet_danh_mucs on chi_tiet_danh_mucs.Id = san_phams.chi_tiet_danh_muc_id
        where san_phams.Id='$id'";
        return $this->conn->query($sql);
    }

    function khuyen_mai()
    {
        $sql = "select * from khuyen_mais";
        return $this->conn->query($sql);
    }

    function list_mau_sac()
    {
        $sql = "select * from mau_sacs";
        return $this->conn->query($sql);
    }

    function them_mau($ten_mau, $ma_mau)
    {
        $sql = "INSERT INTO mau_sacs (ten_mau, ma_mau) 
            VALUES ('$ten_mau', '$ma_mau')";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }

    function sua_mau($id, $ten_mau, $ma_mau)
    {
        $sql = "update mau_sacs set 
            ten_mau='$ten_mau', 
            ma_mau='$ma_mau'
            where id='$id'";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }

    function xoa_mau($id)
    {
        $sql = "delete from mau_sacs where id = '$id'";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }

    function tim_mau($id)
    {
        $sql = "select * from mau_sacs where id='$id'";
        return $this->conn->query($sql);
    }

    function list_kich_thuoc()
    {
        $sql = "select * from kich_thuocs";
        return $this->conn->query($sql);
    }

    function them_kich_thuoc($ten_kich_thuoc)
    {
        $sql = "INSERT INTO kich_thuocs (ten_kich_thuoc) 
            VALUES ('$ten_kich_thuoc')";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }

    function sua_kich_thuoc($id, $ten_kich_thuoc)
    {
        $sql = "update kich_thuocs set ten_kich_thuoc='$ten_kich_thuoc' where id='$id'";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }

    function xoa_kich_thuoc($id)
    {
        $sql = "delete from kich_thuocs where id = '$id'";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }

    function tim_kich_thuoc($id)
    {
        $sql = "select * from kich_thuocs where id='$id'";
        return $this->conn->query($sql);
    }

    function get_hinh_anh()
    {
        $sql = "SELECT id as id_anh , mo_ta as mo_ta_img from hinh_anh_san_phams";
        return $this->conn->query($sql);
    }
    function get_mau_sac()
    {
        $sql = "SELECT id as id_mau, ten_mau AS ten_mau_sac ,ma_mau AS ma_mau_sac FROM mau_sacs";

        return $this->conn->query($sql);
    }

    function get_kich_thuoc()
    {
        $sql = "SELECT id as id_kich_thuoc, ten_kich_thuoc FROM kich_thuocs";
        return $this->conn->query($sql);
    }

    function them_bien_the($ma_sku, $san_pham_id,$anh, $mau_sac_id, $kich_thuoc_id, $ngay_nhap, $so_luong_ton_kho)
    {
        $sql = "INSERT INTO chi_tiet_san_pham (ma_sku,san_pham_id,anh,mau_sac_id,kich_thuoc_id,ngay_nhap,so_luong_ton_kho)
            VALUES ('$ma_sku','$san_pham_id','$anh','$mau_sac_id','$kich_thuoc_id','$ngay_nhap','$so_luong_ton_kho')";
        $this->conn->query($sql);
        return $this->conn->lastInsertId();
    }

    function sua_bien_the($id, $ma_sku, $mau_sac_id, $kich_thuoc_id,$ngay_nhap, $so_luong_ton_kho)
    {
        $sql = "UPDATE chi_tiet_san_pham set
            ma_sku = '$ma_sku',
            kich_thuoc_id='$kich_thuoc_id',
            mau_sac_id = '$mau_sac_id',
            ngay_nhap='$ngay_nhap',
            so_luong_ton_kho='$so_luong_ton_kho'
            WHERE id = '$id'";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }

    function bien_the($id)
    {
        $sql =  "SELECT 
                chi_tiet_san_pham.id AS chi_tiet_id, 
                san_phams.Id AS san_pham_id, 
                san_phams.Ten_san_pham, 
                mau_sacs.ten_mau, 
                kich_thuocs.ten_kich_thuoc, 
                chi_tiet_san_pham.gia_nhap, 
                chi_tiet_san_pham.ma_sku, 
                chi_tiet_san_pham.gia_ban,
                chi_tiet_san_pham.ngay_nhap,
                chi_tiet_san_pham.so_luong_ton_kho,
                chi_tiet_san_pham.gia_khuyen_mai,
                chi_tiet_san_pham.anh as anh_bien_the
            FROM chi_tiet_san_pham AS chi_tiet_san_pham
            JOIN san_phams AS san_phams ON chi_tiet_san_pham.san_pham_id = san_phams.Id
            JOIN mau_sacs AS mau_sacs ON chi_tiet_san_pham.mau_sac_id = mau_sacs.id
            JOIN kich_thuocs AS kich_thuocs ON chi_tiet_san_pham.kich_thuoc_id = kich_thuocs.id
            WHERE chi_tiet_san_pham.san_pham_id = '$id'";
        return $this->conn->query($sql);
    }

    function tim_bien_the($id)
    {
        $sql = "SELECT * FROM chi_tiet_san_pham WHERE id='$id'";
        return $this->conn->query($sql);
    }

    function ten_san_pham($id)
    {
        $sql = "SELECT san_phams.* 
        chi_tiet_san_pham.* from chi_tiet_san_pham 
                JOIN san_phams ON san_phams.Id = chi_tiet_san_pham.san_pham_id
                where chi_tiet_san_pham.id='$id'";
        return $this->conn->query($sql);
    }


    function xoa_bien_the($id)
    {
        $sql = "DELETE FROM chi_tiet_san_pham WHERE id='$id' ";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }

    function id_bien_the(){
        $sql = "SELECT id , san_pham_id FROM chi_tiet_san_pham";
        return $this->conn->query($sql);
    }

    function tenSP($id){
        $sql="SELECT Ten_san_pham from san_phams where Id='$id'";
        return $this->conn->query($sql);
    }
    

    function editImage($id,$img){
        $sql = "UPDATE hinh_anh_san_pham set img = '$img'";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }

    public function deleteImage($id){
        $sql = "DELETE FROM hinh_anh_san_phams WHERE id = '$id'";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }
    
    function listBienThe($id) {
        $sql = "SELECT chi_tiet_san_pham.id as chi_tiet_id, chi_tiet_san_pham.ma_sku, chi_tiet_san_pham.anh,chi_tiet_san_pham.ngay_nhap,chi_tiet_san_pham.so_luong_ton_kho,
                mau_sacs.*, kich_thuocs.*, san_phams.*
                FROM chi_tiet_san_pham
                JOIN mau_sacs ON mau_sacs.id = chi_tiet_san_pham.mau_sac_id
                JOIN kich_thuocs ON kich_thuocs.id = chi_tiet_san_pham.kich_thuoc_id
                JOIN san_phams ON san_phams.id = chi_tiet_san_pham.san_pham_id
                WHERE chi_tiet_san_pham.san_pham_id = '$id'";
        
        return $this->conn->query($sql);

    }

    function danh_gia(){
        $sql = "select * from danh_gias 
        JOIN nguoi_dungs ON nguoi_dungs.Id = danh_gias.Nguoi_dung_id
        JOIN san_phams ON san_phams.Id = danh_gias.San_pham_id";
        return $this->conn->query($sql);
    }

    function xoa_danh_gia($id){
        $sql = "delete from danh_gias where Id = $id";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }

    function binh_luan(){
        $sql = "select * from binh_luans 
        JOIN San_phams on san_phams.id = binh_luans.San_pham_id
        JOIN Nguoi_dungs on Nguoi_dungs.id = binh_luans.Nguoi_dung_id";
        
        return $this->conn->query($sql);
    }
    function xoa_binh_luan($id){
        $sql = "delete from binh_luans where id = $id";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }
 
}
