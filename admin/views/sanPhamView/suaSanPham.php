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
                    <h1>Quản lý sản phẩm</h1>
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
                            <h3 class="card-title">Sửa sản phẩm: <?= $san_pham['Ten_san_pham'] ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST">
                            <div class="card-body">

                                <div class="form-group">
                                    <label">Mã sản phẩm</label>
                                        <input value="<?= $san_pham['Ma_san_pham'] ?>" type="text" class="form-control" name="ma_san_pham" placeholder="Nhập mã sản phẩm">
                                        <?php if (isset($error['ma_san_pham'])) { ?>
                                            <p class="text-danger"> <?= $error['ma_san_pham'] ?></p>
                                        <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label">Tên sản phẩm</label>
                                        <input value="<?= $san_pham['Ten_san_pham'] ?>" type="text" class="form-control" name="ten_san_pham" placeholder="Nhập tên sản phẩm">
                                        <?php if (isset($error['ten_san_pham'])) { ?>
                                            <p class="text-danger"> <?= $error['ten_san_pham'] ?></p>
                                        <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label">Mô tả</label>
                                        <textarea name="mo_ta" class="form-control" placeholder="Nhập mô tả"><?= $san_pham['Mo_ta'] ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="inputStatus">Danh mục</label>
                                    <select name="danh_muc" id="inputStatus" class="form-control custom-select">
                                        <option value="">Chọn danh mục</option>
                                        <?php foreach ($danh_mucs as $key => $danh_muc) { ?>
                                            <option <?php echo ($danh_muc['id'] == $san_pham['chi_tiet_danh_muc_id']) ? "selected" : "" ?> value="<?= $danh_muc['id'] ?>">
                                                <?= $danh_muc['mo_ta'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="inputStatus">Khuyến mãi</label>
                                    <select name="khuyen_mai" id="inputStatus" class="form-control custom-select">
                                        <?php foreach ($khuyen_mais as $key => $khuyen_mai) { ?>
                                            <option value="<?= $khuyen_mai['Id'] ?>" <?php echo ($khuyen_mai['Id'] == $san_pham['khuyen_mai_id']) ? "selected" : "" ?>>
                                                <?= $khuyen_mai['ten_khuyen_mai'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="inputStatus">Trạng thái sản phẩm</label>
                                    <select name="trang_thai" id="inputStatus" class="form-control custom-select">
                                        <option value="Active" <?php echo ($san_pham['Trang_thai'] == 'Active') ? 'selected' : '' ?>>Active</option>
                                        <option value="Inactive" <?php echo ($san_pham['Trang_thai'] == 'Inactive') ? 'selected' : '' ?>>Inactive</option>
                                    </select>
                                </div>

                                <div class="form-group row">
                                    <!-- Giá nhập -->
                                    <div class="col-md-4">
                                        <label for="gia_nhap">Giá nhập</label>
                                        <input value="<?php echo number_format($san_pham['gia_nhap'], 0, ',', '.') ?>" type="number" class="form-control" id="gia_nhap" name="gia_nhap" placeholder="Nhập giá nhập">
                                        <?php if (isset($error['gia_nhap'])) { ?>
                                            <p class="text-danger"><?= $error['gia_nhap'] ?></p>
                                        <?php } ?>
                                    </div>

                                    <!-- Giá bán -->
                                    <div class="col-md-4">
                                        <label for="gia_ban">Giá bán</label>
                                        <input value="<?php echo number_format($san_pham['gia_ban'], 0, ',', '.') ?>" type="number" class="form-control" id="gia_ban" name="gia_ban" placeholder="Nhập giá bán">
                                        <?php if (isset($error['gia_ban'])) { ?>
                                            <p class="text-danger"><?= $error['gia_ban'] ?></p>
                                        <?php } ?>
                                    </div>

                                    <!-- Giá khuyến mãi -->
                                    <div class="col-md-4">
                                        <label for="gia_khuyen_mai">Giá khuyến mãi</label>
                                        <input value="<?php echo number_format($san_pham['gia_khuyen_mai'], 0, ',', '.') ?>" type="number" class="form-control" id="gia_khuyen_mai" name="gia_khuyen_mai" placeholder="Nhập giá khuyến mãi">
                                        <?php if (isset($error['gia_khuyen_mai'])) { ?>
                                            <p class="text-danger"><?= $error['gia_khuyen_mai'] ?></p>
                                        <?php } ?>
                                    </div>
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