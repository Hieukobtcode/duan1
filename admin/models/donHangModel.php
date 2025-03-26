<?php
class donHangModel
{
    public $conn;

    function __construct()
    {
        $this->conn = connDB();
    }

    function listDonHang(){
        $sql = "SELECT don_hangs.Id as donHangId , don_hangs.ten_nguoi_nhan , don_hangs.so_dien_thoai_nguoi_nhan , don_hangs.tong_tien , don_hangs.ngay_dat , don_hangs.ma_don_hang,
                trang_thai_don_hangs.Ten_trang_thai
                FROM don_hangs
                JOIN trang_thai_don_hangs ON trang_thai_don_hangs.Id = don_hangs.trang_thai_don_hang_id
                ORDER BY don_hangs.Id DESC";
        return $this->conn->query($sql);
    }

    function don_hang($id)
    {
      $sql = "SELECT don_hangs.Id as donHangId , don_hangs.email_nguoi_nhan,don_hangs.dia_chi_nguoi_nhan, dia_chi_nguoi_nhan,
              don_hangs.ten_nguoi_nhan ,  don_hangs.so_dien_thoai_nguoi_nhan , don_hangs.tong_tien , don_hangs.ngay_dat ,
              don_hangs.ma_don_hang, don_hangs.ghi_chu, don_hangs.phuong_thuc_thanh_toan, don_hangs.trang_thai_don_hang_id,
              nguoi_dungs.* ,
              trang_thai_don_hangs.*
              FROM don_hangs
              JOIN nguoi_dungs ON nguoi_dungs.Id = don_hangs.Nguoi_dung_id
              JOIN trang_thai_don_hangs ON trang_thai_don_hangs.Id = don_hangs.trang_thai_don_hang_id
              WHERE don_hangs.Id = '$id'";
              return $this->conn->query($sql);
    }


    function sua_danh_muc($id, $ten_danh_muc, $ngay_cap_nhat, $trang_thai, $mo_ta)
    {
        $sql = "update danh_mucs set Ten_danh_muc='$ten_danh_muc',Ngay_cap_nhat='$ngay_cap_nhat',trang_thai ='$trang_thai',Mo_ta='$mo_ta' where Id='$id'";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }


    function sPDonHang($id)
    {
        $sql = "SELECT * from chi_tiet_don_hangs
                    WHERE don_hang_id = '$id' ";
        return $this->conn->query($sql);
    }

    function trang_thai_don_hang()
    {
        $sql = "select * from trang_thai_don_hangs";
        return $this->conn->query($sql);
    }



    function listInfoDonHang($id)
    {
        $sql = "SELECT chi_tiet_don_hangs.* , chi_tiet_san_pham.* , mau_sacs.* , kich_thuocs.* , san_phams.*
                    FROM chi_tiet_don_hangs
                    JOIN san_phams ON chi_tiet_don_hangs.San_pham_id = san_phams.Id 
                    JOIN chi_tiet_san_pham ON chi_tiet_san_pham.id = chi_tiet_don_hangs.chi_tiet_san_pham_id
                    JOIN mau_sacs ON mau_sacs.id = chi_tiet_san_pham.mau_sac_id
                    JOIN kich_thuocs ON kich_thuocs.id = chi_tiet_san_pham.kich_thuoc_id
                    WHERE chi_tiet_don_hangs.Don_hang_id = '$id' ";
        return $this->conn->query($sql);
    }


    function update_trang_thai($id, $id_trang_thai)
    {
        $sql = "UPDATE don_hangs set trang_thai_don_hang_id ='$id_trang_thai' where Id= '$id'";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }

    function capNhatThanhToan($id)
    {
        $sql = "UPDATE don_hangs SET thanh_toan = 'Đã thanh toán'
            WHERE Id = '$id' ";
        $stnt = $this->conn->prepare($sql);
        return $stnt->execute();
    }

    function getChiTietDonHang($donHangId)
    {
        $sql = "SELECT chi_tiet_don_hangs.* , chi_tiet_san_pham.id as chi_tiet_san_pham_id , chi_tiet_san_pham.so_luong_ton_kho
        FROM chi_tiet_don_hangs
                JOIN chi_tiet_san_pham ON chi_tiet_san_pham.id = chi_tiet_don_hangs.chi_tiet_san_pham_id
                WHERE Don_hang_id = '$donHangId' ";
        return $this->conn->query($sql);
    }
}
