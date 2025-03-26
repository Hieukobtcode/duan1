<?php
class bannerModel
{
    public $conn;

    function __construct()
    {
        $this->conn = connDB();
    }

    function banner()
    {
        $sql = "select * from banners order by Id desc";
        return $this->conn->query($sql);
    }

    function them_banner($tieu_de, $img)
    {
        $sql = "INSERT INTO banners (Tieu_de, Duong_dan_anh) 
            VALUES ('$tieu_de' , '$img' )";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }

    function sua_banner($id, $tieu_de, $img, $trang_thai)
    {
        if (empty($img)) {
            $sql = "update banners set Tieu_de='$tieu_de',trang_thai ='$trang_thai' where Id='$id'";
        } else {
            $sql = "update banners set Tieu_de='$tieu_de',Duong_dan_anh='$img',trang_thai ='$trang_thai' where Id='$id'";
        }
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }

    function xoa_banner($id)
    {
        $sql = "delete from banners where id = $id";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }

    function tim_banner($id)
    {
        $sql = "select * from banners where id = $id";
        return $this->conn->query($sql);
    }
}
