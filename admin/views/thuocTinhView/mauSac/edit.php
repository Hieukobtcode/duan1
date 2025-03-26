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
                    <h1>Quản lý màu sắc</h1>
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
                            <h3 class="card-title">Sửa màu sắc</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label">Tên màu</label>
                                        <input type="text" value="<?= $mau_sac['ten_mau'] ?>" class="form-control" name="ten_mau" placeholder="Nhập tên màu">
                                        <?php if (isset($error['ten_mau'])) { ?>
                                            <p class="text-danger"> <?= $error['ten_mau'] ?></p>
                                        <?php } ?>
                                </div>
                                
                                <div class="form-group">
                                    <label">Mã màu</label>
                                        <input type="text" value="<?= $mau_sac['ma_mau'] ?>" class="form-control" name="ma_mau" placeholder="Nhập mã màu">
                                        <?php if (isset($error['ma_mau'])) { ?>
                                            <p class="text-danger"> <?= $error['ma_mau'] ?></p>
                                        <?php } ?>
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