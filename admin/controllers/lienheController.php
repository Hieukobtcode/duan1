<?php
    class lienHeController{
        public $lienHeModel;
        function __construct()
        {
            $this->lienHeModel = new lienHeModel;
        }

        function hien_thi_lien_he(){
            $lien_he = $this->lienHeModel->lien_he();
            require_once 'views/lienHeView/listLienHe.php';
        }
         // Chức năng chuyển trạng thái từ 'New' sang 'Processed'
         function cap_nhat_trang_thai($id) {
            // Kiểm tra xem có truyền id qua URL không
            if (!$id) {
                echo "<script>alert('ID không hợp lệ.');</script>";
                echo "<script>window.location.href = '?act=lienHe';</script>";
                exit();
            }

            // Lấy thông tin liên hệ theo ID để kiểm tra trạng thái
            $lien_he = $this->lienHeModel->tim_lien_he($id);

            // Kiểm tra nếu tìm thấy liên hệ
            if ($lien_he) {
                // Nếu trạng thái là 'New', tiến hành cập nhật thành 'Processed'
                if ($lien_he['Trang_thai'] == 'New') {
                    if ($this->lienHeModel->cap_nhat_trang_thai($id, 'Processed')) {
                        $_SESSION['modal_message'] = 'Đã thay đổi trạng thái thành Processed.';
                    } else {
                        $_SESSION['modal_message'] = 'Không thể thay đổi trạng thái.';
                    }
                } else {
                    $_SESSION['modal_message'] = 'Trạng thái không phải là New.';
                }
            } else {
                // Nếu không tìm thấy liên hệ
                $_SESSION['modal_message'] = 'Không tìm thấy liên hệ.';
            }
            // Chuyển hướng lại trang quản lý liên hệ
            echo "<script>window.location.href = '?act=lienHe';</script>";
            exit(); // Dừng mọi xử lý sau khi chuyển hướng
        }
        function xoa_lien_he($id) {
            // Kiểm tra xem có truyền id qua URL không
            if (!$id) {
                echo "<script>alert('ID không hợp lệ.');</script>";
                echo "<script>window.location.href = '?act=lienHe';</script>";
                exit();
            }

            // Lấy thông tin liên hệ theo ID để kiểm tra trạng thái
            $lien_he = $this->lienHeModel->tim_lien_he($id);
            
            // Kiểm tra nếu tìm thấy liên hệ
            if ($lien_he) {
                // Nếu trạng thái là 'Processed', cho phép xóa
                if ($lien_he['Trang_thai'] == 'Processed' ) {
                    // Xóa liên hệ
                    if ($this->lienHeModel->xoa_lien_he($id)) {
                        // Nếu xóa thành công, chuyển hướng lại trang quản lý liên hệ
                        echo "<script>window.location.href = '?act=lienHe';</script>";
                        exit(); // Dừng mọi xử lý sau khi chuyển hướng
                    } else {
                        // Nếu không thể xóa, thông báo lỗi
                        echo "<script>alert('Không thể xóa liên hệ.');</script>";
                    }
                } else {
                    // Nếu trạng thái là 'new', không cho phép xóa và hiển thị modal thông báo
                    echo "<script> alert('Chỉ được xóa liên hệ có trạng thái là Processed.');</script>";
                }
            } else {
                // Nếu không tìm thấy liên hệ, thông báo lỗi
                echo "<script>alert('Không tìm thấy liên hệ.');</script>";
            }
            // Chuyển hướng lại trang quản lý liên hệ (sau khi hiển thị thông báo)
            echo "<script>window.location.href = '?act=lienHe';</script>";
            exit(); // Dừng mọi xử lý sau khi chuyển hướng
        }
        function trangChuController(){
            require_once 'views/trangChu.html';
        }

        
    }
?>