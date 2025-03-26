<?php require 'views/layout/header.php'; ?>
<?php require 'views/layout/navbar.php'; ?>
<?php require 'views/layout/sidebar.php'; ?>

<style>
    /* Tạo kiểu cho select box */
    form select.form-select {
        height: 35px;
        /* Chiều cao */
        padding: 0 10px;
        /* Khoảng cách trong */
        border: 2px solid #198754;
        /* Viền xanh lá */
        border-radius: 50px;
        /* Bo tròn viền */
        background-color: #f8f9fa;
        /* Nền trắng mờ */
        color: #198754;
        /* Màu chữ xanh lá */
        font-size: 14px;
        /* Cỡ chữ */
        font-weight: 500;
        /* Đậm chữ nhẹ */
        transition: all 0.3s ease;
        /* Hiệu ứng mượt khi hover */
    }

    /* Hiệu ứng khi hover */
    form select.form-select:hover {
        background-color: #e9ecef;
        /* Nền xám nhạt khi hover */
        border-color: #145a32;
        /* Viền xanh đậm */
        color: #145a32;
        /* Chữ xanh đậm */
    }

    /* Hiệu ứng khi focus */
    form select.form-select:focus {
        outline: none;
        /* Loại bỏ viền mặc định */
        border-color: #145a32;
        /* Viền xanh đậm hơn */
        box-shadow: 0 0 5px rgba(20, 90, 50, 0.5);
        /* Hiệu ứng đổ bóng */
    }

    /* Kiểu cho nút */
    form button.btn-success {
        height: 35px;
        /* Chiều cao */
        width: 90px;
        /* Chiều rộng */
        padding: 0;
        /* Loại bỏ khoảng đệm */
        border-radius: 50px;
        /* Bo tròn viền */
        background-color: #198754;
        /* Nền xanh lá */
        color: white;
        /* Chữ trắng */
        font-size: 14px;
        /* Cỡ chữ */
        font-weight: 500;
        /* Đậm chữ nhẹ */
        border: none;
        /* Loại bỏ viền mặc định */
        transition: all 0.3s ease;
        /* Hiệu ứng mượt */
    }

    /* Hiệu ứng hover cho nút */
    form button.btn-success:hover {
        background-color: #145a32;
        /* Nền xanh đậm */
        color: #ffffff;
        /* Chữ trắng */
        box-shadow: 0 0 5px rgba(20, 90, 50, 0.5);
        /* Hiệu ứng đổ bóng */
    }

    /* Đảm bảo bố cục gọn gàng */
    form.d-flex {
        gap: 10px;
        /* Khoảng cách giữa select và nút */
    }
</style>
<div class="content-wrapper">
    <!-- Tiêu đề -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 align-items-center">
                <!-- Tiêu đề -->
                <div class="col-md-9">
                    <h1 class="text-primary">
                        Quản lý đơn hàng - Mã đơn hàng: <?= $don_hang['ma_don_hang']; ?>
                    </h1>
                </div>
                <!-- Select trạng thái -->
                <div class="col-md-3 text-end">
                    <form action="" method="POST" class="d-flex align-items-center justify-content-end">
                        <select name="trang_thai" id="trang_thai"
                            class="form-select me-2 border-success rounded-pill"
                            style="height: 35px; padding: 0 10px; background-color: #f8f9fa; color: black;">
                            <?php foreach ($trang_thai as $value) {
                                // Kiểm tra nếu trạng thái hiện tại không phải "Chờ xác nhận" thì không cho chuyển đến "Đã hủy"
                                $disabled = ($value['Id'] == 8 && $don_hang['trang_thai_don_hang_id'] != 1) ||
                                    ($value['Id'] < $don_hang['trang_thai_don_hang_id']) ||
                                    (in_array($don_hang['trang_thai_don_hang_id'], [6, 7]) && $value['Id'] != $don_hang['trang_thai_don_hang_id']);
                            ?>
                                <option value="<?= $value['Id'] ?>"
                                    <?= $disabled ? 'disabled' : '' ?>
                                    <?= $value['Id'] == $don_hang['trang_thai_don_hang_id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($value['Ten_trang_thai']) ?>
                                </option>
                            <?php } ?>
                        </select>
                        <button type="submit" name="btn_update" class="btn btn-success text-center"
                            style="height: 35px; width: 90px; padding: 0; white-space: nowrap; border-radius: 20px;">
                            Cập nhật
                        </button>
                    </form>



                </div>
            </div>
        </div>
    </section>

    <!-- Nội dung chính -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-<?= $color ?> text-white">
                    <h5 class="text-info">Trạng thái đơn hàng: <?= $don_hang['Ten_trang_thai'] ?></h5>
                </div>
                <div class="card-body">
                    <!-- Thông tin đơn hàng -->
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Thông tin người đặt</h5>
                            <p><strong><?= $don_hang['Ho_ten'] ?></strong></p>
                            <p>Email: <?= $don_hang['Email'] ?></p>
                            <p>SDT: <?= $don_hang['So_dien_thoai'] ?></p>
                        </div>
                        <div class="col-md-4">
                            <h5>Thông tin người nhận</h5>
                            <p><strong><?= $don_hang['ten_nguoi_nhan'] ?></strong></p>
                            <p>Email: <?= $don_hang['email_nguoi_nhan'] ?></p>
                            <p>SDT: <?= $don_hang['so_dien_thoai_nguoi_nhan'] ?></p>
                            <p>Địa chỉ: <?= $don_hang['dia_chi_nguoi_nhan'] ?></p>
                        </div>
                        <div class="col-md-4">
                            <h5>Thông tin đơn hàng</h5>
                            <p><strong>Mã: <?= htmlspecialchars($don_hang['ma_don_hang']) ?></strong></p>
                            <p>Tổng tiền: <?= number_format($don_hang['tong_tien'], 0, ',', '.') ?> đ</p>
                            <p>Ghi chú: <?= htmlspecialchars($don_hang['ghi_chu']) ?></p>
                            <p>Thanh toán: <?= htmlspecialchars($don_hang['phuong_thuc_thanh_toan']) ?> (
                                <?php
                                if ($don_hang['trang_thai_don_hang_id'] == 6) {
                                    if ($this->donHangModel->capNhatThanhToan($don_hang['donHangId'])) {
                                        echo "Đã thanh toán";
                                    }
                                } else {
                                    echo "Chưa thanh toán";
                                }
                                ?>)
                            </p>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Danh sách sản phẩm -->
            <div class="card mt-4">
                <div class="card-header bg-primary text-white">
                    <h5>Chi tiết sản phẩm</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Màu sắc</th>
                                <th>Kích thước</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $tongTien = 0; ?>
                            <?php foreach ($listInfo as $key => $value) {
                                $thanhTien = $value['Gia_san_pham'] * $value['So_luong'];
                                $tongTien += $thanhTien;
                            ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><img width="80px" src="./assets/img/<?= $value['anh'] ?>" alt=""></td>
                                    <td><?= $value['Ten_san_pham'] ?></td>
                                    <td><?= $value['ten_mau'] ?></td>
                                    <td><?= $value['ten_kich_thuoc'] ?></td>
                                    <td><?= number_format($value['Gia_san_pham'], 0, ',', '.') ?> đ</td>
                                    <td><?= $value['So_luong'] ?></td>
                                    <td><?= number_format($thanhTien, 0, ',', '.') ?> đ</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tổng thanh toán -->
            <div class="card mt-4">
                <div class="card-header bg-success text-white">
                    <h5>Thông tin thanh toán</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Tổng tiền:</th>
                            <td><?= number_format($tongTien, 0, ',', '.') ?> đ</td>
                        </tr>
                        <tr>
                            <th>Tổng thanh toán:</th>
                            <td><?= number_format($don_hang['tong_tien'], 0, ',', '.') ?> đ</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<?php require './views/layout/footer.php'; ?>