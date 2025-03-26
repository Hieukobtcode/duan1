<!DOCTYPE html>
<html dir="ltr" lang="zxx">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="flexkit">

    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="uomo-html.flexkitux.com\Demo4\css/plugins/swiper.min.css" type="text/css">
    <link rel="stylesheet" href="uomo-html.flexkitux.com\Demo4\css\plugins\jquery.fancybox.css" type="text/css">
    <link rel="stylesheet" href="uomo-html.flexkitux.com/Demo4/css/style.css" type="text/css">


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
  <![endif]-->

    <!-- Document Title -->
    <title> Chi tiết sản phẩm</title>

    <style>
        /* Popup Container */
        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
            text-align: center;
            display: none;
            /* Ban đầu ẩn */
            z-index: 1000;
            min-width: 300px;
        }

        .popup h3 {
            margin: 0 0 10px;
            color: #333;
        }

        .popup p {
            color: #555;
            margin: 10px 0;
        }

        .popup .btn-close {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .popup .btn-close:hover {
            background-color: #218838;
        }

        /* Background overlay */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            /* Ban đầu ẩn */
            z-index: 999;
        }
    </style>


</head>

<body>

    <?php
    if (isset($_POST['btn_them'])) {
        $san_pham_id = $_GET['id'];
        $nguoi_dung_id = $this->trangChuModel->getIdNguoidung($_SESSION['dn']);
        $noi_dung = $_POST['noi_dung'];
        $thoi_gian_tao = date("Y-m-d H:i:s");
        if ($this->trangChuModel->themBinhLuan($san_pham_id, $nguoi_dung_id, $noi_dung, $thoi_gian_tao)) {
            echo "<script>window.location.href = '?act=chiTietSanPham&id=" . $san_pham_id . "';</script>";
        }
    }
    ?>
    <?php require_once 'upload/headerMenu2.php' ?>

    <main>

        <div class="mb-md-1 pb-md-3"></div>
        <section class="product-single container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="product-single__media" data-media-type="vertical-thumbnail">
                        <div class="product-single__image">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <?php foreach ($anhs as $key => $anh) { ?>

                                        <div class="swiper-slide product-single__image-item">
                                            <img loading="lazy" class="h-auto" src="./admin/assets/img/<?= $anh['anh'] ?>"
                                                width="674" height="674" alt="">
                                            <a data-fancybox="gallery" href="./admin/assets/img/<?= $anh['anh'] ?>"
                                                data-bs-toggle="tooltip" data-bs-placement="left" title="Zoom">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <use href="#icon_zoom" />
                                                </svg>
                                            </a>
                                        </div>

                                    <?php } ?>

                                </div>
                                <div class="swiper-button-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <use href="#icon_prev_sm" />
                                    </svg></div>
                                <div class="swiper-button-next"><svg width="7" height="11" viewBox="0 0 7 11"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <use href="#icon_next_sm" />
                                    </svg></div>
                            </div>
                        </div>
                        <div class="product-single__thumbnail">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="d-flex justify-content-between mb-4 pb-md-2">
                        <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
                            <a href="?act=trangChu" class="menu-link menu-link_us-s text-uppercase fw-medium">Trang
                                chủ</a>
                            <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
                            <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">Cửa hàng</a>
                        </div><!-- /.breadcrumb -->

                    </div>

                    <h1 class="product-single__name">
                        <?= $sanPhams['Ten_san_pham'] ?>
                    </h1>
                    <div class="product-single__price">
                        <span class="current-price">
                            <?= isset($sanPhams['gia_ban']) && $sanPhams['gia_ban'] !== null
                                ? number_format($sanPhams['gia_ban'], 0, ',', '.') . ' đ'
                                : 'N/A'; ?>
                        </span>
                    </div>
                    <div class="product-single__short-desc">
                        <p>
                            <?= $sanPhams['Mo_ta'] ?>
                        </p>
                    </div>
                    <form method="POST">
                        <div class="product-single__swatches">
                            <div class="product-swatch text-swatches">
                                <label>Kích cỡ</label>
                                <div class="swatch-list">
                                    <?php foreach ($kichThuocs as $key => $kichThuoc) { ?>
                                        <input value="<?= $kichThuoc['id'] ?>" type="radio" name="size" id="swatch-<?= $key + 1 ?>">
                                        <label class="swatch js-swatch" for="swatch-<?= $key + 1 ?>"
                                            aria-label="Extra Small" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="<?= $kichThuoc['ten_kich_thuoc'] ?>">
                                            <?= $kichThuoc['ten_kich_thuoc'] ?>
                                        </label>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="product-swatch color-swatches">
                                <label>Màu sắc</label>
                                <div class="swatch-list">
                                    <?php foreach ($mauSacs as $key => $mauSac) { ?>
                                        <input type="radio" name="color" value="<?= $mauSac['id_mau'] ?>" id="swatch-<?php echo $key + 11 ?>">
                                        <label class="swatch swatch-color js-swatch" for="swatch-<?php echo $key + 11 ?>"
                                            aria-label="Black" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="<?= $mauSac['ten_mau'] ?>"
                                            style="color: <?= $mauSac['ma_mau'] ?>"></label>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                        <div class="product-single__addtocart">
                            <div class="qty-control position-relative">
                                <input type="number" name="quantity" value="1" min="1"
                                    class="qty-control__number text-center">
                                <div class="qty-control__reduce">-</div>
                                <div class="qty-control__increase">+</div>
                            </div>
                            <?php if (isset($_SESSION['dn'])) { ?>
                                <button type="submit" name="btn_gio_hang" class="btn btn-primary">
                                    Thêm vào giỏ
                                </button>
                            <?php } else { ?>
                                <button disabled type="submit" name="btn_gio_hang" class="btn btn-primary">
                                    Thêm vào giỏ
                                </button>
                            <?php } ?>
                        </div>
                    </form>
                    <div class="product-single__addtolinks">
                        <a href="#" class="menu-link menu-link_us-s add-to-wishlist"><svg width="16" height="16"
                                viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_heart" />
                            </svg><span>Thêm sản phẩm yêu thích</span></a>
                        <script src="./js/details-disclosure.js" defer="defer"></script>
                        <script src="./js/share.js" defer="defer"></script>
                    </div>
                    <div class="product-single__meta-info">
                        <div class="meta-item">
                            <label>SKU:</label>
                            <span>
                                <?= $sanPhams['Ma_san_pham'] ?>
                            </span>
                        </div>
                        <div class="meta-item">
                            <label>Danh mục:</label>
                            <span>
                                <?= $sanPhams['mo_ta'] ?>
                            </span>
                        </div>
                        <div class="meta-item">
                            <label>Tổng số sản phẩm:</label>
                            <span>
                                <?php foreach ($tongs as $key => $tong) {
                                    $soLuongTonKho += $tong['so_luong_ton_kho'];
                                } ?>
                                <?= $soLuongTonKho ?>
                            </span>
                        </div>
                        <div class="meta-item">
                            <label>Lượt xem:</label>
                            <span>
                                <?= $sanPhams['luot_xem'] ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-single__details-tab">
                <ul class="nav nav-tabs" id="myTab1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link nav-link_underscore active" id="tab-description-tab" data-bs-toggle="tab"
                            href="#tab-description" role="tab" aria-controls="tab-description" aria-selected="true">Mô
                            tả</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link nav-link_underscore" id="tab-reviews-tab" data-bs-toggle="tab"
                            href="#tab-reviews" role="tab" aria-controls="tab-reviews" aria-selected="false">Đánh
                            giá</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link nav-link_underscore" id="tab-additional-info-tab" data-bs-toggle="tab"
                            href="#tab-additional-info" role="tab" aria-controls="tab-additional-info"
                            aria-selected="false">Bình luận</a>
                    </li>
                </ul>
                <div class="tab-content">

                    <div class="tab-pane fade show active" id="tab-description" role="tabpanel"
                        aria-labelledby="tab-description-tab">
                        <div class="product-single__description">
                            <h3 class="block-title mb-4">Tại sao bạn nên chọn sản phẩm "
                                <?= $sanPhams['Ten_san_pham'] ?>"
                            </h3>
                            <p class="content">
                                <?= $sanPhams['Mo_ta'] ?>
                            </p>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tab-reviews" role="tabpanel" aria-labelledby="tab-reviews-tab">

                        <h2 class="product-single__reviews-title">Đánh giá của khách hàng</h2>

                        <div class="product-single__reviews-list">

                            <?php foreach ($danhGias as $key => $danhGia) { ?>
                                <div class="product-single__reviews-item">
                                    <div class="customer-avatar">
                                        <img width="10px" loading="lazy" src="./assets/img/<?= $danhGia['Anh_dai_dien'] ?>"
                                            alt="User avatar"
                                            onerror="this.onerror=null; this.src='https://icon-library.com/images/icon-user/icon-user-15.jpg'">
                                    </div>
                                    <div class="customer-review">
                                        <div class="customer-name">
                                            <h6>
                                                <?= $danhGia['Ho_ten'] ?>
                                            </h6>
                                            <div class="reviews-group d-flex">
                                                <?php if (isset($danhGia['So_diem_danh_gia'])) {
                                                    $so_sao = $danhGia['So_diem_danh_gia']; // Số sao đánh giá
                                                    for ($i = 0; $i < $so_sao; $i++) { ?>
                                                        <svg class="review-star" viewBox="0 0 9 9"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <use href="#icon_star" />
                                                        </svg>
                                                    <?php }
                                                } else { ?>
                                                    <p>Chưa có đánh giá</p>
                                                <?php } ?>

                                            </div>
                                        </div>
                                        <div class="review-date">
                                            <?= $danhGia['Thoi_gian_tao'] ?>
                                        </div>
                                        <div class="review-text">
                                            <p>
                                                <?= $danhGia['Noi_dung'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>

                    </div>

                    <div class="tab-pane fade" id="tab-additional-info" role="tabpanel"
                        aria-labelledby="tab-additional-info-tab">

                        <div class="product-single__addtional-info">
                            <h2 class="product-single__reviews-title">Bình luận</h2>
                            <div class="product-single__reviews-list">

                                <?php foreach ($binh_luans as $key => $binh_luan) { ?>
                                    <div class="product-single__reviews-item">
                                        <div class="customer-avatar">
                                            <img loading="lazy" src="./admin/assets/img/<?= $binh_luan['Anh_dai_dien'] ?>"
                                                alt="User avatar"
                                                onerror="this.onerror=null; this.src='https://icon-library.com/images/icon-user/icon-user-15.jpg'"
                                                width="70%">
                                        </div>
                                        <div class="customer-review">
                                            <div class="customer-name">
                                                <h6><?= $binh_luan['Ho_ten'] ?></h6>
                                            </div>
                                            <div class="review-date"><?= $binh_luan['Thoi_gian_tao'] ?></div>
                                            <div class="review-text">
                                                <p><?= $binh_luan['Noi_dung'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                            <div class="product-single__review-form">
                                <form name="customer-review-form" method="POST" action="">
                                    <h5>Nói cho tôi biết suy nghĩ của bạn về sản phẩm này</h5>
                                    <div class="mb-4">
                                        <?php if (isset($_SESSION['dn'])) { ?>
                                            <textarea id="form-input-review" class="form-control form-control_gray"
                                                name="noi_dung" placeholder="Bình luận của bạn" cols="30" rows="8"
                                                required></textarea>
                                            <div class="form-action">
                                                <button type="submit" name="btn_them" class="btn btn-primary">Gửi</button>
                                            </div>
                                        <?php } else { ?>
                                            <p>Hãy <strong><a href="?act=login">ĐĂNG NHẬP</a></strong> để bình luận về sản phẩm này</p>
                                        <?php } ?>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section class="products-carousel container">
            <h2 class="h3 text-uppercase mb-4 pb-xl-2 mb-xl-4">Sản phẩm <strong>đề xuất</strong></h2>

            <div id="related_products" class="position-relative">
                <div class="swiper-container js-swiper-slider" data-settings='{
            "autoplay": false,
            "slidesPerView": 4,
            "slidesPerGroup": 4,
            "effect": "none",
            "loop": true,
            "pagination": {
              "el": "#related_products .products-pagination",
              "type": "bullets",
              "clickable": true
            },
            "navigation": {
              "nextEl": "#related_products .products-carousel__next",
              "prevEl": "#related_products .products-carousel__prev"
            },
            "breakpoints": {
              "320": {
                "slidesPerView": 2,
                "slidesPerGroup": 2,
                "spaceBetween": 14
              },
              "768": {
                "slidesPerView": 3,
                "slidesPerGroup": 3,
                "spaceBetween": 24
              },
              "992": {
                "slidesPerView": 4,
                "slidesPerGroup": 4,
                "spaceBetween": 30
              }
            }
          }'>
                    <div class="swiper-wrapper">
                        <?php $sPs = $this->trangChuModel->sanPhamDeXuat($sanPhams['danh_muc_id'])->fetchAll(); ?>

                        <?php foreach ($sPs as $key => $sP) { ?>
                            <?php $anh = $this->trangChuModel->anhDeXuat($sP['SPID'])->fetch(); ?>
                            <div class="swiper-slide product-card">
                                <div class="pc__img-wrapper">
                                    <a href="?act=chiTietSanPham&id=<?= $sP['SPID'] ?>">
                                        <img loading="lazy" src="./admin/assets/img/<?= $anh['anh'] ?>" width="330"
                                            height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                                    </a>
                                    <button
                                        class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside"
                                        data-aside="cartDrawer" title="Add To Cart">Thêm vào giỏ</button>
                                </div>

                                <div class="pc__info position-relative">
                                    <p class="pc__category">
                                        <?= $sP['mo_ta'] ?>
                                    </p>
                                    <h6 class="pc__title"><a href="?act=chiTietSanPham&id=<?= $sP['SPID'] ?>">
                                            <?= $sP['Ten_san_pham'] ?>
                                        </a></h6>
                                    <div class="product-card__price d-flex">
                                        <span class="money price">
                                            <?= isset($sP['gia_ban']) && $sP['gia_ban'] !== null
                                                ? number_format($sP['gia_ban'], 0, ',', '.') . ' đ'
                                                : 'N/A'; ?>
                                        </span></span>
                                    </div>
                                    <button
                                        class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist"
                                        title="Add To Wishlist">
                                        <svg width="16" height="16" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <use href="#icon_heart" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        <?php } ?>

                    </div><!-- /.swiper-wrapper -->
                </div><!-- /.swiper-container js-swiper-slider -->

                <div
                    class="products-carousel__prev position-absolute top-50 d-flex align-items-center justify-content-center">
                    <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_prev_md" />
                    </svg>
                </div><!-- /.products-carousel__prev -->
                <div
                    class="products-carousel__next position-absolute top-50 d-flex align-items-center justify-content-center">
                    <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_next_md" />
                    </svg>
                </div><!-- /.products-carousel__next -->

                <div class="products-pagination mt-4 mb-5 d-flex align-items-center justify-content-center"></div>
                <!-- /.products-pagination -->
            </div><!-- /.position-relative -->

        </section><!-- /.products-carousel container -->
    </main>

    <div class="mb-5 pb-xl-5"></div>

    <?php require_once 'upload/fotterSp.php' ?>


    <!-- Filters Drawer -->
    <div class="aside-filters aside aside_right" id="shopFilter">
        <div class="aside-header d-flex align-items-center">
            <h3 class="text-uppercase fs-6 mb-0">Filter By</h3>
            <button class="btn-close-lg js-close-aside btn-close-aside ms-auto"></button>
        </div><!-- /.aside-header -->

        <div class="aside-content">
            <div class="accordion" id="categories-list">
                <div class="accordion-item mb-4">
                    <h5 class="accordion-header" id="accordion-heading-1">
                        <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button"
                            data-bs-toggle="collapse" data-bs-target="#accordion-filter-1" aria-expanded="true"
                            aria-controls="accordion-filter-1">
                            Product Categories
                            <svg class="accordion-button__icon" viewBox="0 0 14 14">
                                <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                                    <path class="svg-path-vertical" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path>
                                    <path class="svg-path-horizontal" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path>
                                </g>
                            </svg>
                        </button>
                    </h5>
                    <div id="accordion-filter-1" class="accordion-collapse collapse show border-0"
                        aria-labelledby="accordion-heading-1" data-bs-parent="#categories-list">
                        <div class="accordion-body px-0 pb-0">
                            <ul class="list list-inline row row-cols-2 mb-0">
                                <li class="list-item">
                                    <a href="#" class="menu-link py-1">Dresses</a>
                                </li>
                                <li class="list-item">
                                    <a href="#" class="menu-link py-1">Shorts</a>
                                </li>
                                <li class="list-item">
                                    <a href="#" class="menu-link py-1">Sweatshirts</a>
                                </li>
                                <li class="list-item">
                                    <a href="#" class="menu-link py-1">Swimwear</a>
                                </li>
                                <li class="list-item">
                                    <a href="#" class="menu-link py-1">Jackets</a>
                                </li>
                                <li class="list-item">
                                    <a href="#" class="menu-link py-1">T-Shirts & Tops</a>
                                </li>
                                <li class="list-item">
                                    <a href="#" class="menu-link py-1">Jeans</a>
                                </li>
                                <li class="list-item">
                                    <a href="#" class="menu-link py-1">Trousers</a>
                                </li>
                                <li class="list-item">
                                    <a href="#" class="menu-link py-1">Men</a>
                                </li>
                                <li class="list-item">
                                    <a href="#" class="menu-link py-1">Jumpers & Cardigans</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- /.accordion-item -->
            </div><!-- /.accordion-item -->

            <div class="accordion" id="color-filters">
                <div class="accordion-item mb-4">
                    <h5 class="accordion-header" id="accordion-heading-11">
                        <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button"
                            data-bs-toggle="collapse" data-bs-target="#accordion-filter-2" aria-expanded="true"
                            aria-controls="accordion-filter-2">
                            Color
                            <svg class="accordion-button__icon" viewBox="0 0 14 14">
                                <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                                    <path class="svg-path-vertical" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path>
                                    <path class="svg-path-horizontal" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path>
                                </g>
                            </svg>
                        </button>
                    </h5>
                    <div id="accordion-filter-2" class="accordion-collapse collapse show border-0"
                        aria-labelledby="accordion-heading-11" data-bs-parent="#color-filters">
                        <div class="accordion-body px-0 pb-0">
                            <div class="d-flex flex-wrap">
                                <a href="#" class="swatch-color js-filter" style="color: #0a2472"></a>
                                <a href="#" class="swatch-color js-filter" style="color: #d7bb4f"></a>
                                <a href="#" class="swatch-color js-filter" style="color: #282828"></a>
                                <a href="#" class="swatch-color js-filter" style="color: #b1d6e8"></a>
                                <a href="#" class="swatch-color js-filter" style="color: #9c7539"></a>
                                <a href="#" class="swatch-color js-filter" style="color: #d29b48"></a>
                                <a href="#" class="swatch-color js-filter" style="color: #e6ae95"></a>
                                <a href="#" class="swatch-color js-filter" style="color: #d76b67"></a>
                                <a href="#" class="swatch-color swatch_active js-filter" style="color: #bababa"></a>
                                <a href="#" class="swatch-color js-filter" style="color: #bfdcc4"></a>
                            </div>
                        </div>
                    </div>
                </div><!-- /.accordion-item -->
            </div><!-- /.accordion -->


            <div class="accordion" id="size-filters">
                <div class="accordion-item mb-4">
                    <h5 class="accordion-header" id="accordion-heading-size">
                        <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button"
                            data-bs-toggle="collapse" data-bs-target="#accordion-filter-size" aria-expanded="true"
                            aria-controls="accordion-filter-size">
                            Sizes
                            <svg class="accordion-button__icon" viewBox="0 0 14 14">
                                <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                                    <path class="svg-path-vertical" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path>
                                    <path class="svg-path-horizontal" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path>
                                </g>
                            </svg>
                        </button>
                    </h5>
                    <div id="accordion-filter-size" class="accordion-collapse collapse show border-0"
                        aria-labelledby="accordion-heading-size" data-bs-parent="#size-filters">
                        <div class="accordion-body px-0 pb-0">
                            <div class="d-flex flex-wrap">
                                <a href="#" class="swatch-size btn btn-sm btn-outline-light mb-3 me-3 js-filter">XS</a>
                                <a href="#" class="swatch-size btn btn-sm btn-outline-light mb-3 me-3 js-filter">S</a>
                                <a href="#" class="swatch-size btn btn-sm btn-outline-light mb-3 me-3 js-filter">M</a>
                                <a href="#" class="swatch-size btn btn-sm btn-outline-light mb-3 me-3 js-filter">L</a>
                                <a href="#" class="swatch-size btn btn-sm btn-outline-light mb-3 me-3 js-filter">XL</a>
                                <a href="#" class="swatch-size btn btn-sm btn-outline-light mb-3 me-3 js-filter">XXL</a>
                            </div>
                        </div>
                    </div>
                </div><!-- /.accordion-item -->
            </div><!-- /.accordion -->


            <div class="accordion" id="brand-filters">
                <div class="accordion-item mb-4">
                    <h5 class="accordion-header" id="accordion-heading-brand">
                        <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button"
                            data-bs-toggle="collapse" data-bs-target="#accordion-filter-brand" aria-expanded="true"
                            aria-controls="accordion-filter-brand">
                            Brands
                            <svg class="accordion-button__icon" viewBox="0 0 14 14">
                                <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                                    <path class="svg-path-vertical" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path>
                                    <path class="svg-path-horizontal" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path>
                                </g>
                            </svg>
                        </button>
                    </h5>
                    <div id="accordion-filter-brand" class="accordion-collapse collapse show border-0"
                        aria-labelledby="accordion-heading-brand" data-bs-parent="#brand-filters">
                        <div class="search-field multi-select accordion-body px-0 pb-0">
                            <select class="d-none" multiple name="total-numbers-list">
                                <option value="1">Adidas</option>
                                <option value="2">Balmain</option>
                                <option value="3">Balenciaga</option>
                                <option value="4">Burberry</option>
                                <option value="5">Kenzo</option>
                                <option value="5">Givenchy</option>
                                <option value="5">Zara</option>
                            </select>
                            <div class="search-field__input-wrapper mb-3">
                                <input type="text" name="search_text"
                                    class="search-field__input form-control form-control-sm border-light border-2"
                                    placeholder="SEARCH">
                            </div>
                            <ul class="multi-select__list list-unstyled">
                                <li
                                    class="search-suggestion__item multi-select__item text-primary js-search-select js-multi-select">
                                    <span class="me-auto">Adidas</span>
                                    <span class="text-secondary">2</span>
                                </li>
                                <li
                                    class="search-suggestion__item multi-select__item text-primary js-search-select js-multi-select">
                                    <span class="me-auto">Balmain</span>
                                    <span class="text-secondary">7</span>
                                </li>
                                <li
                                    class="search-suggestion__item multi-select__item text-primary js-search-select js-multi-select">
                                    <span class="me-auto">Balenciaga</span>
                                    <span class="text-secondary">10</span>
                                </li>
                                <li
                                    class="search-suggestion__item multi-select__item text-primary js-search-select js-multi-select">
                                    <span class="me-auto">Burberry</span>
                                    <span class="text-secondary">39</span>
                                </li>
                                <li
                                    class="search-suggestion__item multi-select__item text-primary js-search-select js-multi-select">
                                    <span class="me-auto">Kenzo</span>
                                    <span class="text-secondary">95</span>
                                </li>
                                <li
                                    class="search-suggestion__item multi-select__item text-primary js-search-select js-multi-select">
                                    <span class="me-auto">Givenchy</span>
                                    <span class="text-secondary">1092</span>
                                </li>
                                <li
                                    class="search-suggestion__item multi-select__item text-primary js-search-select js-multi-select">
                                    <span class="me-auto">Zara</span>
                                    <span class="text-secondary">48</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- /.accordion-item -->
            </div><!-- /.accordion -->


            <div class="accordion" id="price-filters">
                <div class="accordion-item mb-4">
                    <h5 class="accordion-header mb-2" id="accordion-heading-price">
                        <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button"
                            data-bs-toggle="collapse" data-bs-target="#accordion-filter-price" aria-expanded="true"
                            aria-controls="accordion-filter-price">
                            Price
                            <svg class="accordion-button__icon" viewBox="0 0 14 14">
                                <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                                    <path class="svg-path-vertical" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path>
                                    <path class="svg-path-horizontal" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path>
                                </g>
                            </svg>
                        </button>
                    </h5>
                    <div id="accordion-filter-price" class="accordion-collapse collapse show border-0"
                        aria-labelledby="accordion-heading-price" data-bs-parent="#price-filters">
                        <input class="price-range-slider" type="text" name="price_range" value="" data-slider-min="10"
                            data-slider-max="1000" data-slider-step="5" data-slider-value="[250,450]" data-currency="$">
                        <div class="price-range__info d-flex align-items-center mt-2">
                            <div class="me-auto">
                                <span class="text-secondary">Min Price: </span>
                                <span class="price-range__min">$250</span>
                            </div>
                            <div>
                                <span class="text-secondary">Max Price: </span>
                                <span class="price-range__max">$450</span>
                            </div>
                        </div>
                    </div>
                </div><!-- /.accordion-item -->
            </div><!-- /.accordion -->

            <div class="filter-active-tags pt-2">
                <button class="filter-tag d-inline-flex align-items-center mb-3 me-3 text-uppercase js-filter">
                    <i class="btn-close-xs d-inline-block"></i>
                    <span class="ms-2">Blues</span>
                </button>
                <button class="filter-tag d-inline-flex align-items-center mb-3 me-3 text-uppercase js-filter">
                    <i class="btn-close-xs d-inline-block"></i>
                    <span class="ms-2">Max Price: $493</span>
                </button>
                <button class="filter-tag d-inline-flex align-items-center mb-3 text-uppercase js-filter">
                    <i class="btn-close-xs d-inline-block"></i>
                    <span class="ms-2">Zara</span>
                </button>

                <div>
                    <button class="filter-tag d-flex align-items-center text-uppercase js-filter">
                        <i class="btn-close-xs d-inline-block"></i>
                        <span class="ms-2">RESET FILTER</span>
                    </button>
                </div>
            </div>
        </div><!-- /.aside-content -->
    </div><!-- /.aside-filters aside aside_right overflow-auto -->




    <!-- Cart Drawer -->
    <?php if (isset($_SESSION['dn'])) { ?>
        <div class="aside aside_right overflow-hidden cart-drawer" id="cartDrawer">
            <div class="aside-header d-flex align-items-center">
                <h3 class="text-uppercase fs-6 mb-0">Giỏ hàng ( <span class="cart-amount js-cart-items-count"><?= $soGioHang['so_san_pham'] ?></span> )
                </h3>
                <button class="btn-close-lg js-close-aside btn-close-aside ms-auto"></button>
            </div><!-- /.aside-header -->

            <div class="aside-content cart-drawer-items-list">
                <?php $gia = 0 ?>
                <?php foreach ($showGioHangs as $key => $showGioHang) { ?>
                    <div class="cart-drawer-item d-flex position-relative">
                        <div class="position-relative">
                            <a href="?act=chiTietSanPham&id=<?= $showGioHang['San_pham_id'] ?>">
                                <img loading="lazy" class="cart-drawer-item__img" src="./admin/assets/img/<?= $showGioHang['anh'] ?>" alt="">
                            </a>
                        </div>
                        <div class="cart-drawer-item__info flex-grow-1">
                            <h6 class="cart-drawer-item__title fw-normal"><a href="?act=chiTietSanPham&id=<?= $showGioHang['San_pham_id'] ?>"><?= $showGioHang['Ten_san_pham'] ?></a>
                            </h6>
                            <p class="cart-drawer-item__option text-secondary">Màu: <?= $showGioHang['ten_mau'] ?></p>
                            <p class="cart-drawer-item__option text-secondary">Kích cỡ: <?= $showGioHang['ten_kich_thuoc'] ?></p>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                <div class="qty-control position-relative">
                                    <input type="number" name="quantity" value="<?= $showGioHang['So_luong'] ?>" min="1"
                                        class="qty-control__number border-0 text-center">
                                    <div class="qty-control__reduce text-start">-</div>
                                    <div class="qty-control__increase text-end">+</div>
                                </div><!-- .qty-control -->
                                <span class="cart-drawer-item__price money price"><?= number_format($showGioHang['So_luong'] * $showGioHang['gia_ban'], 0, ',', '.') ?>đ
                                </span>
                            </div>
                        </div>
                        <?php $gia += $showGioHang['So_luong'] * $showGioHang['gia_ban'] ?>
                    </div>

                    <hr class="cart-drawer-divider">
                <?php } ?>

            </div>

            <div class="cart-drawer-actions position-absolute start-0 bottom-0 w-100">
                <hr class="cart-drawer-divider">
                <div class="d-flex justify-content-between">
                    <h6 class="fs-base fw-medium">Tổng:</h6>
                    <span class="cart-drawer-item__price money price"><?= number_format($gia, 0, ',', '.') ?>đ</span>
                </div><!-- /.d-flex justify-content-between -->
                <a href="?act=chiTietGioHang" class="btn btn-light mt-3 d-block">Xem giỏ hàng</a>
                <a href="?act=thanhToan" class="btn btn-primary mt-3 d-block">Thanh toán</a>
            </div><!-- /.aside-content -->
        </div><!-- /.aside -->
    <?php } ?>


    <!-- Go To Top -->
    <div id="scrollTop" class="visually-hidden end-0"></div>

    <!-- Sizeguide -->
    <div class="modal fade" id="sizeGuide" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog size-guide">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Size Guide</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="size-guide__wrapper">
                        <div class="size-guide__image">
                            <img loading="lazy" src="../images/size-guide.jpg" alt="">
                        </div>
                        <div class="size-guide__detail">
                            <h5>JEANS</h5>
                            <table>
                                <thead>
                                    <tr>
                                        <th>SIZE</th>
                                        <th>XS</th>
                                        <th>S</th>
                                        <th>M</th>
                                        <th>L</th>
                                        <th>XL</th>
                                        <th>XXL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>BUST</td>
                                        <td>87</td>
                                        <td>87</td>
                                        <td>87</td>
                                        <td>87</td>
                                        <td>87</td>
                                        <td>87</td>
                                    </tr>
                                    <tr>
                                        <td>WAIST</td>
                                        <td>67</td>
                                        <td>67</td>
                                        <td>67</td>
                                        <td>67</td>
                                        <td>67</td>
                                        <td>67</td>
                                    </tr>
                                    <tr>
                                        <td>HIPS</td>
                                        <td>87</td>
                                        <td>87</td>
                                        <td>87</td>
                                        <td>87</td>
                                        <td>87</td>
                                        <td>87</td>
                                    </tr>
                                </tbody>
                            </table>
                            <h5>FOOTWEAR</h5>
                            <table>
                                <thead>
                                    <tr>
                                        <th>SIZE</th>
                                        <th>XS</th>
                                        <th>S</th>
                                        <th>M</th>
                                        <th>L</th>
                                        <th>XL</th>
                                        <th>XXL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>BUST</td>
                                        <td>87</td>
                                        <td>87</td>
                                        <td>87</td>
                                        <td>87</td>
                                        <td>87</td>
                                        <td>87</td>
                                    </tr>
                                    <tr>
                                        <td>WAIST</td>
                                        <td>67</td>
                                        <td>67</td>
                                        <td>67</td>
                                        <td>67</td>
                                        <td>67</td>
                                        <td>67</td>
                                    </tr>
                                    <tr>
                                        <td>HIPS</td>
                                        <td>87</td>
                                        <td>87</td>
                                        <td>87</td>
                                        <td>87</td>
                                        <td>87</td>
                                        <td>87</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-dialog -->
    </div><!-- /.size-guide position-fixed-->

    <!-- Page Overlay -->
    <div class="page-overlay"></div><!-- /.page-overlay -->


    <!-- External JavaScripts -->
    <script src="./uomo-html.flexkitux.com/Demo4/js/plugins/jquery.min.js"></script>
    <script src="./uomo-html.flexkitux.com/Demo4/js/plugins/bootstrap.bundle.min.js"></script>
    <script src="./uomo-html.flexkitux.com/Demo4/js/plugins/bootstrap-slider.min.js"></script>

    <script src="./uomo-html.flexkitux.com/Demo4/js/plugins/swiper.min.js"></script>
    <script src="./uomo-html.flexkitux.com/Demo4/js/plugins/countdown.js"></script>
    <script src="./uomo-html.flexkitux.com/Demo4/js/plugins/jquery.fancybox.js"></script>

    <!-- Footer Scripts -->
    <script src="./uomo-html.flexkitux.com/Demo4/js/theme.js"></script>

</body>

</html>


<script>
    function showPopup() {
        document.querySelector('.popup-overlay').style.display = 'block';
        document.getElementById('successPopup').style.display = 'block';
    }

    function closePopup() {
        document.querySelector('.popup-overlay').style.display = 'none';
        document.getElementById('successPopup').style.display = 'none';
    }
</script>