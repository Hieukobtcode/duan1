<?php
class sanPhamController
{
    public $sanPhamModel;
    function __construct()
    {
        $this->sanPhamModel = new sanPhamModel;
    }

    function hien_thi_san_pham()
    {
        $chi_tiet_id = $this->sanPhamModel->id_bien_the()->fetchAll();
        $khuyen_mais = $this->sanPhamModel->khuyen_mai()->fetchAll();
        $san_phams = $this->sanPhamModel->list_san_pham();
        $danh_mucs = $this->sanPhamModel->listDanhMuc()->fetchAll();
        require_once 'views/sanPhamView/listSanPham.php';
    }

    function sua_san_pham($id)
    {
        $khuyen_mais = $this->sanPhamModel->khuyen_mai();
        $danh_mucs = $this->sanPhamModel->listDanhMuc();
        $san_pham = $this->sanPhamModel->tim_san_pham($id)->fetch();
        if (isset($_POST['btn_sua'])) {
            $ten_san_pham = $_POST['ten_san_pham'];
            $ma_san_pham = $_POST['ma_san_pham'];
            $mo_ta =  $_POST['mo_ta'];
            $trang_thai = $_POST['trang_thai'];
            $gia_nhap = $_POST['gia_nhap'];
            $gia_ban = $_POST['gia_ban'];
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'];
            $chi_tiet_danh_muc_id = $_POST['danh_muc'];
            $khuyen_mai = $_POST['khuyen_mai'];
            if ($khuyen_mai == 0) {
                $khuyen_mai = NULL;
            }
            $error = [];
            
            if (empty($ma_san_pham)) {
                $error['ma_san_pham'] = "Mã sản phẩm không được để trống";
            }
            if (empty($mo_ta)) {
                $error['mo_ta'] = "Mô tả không được để trống";
            }
            if (empty($ten_san_pham)) {
                $error['ten_san_pham'] = "Tên sản phẩm không được để trống";
            }
            if (empty($gia_nhap)) {
                $error['gia_nhap'] = "Không được để trống";
            }
            if (empty($gia_ban)) {
                $error['gia_ban'] = "Không được để trống";
            }
            if (empty($gia_khuyen_mai)) {
                $error['gia_khuyen_mai'] = "Không được để trống";
            }

            if (empty($error)) {
                if ($this->sanPhamModel->sua_san_pham($id, $ma_san_pham, $ten_san_pham, $mo_ta, $chi_tiet_danh_muc_id, $trang_thai, $khuyen_mai,$gia_nhap,$gia_ban,$gia_khuyen_mai)) {
                    echo "<script>window.location.href = '?act=listSanPham';</script>";
                    exit();
                } else {
                    echo "Khong the sua san pham";
                }
            } else {
                require_once 'views/sanPhamView/suaSanPham.php';
            }
        }
        require_once 'views/sanPhamView/suaSanPham.php';
    }

    function them_san_pham()
    {
        $khuyen_mais = $this->sanPhamModel->khuyen_mai();
        $danh_mucs = $this->sanPhamModel->listDanhMuc();
        if (isset($_POST['btn_them'])) {
            $ten_san_pham = $_POST['ten_san_pham'];
            $ma_san_pham = $_POST['ma_san_pham'];
            $mo_ta =  $_POST['mo_ta'];
            $gia_nhap = $_POST['gia_nhap'];
            $gia_ban = $_POST['gia_ban'];
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'];
            $chi_tiet_danh_muc_id = $_POST['danh_muc'];
            $khuyen_mai = $_POST['khuyen_mai'];
            $khuyen_mai = isset($_POST['khuyen_mai']) && $_POST['khuyen_mai'] !== '' ? $_POST['khuyen_mai'] : NULL;
            $error = [];

            
            if (empty($ma_san_pham)) {
                $error['ma_san_pham'] = "Mã sản phẩm không được để trống";
            }
            if (empty($mo_ta)) {
                $error['mo_ta'] = "Mô tả không được để trống";
            }
            if (empty($ten_san_pham)) {
                $error['ten_san_pham'] = "Tên sản phẩm không được để trống";
            }
            if (empty($gia_nhap)) {
                $error['ten_san_pham'] = "Không được để trống";
            }
            if (empty($gia_ban)) {
                $error['ten_san_pham'] = "Không được để trống";
            }
            if (empty($gia_khuyen_mai)) {
                $error['ten_san_pham'] = "Không được để trống";
            }

            if (empty($error)) {
                if ($this->sanPhamModel->them_san_pham($ma_san_pham,$ten_san_pham,$mo_ta,$chi_tiet_danh_muc_id,$khuyen_mai,$gia_ban,$gia_nhap,$gia_khuyen_mai)) {
                    echo "<script>window.location.href = '?act=listSanPham';</script>";
                    exit();
                } else {
                    echo "Khong the them san pham";
                }
            } else {
                require_once 'views/sanPhamView/themSanPham.php';
            }
        }
        require_once 'views/sanPhamView/themSanPham.php';
    }

    function xoa_san_pham($id)
    {
        if ($this->sanPhamModel->xoa_san_pham($id)) {
            echo "<script>window.location.href = '?act=listSanPham';</script>";
        } else {
            echo "Khong the xoa san pham";
        }
    }

    function list_kich_thuoc()
    {
        $kich_thuoc = $this->sanPhamModel->list_kich_thuoc();
        require_once 'views/thuocTinhView/kichThuoc/list.php';
    }

    function them_mau_sac()
    {
        if (isset($_POST['btn_them'])) {
            $ten_mau = $_POST['ten_mau'];
            $ma_mau = $_POST['ma_mau'];

            $error = [];
            if (empty($ten_mau)) {
                $error['ten_mau'] = "Không được để trống";
            }
            if (empty($ma_mau)) {
                $error['ma_mau'] = "Không được để trống";
            }

            if (empty($error)) {
                if ($this->sanPhamModel->them_mau($ten_mau, $ma_mau)) {
                    echo "<script>window.location.href ='?act=listMauSac';</script>";
                    exit();
                } else {
                    echo "Khong the them";
                }
            } else {
                require_once 'views/thuocTinhView/mauSac/add.php';
            }
        }
        require_once 'views/thuocTinhView/mauSac/add.php';
    }

    function sua_mau_sac($id)
    {
        $mau_sac = $this->sanPhamModel->tim_mau($id)->fetch();
        if (isset($_POST['btn_sua'])) {
            $ten_mau = $_POST['ten_mau'];
            $ma_mau = $_POST['ma_mau'];

            $error = [];
            if (empty($ten_mau)) {
                $error['ten_mau'] = "Không được để trống";
            }
            if (empty($ma_mau)) {
                $error['ma_mau'] = "Không được để trống";
            }


            if (empty($error)) {
                if ($this->sanPhamModel->sua_mau($id,$ten_mau, $ma_mau)) {
                    echo "<script>window.location.href = '?act=listMauSac';</script>";
                    exit();
                } else {
                    echo "Khong the them";
                }
            } else {
                require_once 'views/thuocTinhView/mauSac/edit.php';
            }
        }
        require_once 'views/thuocTinhView/mauSac/edit.php';
    }

    function xoa_mau_sac($id)
    {
        if ($this->sanPhamModel->xoa_mau($id)) {
            echo "<script>window.location.href = '?act=listMauSac';</script>";
        } else {
            echo "Khong the xoa san pham";
        }
    }

    function list_mau_sac()
    {
        $mau_sac = $this->sanPhamModel->list_mau_sac();
        require_once 'views/thuocTinhView/mauSac/list.php';
    }

    function them_kich_thuoc()
    {
        if (isset($_POST['btn_them'])) {
            $ten_kich_thuoc = $_POST['ten_kich_thuoc'];

            $error = [];
            if (empty($ten_kich_thuoc)) {
                $error['ten_kich_thuoc'] = "Không được để trống";
            }

            if (empty($error)) {
                if ($this->sanPhamModel->them_kich_thuoc($ten_kich_thuoc)) {
                    echo "<script>window.location.href = '?act=listKichThuoc';</script>";
                    exit();
                } else {
                    echo "Khong the them";
                }
            } else {
                require_once 'views/thuocTinhView/kichThuoc/add.php';
            }
        }
        require_once 'views/thuocTinhView/kichThuoc/add.php';
    }

    function sua_kich_thuoc($id)
    {
        $kich_thuoc = $this->sanPhamModel->tim_kich_thuoc($id)->fetch();
        if (isset($_POST['btn_sua'])) {
            $ten_kich_thuoc = $_POST['ten_kich_thuoc'];

            $error = [];
            if (empty($ten_kich_thuoc)) {
                $error['ten_kich_thuoc'] = "Không được để trống";
            }

            if (empty($error)) {
                if ($this->sanPhamModel->sua_kich_thuoc($id, $ten_kich_thuoc)) {
                    echo "<script>window.location.href = '?act=listKichThuoc';</script>";
                    exit();
                } else {
                    echo "Khong the them";
                }
            } else {
                require_once 'views/thuocTinhView/kichThuoc/edit.php';
            }
        }
        require_once 'views/thuocTinhView/kichThuoc/edit.php';
    }

    function xoa_kich_thuoc($id)
    {
        if ($this->sanPhamModel->xoa_kich_thuoc($id)) {
            echo "<script>window.location.href = '?act=listKichThuoc';</script>";
        } else {
            echo "Khong the xoa";
        }
    }

    function them_bien_the()
{
    $tenSP = $this->sanPhamModel->tenSP($_GET['id'])->fetch();
    $san_phams = $this->sanPhamModel->list_san_pham()->fetchAll();
    $kich_thuocs = $this->sanPhamModel->get_kich_thuoc()->fetchAll();
    $mau_sacs = $this->sanPhamModel->get_mau_sac()->fetchAll();

    if (isset($_POST['btn_them'])) {
        $ma_sku = $_POST['ma_sku'];
        $san_pham_id = $_GET['id'];
        $mau_sac_id = $_POST['mau_sac_id'];
        $kich_thuoc_id = $_POST['kich_thuoc_id'];
        $ngay_nhap = date("d/m/y");
        $so_luong_ton_kho = $_POST['so_luong_ton_kho'];

        $error = [];
        if (empty($ma_sku)) $error['ma_sku'] = "Không được để trống";
        if (empty($mau_sac_id)) $error['mau_sac_id'] = "Không được để trống";
        if (empty($kich_thuoc_id)) $error['kich_thuoc_id'] = "Không được để trống";
        if (empty($ngay_nhap)) $error['ngay_nhap'] = "Không được để trống";
        if (empty($so_luong_ton_kho)) $error['so_luong_ton_kho'] = "Không được để trống";

        // Xử lý ảnh chính
        $img = $_FILES['img']['name'];
        $tmp = $_FILES['img']['tmp_name'];
        
        move_uploaded_file($tmp,'./assets/img/'.$img);

        if (empty($error)) {
            $chi_tiet_san_pham_id = $this->sanPhamModel->them_bien_the($ma_sku, $san_pham_id, $img, $mau_sac_id, $kich_thuoc_id,$ngay_nhap, $so_luong_ton_kho);
            // Điều hướng về trang danh sách
            echo "<script>window.location.href = '?act=listSanPham';</script>";
        }
    }
    require_once 'views/bienTheSPView/themBienThe.php';
}

    

    function sua_bien_the($id)
    {
        $san_phams = $this->sanPhamModel->list_san_pham()->fetchAll();
        $kich_thuocs = $this->sanPhamModel->get_kich_thuoc()->fetchAll();
        $mau_sacs = $this->sanPhamModel->get_mau_sac()->fetchAll();
        $bien_the = $this->sanPhamModel->tim_bien_the($id)->fetch();
        if (isset($_POST['btn_sua'])) {
            $ma_sku = $_POST['ma_sku'];
            $mau_sac_id = $_POST['mau_sac_id'];
            $kich_thuoc_id = $_POST['kich_thuoc_id'];
            $ngay_nhap = date("Y-m-d");
            $so_luong_ton_kho = $_POST['so_luong_ton_kho'];

            $error = [];
            if (empty($ma_sku)) {
                $error['ma_sku'] = "Không được để trống";
            }
            if (empty($mau_sac_id)) {
                $error['mau_sac_id'] = "Không được để trống";
            }
            if (empty($kich_thuoc_id)) {
                $error['ma_sku'] = "Không được để trống";
            }
            if (empty($ngay_nhap)) {
                $error['ngay_nhap'] = "Không được để trống";
            }
            if (empty($so_luong_ton_kho)) {
                $error['so_luong_ton_kho'] = "Không được để trống";
            }

            if (empty($error)) {
                if ($this->sanPhamModel->sua_bien_the($id, $ma_sku, $mau_sac_id, $kich_thuoc_id,$ngay_nhap, $so_luong_ton_kho)) {
                    echo "<script>window.location.href = '?act=listSanPham';</script>";
                    exit();
                } else {
                    echo "Khong the them";
                }
            } else {
                require_once 'views/bienTheSPView/suaBienThe.php';
            }
        }
        require_once 'views/bienTheSPView/suaBienThe.php';
    }

    function list_bien_the($id)
    {
        $bien_thes = $this->sanPhamModel->bien_the($id)->fetchAll();
        $ten_san_pham = $this->sanPhamModel->ten_san_pham($id)->fetch();
        require_once 'views/bienTheSPView/listBienThe.php';
    }

    function xoa_bien_the($id){
        if($this->sanPhamModel->xoa_bien_the($id)){
            echo "<script>window.location.href = '?act=listSanPham';</script>";
        }else{
            echo 'Khong the xoa bien the';
        }
    }

    function xoa_albulm($id) {
        $san_pham_id = $_POST['san_pham_id'];
        if($this->sanPhamModel->deleteImage($id)){
        echo "<script>window.location.href = '?act=suaBienThe&id='$san_pham_id'';</script>";
        }
    }

    function chi_tiet_bien_the($id){
        $danh_gias = $this->sanPhamModel->danh_gia($id)->fetchAll();
        $binh_luans = $this->sanPhamModel->binh_luan($id)->fetchAll();
        $thongTinSP = $this->sanPhamModel->tim_san_pham($id)->fetch();
        $thongTinBienThe = $this->sanPhamModel->listBienThe($id)->fetchAll();
        require_once 'views/bienTheSPView/chiTietBienThe.php';
    }


    
}
?>
