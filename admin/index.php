<?php
    session_start();

    require_once 'models/ThongKeModel.php';
    require_once 'controllers/ThongKeController.php';

    require_once 'controllers/danhmucController.php';
    require_once 'models/danhmucModel.php';

    require_once '../commons/function.php';

    require_once 'controllers/taiKhoanController.php';
    require_once 'models/taiKhoanModel.php';

    require_once 'controllers/tinTucController.php';
    require_once 'models/tinTucModel.php';

    require_once 'models/lienheModel.php';
    require_once 'controllers/lienheController.php';

    require_once 'controllers/sanphamController.php';
    require_once 'models/sanphamModel.php';

    require_once 'controllers/khuyenMaiController.php';
    require_once 'models/khuyenMaiModel.php';

    require_once 'controllers/bannerController.php';
    require_once 'models/bannerModel.php';

    require_once 'controllers/hinhAnhSanPhamController.php';
    require_once 'models/hinhAnhSanPhamModel.php';

    require_once 'controllers/chiTietDanhMucController.php';
    require_once 'models/chiTietDanhMucModel.php';
    
    require_once 'controllers/trangThaiDonHangController.php';
    require_once 'models/trangThaiDonHangModel.php';

    require_once 'controllers/donHangController.php';
    require_once 'models/donHangModel.php';

    require_once 'controllers/loginController.php';
    require_once 'models/loginModel.php';

    $act = $_GET['act']??'/';
    match($act){
      
        '/'=>(new ThongKeController())->thongke(),
        'logout'=>(new loginController())->logout(),
        'trangChu'=>(new ThongKeController())->thongke(),

        //danhMuc
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
        'capnhatTrangThai'=>(new lienHeController())->cap_nhat_trang_thai($_GET['id']),

        //San pham
        'listSanPham'=>(new sanPhamController())->hien_thi_san_pham(),
        'themSanPham'=>(new sanPhamController())->them_san_pham(),
        'suaSanPham'=>(new sanPhamController())->sua_san_pham($_GET['id']),
        'xoaSanPham'=>(new sanPhamController())->xoa_san_pham($_GET['id']),

        //Khuyen mai
        'khuyenMai'=>(new khuyenMaiController())->hien_thi_khuyen_mai(),
        'themKhuyenMai'=>(new khuyenMaiController())->them_khuyen_mai(),
        'suaKhuyenMai'=>(new khuyenMaiController())->sua_khuyen_mai($_GET['id']),
        'xoaKhuyenMai'=>(new khuyenMaiController())->xoa_khuyen_mai($_GET['id']),
        'chiTietKhuyenMai'=>(new khuyenMaiController())->chiTietKhuyenMai($_GET['id']),

        //banner
        'banner'=>(new bannerController())->hien_thi_banner(),
        'suaBanner'=>(new bannerController())->sua_banner($_GET['id']),
        'xoaBanner'=>(new bannerController())->xoa_banner($_GET['id']),
        'themBanner'=>(new bannerController())->them_banner(),

        //Hinh anh san pham
        'listHinhAnhSP'=>(new hinhAnhSPController())->hien_thi_hinh_anh_sp(),
        'themHinhAnhSP'=>(new hinhAnhSPController())->them_hinh_anh_sp(),
        'suaHinhAnhSP'=>(new hinhAnhSPController())->sua_hinh_anh_sp($_GET['id']),
        'xoaHinhAnhSP'=>(new hinhAnhSPController())->xoa_hinh_anh_sp($_GET['id']),

        //Chi tiet danh muc
        'chiTietDanhMuc' =>(new ChiTietDanhMucController())->hien_thi_chi_tiet_danh_muc(),
        'suaChiTietDanhMuc' =>(new ChiTietDanhMucController())->sua_chi_tiet_danh_muc($_GET['id']),
        'xoaChiTietDanhMuc' =>(new ChiTietDanhMucController())->xoa_chi_tiet_danh_muc($_GET['id']),
        'themChiTietDanhMuc'=>(new ChiTietDanhMucController())->them_chi_tiet_danh_muc(),

        //Thuoc tinh
        'listMauSac'=>(new sanPhamController())->list_mau_sac(),
        'themMauSac'=>(new sanPhamController())->them_mau_sac(),
        'suaMauSac'=>(new sanPhamController())->sua_mau_sac($_GET['id']),
        'xoaMauSac'=>(new sanPhamController())->xoa_mau_sac($_GET['id']),

        'listKichThuoc'=>(new sanPhamController())->list_kich_thuoc(),
        'themKichThuoc'=>(new sanPhamController())->them_kich_thuoc(),
        'suaKichThuoc'=>(new sanPhamController())->sua_kich_thuoc($_GET['id']),
        'xoaKichThuoc'=>(new sanPhamController())->xoa_kich_thuoc($_GET['id']),

        //Trang thai don hang
        'trangThaiDonHang' => (new trangThaiDonHangController())->hien_trang_thai_don_hang(),
        'themtrangThaiDonHang' => (new trangThaiDonHangController())->them_trang_thai_don_hang(),
        'suatrangThaiDonHang' => (new trangThaiDonHangController())->sua_trang_thai_don_hang($_GET['id']),
        'xoatrangThaiDonHang' => (new trangThaiDonHangController())->xoa_trang_thai_don_hang($_GET['id']),

        //Biến thể
        'themBienThe' =>(new sanPhamController())->them_bien_the(),
        'suaBienThe' =>(new sanPhamController())->sua_bien_the($_GET['id']),
        'listBienThe'=>(new sanPhamController())->list_bien_the($_GET['id']),
        'xoaBienThe'=>(new sanPhamController())->xoa_bien_the($_GET['id'],),
        'chiTietSanPham'=>(new sanPhamController())->chi_tiet_bien_the($_GET['id']),


        //Don hang
        'donHang'=>(new donHangController())->hien_thi_don_hang(),
        'chiTietDonHang'=>(new donHangController())->chi_tiet_don_hang($_GET['id']),
    }
?>