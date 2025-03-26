<?php
class binhLuanController
{
    public $binhLuanModel;
    function __construct()
    {
        $this->binhLuanModel = new binhLuanModel;
    }

    function hien_thi_binh_luan()
    {
        $binh_luan = $this->binhLuanModel->binh_luan();
        require_once 'views/binhLuanView/listbinhLuan.php';
    }

    function xoa_binh_luan($id)
    {
        if ($this->binhLuanModel->xoa_binh_luan($id)) {
            echo "<script>window.location.href = '?act=binhLuan';</script>";
        } else {
            echo "Khong the xoa danh muc";
        }
    }

    function trangChuController()
    {
        require_once 'views/trangChu.php';
    }
}
