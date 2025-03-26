<?php
    session_start();
    require_once 'commons/function.php'; 

    require_once 'controllers/trangChuController/hienThiTrangChu.php';
    require_once 'models/trangChuModel/hienThiTrangChu.php';

    $act = $_GET['act']??'/';
    match($act){
        'trangChu'=>(new trangChuController())->hienThiTrangChu(),
        '/'=>(new trangChuController())->hienThiTrangChu(),
        //San pham
        'listSanPham'=>(new trangChuController())->listSanPham(),
        'chiTietSanPham'=>(new trangChuController())->chiTietSanPham($_GET['id']),
        'lienHe'=>(new trangChuController())->them_lh(),
        'login' => (new trangChuController())->login(),  
        'logout' => (new trangChuController())->logout(), 
        'baiViet' => (new trangChuController())->baiViet(), 
        'chiTietBaiViet' =>(new trangChuController())->chiTietBaiViet($_GET['id']),
        'thongTin' =>(new trangChuController())->thongTin(),
        'thongTinTk'=>(new trangChuController())->thongTintk(),
        'diaChi'=>(new trangChuController())->diaChi(),
        'danhMuc'=>(new trangChuController())->sPDanhMuc($_GET['id']),
        'danhMuc2'=>(new trangChuController())->chiTietDanhMuc($_GET['id']),
        'chiTietGioHang'=>(new trangChuController())->chiTietGioHang(),
        'thanhToan'=>(new trangChuController())->thanhToan(),
        'complete'=>(new trangChuController())->complete(),
        'xoaGioHang'=>(new trangChuController())->xoaGioHang($_GET['id']),
        'order'=>(new trangChuController())->donHang(),
        'huyDon'=>(new trangChuController())->huyDonHang($_GET['id']),
        'chiTietDonHang'=>(new trangChuController())->chiTietDonHang($_GET['id']),
        'SpYeuThich'=>(new trangChuController())->listSanPhamYeuThich(),
        'themSPYeuThich'=>(new trangChuController())->themSPYeuThich($_GET['id']),
        'remove'=>(new trangChuController())->remove($_GET['id']),
        'danhGia'=>(new trangChuController())->danhGia($_GET['id']),
        'capNhat'=>(new trangChuController())->capNhatTrangThaiThanhCong($_GET['id']),
        'success'=>(new trangChuController())->complete(),
    }
?>  
