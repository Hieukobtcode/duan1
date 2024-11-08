<?php
class tinTucModel
{
    public $conn;

    function __construct()
    {
        $this->conn = connDB();
    }

    function list_tin_tuc()
    {
        $sql = "select * from tin_tucs order by Id desc";
        return $this->conn->query($sql);
    }

    function them_tin_tuc($tieu_de, $noi_dung, $thoi_gian_tao,$thoi_gian_cap_nhat, $img)
    {
        $sql = "INSERT INTO tin_tucs (Tieu_de,Noi_dung,Thoi_gian_tao,Thoi_gian_cap_nhat,img) 
            VALUES ('$tieu_de','$noi_dung','$thoi_gian_tao','$thoi_gian_cap_nhat','$img')";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }

    function sua_tin_tuc($id, $tieu_de, $noi_dung, $thoi_gian_cap_nhat, $img, $trang_thai)
    {
        if (empty($img)) {
            $sql = "UPDATE tin_tucs set Tieu_de='$tieu_de',Noi_dung='$noi_dung',Thoi_gian_cap_nhat='$thoi_gian_cap_nhat',
            Trang_thai='$trang_thai' where Id='$id'";
        } else {
            $sql = "UPDATE tin_tucs set Tieu_de='$tieu_de',Noi_dung='$noi_dung',Thoi_gian_cap_nhat='$thoi_gian_cap_nhat',
            img='$img', Trang_thai='$trang_thai' where Id='$id'";
        }
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }

    function xoa_tin_tuc($id)
    {
        $sql = "delete from tin_tucs where id = $id";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }

    function tim_tin_tuc($id)
    {
        $sql = "select * from tin_tucs where id = $id";
        return $this->conn->query($sql);
    }
}
