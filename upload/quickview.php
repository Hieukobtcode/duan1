  <!-- Quick View -->
  <div class="modal fade" id="quickView" tabindex="-1">
    <div class="modal-dialog quick-view modal-dialog-centered">
      <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="product-single">
          <div class="product-single__media m-0">
            <div class="product-single__image position-relative w-100">
              <div class="swiper-container js-swiper-slider"
                data-settings='{
                  "slidesPerView": 1,
                  "slidesPerGroup": 1,
                  "effect": "none",
                  "loop": false,
                  "navigation": {
                    "nextEl": ".modal-dialog.quick-view .product-single__media .swiper-button-next",
                    "prevEl": ".modal-dialog.quick-view .product-single__media .swiper-button-prev"
                  }
                }'>
                <div class="swiper-wrapper">
                  <div class="swiper-slide product-single__image-item">
                    <img loading="lazy" src="../images/products/quickview_1.jpg" alt="">
                  </div>
                  <div class="swiper-slide product-single__image-item">
                    <img loading="lazy" src="../images/products/quickview_2.jpg" alt="">
                  </div>
                  <div class="swiper-slide product-single__image-item">
                    <img loading="lazy" src="../images/products/quickview_3.jpg" alt="">
                  </div>
                  <div class="swiper-slide product-single__image-item">
                    <img loading="lazy" src="../images/products/quickview_4.jpg" alt="">
                  </div>
                </div>
                <div class="swiper-button-prev"><svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_prev_sm" />
                  </svg></div>
                <div class="swiper-button-next"><svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_next_sm" />
                  </svg></div>
              </div>
            </div>
          </div>
          <div class="product-single__detail">
            <h1 class="product-single__name">Lightweight Puffer Jacket With a Hood</h1>
            <div class="product-single__price">
              <span class="current-price">$449</span>
            </div>
            <div class="product-single__short-desc">
              <p>Phasellus sed volutpat orci. Fusce eget lore mauris vehicula elementum gravida nec dui. Aenean aliquam varius ipsum, non ultricies tellus sodales eu. Donec dignissim viverra nunc, ut aliquet magna posuere eget.</p>
            </div>
            <form name="addtocart-form" method="post">
              <div class="product-single__swatches">
                <div class="product-swatch text-swatches">
                  <label>Sizes</label>
                  <div class="swatch-list">
                    <input type="radio" name="size" id="swatch-1">
                    <label class="swatch js-swatch" for="swatch-1" aria-label="Extra Small" data-bs-toggle="tooltip" data-bs-placement="top" title="Extra Small">XS</label>
                    <input type="radio" name="size" id="swatch-2" checked>
                    <label class="swatch js-swatch" for="swatch-2" aria-label="Small" data-bs-toggle="tooltip" data-bs-placement="top" title="Small">S</label>
                    <input type="radio" name="size" id="swatch-3">
                    <label class="swatch js-swatch" for="swatch-3" aria-label="Middle" data-bs-toggle="tooltip" data-bs-placement="top" title="Middle">M</label>
                    <input type="radio" name="size" id="swatch-4">
                    <label class="swatch js-swatch" for="swatch-4" aria-label="Large" data-bs-toggle="tooltip" data-bs-placement="top" title="Large">L</label>
                    <input type="radio" name="size" id="swatch-5">
                    <label class="swatch js-swatch" for="swatch-5" aria-label="Extra Large" data-bs-toggle="tooltip" data-bs-placement="top" title="Extra Large">XL</label>
                  </div>
                  <a href="#" class="sizeguide-link" data-bs-toggle="modal" data-bs-target="#sizeGuide">Size Guide</a>
                </div>
                <div class="product-swatch color-swatches">
                  <label>Color</label>
                  <div class="swatch-list">
                    <input type="radio" name="color" id="swatch-11">
                    <label class="swatch swatch-color js-swatch" for="swatch-11" aria-label="Black" data-bs-toggle="tooltip" data-bs-placement="top" title="Black" style="color: #222"></label>
                    <input type="radio" name="color" id="swatch-12" checked>
                    <label class="swatch swatch-color js-swatch" for="swatch-12" aria-label="Red" data-bs-toggle="tooltip" data-bs-placement="top" title="Red" style="color: #C93A3E"></label>
                    <input type="radio" name="color" id="swatch-13">
                    <label class="swatch swatch-color js-swatch" for="swatch-13" aria-label="Grey" data-bs-toggle="tooltip" data-bs-placement="top" title="Grey" style="color: #E4E4E4"></label>
                  </div>
                </div>
              </div>
              <div class="product-single__addtocart">
                <div class="qty-control position-relative">
                  <input type="number" name="quantity" value="1" min="1" class="qty-control__number text-center">
                  <div class="qty-control__reduce">-</div>
                  <div class="qty-control__increase">+</div>
                </div><!-- .qty-control -->
                <button type="submit" class="btn btn-primary btn-addtocart js-open-aside" data-aside="cartDrawer">Add to Cart</button>
              </div>
            </form>
            <div class="product-single__addtolinks">
              <a href="#" class="menu-link menu-link_us-s add-to-wishlist"><svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_heart" />
                </svg><span>Add to Wishlist</span></a>
              <share-button class="share-button">
                <button class="menu-link menu-link_us-s to-share border-0 bg-transparent d-flex align-items-center">
                  <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_sharing" />
                  </svg>
                </button>
                <details id="Details-share-template__main" class="m-1 xl:m-1.5" hidden="">
                  <summary class="btn-solid m-1 xl:m-1.5 pt-3.5 pb-3 px-5">+</summary>
                  <div id="Article-share-template__main" class="share-button__fallback flex items-center absolute top-full left-0 w-full px-2 py-4 bg-container shadow-theme border-t z-10">
                    <div class="field grow mr-4">
                      <label class="field__label sr-only" for="url">Link</label>
                      <input type="text" class="field__input w-full" id="url" value="https://uomo-crystal.myshopify.com/blogs/news/go-to-wellness-tips-for-mental-health" placeholder="Link" onclick="this.select();" readonly="">
                    </div>
                    <button class="share-button__copy no-js-hidden">
                      <svg class="icon icon-clipboard inline-block mr-1" width="11" height="13" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" viewBox="0 0 11 13">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2 1a1 1 0 011-1h7a1 1 0 011 1v9a1 1 0 01-1 1V1H2zM1 2a1 1 0 00-1 1v9a1 1 0 001 1h7a1 1 0 001-1V3a1 1 0 00-1-1H1zm0 10V3h7v9H1z" fill="currentColor"></path>
                      </svg>
                      <span class="sr-only">Copy link</span>
                    </button>
                  </div>
                </details>
              </share-button>
              <script src="./uomo-html.flexkitux.com/Demo4/js/details-disclosure.js" defer="defer"></script>
              <script src="./uomo-html.flexkitux.com/Demo4/js/share.js" defer="defer"></script>
            </div>
            <div class="product-single__meta-info mb-0">
              <div class="meta-item">
                <label>SKU:</label>
                <span>N/A</span>
              </div>
              <div class="meta-item">
                <label>Categories:</label>
                <span>Casual & Urban Wear, Jackets, Men</span>
              </div>
              <div class="meta-item">
                <label>Tags:</label>
                <span>biker, black, bomber, leather</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.modal-dialog -->
  </div><!-- /.quickview position-fixed -->
