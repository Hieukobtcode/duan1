<!--Header-->
<?php require './views/layout/header.php' ?>
<!-- Navbar -->
<?php require './views/layout/navbar.php'  ?>
<!-- /.navbar -->
<!-- Main Sidebar Container -->
<?php require './views/layout/sidebar.php' ?>
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa thông tin khách hàng</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sửa thông tin khách hàng: <?php echo $khach_hang['Ten_dang_nhap'] ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" enctype="multipart/form-data">
                            <div class="card-body">

                                <div class="form-group">
                                    <label">Tên đăng nhập</label>
                                        <input type="text" value="<?= $khach_hang['Ten_dang_nhap'] ?>" class="form-control" name="ten_dang_nhap" placeholder="Nhập tên đăng nhập">
                                        <?php if (isset($error['ten_dang_nhap'])) { ?>
                                            <p class="text-danger"> <?= $error['ten_dang_nhap'] ?></p>
                                        <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label">Email</label>
                                        <input type="text" value="<?= $khach_hang['Email'] ?>" class="form-control" name="email" placeholder="Nhập email">
                                        <?php if (isset($error['email'])) { ?>
                                            <p class="text-danger"> <?= $error['email'] ?></p>
                                        <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label">Họ tên</label>
                                        <input type="text" value="<?= $khach_hang['Ho_ten'] ?>" class="form-control" name="ho_ten" placeholder="Nhập họ tên">
                                        <?php if (isset($error['ho_ten'])) { ?>
                                            <p class="text-danger"> <?= $error['ho_ten'] ?></p>
                                        <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label">Ảnh đại diện</label>
                                        <img src="./assets/img/<?= $khach_hang['Anh_dai_dien'] ?>" alt="" width="250px">
                                        <input type="file"class="form-control" name="anh_dai_dien" placeholder="Chọn ảnh đại diện">
                                        <?php if (isset($error['anh_dai_dien'])) { ?>
                                            <p class="text-danger"> <?= $error['anh_dai_dien'] ?></p>
                                        <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label">Số điện thoại</label>
                                        <input type="text" value="<?= $khach_hang['So_dien_thoai'] ?>" class="form-control" name="so_dien_thoai" placeholder="Nhập Số điện thoại">
                                        <?php if (isset($error['so_dien_thoai'])) { ?>
                                            <p class="text-danger"> <?= $error['so_dien_thoai'] ?></p>
                                        <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label">Địa chỉ</label>
                                        <input type="text" value="<?= $khach_hang['Dia_chi'] ?>" class="form-control" name="dia_chi" placeholder="Nhập địa chỉ">
                                        <?php if (isset($error['dia_chi'])) { ?>
                                            <p class="text-danger"> <?= $error['dia_chi'] ?></p>
                                        <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label">Ngày tháng năm sinh</label>
                                        <input type="date" value="<?= $khach_hang['Ngay_thang_nam_sinh'] ?>" class="form-control" name="ngay_thang_nam_sinh" placeholder="Chọn ngày tháng năm sinh">
                                        <?php if (isset($error['ngay_thang_nam_sinh'])) { ?>
                                            <p class="text-danger"> <?= $error['ngay_thang_nam_sinh'] ?></p>
                                        <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label for="inputStatus">Trạng thái tài khoản</label>
                                    <select name="trang_thai" id="inputStatus" class="form-control custom-select">
                                        <option  <?= $khach_hang['Trang_thai'] == 'active' ?'selected' : '' ?> value="active">Hoạt động</option>
                                        <option  <?= $khach_hang['Trang_thai'] !== 'active' ?'selected' : '' ?> value="inactive">Không hoạt động</option>
                                    </select>
                                </div>                                

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" name="btn_sua" class="btn btn-primary">Sửa</button>
                            </div>
                        </form>
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

</body>

</html>