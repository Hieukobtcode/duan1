<!--Header-->
<?php require './views/layout/header.php' ?>
<!-- Navbar -->
<?php require './views/layout/navbar.php' ?>
<!-- Sidebar -->
<?php require './views/layout/sidebar.php' ?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <h1>Quản lý khuyến mãi</h1>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sửa khuyến mãi</h3>
                </div>
                <form method="POST">
                    <div class="card-body">

                        <div class="form-group">
                            <label>Tên khuyến mãi</label>
                            <input type="text" value="<?= $khuyen_mai['ten_khuyen_mai'] ?>" class="form-control" name="tenKhuyenMai" placeholder="Nhập tên khuyến mãi">
                            <?php if (isset($error['TenKhuyenMai'])) { ?>
                                <p class="text-danger"><?= $error['TenKhuyenMai'] ?></p>
                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <label>Mã khuyến mãi</label>
                            <input type="text" value="<?= $khuyen_mai['Ma_khuyen_mai'] ?>" class="form-control" name="maKhuyenMai" placeholder="Nhập mã khuyến mãi">
                            <?php if (isset($error['maKhuyenMai'])) { ?>
                                <p class="text-danger"><?= $error['maKhuyenMai'] ?></p>
                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <label>Loại giảm giá</label>
                            <select name="loaiGiamGia" class="form-control">
                                <option value="percent" <?= ($khuyen_mai['Loai_giam_gia'] == 'percent') ? 'selected' : '' ?>>Phần trăm</option>
                                <option value="amount" <?= ($khuyen_mai['Loai_giam_gia'] == 'amount') ? 'selected' : '' ?>>Giá tiền</option>
                                <option value="freeShip" <?= ($khuyen_mai['Loai_giam_gia'] == 'freeShip') ? 'selected' : '' ?>>Miễn phí ship</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Giá trị giảm giá</label>
                            <input type="text" value="<?= $khuyen_mai['Gia_tri_giam_gia'] ?>" class="form-control" name="giaTriGiamGia" placeholder="Nhập giá trị giảm giá">
                            <?php if (isset($error['giaTriGiamGia'])) { ?>
                                <p class="text-danger"><?= $error['giaTriGiamGia'] ?></p>
                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <label>Ngày bắt đầu</label>
                            <input type="datetime-local" value="<?= $khuyen_mai['Ngay_bat_dau'] ?>" class="form-control" name="ngayBatDau">
                            <?php if (isset($error['ngayBatDau'])) { ?>
                                <p class="text-danger"><?= $error['ngayBatDau'] ?></p>
                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <label>Ngày kết thúc</label>
                            <input type="datetime-local" value="<?= $khuyen_mai['Ngay_ket_thuc'] ?>" class="form-control" name="ngayKetThuc">
                            <?php if (isset($error['ngayKetThuc'])) { ?>
                                <p class="text-danger"><?= $error['ngayKetThuc'] ?></p>
                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea name="moTa" class="form-control" placeholder="Nhập mô tả"><?= htmlspecialchars(trim($khuyen_mai['mo_ta'])) ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="trangThai" class="form-control">
                                <option value="Active" <?= ($khuyen_mai['Trang_thai'] == 'Active') ? 'selected' : '' ?>>Active</option>
                                <option value="Inactive" <?= ($khuyen_mai['Trang_thai'] == 'Inactive') ? 'selected' : '' ?>>Inactive</option>
                            </select>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" name="btn_sua" class="btn btn-primary">Sửa</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<!-- Footer -->
<?php require './views/layout/footer.php' ?>
</body>
</html>
