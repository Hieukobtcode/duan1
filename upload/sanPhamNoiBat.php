    <section class="products-carousel container">
        <div class="success" id="successMessage" style="display: none;">
            <div class="success__icon">
                <svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" d="m12 1c-6.075 0-11 4.925-11 11s4.925 11 11 11 11-4.925 11-11-4.925-11-11-11zm4.768 9.14c.0878-.1004.1546-.21726.1966-.34383.0419-.12657.0581-.26026.0477-.39319-.0105-.13293-.0475-.26242-.1087-.38085-.0613-.11844-.1456-.22342-.2481-.30879-.1024-.08536-.2209-.14938-.3484-.18828s-.2616-.0519-.3942-.03823c-.1327.01366-.2612.05372-.3782.1178-.1169.06409-.2198.15091-.3027.25537l-4.3 5.159-2.225-2.226c-.1886-.1822-.4412-.283-.7034-.2807s-.51301.1075-.69842.2929-.29058.4362-.29285.6984c-.00228.2622.09851.5148.28067.7034l3 3c.0983.0982.2159.1748.3454.2251.1295.0502.2681.0729.4069.0665.1387-.0063.2747-.0414.3991-.1032.1244-.0617.2347-.1487.3236-.2554z" fill="#393a37" fill-rule="evenodd"></path>
                </svg>
            </div>
            <div class="success__title">Đã sao chép</div>
            <div class="success__close">
                <svg height="20" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                    <path d="m15.8333 5.34166-1.175-1.175-4.6583 4.65834-4.65833-4.65834-1.175 1.175 4.65833 4.65834-4.65833 4.6583 1.175 1.175 4.65833-4.6583 4.6583 4.6583 1.175-1.175-4.6583-4.6583z" fill="#393a37"></path>
                </svg>
            </div>
        </div>

        <h2 class="section-title fw-normal mb-1 mb-md-3 pb-xl-3 mb-xl-4">Sản phẩm nổi bật</h2>
        <div class="tab-content pt-2" id="collections-tab-content">

            <div class="tab-pane fade show active" id="collections-tab-1" role="tabpanel" aria-labelledby="collections-tab-1-trigger">
                <div class="container"> <!-- Thêm container để căn giữa nội dung -->
                    <div class="row g-4"> <!-- Thêm g-4 để tạo khoảng cách giữa các cột -->
                        <?php foreach ($sanPhams as $key => $sanPham) { ?>
                            <?php $anhs = $this->trangChuModel->anhSanPham($sanPham['Id'])->fetchAll(); ?>
                            <div class="col-6 col-md-4 col-lg-2">
                                <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                                    <div class="pc__img-wrapper">
                                        <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
                                            <div class="swiper-wrapper">
                                                <?php foreach ($anhs as $key => $anh) { ?>
                                                    <div class="swiper-slide">
                                                        <a href="?act=chiTietSanPham&id=<?= $sanPham['Id'] ?>"><img loading="lazy" src="./admin/assets/img/<?= $anh['anh'] ?>" width="258" height="313" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                                                    </div>
                                                <?php } ?>
                                            </div>

                                            <div class="anim_appear-bottom position-absolute w-100 text-center mb-3">
                                                <a href="?act=chiTietSanPham&id=<?= $sanPham['Id'] ?>">
                                                    <button class="btn btn-round btn-hover-red border-0 text-uppercase me-1 me-md-2 js-quick-view" data-bs-toggle="modal" data-bs-target="#quickView" title="Quick view">
                                                        <svg class="d-inline-block" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                                            <use href="#icon_view" />
                                                        </svg>
                                                    </button>
                                                </a>
                                                <?php if (isset($_SESSION['dn'])) { ?>
                                                    <button onclick="themSanPhamYeuThich(<?= $sanPham['Id'] ?>)"
                                                        class="btn btn-round btn-hover-red border-0 text-uppercase js-add-wishlist"
                                                        title="Add To Wishlist">
                                                        <svg width="14" height="14" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <use href="#icon_heart" />
                                                        </svg>
                                                    </button>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pc__info position-relative">
                                        <p class="pc__category"><?= $sanPham['mo_ta'] ?></p>
                                        <h6 class="pc__title"><a href="product1_simple.html"><?= $sanPham['Ten_san_pham'] ?></a></h6>
                                        <div class="product-card__price d-flex">
                                            <span class="money price"><?= number_format($sanPham['gia_ban'], 0, ',', '.') . ' ₫' ?></span>
                                        </div>
                                        <div class="d-flex align-items-center mt-1">
                                            <?php
                                            $mauSacs = $this->trangChuModel->mau_sac($sanPham['Id']);
                                            foreach ($mauSacs as $key => $mauSac) { ?>
                                                <a href="#" class="swatch-color pc__swatch-color" style="color: <?= $mauSac['ma_mau'] ?>"></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div><!-- /.tab-pane fade show-->

        </div><!-- /.tab-content pt-2 -->
    </section><!-- /.products-grid -->

    <style>
        /* From Uiverse.io by andrew-demchenk0 */
        .success {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            width: 187px;
            padding: 12px;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: start;
            background: #EDFBD8;
            border-radius: 8px;
            box-shadow: 0px 0px 5px -3px #111;
        }

        .success__icon {
            width: 20px;
            height: 20px;
            transform: translateY(-2px);
            margin-right: 8px;
        }

        .success__icon path {
            fill: #84D65A;
        }

        .success__title {
            font-weight: 500;
            font-size: 14px;
            color: #2B641E;
        }

        .success__close {
            width: 20px;
            height: 20px;
            cursor: pointer;
            margin-left: auto;
        }

        .success__close path {
            fill: #2B641E;
        }

        .card {
            width: 190px;
            height: 280px;
            background: #f5f5f5;
            padding: 15px;
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s;
            position: relative;
        }

        .wrapper {
            height: fit-content;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }

        .card-image {
            width: 100%;
            height: 170px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 5em;
            font-weight: 900;
            transition: all 0.3s;
        }

        .content {
            height: fit-content;
            display: flex;
            align-items: flex-start;
            justify-content: center;
        }

        .title {
            font-size: 15px;
            text-transform: uppercase;
            font-weight: 400;
            color: #4d4d4d;
        }

        .price {
            font-size: 1em;
            font-weight: 700;
        }

        .old-price {
            font-size: 0.7em;
            text-decoration: line-through;
            color: #adadad;
        }

        .card-btn {
            margin-top: 10px;
            width: 100%;
            height: 40px;
            background-color: rgb(24, 24, 24);
            border: none;
            border-radius: 40px;
            color: white;
            transition: all 0.3s;
            cursor: pointer;
            font-weight: 500;
        }

        .card:hover .card-image {
            height: 120px;
        }

        .card:hover .card-btn {
            margin-top: 0;
        }

        .card-btn:hover {
            background-color: greenyellow;
            color: rgb(35, 35, 35);
        }

        .card:hover {
            background-color: white;
        }

        .tag {
            position: absolute;
            background-color: greenyellow;
            color: rgb(0, 0, 0);
            left: 12px;
            top: 12px;
            padding: 6px 12px;
            border-radius: 15px;
            font-size: 0.75em;
            font-weight: 500;
        }
    </style>
    <script>
        function themSanPhamYeuThich(sanPhamId) {
            console.log("Đang gửi ID sản phẩm:", sanPhamId); // Log để kiểm tra ID
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "?act=themSPYeuThich", true); // Gửi yêu cầu tới act=themSPYeuThich
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log("Phản hồi từ server:", xhr.responseText); // Log phản hồi server
                    if (xhr.responseText.trim() === "success") {
                        alert("Thêm sản phẩm yêu thích thành công!");
                    } else if (xhr.responseText.trim() === "exists") {
                        alert("Sản phẩm đã có trong danh sách yêu thích.");
                    } else {
                        alert("Đã thêm sản phẩm!");
                    }
                }
            };
            xhr.send("sanPhamId=" + sanPhamId); // Gửi ID sản phẩm tới server
        }
    </script>