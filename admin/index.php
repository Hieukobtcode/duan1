<?php
    require_once 'controllers/danhmucController.php';
    require_once 'models/danhmucModel.php';
    require_once '../commons/function.php';

    $act = $_GET['act']??'/';
    match($act){
        '/'=>(new danhMucController())->trangChuController(),
        'trangChu'=>(new danhMucController())->trangChuController(),
        'suaDanhMuc' =>(new danhMucController())->sua_danh_muc($_GET['id']),
        'xoaDanhMuc' =>(new danhMucController())->xoa_danh_muc($_GET['id']),
        'themDanhMuc'=>(new danhMucController())->them_danh_muc(),
        'danhMuc' =>(new danhMucController())->hien_thi_danh_muc(),
    }
?>