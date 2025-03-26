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
                    <h1>Quản lý banner</h1>
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
                        </div>
                        <div class="card-header">
                            <!-- /.card-header -->
                            <h3 class="card-title">Sửa banner</h3>
                            <!-- form start -->
                        <form method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputStatus">Tiêu đề</label>
                                    <input type="text" value="<?= $banner['Tieu_de'] ?>" class="form-control" name="tieu_de" placeholder="Nhập tiêu đề">
                                    <?php if (isset($error['tieu_de'])) { ?>
                                        <p class="text-danger"> <?= $error['tieu_de'] ?></p>
                                    <?php } ?>
                                </div>
                                <img width="300px" src="./assets/img/<?= $banner['Duong_dan_anh'] ?>" alt=""> <br>
                                <div class="input-group mb-3">
                                    <input name="img" type="file" class="form-control" id="inputGroupFile02">
                                    <label class="input-group-text" for="inputGroupFile02">Chọn ảnh</label>
                                </div>

                                <div class="form-group">
                                    <label for="inputStatus">Trạng thái banner</label>
                                    <select name="trang_thai" id="inputStatus" class="form-control custom-select">
                                        <option <?php echo ($banner['trang_thai'] == 'Active' ? 'selected' : '') ?> value="Active">Active</option>
                                        <option <?php echo ($banner['trang_thai'] == 'Inactive' ? 'selected' : '') ?> value="Inactive">Inactive</option>
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