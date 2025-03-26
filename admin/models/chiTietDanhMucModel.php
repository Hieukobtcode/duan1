<?php
class chiTietDanhMucModel
{
    public $conn;

    function __construct()
    {
        $this->conn = connDB();
    }

    function chi_tiet_danh_muc()
    {
        $sql = "SELECT * FROM chi_tiet_danh_mucs JOIN danh_mucs ON chi_tiet_danh_mucs.id_danh_muc = danh_mucs.Id";
        return $this->conn->query($sql);
    }

    function them_chi_tiet_danh_muc($mo_ta,$danh_muc)
    {
        $sql = "INSERT INTO chi_tiet_danh_mucs (mo_ta,id_danh_muc) VALUES ('$mo_ta',$danh_muc)";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }

    function sua_chi_tiet_danh_muc($id, $mo_ta, $danh_muc)
    {
        $sql = "update chi_tiet_danh_mucs set Mo_ta='$mo_ta',id_danh_muc='$danh_muc' where id='$id'";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }

    function xoa_chi_tiet_danh_muc($id)
    {
        $sql = "delete from chi_tiet_danh_mucs where id = $id";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }

    function tim_chi_tiet_danh_muc($id)
    {
        $sql = "SELECT * FROM chi_tiet_danh_mucs where chi_tiet_danh_mucs.id ='$id'";
        return $this->conn->query($sql);
    }
    function danh_muc()
    {
        $sql = "SELECT * from danh_mucs";
        return $this->conn->query($sql);
    }
}
