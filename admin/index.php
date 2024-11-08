<?php
    require_once 'controllers/danhmucController.php';
    require_once 'models/danhmucModel.php';
    require_once '../commons/function.php';
    require_once 'views/layout/sidebar.php';
    require_once 'controllers/taiKhoanController.php';
    require_once 'models/taiKhoanModel.php';
    require_once 'controllers/tinTucController.php';
    require_once 'models/tinTucModel.php';
    require_once 'models/lienheModel.php';
    require_once 'controllers/lienheController.php';

    $act = $_GET['act']??'/';
    match($act){
        '/'=>(new danhMucController())->trangChuController(),

        //danhMuc
        'trangChu'=>(new danhMucController())->trangChuController(),
        'suaDanhMuc' =>(new danhMucController())->sua_danh_muc($_GET['id']),
        'xoaDanhMuc' =>(new danhMucController())->xoa_danh_muc($_GET['id']),
        'themDanhMuc'=>(new danhMucController())->them_danh_muc(),
        'danhMuc' =>(new danhMucController())->hien_thi_danh_muc(),

        //sanpham

        //taiKhoanQuanTri
        'listQuanTri'=>(new taiKhoanController())->hien_thi_quan_tri(),
        'themQuanTri'=>(new taiKhoanController())->them_quan_tri(),
        'suaQuanTri'=>(new taiKhoanController())->sua_quan_tri($_GET['id']),
        'resetPass'=>(new taiKhoanController())->xoa_pass($_GET['id']),
        
        //taiKhoanKhachHang
        'listKhachHang'=>(new taiKhoanController)->listKhachHang(),
        'suaKhachHang'=>(new taiKhoanController)->sua_khach_hang($_GET['id']),
        'chiTietKhachHang'=>(new taiKhoanController)->chiTietKhachHang($_GET['id']),

        //Bai viet
        'baiViet'=>(new tinTucController())->hien_thi_tin_tuc(),
        'suaTinTuc'=>(new tinTucController())->sua_tin_tuc($_GET['id']),
        'xoaTinTuc'=>(new tinTucController())->xoa_tin_tuc($_GET['id']),
        'themTinTuc'=>(new tinTucController())->them_tin_tuc(),

        //Lien he
        'lienHe'=>(new lienHeController())->hien_thi_lien_he(),
        'xoaLienHe'=>(new lienHeController())->xoa_lien_he($_GET['id']),
    }
?>