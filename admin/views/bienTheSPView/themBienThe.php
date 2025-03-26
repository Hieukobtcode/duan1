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

        </div>
    </section>

    <!-- Form thêm biến thể sản phẩm -->
    <section class="content mt-3">
        <div class="container">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title mb-0">Thêm Biến Thể Sản Phẩm : <?= $tenSP['Ten_san_pham'] ?></h4>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">

                        <div class="form-group row">
                            <div class="col-md-4 mb-4">
                                <label for="sku">Mã SKU</label>
                                <input name="ma_sku" type="text" id="sku" class="form-control" placeholder="Nhập mã SKU">
                                <?php if (isset($error['ma_sku'])) { ?>
                                    <p class="text-danger"> <?= $error['ma_sku'] ?></p>
                                <?php } ?>
                            </div>

                            <div class="col-md-4 mb-4 ">
                                <label for="anh">Ảnh</label>
                                <input name="img" type="file" class="form-control" id="inputGroupFile02">
                            </div>


                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 mb-4">
                                <label>Chọn màu sắc</label>
                                <select name="mau_sac_id" class="form-control">
                                    <option value="">Chọn màu sắc</option>
                                    <?php foreach ($mau_sacs as $key => $mau_sac) { ?>
                                        <option value="<?= $mau_sac['id_mau'] ?>"><?= $mau_sac['ten_mau_sac'] ?></option>
                                    <?php } ?>
                                </select>
                                <?php if (isset($error['mau_sac_id'])) { ?>
                                    <p class="text-danger"> <?= $error['mau_sac_id'] ?></p>
                                <?php } ?>
                            </div>

                            <div class="col-md-4 mb-4">
                                <label>Chọn kích thước</label>
                                <select name="kich_thuoc_id" class="form-control">
                                    <option value="">Chọn kích thước</option>
                                    <?php foreach ($kich_thuocs as $key => $kich_thuoc) { ?>
                                        <option value="<?= $kich_thuoc['id_kich_thuoc'] ?>"><?= $kich_thuoc['ten_kich_thuoc'] ?></option>
                                    <?php } ?>
                                </select>
                                <?php if (isset($error['kich_thuoc_id'])) { ?>
                                    <p class="text-danger"> <?= $error['kich_thuoc_id'] ?></p>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>Số lượng tồn kho</label>
                            <input name="so_luong_ton_kho" type="number" class="form-control" placeholder="Nhập số lượng tồn kho">
                            <?php if (isset($error['so_luong_ton_kho'])) { ?>
                                <p class="text-danger"> <?= $error['so_luong_ton_kho'] ?></p>
                            <?php } ?>
                        </div>

                        <div class="mt-4 text-right">
                            <button type="submit" name="btn_them" class="btn btn-success">Lưu Biến Thể</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

<!--footer-->
<?php require './views/layout/footer.php' ?>
<!--End footer-->