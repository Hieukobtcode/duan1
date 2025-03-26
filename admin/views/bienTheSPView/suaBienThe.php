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
                    <h1 class="card-title">Sửa biến thể sản phẩm:</h1>
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
                        <section class="content">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Thông tin biến thể</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form method="POST" enctype="multipart/form-data">
                                                <div class="form-group row">
                                                    <div class="col-md-4 mb-4">
                                                        <label for="sku">Mã SKU</label>
                                                        <input value="<?= $bien_the['ma_sku'] ?>" name="ma_sku" type="text" id="sku" class="form-control" placeholder="Nhập mã SKU">
                                                        <?php if (isset($error['ma_sku'])) { ?>
                                                            <p class="text-danger"><?= $error['ma_sku'] ?></p>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="col-md-4 mb-4">
                                                        <label for="color">Màu sắc</label>
                                                        <select name="mau_sac_id" class="form-control">
                                                            <option value="">Chọn màu sắc</option>
                                                            <?php foreach ($mau_sacs as $mau_sac) { ?>
                                                                <option <?= ($mau_sac['id_mau'] == $bien_the['mau_sac_id']) ? 'selected' : '' ?> value="<?= $mau_sac['id_mau'] ?>">
                                                                    <?= $mau_sac['ten_mau_sac'] ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                        <?php if (isset($error['mau_sac_id'])) { ?>
                                                            <p class="text-danger"><?= $error['mau_sac_id'] ?></p>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="col-md-4 mb-4">
                                                        <label for="size">Kích thước</label>
                                                        <select name="kich_thuoc_id" class="form-control">
                                                            <option value="">Chọn kích thước</option>
                                                            <?php foreach ($kich_thuocs as $kich_thuoc) { ?>
                                                                <option <?= ($kich_thuoc['id_kich_thuoc'] == $bien_the['kich_thuoc_id']) ? 'selected' : '' ?> value="<?= $kich_thuoc['id_kich_thuoc'] ?>">
                                                                    <?= $kich_thuoc['ten_kich_thuoc'] ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                        <?php if (isset($error['kich_thuoc_id'])) { ?>
                                                            <p class="text-danger"><?= $error['kich_thuoc_id'] ?></p>
                                                        <?php } ?>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label>Sửa ảnh biến thể</label> <br>
                                                    <img width="150px" src="./assets/img/<?= $bien_the['anh'] ?>" alt="">
                                                    <div class="input-group">
                                                        <input name="img" type="file" class="form-control" id="inputGroupFile02">
                                                    </div>
                                                </div>

                                                <div class="col-md-4 mb-4">
                                                    <label>Số lượng tồn kho</label>
                                                    <input class="form-control" value="<?= $bien_the['so_luong_ton_kho'] ?>" name="so_luong_ton_kho" type="number" class="form-control" placeholder="Nhập số lượng tồn kho">
                                                    <?php if (isset($error['so_luong_ton_kho'])) { ?>
                                                        <p class="text-danger"><?= $error['so_luong_ton_kho'] ?></p>
                                                    <?php } ?>
                                                </div>

                                                <!-- Thêm ảnh biến thể -->


                                                <div class="row mt-4">
                                                    <div class="col-12 text-center">
                                                        <button type="submit" name="btn_sua" class="btn btn-success">Sửa biến thể</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>

                                <!-- Album ảnh biến thể -->

                            </div>
                        </section>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<script>
    var faqs_row = <?= count($albulm) ?>;

    function addfaqs() {
        var html = '<tr id="faqs-row' + faqs_row + '">';
        html += '<td><img src="./assets/img/ao.png" style="width:50px;height:50px;"></td>';
        html += '<td><input type="file" name="albulm_arr[]"  class="form-control"></td>';
        html += '<td><button type="button" class="badge badge-danger"><i class="fa fa-trash"></i> Delete</button></td>';
        html += '</tr>';
        $('#faqs tbody').append(html);
        faqs_row++;
    }

    function removeRow(index, id = null) {
        $('#faqs-row' + index).remove();
        if (id !== null) {
            var delete_albulm = $('#delete_albulm').val();
            $('#delete_albulm').val(delete_albulm + id + ',');
        }
    }
</script>
<!-- /.content-wrapper -->
<?php require './views/layout/footer.php' ?>