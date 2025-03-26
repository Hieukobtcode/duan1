<section class="swiper-container js-swiper-slider slideshow h-xs-25rem bg-white"
      data-settings='{
        "autoplay": {
          "delay": 5000
        },
        "navigation": {
          "nextEl": ".slideshow__next",
          "prevEl": ".slideshow__prev"
        },
        "slidesPerView": 1,
        "effect": "fade",
        "loop": true
      }'> 
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="overflow-hidden position-relative h-100">
            <div class="slideshow-character position-absolute bottom-0 pos_right-center">
              <div class="character_bg position-absolute position-center">
                <img loading="lazy" src="./admin/assets/img/<?= $banner1['Duong_dan_anh'] ?>" width="690" height="690" alt="" class="animate animate_fade animate_btt animate_delay-5 w-auto h-auto">
              </div>
              <img loading="lazy" src="./admin/assets/img/<?= $banner2['Duong_dan_anh'] ?>" width="493" height="693" alt="" class="slideshow-character__img animate animate_fade animate_btt animate_delay-9 w-auto h-auto">
            </div>
            <div class="slideshow-text container position-absolute start-50 top-50 translate-middle">
              <h2 class="h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">The Classics</h2>
              <p class="fs-6 mb-4 pb-2 animate animate_fade animate_btt animate_delay-5">An exclusive selection of this season's trends.</p>
              <a href="shop1.html" class="btn-link btn-link_lg default-underline text-uppercase fw-medium animate animate_fade animate_btt animate_delay-7">Discover Now</a>
            </div>
          </div>
        </div><!-- /.slideshow-item -->

        <div class="swiper-slide">
          <div class="overflow-hidden position-relative h-100">
            <div class="slideshow-character position-absolute bottom-0 pos_right-center">
              <div class="character_bg position-absolute position-center">
                <img loading="lazy" src="./admin/assets/img/<?= $banner1['Duong_dan_anh'] ?>" width="560" height="560" alt="" class="animate animate_fade animate_btt animate_delay-5 w-auto h-auto">
              </div>
              <img loading="lazy" src="./admin/assets/img/<?= $banner3['Duong_dan_anh'] ?>" width="490" height="690" alt="" class="slideshow-character__img animate animate_fade animate_btt animate_delay-9 w-auto h-auto">
            </div>
            <div class="slideshow-text container position-absolute start-50 top-50 translate-middle">
              <h2 class="h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">Women Collection</h2>
              <p class="fs-6 mb-4 pb-2 animate animate_fade animate_btt animate_delay-5">An exclusive selection of this season's trends.</p>
              <a href="shop1.html" class="btn-link btn-link_lg default-underline text-uppercase fw-medium animate animate_fade animate_btt animate_delay-7">Discover Now</a>
            </div>
          </div>
        </div><!-- /.slideshow-item -->

        <div class="swiper-slide">
          <div class="overflow-hidden position-relative h-100">
            <div class="slideshow-character position-absolute bottom-0 pos_right-center">
              <div class="character_bg position-absolute position-center">
                <img loading="lazy" src="./admin/assets/img/<?= $banner1['Duong_dan_anh'] ?>" width="690" height="690" alt="" class="animate animate_fade animate_btt animate_delay-5 w-auto h-auto">
              </div>
              <img loading="lazy" src="./admin/assets/img/<?= $banner4z['Duong_dan_anh'] ?>" alt="" width="675" height="733" class="slideshow-character__img animate animate_fade animate_btt animate_delay-9 w-auto h-auto">
            </div>
            <div class="slideshow-text container position-absolute start-50 top-50 translate-middle">
              <h2 class="h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">New Arrival</h2>
              <p class="fs-6 mb-4 pb-2 animate animate_fade animate_btt animate_delay-5">An exclusive selection of this season's trends.</p>
              <a href="shop1.html" class="btn-link btn-link_lg default-underline text-uppercase fw-medium animate animate_fade animate_btt animate_delay-7">Discover Now</a>
            </div>
          </div>
        </div><!-- /.slideshow-item -->
      </div><!-- /.slideshow-wrapper js-swiper-slider -->

      <div class="container">
        <div class="slideshow-navigation d-flex align-items-center position-absolute bottom-0 mb-5">
          <div class="slideshow__prev border-0">
            PREV
          </div><!-- /.products-carousel__prev -->
          <div class="slideshow__next border-0">
            NEXT
          </div><!-- /.products-carousel__next -->
        </div>
        <!-- /.products-pagination -->
      </div><!-- /.container -->

      <div class="slideshow-social-follow d-none d-xxl-block position-absolute top-50 end-0 translate-middle-y text-center mx-4">
        <ul class="social-links list-unstyled mb-0 text-secondary">
          <li>
            <a href="#" class="footer__social-link d-block">
              <svg class="svg-icon svg-icon_facebook" width="9" height="15" viewBox="0 0 9 15" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_facebook" />
              </svg>
            </a>
          </li>
          <li>
            <a href="https://twitter.com/" class="footer__social-link d-block">
              <svg class="svg-icon svg-icon_twitter" width="14" height="13" viewBox="0 0 14 13" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_twitter" />
              </svg>
            </a>
          </li>
          <li>
            <a href="https://www.instagram.com/" class="footer__social-link d-block">
              <svg class="svg-icon svg-icon_instagram" width="14" height="13" viewBox="0 0 14 13" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_instagram" />
              </svg>
            </a>
          </li>
          <li>
            <a href="https://www.pinterest.com/" class="footer__social-link d-block">
              <svg class="svg-icon svg-icon_pinterest" width="14" height="15" viewBox="0 0 14 15" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_pinterest" />
              </svg>
            </a>
          </li>
        </ul><!-- /.social-links list-unstyled mb-0 text-secondary -->
        <span class="slideshow-social-follow__title d-block mt-5 text-uppercase fw-medium text-secondary">Follow Us</span>
      </div><!-- /.slideshow-social-follow -->
    </section><!-- /.slideshow -->
