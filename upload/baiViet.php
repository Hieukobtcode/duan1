<section class="blog-carousel bg-yellow">
  <div class="container">
    <div class="mb-1 pb-4 mb-xl-5 pb-xl-5"></div>

    <h2 class="section-title text-center fw-normal mb-1 mb-md-3 pb-xl-3 mb-xl-4">Bài viết mới nhất</h2>

    <div class="position-relative">
      <div class="swiper-container js-swiper-slider"
        data-settings='{
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": 4,
              "slidesPerGroup": 1,
              "effect": "none",
              "loop": true,
              "pagination": {
                "el": ".blog-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "slidesPerGroup": 1,
                  "spaceBetween": 14
                },
                "768": {
                  "slidesPerView": 2,
                  "slidesPerGroup": 2,
                  "spaceBetween": 20
                },
                "992": {
                  "slidesPerView": 3,
                  "slidesPerGroup": 1,
                  "spaceBetween": 24
                },
                "1200": {
                  "slidesPerView": 4,
                  "slidesPerGroup": 1,
                  "spaceBetween": 30
                }
              }
            }'>

        <div class="swiper-wrapper blog-grid row-cols-xl-3">

          <?php foreach ($baiViets as $key => $baiVBiet) { ?>
            <?php if ($baiVBiet['Trang_thai'] == 'Published') { ?>
              <div class="swiper-slide blog-grid__item bg-white">
                <div class="blog-grid__item-image">
                  <img loading="lazy" class="h-auto" src="./admin/assets/img/<?= $baiVBiet['img'] ?>" width="330px" height="220px" alt="">
                </div>
                <div class="blog-grid__item-detail text-center px-3 px-xl-5 pb-4">
                  <div class="blog-grid__item-meta justify-content-center">
                    <span class="blog-grid__item-meta__author">By Hieukobtcode</span>
                    <span class="blog-grid__item-meta__date"><?= $baiVBiet['Thoi_gian_tao'] ?></span>
                  </div>
                  <div class="blog-grid__item-title mb-0">
                    <a href="?act=chiTietBaiViet&id=<?= $baiVBiet['Id'] ?>"><?= $baiVBiet['Tieu_de'] ?></a>
                  </div>
                </div>
              </div>
            <?php } ?>
          <?php } ?>

        </div><!-- /.swiper-wrapper -->
      </div><!-- /.swiper-container js-swiper-slider -->

      <div class="blog-pagination type2 mt-4 d-flex align-items-center justify-content-center"></div>
      <!-- /.products-pagination -->
    </div><!-- /.position-relative -->

    <div class="mt-1 pt-4 mt-xl-5 pt-xl-5"></div>
  </div>
</section>