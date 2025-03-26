<!--Header-->
<?php require './views/layout/header.php' ?>
<!-- Navbar -->
<?php require './views/layout/navbar.php'  ?>
<!-- /.navbar -->
<!-- Main Sidebar Container -->
<?php require './views/layout/sidebar.php' ?>
<!-- Content Wrapper. Contains page content -->
<style>
    /* Tổng quát */
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        color: #333;
    }

    /* Bảng */
    .orders-table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 16px;
    }

    .orders-table thead {
        background-color: #f4f4f4;
        text-align: left;
    }

    .orders-table th,
    .orders-table td {
        padding: 12px 15px;
        border: 1px solid #ddd;
    }

    .orders-table th {
        font-weight: 600;
        color: #555;
    }

    .orders-table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .orders-table tbody tr:hover {
        background-color: #f1f1f1;
    }

    /* Nút */
    .btn {
        display: inline-block;
        padding: 6px 12px;
        font-size: 14px;
        font-weight: 500;
        text-align: center;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-sm {
        padding: 4px 8px;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    /* Tab */
    .nav-tabs .nav-item .nav-link {
        color: #555;
        padding: 8px 16px;
        margin: 0 5px;
        border-radius: 4px;
        border: 1px solid transparent;
        background-color: #f4f4f4;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .nav-tabs .nav-item .nav-link.active {
        background-color: #007bff;
        color: #fff;
        border-color: #ddd;
    }

    .nav-tabs .nav-item .nav-link:hover {
        background-color: #e7e7e7;
    }

    /* Thông tin khách hàng */
    .table-borderless th {
        width: 30%;
        font-weight: 600;
        color: #555;
    }

    .table-borderless td {
        color: #333;
    }

    /* Ảnh đại diện */
    img {
        border-radius: 50%;
        border: 2px solid #ddd;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Tiêu đề phần đánh giá */
    .product-single__reviews-title {
        font-size: 24px;
        font-weight: 600;
        color: #333;
        margin-bottom: 20px;
    }

    /* Danh sách đánh giá */
    .product-single__reviews-list {
        display: flex;
        flex-direction: column;
        gap: 20px;
        padding: 0;
    }

    /* Từng đánh giá */
    .product-single__reviews-item {
        display: flex;
        gap: 15px;
        align-items: flex-start;
        padding: 15px;
        background: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    /* Avatar khách hàng */
    .customer-avatar img {
        border-radius: 50%;
        border: 2px solid #eaeaea;
        width: 80px;
        height: 80px;
        object-fit: cover;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    /* Phần nội dung review */
    .customer-review {
        flex: 1;
    }

    /* Thông tin khách hàng */
    .customer-info {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        align-items: center;
        margin-bottom: 5px;
    }

    .customer-name {
        font-size: 18px;
        font-weight: bold;
        color: #555;
        margin: 0;
    }

    .reviews-group {
        display: flex;
        align-items: center;
        gap: 2px;
    }

    .review-star {
        width: 16px;
        height: 16px;
        fill: #f5c518;
        /* Màu vàng cho sao */
    }

    /* Ngày đánh giá */
    .review-date {
        font-size: 14px;
        color: #888;
        margin-top: 5px;
    }

    /* Nội dung đánh giá */
    .review-text p {
        margin: 10px 0 0;
        font-size: 15px;
        line-height: 1.6;
        color: #444;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thông tin khách hàng</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <img src="assets/img/<?= $KhachHang['Anh_dai_dien'] ?>"
                        alt="User avatar"
                        onerror="this.onerror=null; this.src='https://icon-library.com/images/icon-user/icon-user-15.jpg'" width="70%">

                </div>
                <div class="col-6">
                    <div class="container">
                        <table class="table table-borderless">
                            <tbody style="font-size: large">
                                <tr>
                                    <th>Họ tên:</th>
                                    <td><?= $KhachHang['Ho_ten'] ?></td>
                                </tr>
                                <tr>
                                    <th>Giới tính:</th>
                                    <td><?= $KhachHang['gioi_tinh'] ?></td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td><?= $KhachHang['Email'] ?></td>
                                </tr>
                                <tr>
                                    <th>Số điện thoại:</th>
                                    <td><?= $KhachHang['So_dien_thoai'] ?></td>
                                </tr>
                                <tr>
                                    <th>Địa chỉ:</th>
                                    <td><?= $KhachHang['Dia_chi'] ?></td>
                                </tr>
                                <tr>
                                    <th>Ngày tháng năm sinh:</th>
                                    <td><?= $KhachHang['Ngay_thang_nam_sinh'] ?></td>
                                </tr>
                                <tr>
                                    <th>Trạng thái:</th>
                                    <td><?= $KhachHang['Trang_thai'] ?></td>
                                </tr>
                                <tr>
                                    <th>Thời gian tạo:</th>
                                    <td><?= $KhachHang['Thoi_gian_tao'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="page-content my-account__orders-list">

                        <div class="product-single__details-tab">

                            <ul class="nav nav-tabs" id="myTab1" role="tablist">

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link nav-link_underscore active" id="tab-description-tab" data-bs-toggle="tab"
                                        href="#tab-description" role="tab" aria-controls="tab-description" aria-selected="true">Đơn hàng</a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link nav-link_underscore" id="tab-reviews-tab" data-bs-toggle="tab"
                                        href="#tab-reviews" role="tab" aria-controls="tab-reviews" aria-selected="false">Đánh giá</a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link nav-link_underscore" id="tab-additional-info-tab" data-bs-toggle="tab"
                                        href="#tab-additional-info" role="tab" aria-controls="tab-additional-info"
                                        aria-selected="false">Bình luận</a>
                                </li>

                            </ul>

                            <div class="tab-content">

                                <div class="tab-pane fade show active" id="tab-description" role="tabpanel"
                                    aria-labelledby="tab-description-tab">
                                    <div class="product-single__description">

                                        <table class="orders-table">
                                            <thead>
                                                <tr>
                                                    <th>Mã đơn hàng</th>
                                                    <th>Ngày đặt hàng</th>
                                                    <th>Trạng thái</th>
                                                    <th>Tổng</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($dsDonHangs as $key => $dsDonHang) { ?>
                                                    <tr>
                                                        <td><?= $dsDonHang['ma_don_hang'] ?></td>
                                                        <td><?= $dsDonHang['ngay_dat'] ?></td>
                                                        <td><?= $dsDonHang['Ten_trang_thai'] ?></td>
                                                        <td><?= number_format($dsDonHang['tong_tien'], 0, '', ',') ?> ₫</td>
                                                        <td>
                                                            <div class="d-flex justify-content-center align-items-center gap-2">
                                                                <a href="?act=chiTietDonHang&id=<?= $dsDonHang['Id'] ?>"
                                                                    class="btn btn-primary btn-sm">
                                                                    Xem
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="tab-reviews" role="tabpanel" aria-labelledby="tab-reviews-tab">
                                    <h2 class="product-single__reviews-title">Đánh giá của khách hàng</h2>
                                    <div class="product-single__reviews-list">
                                        <?php foreach ($danhGias as $key => $danhGia) { ?>
                                            <div class="product-single__reviews-item">
                                                <!-- Avatar khách hàng -->
                                                <div class="customer-avatar">
                                                    <img width="80px" loading="lazy" src="./assets/img/<?= $danhGia['Anh_dai_dien'] ?>"
                                                        alt="User avatar"
                                                        onerror="this.onerror=null; this.src='https://icon-library.com/images/icon-user/icon-user-15.jpg'">
                                                </div>

                                                <!-- Nội dung đánh giá -->
                                                <div class="customer-review">
                                                    <div class="customer-info">
                                                        <h6 class="customer-name"><?= $danhGia['Ho_ten'] ?></h6>
                                                        <div class="reviews-group">
                                                            <?php
                                                            if (isset($danhGia['So_diem_danh_gia'])) {
                                                                $so_sao = $danhGia['So_diem_danh_gia'];
                                                                for ($i = 0; $i < 5; $i++) { ?>
                                                                    <svg class="review-star <?= $i < $so_sao ? 'active' : '' ?>" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                                                                        <i class="fas fa-star" style="color: #FFD43B;"></i>
                                                                    </svg>
                                                                <?php }
                                                            } else { ?>
                                                                <p>Chưa có đánh giá</p>
                                                            <?php }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="review-date"><?= $danhGia['Thoi_gian_tao'] ?></div>
                                                    <div class="review-text">
                                                        <p><?= $danhGia['Noi_dung'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="tab-additional-info" role="tabpanel"
                                    <div class="product-single__reviews-list">
                                        <?php foreach ($binhLuans as $key => $binhLuan) { ?>
                                            <div class="product-single__reviews-item">
                                                <!-- Avatar khách hàng -->
                                                <div class="customer-avatar">
                                                    <img width="80px" loading="lazy" src="./assets/img/<?= $binhLuan['Anh_dai_dien'] ?>"
                                                        alt="User avatar"
                                                        onerror="this.onerror=null; this.src='https://icon-library.com/images/icon-user/icon-user-15.jpg'">
                                                </div>

                                                <!-- Nội dung đánh giá -->
                                                <div class="customer-review">
                                                    <div class="customer-info">
                                                        <h6 class="customer-name"><?= $binhLuan['Ho_ten'] ?></h6>
                                                    </div>
                                                    <div class="review-date"><?= $binhLuan['Thoi_gian_tao'] ?></div>
                                                    <div class="review-text">
                                                        <p><?= $binhLuan['Noi_dung'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!--footer-->
<?php require './views/layout/footer.php' ?>
<!--End footer-->
<script>
    const triggerTabList = document.querySelectorAll('[data-bs-toggle="tab"]');
    triggerTabList.forEach(triggerEl => {
        const tabTrigger = new bootstrap.Tab(triggerEl);

        triggerEl.addEventListener('click', event => {
            event.preventDefault();
            tabTrigger.show();
        });
    });
</script>
</body>

</html>