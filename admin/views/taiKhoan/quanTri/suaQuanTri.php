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
                    <h1>Quản lý tài khoản quản trị</h1>
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
                            <h3 class="card-title">Sửa thông tin quản trị: <?php echo $quan_tri['Ten_dang_nhap'] ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST">
                            <div class="card-body">

                                <div class="form-group">
                                    <label">Tên đăng nhập</label>
                                        <input type="text" value="<?= $quan_tri['Ten_dang_nhap'] ?>" class="form-control" name="ten_dang_nhap" placeholder="Nhập tên đăng nhập">
                                        <?php if (isset($error['ten_dang_nhap'])) { ?>
                                            <p class="text-danger"> <?= $error['ten_dang_nhap'] ?></p>
                                        <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label">Email</label>
                                        <input type="text" value="<?= $quan_tri['Email'] ?>" class="form-control" name="email" placeholder="Nhập email">
                                        <?php if (isset($error['email'])) { ?>
                                            <p class="text-danger"> <?= $error['email'] ?></p>
                                        <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label">Số điện thoại</label>
                                        <input type="text" value="<?= $quan_tri['So_dien_thoai'] ?>" class="form-control" name="so_dien_thoai" placeholder="Nhập Số điện thoại">
                                        <?php if (isset($error['so_dien_thoai'])) { ?>
                                            <p class="text-danger"> <?= $error['so_dien_thoai'] ?></p>
                                        <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label for="inputStatus">Trạng thái tài khoản</label>
                                    <select name="trang_thai" id="inputStatus" class="form-control custom-select">
                                        <option  <?= $quan_tri['Trang_thai'] == 'Active' ?'selected' : '' ?> value="active">Hoạt động</option>
                                        <option  <?= $quan_tri['Trang_thai'] == 'Inactive' ?'selected' : '' ?> value="inactive">Không hoạt động</option>
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