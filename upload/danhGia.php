<section class="testimonials bg-white">
    <div class="container">
        <div class="mb-1 pb-4 mb-xl-5 pb-xl-5"></div>
        <h2 class="section-title text-center fw-normal mb-1 mb-md-3 pb-xl-3 mb-xl-4">Đánh giá của khách hàng</h2>

        <div class="position-relative">
            <div class="swiper-container js-swiper-slider"
                data-settings='{
                "autoplay": {
                  "delay": 5000
                },
                "slidesPerView": 1,
                "slidesPerGroup": 1,
                "effect": "none",
                "loop": true,
                "pagination": {
                  "el": ".testimonial-pagination",
                  "type": "bullets",
                  "clickable": true
                },
                "navigation": {
                  "nextEl": ".testimonial-carousel__next",
                  "prevEl": ".testimonial-carousel__prev"
                }
              }'>
                <div class="swiper-wrapper testimonials__wrapper">
                    <?php foreach ($danhGias as $key => $danhGia) { ?>
                        <div class="swiper-slide testimonials__item mb-4 text-center">
                            <div class="w-740 mx-auto">
                                <h5 class="fw-normal lh-2rem mb-4">“<?= $danhGia['Noi_dung'] ?>“</h5>
                                <p class="text-secondary mb-3"><?= $danhGia['Thoi_gian_tao'] ?></p>
                                <div class="border-circle overflow-hidden w-100px h-100px mx-auto">
                                <img src="assets/img/<?= $danhGia['Anh_dai_dien'] ?>"
                                                         alt="User avatar"
                                                         onerror="this.onerror=null; this.src='https://icon-library.com/images/icon-user/icon-user-15.jpg'" width="70%">
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>

            <div class="products-carousel__prev testimonial-carousel__prev position-absolute top-50 d-flex align-items-center justify-content-center">
                <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_prev_md" />
                </svg>
            </div>

            <div class="products-carousel__next testimonial-carousel__next position-absolute top-50 d-flex align-items-center justify-content-center">
                <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_next_md" />
                </svg>
            </div>

            <div class="testimonial-pagination type2 mt-4 d-flex align-items-center justify-content-center"></div>

        </div>

        <div class="mt-1 pt-4 mt-xl-5 pt-xl-5"></div>
    </div>
</section>