<!DOCTYPE html>
<html dir="ltr" lang="zxx">

<?php require_once 'upload/header.php' ?>

<body>
  <?php require_once 'upload/headerMenu2.php' ?>

  <main>
    <div class="mb-4 pb-4"></div>
    <section class="login-register container">
      <h2 class="d-none">Đăng nhập và đăng ký</h2>
      <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link nav-link_underscore active" id="login-tab" data-bs-toggle="tab" href="#tab-item-login" role="tab" aria-controls="tab-item-login" aria-selected="true">Đăng nhập</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link nav-link_underscore" id="register-tab" data-bs-toggle="tab" href="#tab-item-register" role="tab" aria-controls="tab-item-register" aria-selected="false">Đăng Ký</a>
        </li>
      </ul>
      <div class="tab-content pt-2" id="login_register_tab_content">
        <div class="tab-pane fade show active" id="tab-item-login" role="tabpanel" aria-labelledby="login-tab">
          <div class="login-form">
            <form method="POST" class="needs-validation" novalidate>
              <div class="form-floating mb-3">
                <input name="Email" type="text" class="form-control form-control_gray" id="customerNameEmailInput1" placeholder="Email address *" required>
                <label for="customerNameEmailInput1">Email *</label>
              </div>

              <div class="pb-3"></div>

              <div class="form-floating mb-3">
                <input name="Mat_khau" type="password" class="form-control form-control_gray" id="customerPasswodInput" placeholder="Password *" required>
                <label for="customerPasswodInput">Password *</label>
              </div>

              <div class="d-flex align-items-center mb-3 pb-2">
                <div class="form-check mb-0">
                  <input name="remember" class="form-check-input form-check-input_fill" type="checkbox" value="" id="flexCheckDefault1">
                  <label class="form-check-label text-secondary" for="flexCheckDefault1">Ghi nhớ mật khẩu</label>
                </div>
                <a href="./reset_password.html" class="btn-text ms-auto">Quên mật khẩu?</a>
              </div>

              <button class="c-button c-button--gooey" name="btn_login">
                Đăng nhập
                <div class="c-button__blobs">
                  <div></div>
                  <div></div>
                  <div></div>
                </div>
              </button>

              <svg xmlns="http://www.w3.org/2000/svg" version="1.1" style="display: block; height: 0; width: 0;">
                <defs>
                  <filter id="goo">
                    <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur"></feGaussianBlur>
                    <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo"></feColorMatrix>
                    <feBlend in="SourceGraphic" in2="goo"></feBlend>
                  </filter>
                </defs>
              </svg>





              <div class="customer-option mt-4 text-center">
                <span class="text-secondary">Chưa có tài khoản?</span>
                <a href="#register-tab" class="btn-text js-show-register">Tạo tài khoản</a>
              </div>
            </form>
          </div>
        </div>
        <div class="tab-pane fade" id="tab-item-register" role="tabpanel" aria-labelledby="register-tab">
          <div class="register-form">
            <form method="POST" class="needs-validation" novalidate>
              <div class="form-floating mb-3">
                <input name="Ten_dang_nhap" type="text" class="form-control form-control_gray" id="customerNameRegisterInput" placeholder="Username" required>
                <label for="customerNameRegisterInput">Tên đăng nhập</label>
              </div>
              <div class="pb-3"></div>

              <div class="form-floating mb-3">
                <input name="Email" type="email" class="form-control form-control_gray" id="customerEmailRegisterInput" placeholder="Email address *" required>
                <label for="customerEmailRegisterInput">Email *</label>
              </div>

              <div class="pb-3"></div>

              <div class="form-floating mb-3">
                <input name="Mat_khau" type="password" class="form-control form-control_gray" id="customerPasswodRegisterInput" placeholder="Password *" required>
                <label for="customerPasswodRegisterInput">Password *</label>
              </div>

              <div class="pb-3"></div>

              <div class="form-floating mb-3">
                <input name="So_dien_thoai" type="password" class="form-control form-control_gray" id="customerPasswodRegisterInput" placeholder="Password *" required>
                <label for="customerPasswodRegisterInput">Số điện thoại *</label>
              </div>

              <button class="c-button c-button--gooey" name="btn_register">
                Đăng ký
                <div class="c-button__blobs">
                  <div></div>
                  <div></div>
                  <div></div>
                </div>
              </button>

              <svg xmlns="http://www.w3.org/2000/svg" version="1.1" style="display: block; height: 0; width: 0;">
                <defs>
                  <filter id="goo">
                    <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur"></feGaussianBlur>
                    <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo"></feColorMatrix>
                    <feBlend in="SourceGraphic" in2="goo"></feBlend>
                  </filter>
                </defs>
              </svg>

            </form>
          </div>
        </div>
      </div>
    </section>
  </main>

  <div class="mb-5 pb-xl-5"></div>



  <?php require_once 'upload/fotter.php' ?>

  <!-- Go To Top -->
  <div id="scrollTop" class="visually-hidden end-0"></div>

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

<style>
  .c-button {
    color: black;
    font-weight: bold;
    font-size: 15px;
    text-decoration: none;
    padding: 1em 2em;
    cursor: pointer;
    position: relative;
    z-index: 1;
    background-color: #06c8d9;
    border: none;
  }

  .c-button--gooey {
    color: white;
    text-transform: uppercase;
    letter-spacing: 2px;
    border-radius: 0;
    position: relative;
    transition: all 700ms ease;
  }

  .c-button--gooey .c-button__blobs {
    height: 100%;
    filter: url(#goo);
    overflow: hidden;
    position: absolute;
    top: 0;
    left: 0;
    bottom: -3px;
    right: -1px;
    z-index: -1;
  }

  .c-button--gooey .c-button__blobs div {
    background-color: #fff;
    width: 20%;
    height: 100%;
    border-radius: 100%;
    position: absolute;
    transform: scale(1.4) translateY(-125%) translateZ(0);
    transition: all 700ms ease;
  }

  .c-button--gooey .c-button__blobs div:nth-child(1) {
    left: -5%;
  }

  .c-button--gooey .c-button__blobs div:nth-child(2) {
    left: 30%;
    transition-delay: 60ms;
  }

  .c-button--gooey .c-button__blobs div:nth-child(3) {
    left: 66%;
    transition-delay: 25ms;
  }

  /* Hover styles */
  .c-button--gooey:hover {
    color: #06c8d9;
    background-color: #ffffff;
  }

  .c-button--gooey:hover .c-button__blobs div {
    transform: scale(1.4) translateY(0) translateZ(0);
  }
</style>