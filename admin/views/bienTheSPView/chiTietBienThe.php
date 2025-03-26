<?php require 'views/layout/header.php'; ?>
<?php require 'views/layout/navbar.php'; ?>
<?php require 'views/layout/sidebar.php'; ?>

<style>
  img {
    width: 50px;
    height: 60px;
  }

  /* Kiểu dáng cho card chứa đánh giá */
  .card {
    border-radius: 10px;
    /* Bo góc cho card */
    overflow: hidden;
    /* Ẩn phần vượt ra ngoài card */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    /* Thêm hiệu ứng đổ bóng */
    transition: transform 0.3s ease-in-out;
    /* Thêm hiệu ứng khi hover */
  }



  /* Kiểu dáng cho phần header của card */
  .card-header {
    background-color: #f39c12;
    /* Màu nền vàng cho phần header */
    color: white;
    /* Màu chữ trắng */
    font-weight: bold;
    /* Chữ đậm */
    font-size: 1.2rem;
    /* Cỡ chữ to hơn */
    text-transform: uppercase;
    /* Viết hoa tất cả chữ */
    padding: 10px 15px;
    /* Padding cho phần header */
  }

  /* Kiểu dáng cho các item trong danh sách đánh giá */
  .list-group-item {
    padding: 15px;
    /* Padding cho mỗi mục trong danh sách */
    border: none;
    /* Xóa viền */
    background-color: #fff;
    /* Màu nền trắng */
    display: flex;
    /* Dùng Flexbox để căn chỉnh */
    align-items: center;
    /* Canh giữa các item */
    position: relative;
    /* Để có thể định vị các phần tử bên trong */
    transition: background-color 0.3s;
    /* Thêm hiệu ứng đổi màu nền khi hover */
  }



  /* Kiểu dáng cho ảnh đại diện người dùng */
  .list-group-item img {
    width: 100px;
    /* Đặt chiều rộng ảnh */
    height: 100px;
    /* Đặt chiều cao ảnh */
    object-fit: cover;
    /* Cắt ảnh để phù hợp với khung vuông */
    border-radius: 50%;
    /* Bo tròn ảnh thành hình tròn */
    margin-right: 15px;
    /* Khoảng cách bên phải ảnh */
  }

  /* Kiểu dáng cho phần thông tin người dùng */
  .list-group-item div {
    flex: 1;
    /* Lấy toàn bộ không gian còn lại */
  }

  /* Kiểu dáng cho tên người dùng */
  .list-group-item .fw-bold {
    font-size: 1rem;
    /* Cỡ chữ cho tên người dùng */
    color: #333;
    /* Màu chữ tối cho tên người dùng */
  }

  /* Kiểu dáng cho các sao đánh giá */




  /* Kiểu dáng cho thời gian và nội dung đánh giá */
  .text-warning {
    font-size: 0.8rem;
    /* Cỡ chữ nhỏ cho thời gian */
    font-style: italic;
    /* In nghiêng cho thời gian */
  }

  .text-muted {
    font-size: 0.9rem;
    /* Cỡ chữ nhỏ cho nội dung đánh giá */
  }

  /* Kiểu dáng cho nút xóa đánh giá */
  .list-group-item .btn-danger {
    position: absolute;
    /* Định vị nút ở góc trên bên phải */
    top: 50%;
    right: 15px;
    transform: translateY(-50%);
    /* Canh giữa theo chiều dọc */
    padding: 6px 12px;
    /* Padding cho nút */
    font-size: 0.9rem;
    /* Cỡ chữ nhỏ hơn */
    border-radius: 20px;
    /* Bo tròn các góc của nút */
    text-transform: uppercase;
    /* Viết hoa chữ trên nút */
    transition: background-color 0.3s;
    /* Thêm hiệu ứng chuyển màu nền khi hover */
  }

  .list-group-item .btn-danger:hover {
    background-color: #c82333;
    /* Đổi màu nền khi hover */
  }

  /* Điều chỉnh giao diện trên màn hình nhỏ (Responsive) */
  @media (max-width: 768px) {
    .card-body {
      padding: 10px;
      /* Padding nhỏ hơn cho phần thân card */
      height: auto;
      /* Tự động điều chỉnh chiều cao */
    }

    .list-group-item {
      flex-direction: column;
      /* Chuyển hướng các mục thành cột trên màn hình nhỏ */
      align-items: flex-start;
      /* Canh lề trái cho các mục */
    }

    .list-group-item img {
      margin-bottom: 10px;
      /* Khoảng cách dưới ảnh */
    }

    .list-group-item .btn-danger {
      position: static;
      /* Đặt lại vị trí của nút xóa */
      margin-top: 10px;
      /* Thêm khoảng cách phía trên */
    }
  }
</style>  

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="container mt-6  ">

    <!-- Product Information -->
    <div class="card mb-4 shadow">
      <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Thông Tin Sản Phẩm</h5>
      </div>
      <div class="card-body">
        <div class="row">
          <!-- Product Info -->
          <div class="col-md-6">
            <p><strong>Mã sản phẩm:</strong> <?= $thongTinSP['Ma_san_pham'] ?></p>
            <p><strong>Tên sản phẩm:</strong> <?= $thongTinSP['Ten_san_pham'] ?></p>
            <p><strong>Danh mục:</strong> <?= $thongTinSP['mo_ta'] ?></p>
            <p><strong>Mô tả:</strong> <?= $thongTinSP['Mo_ta'] ?></p>
          </div>
          <!-- Product Image -->
          <div class="col-md-6 text-center">
          </div>
        </div>
      </div>
    </div>

    <!-- Product Variants -->
    <div class="card mb-4 shadow">
      <div class="card-header bg-success text-white">
        <h5 class="mb-0">Biến Thể Sản Phẩm</h5>
      </div>
      <div class="card-body">
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Mã SKU</th>
              <th>Ảnh</th>
              <th>Màu Sắc</th>
              <th>Kích Thước</th>
              <th>Ngày Nhập</th>
              <th>Số Lượng Tồn</th>
              <th>chức năng</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($thongTinBienThe as $key => $value) { ?>
              <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $value['ma_sku'] ?></td>
                <td>
                  <img src="./assets/img/<?= $value['anh'] ?>" alt="Ảnh biến thể" class="">
                </td>
                <td><?= $value['ten_mau'] ?></td>
                <td><?= $value['ten_kich_thuoc'] ?></td>
                <td><?= $value['ngay_nhap'] ?></td>
                <td><?= $value['so_luong_ton_kho'] ?></td>
                <td>

                  <a href="?act=suaBienThe&id=<?= $value['chi_tiet_id'] ?>" class="btn btn-warning btn-sm" title="Sửa biến thể">
                    <i class="fas fa-pencil-alt"></i>
                  </a>
                  <a onclick="return confirm('Bạn chắc chắn muốn xóa biến thể này?')" href="?act=xoaBienThe&id=<?= $value['chi_tiet_id'] ?>" class="btn btn-danger btn-sm" title="Xóa biến thể">
                    <i class="far fa-trash-alt"></i>
                  </a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

    </div>

    <!-- Customer Reviews -->
    <div class="card mb-4 shadow-sm">
      <div class="card-header bg-warning text-white">
        <h5 class="mb-0">Đánh giá khách hàng</h5>
      </div>
      <div class="card-body overflow-auto" style="height: 250px">
        <?php foreach ($danh_gias as $key => $ok) { ?>
          <ul class="list-group">
            <li class="list-group-item d-flex align-items-start">
              <!-- Hiển thị ảnh đại diện -->
              <img src="./assets/img/<?php echo htmlspecialchars($ok['Anh_dai_dien']); ?>"
                alt="Ảnh đại diện"
                class="rounded-circle me-3"
                style="width: 100px; height: 100px; object-fit: cover;">

              <!-- Thông tin người dùng hoặc đánh giá -->
              <div>
                <div class="fw-bold"><?php echo htmlspecialchars($ok['Ten_dang_nhap']); ?></div>
                <?php
                // Kiểm tra số điểm đánh giá
                if ($ok['So_diem_danh_gia'] == 1) { ?>
                  <!-- 1 sao (sao đầy đủ) -->
                  <i class="fas fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>

                <?php } else if ($ok['So_diem_danh_gia'] == 2) { ?>
                  <!-- 2 sao -->
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>

                <?php } else if ($ok['So_diem_danh_gia'] == 3) { ?>
                  <!-- 3 sao -->
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i>

                <?php } else if ($ok['So_diem_danh_gia'] == 4) { ?>
                  <!-- 4 sao -->
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="far fa-star"></i>

                <?php } else if ($ok['So_diem_danh_gia'] == 5) { ?>
                  <!-- 5 sao -->
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>

                <?php } ?>

                <span class="text-warning small"><?php ($ok['Thoi_gian_tao']); ?></span>
                <small class="text-muted d-block mt-2"><?php echo nl2br(htmlspecialchars($ok['Noi_dung'])); ?></small>
              </div>
              <!-- Nút xóa -->
              <a href="?act=xoaDanhGia&id=<?= $ok['Id']; ?>" class="btn btn-danger"
                onclick="return confirm('Bạn có chắc chắn muốn xóa đánh giá này?');">
                Xóa
              </a>

            </li>

          </ul>
          <br>
        <?php } ?>
      </div>
    </div>
    <!-- Comments Section -->
    <div class="card mb-4 shadow-sm">
      <div class="card-header bg-warning text-white">
        <h5 class="mb-0">Bình luận khách hàng</h5>
      </div>
      <div class="card-body overflow-auto" style="height: 250px">
        <?php foreach ($binh_luans as $key => $no) { ?>
          <ul class="list-group">
            <li class="list-group-item d-flex align-items-start">
              <!-- Hiển thị ảnh đại diện -->
              <img src="./assets/img/<?php echo htmlspecialchars($no['Anh_dai_dien']); ?>"
                alt="Ảnh đại diện"
                class="rounded-circle me-3"
                style="width: 100px; height: 100px; object-fit: cover;">

              <!-- Thông tin người dùng hoặc đánh giá -->
              <div>
                <div class="fw-bold"><?php echo htmlspecialchars($no['Ten_dang_nhap']); ?></div>
                <span class="text-warning small"><?php echo $no['Thoi_gian_tao']; ?></span>
                <small class="text-muted d-block mt-2"><?php echo nl2br(htmlspecialchars($no['Noi_dung'])); ?></small>
              </div>
              <!-- Nút xóa -->
              <a href="?act=xoaDanhGia&id=<?= $ok['Id']; ?>" class="btn btn-danger"
                onclick="return confirm('Bạn có chắc chắn muốn xóa đánh giá này?');">
                Xóa
              </a>

            </li>

          </ul>
          <br>
        <?php } ?>
      </div>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>