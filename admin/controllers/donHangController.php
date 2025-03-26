<?php
class donHangController
{
    public $donHangModel;
    function __construct()
    {
        $this->donHangModel = new donHangModel;
    }

    function hien_thi_don_hang()
    {
        $don_hang = $this->donHangModel->listDonHang()->fetchAll();
        require_once 'views/donHangView/listDonHang.php';
    }

    function chi_tiet_don_hang($id)
    {
        $trang_thai = $this->donHangModel->trang_thai_don_hang()->fetchAll();
        $don_hang = $this->donHangModel->don_hang($id)->fetch();
        $spDonHang = $this->donHangModel->sPDonHang($id);
        $listInfo = $this->donHangModel->listInfoDonHang($id)->fetchAll();
        $chiTietDonHangs = $this->donHangModel->getChiTietDonHang($id)->fetchAll();
        if (isset($_POST['btn_update'])) {
            $id = $_GET['id'];
            $trang_thai_id = $_POST['trang_thai'];

            if ($this->donHangModel->update_trang_thai($id, $trang_thai_id)) {
                echo "<script>window.location.href = '?act=chiTietDonHang&id=$id';</script>";
                exit();
            }
        }


        require_once 'views/donHangView/chiTietDonHang.php';
    }

    function update_trang_thai($id)
    {
        if (isset($_POST['update_trang_thai'])) {
            $id_trang_thai = $_POST['trang_thai'];
            if ($this->donHangModel->update_trang_thai($id, $id_trang_thai)) {
                echo "<script>window.location.href = '?act=donHang';</script>";
            } else {
                echo 'khong the cap nhat trang thai';
            }
        }
        require_once 'views/donHangView/chiTietDonHang.php';
    }
}
