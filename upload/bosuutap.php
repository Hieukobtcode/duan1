<section class="products-carousel container">
  <h2 class="section-title text-center fw-normal mb-1 mb-md-3 pb-xl-3 mb-xl-4">Sản phẩm mới nhất</h2>

  <div class="position-relative">
    <div class="swiper-container js-swiper-slider"
      data-settings='{
            "autoplay": {
              "delay": 5000
            },
            "slidesPerView": 4,
            "slidesPerGroup": 4,
            "effect": "none",
            "loop": false,
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
                "slidesPerGroup": 1,
                "spaceBetween": 30,
                "pagination": false
              }
            }
          }'>
      <div class="swiper-wrapper">

        <?php foreach ($boSuuTaps as $key => $BoSuuTap) { ?>
          <?php $anhs = $this->trangChuModel->anhSanPham($BoSuuTap['Id'])->fetchAll(); ?>
          <div class="swiper-slide product-card">
            <div class="pc__img-wrapper">
              <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
                <div class="swiper-wrapper">
                  <?php foreach ($anhs as $key => $anh) { ?>
                    <div class="swiper-slide">
                      <a href="?act=chiTietSanPham&id=<?= $BoSuuTap['Id'] ?>"><img loading="lazy" src="./admin/assets/img/<?= $anh['anh'] ?>" width="258" height="313" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                  <?php } ?>
                </div>

                <div class="anim_appear-bottom position-absolute w-100 text-center mb-3">
                  <button class="btn btn-round btn-hover-red border-0 text-uppercase me-1 me-md-2 js-add-cart js-open-aside" data-aside="cartDrawer" title="Add To Cart">
                    <svg class="d-inline-block" width="14" height="14" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_cart" />
                    </svg>
                  </button>
                  <a href="?act=chiTietSanPham&id=<?= $BoSuuTap['Id'] ?>">
                    <button class="btn btn-round btn-hover-red border-0 text-uppercase me-1 me-md-2 js-quick-view" data-bs-toggle="modal" data-bs-target="#quickView" title="Quick view">
                      <svg class="d-inline-block" width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_view" />
                      </svg>
                    </button>
                  </a>
                  <button class="btn btn-round btn-hover-red border-0 text-uppercase js-add-wishlist" title="Add To Wishlist">
                    <svg width="14" height="14" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_heart" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
            <div class="pc__info position-relative">
              <p class="pc__category"><?= $BoSuuTap['mo_ta'] ?></p>
              <h6 class="pc__title"><a href="product1_simple.html"><?= $BoSuuTap['Ten_san_pham'] ?></a></h6>
              <div class="product-card__price d-flex">
                <span class="money price"><?= number_format($BoSuuTap['gia_ban'], 0, ',', '.') . ' ₫' ?></span>
              </div>
              <div class="d-flex align-items-center mt-1">
                <?php
                $mauSacs = $this->trangChuModel->mau_sac($BoSuuTap['Id']);
                foreach ($mauSacs as $key => $mauSac) { ?>
                  <a href="#" class="swatch-color pc__swatch-color" style="color: <?= $mauSac['ma_mau'] ?>"></a>
                <?php } ?>
              </div>
            </div>
          </div>
        <?php } ?>
      </div><!-- /.swiper-wrapper -->
    </div><!-- /.swiper-container js-swiper-slider -->
  </div><!-- /.position-relative -->
  
  <h2 class="section-title fw-normal mb-1 mb-md-3 pb-xl-3 mb-xl-4 mt-5">Ưu đãi nổi bật</h2>


  <div class="tab-content pt-2" id="collections-tab-content">

    <div class="tab-pane fade show active" id="collections-tab-1" role="tabpanel" aria-labelledby="collections-tab-1-trigger">

      <div class="container">

        <div class="row g-4">

          <?php foreach ($khuyenMais as $key => $khuyenMai) { ?>
            <?php if ($khuyenMai['Trang_thai'] == 'Active') { ?>
              <div class="col-6 col-md-4 col-lg-2">
                <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                  <div class="card">
                    <div class="wrapper">
                      <div class="card-image"><img width="100px" src="assets/img/sale.png" alt=""></div>
                      <div class="content">

                        <p class="title"><?= $khuyenMai['mo_ta'] ?></p>
                        <p hidden class="title price" id="textToCopy"><?= $khuyenMai['Ma_khuyen_mai'] ?></p>
                      </div>
                      <button onclick="copyToClipboard(this)" class="card-btn" data-code="<?= $khuyenMai['Ma_khuyen_mai'] ?>">Sao chép</button>
                      </div>
                    <?php if ($khuyenMai['Loai_giam_gia'] == 'percent') { ?>
                      <p class="tag">-<?= $khuyenMai['Gia_tri_giam_gia'] ?>%</p>
                    <?php } elseif ($khuyenMai['Loai_giam_gia'] == 'amount') { ?>
                      <p class="tag">-<?= number_format($khuyenMai['Gia_tri_giam_gia'], 0, ',', '.') . " đ" ?></p>
                    <?php } else { ?>
                      <p class="tag">Free ship</p>
                    <?php } ?>
                  </div>
                </div>


              </div>
            <?php } ?>

          <?php } ?>

        </div>

      </div>
    </div><!-- /.tab-pane fade show-->

  </div><!-- /.tab-content pt-2 -->
</section><!-- /.products-carousel container -->