<!DOCTYPE html>

<?php 
  if( isset($_SESSION['khuyen_mai']) ){
    unset($_SESSION['khuyen_mai']);
  }
?>
<html dir="ltr" lang="zxx">

<?php require_once 'upload/header.php' ?>

<body>
  <?php require_once 'upload/svg.php' ?>

  <?php require_once 'upload/headerMenu.php' ?>

  <main class="bg-grey-faf9f8">

    <?php require_once 'upload/banner.php' ?>
    <div class="mb-1 pb-4 mb-xl-5 pb-xl-5"></div>

    <?php require_once 'upload/sanPhamNoiBat.php' ?>

    <div class="mb-1 pb-4 mb-xl-5 pb-xl-5"></div>

    <div class="mb-1 pb-4 mb-xl-5 pb-xl-5"></div>

    <?php require_once 'upload/danhGia.php' ?>

    <div class="mb-1 pb-4 mb-xl-5 pb-xl-5"></div>

    <?php require_once 'upload/bosuutap.php' ?>

    <div class="mb-1 pb-4 mb-xl-5 pb-xl-5"></div>

    <?php require_once 'upload/baiViet.php' ?>

  </main>

  <!-- Footer Type 1 with Top block -->
  <?php require_once 'upload/fotter.php' ?>

  <?php require_once 'upload/giohang.php' ?>

  <!-- Sitemap -->
  <?php require_once 'upload/map.php' ?>

  <?php require_once 'upload/quickview.php' ?>

  <!-- Go To Top -->
  <div id="scrollTop" class="visually-hidden end-0"></div>

  <!-- Page Overlay -->
  <div class="page-overlay"></div><!-- /.page-overlay -->

  <?php require_once 'upload/js.php' ?>

  <script>
    function copyToClipboard(button) {
      // Lấy mã khuyến mãi từ thuộc tính data-code
      const textToCopy = button.getAttribute('data-code');

      // Sử dụng Clipboard API để sao chép
      navigator.clipboard.writeText(textToCopy)
        .then(() => {
          // Hiển thị thông báo thành công
          alert("Sao chép thành công mã: " + textToCopy);
        })
        .catch(err => {
          console.error('Không thể sao chép: ', err);
        });
    }


    // Gắn sự kiện click vào nút copy
    document.getElementById('copyButton').addEventListener('click', copyToClipboard);

    const deadline = new Date("2024-12-31T23:59:59").getTime();

    // Hàm cập nhật đồng hồ đếm ngược
    function updateCountdown() {
      const now = new Date().getTime();
      const timeLeft = deadline - now;

      if (timeLeft <= 0) {
        // Khi thời gian kết thúc
        document.getElementById("countdown").innerHTML = "Countdown Ended!";
        clearInterval(interval); // Dừng đồng hồ
        return;
      }

      // Tính toán ngày, giờ, phút, giây còn lại
      const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
      const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

      // Hiển thị kết quả
      document.getElementById("countdown").innerHTML =
        `${days}d ${hours}h ${minutes}m ${seconds}s`;
    }

    // Cập nhật đồng hồ mỗi giây
    const interval = setInterval(updateCountdown, 1000);

    // Gọi ngay lần đầu để hiển thị mà không phải chờ 1 giây
    updateCountdown();
  </script>

</body>

</html>