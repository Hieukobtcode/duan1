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

                        <button class="btn-close-xs position-absolute top-0 end-0 js-cart-item-remove"></button>
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
