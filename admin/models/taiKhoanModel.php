<?php
class taiKhoanModel
{
    public $conn;

    function __construct()
    {
        $this->conn = connDB();
    }

    function list_tai_khoan_quan_tri()
    {
        $sql = "SELECT * from nguoi_dungs where Vai_tro='admin'";
        return $this->conn->query($sql);
    }

    function them_quan_tri($ten_dang_nhap, $pass, $email, $ngay_tao,$vai_tro)
    {
        $sql = "INSERT INTO nguoi_dungs (Ten_dang_nhap,Mat_khau, Email,Thoi_gian_tao,Vai_tro) 
            VALUES ('$ten_dang_nhap', '$pass', '$email', '$ngay_tao','$vai_tro')";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }

    function sua_quan_tri($id, $ten_dang_nhap, $so_dien_thoai, $email, $trang_thai)
    {
        $sql = "UPDATE nguoi_dungs set Ten_dang_nhap='$ten_dang_nhap',so_dien_thoai = '$so_dien_thoai',Email='$email',Trang_thai='$trang_thai' where Id='$id'";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }

    function xoa_pass($id, $pass)
    {
        $sql = "UPDATE nguoi_dungs set Mat_khau= '$pass' where id='$id'";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }

    function tim_quan_tri($id)
    {
        $sql = "SELECT * from nguoi_dungs where id = $id and Vai_tro='admin'";
        return $this->conn->query($sql);
    }

    function listKhachHang()
    {
        $sql = "SELECT * from nguoi_dungs where Vai_tro='user'";
        return $this->conn->query($sql);
    }

    function tim_khach_hang($id)
    {
        $sql = "SELECT * from nguoi_dungs where id = $id and Vai_tro='user'";
        return $this->conn->query($sql);
    }

    function sua_khach_hang($id, $ten_dang_nhap, $email, $ho_ten, $anh_dai_dien, $so_dien_thoai, $dia_chi, $ngay_thang_nam_sinh, $trang_thai)
    {
        if (empty($anh_dai_dien)) {
            $sql = "UPDATE nguoi_dungs set 
            Ten_dang_nhap='$ten_dang_nhap',
            Email = '$email',
            Ho_ten='$ho_ten',
            So_dien_thoai = '$so_dien_thoai',
            Dia_chi='$dia_chi',
            Ngay_thang_nam_sinh = '$ngay_thang_nam_sinh',
            Trang_thai='$trang_thai' where Id='$id'";
        } else {
            $sql = "UPDATE nguoi_dungs set Ten_dang_nhap='$ten_dang_nhap',
            Email = '$email', 
            Ho_ten='$ho_ten',
            Anh_dai_dien='$anh_dai_dien',
            So_dien_thoai = '$so_dien_thoai',
            Dia_chi='$dia_chi',
            Ngay_thang_nam_sinh ='$ngay_thang_nam_sinh',
            Trang_thai='$trang_thai' 
            where Id='$id'";
        }
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }
}
