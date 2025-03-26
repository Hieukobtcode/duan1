<!--Header-->
<?php require './views/layout/header.php' ?>
<!-- Navbar -->
<?php require './views/layout/navbar.php' ?>
<!-- Sidebar -->
<?php require './views/layout/sidebar.php' ?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Page Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <h1>Sửa Thông Tin Khách Hàng: <?= $khach_hang['Ten_dang_nhap'] ?></h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Form Edit Customer -->
    <section class="content">
        <div class="container">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4>Thông Tin Khách Hàng</h4>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <!-- Tên đăng nhập -->
                            <div class="col-md-6 mb-3">
                                <label for="username">Tên Đăng Nhập</label>
                                <input type="text" id="username" name="ten_dang_nhap" class="form-control" value="<?= htmlspecialchars($khach_hang['Ten_dang_nhap']) ?>" placeholder="Nhập tên đăng nhập">
                                <?= isset($error['ten_dang_nhap']) ? "<p class='text-danger'>{$error['ten_dang_nhap']}</p>" : '' ?>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6 mb-3">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" value="<?= htmlspecialchars($khach_hang['Email']) ?>" placeholder="Nhập email">
                                <?= isset($error['email']) ? "<p class='text-danger'>{$error['email']}</p>" : '' ?>
                            </div>

                            <!-- Họ tên -->
                            <div class="col-md-6 mb-3">
                                <label for="fullname">Họ Tên</label>
                                <input type="text" id="fullname" name="ho_ten" class="form-control" value="<?= htmlspecialchars($khach_hang['Ho_ten']) ?>" placeholder="Nhập họ tên">
                                <?= isset($error['ho_ten']) ? "<p class='text-danger'>{$error['ho_ten']}</p>" : '' ?>
                            </div>

                            <!-- Số điện thoại -->
                            <div class="col-md-6 mb-3">
                                <label for="phone">Số Điện Thoại</label>
                                <input type="text" id="phone" name="so_dien_thoai" class="form-control" value="<?= htmlspecialchars($khach_hang['So_dien_thoai']) ?>" placeholder="Nhập số điện thoại">
                                <?= isset($error['so_dien_thoai']) ? "<p class='text-danger'>{$error['so_dien_thoai']}</p>" : '' ?>
                            </div>

                            <!-- Ảnh đại diện -->
                            <div class="col-md-6 mb-3">
                                <label>Ảnh Đại Diện</label>
                                <img src="assets/img/<?= htmlspecialchars($khach_hang['Anh_dai_dien']) ?>" alt="User avatar" class="d-block mb-2 rounded" style="width: 100px; height: 100px; object-fit: cover;" onerror="this.src='https://icon-library.com/images/icon-user/icon-user-15.jpg'">
                                <input type="file" name="anh_dai_dien" class="form-control">
                                <?= isset($error['anh_dai_dien']) ? "<p class='text-danger'>{$error['anh_dai_dien']}</p>" : '' ?>
                            </div>

                            <!-- Địa chỉ -->
                            <div class="col-md-6 mb-3">
                                <label for="address">Địa Chỉ</label>
                                <input type="text" id="address" name="dia_chi" class="form-control" value="<?= htmlspecialchars($khach_hang['Dia_chi']) ?>" placeholder="Nhập địa chỉ">
                                <?= isset($error['dia_chi']) ? "<p class='text-danger'>{$error['dia_chi']}</p>" : '' ?>
                            </div>

                            <!-- Ngày sinh -->
                            <div class="col-md-6 mb-3">
                                <label for="birthdate">Ngày Sinh</label>
                                <input type="date" id="birthdate" name="ngay_thang_nam_sinh" class="form-control" value="<?= htmlspecialchars($khach_hang['Ngay_thang_nam_sinh']) ?>">
                                <?= isset($error['ngay_thang_nam_sinh']) ? "<p class='text-danger'>{$error['ngay_thang_nam_sinh']}</p>" : '' ?>
                            </div>

                            <!-- Trạng thái tài khoản -->
                            <div class="col-md-6 mb-3">
                                <label for="status">Trạng Thái Tài Khoản</label>
                                <select id="status" name="trang_thai" class="form-control">
                                    <option value="Active" <?= $khach_hang['Trang_thai'] == 'Active' ? 'selected' : '' ?>>Hoạt Động</option>
                                    <option value="Inactive" <?= $khach_hang['Trang_thai'] == 'Inactive' ? 'selected' : '' ?>>Không Hoạt Động</option>
                                </select>
                            </div>
                        </div>

                        <!-- Nút lưu -->
                        <div class="text-right">
                            <button type="submit" name="btn_sua" class="btn btn-success">Lưu Thay Đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<!--Footer-->
<?php require './views/layout/footer.php' ?>
