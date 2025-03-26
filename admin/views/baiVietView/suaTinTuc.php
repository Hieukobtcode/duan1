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
                    <h1>Quản lý bài viết</h1>
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
                            <h3 class="card-title">Sửa bài viết</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label">Tiêu đề</label>
                                        <input value="<?= $tin_tuc['Tieu_de'] ?>" type="text" class="form-control" name="tieu_de" placeholder="Nhập tiêu đề">
                                        <?php if (isset($error['tieu_de'])) { ?>
                                            <p class="text-danger"> <?= $error['tieu_de'] ?></p>
                                        <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label">Nội dung</label>
                                        <textarea name="noi_dung" class="form-control" placeholder="Nhập nội dung"><?= htmlspecialchars(preg_replace('/\s+/', ' ', trim($tin_tuc['Noi_dung']))) ?></textarea>
                                        <?php if (isset($error['noi_dung'])) { ?>
                                            <p class="text-danger"> <?= $error['noi_dung'] ?></p>
                                        <?php } ?>
                                </div>
                                <img width="300px" src="./assets/img/<?= $tin_tuc['img'] ?>" alt="">
                                <div class="input-group mb-3">
                                    <input name="img" type="file" class="form-control" id="inputGroupFile02">
                                    <label class="input-group-text" for="inputGroupFile02">Chọn ảnh</label>
                                </div>

                                <div class="form-group">
                                    <label for="inputStatus">Trạng thái bài viết</label>
                                    <select name="trang_thai" id="inputStatus" class="form-control custom-select">
                                        <option <?= $tin_tuc['Trang_thai'] == 'Published' ? 'selected' : '' ?> value="Published">Đã đăng</option>
                                        <option <?= $tin_tuc['Trang_thai'] == 'Draft' ? 'selected' : '' ?> value="Draft">Bản nháp</option>
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