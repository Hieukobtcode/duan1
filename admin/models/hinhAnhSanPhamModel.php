<?php
class hinhAnhSPModel
{
    public $conn;

    function __construct()
    {
        $this->conn = connDB();
    }

    function list_hinh_anh_sp()
    {
        $sql = "select * from hinh_anh_san_phams";
        return $this->conn->query($sql);
    }

    function them_hinh_anh_sp($img, $mo_ta)
    {
        $sql = "INSERT INTO hinh_anh_san_phams (img,mo_ta) 
            VALUES ('$img','$mo_ta')";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }

    function tim_hinh_anh($id)
    {
        $sql = "select * from hinh_anh_san_phams where id= '$id' ";
        return $this->conn->query($sql);
    }

    function sua_hinh_anh_sp($id, $img, $mo_ta)
    {
        if (empty($img)) {
            $sql = "UPDATE hinh_anh_san_phams set mo_ta='$mo_ta' where Id='$id'";
        } else {
            $sql = "UPDATE hinh_anh_san_phams set img='$img',mo_ta='$mo_ta' where Id='$id'";
        }
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }

    function xoa_hinh_anh_sp($id)
    {
        $sql = "delete from hinh_anh_san_phams where id = $id";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }
}
