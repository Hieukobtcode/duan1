<!--Header-->
<?php require './views/layout/header.php'?>
<!-- Navbar -->
<?php require './views/layout/navbar.php'?>
<!-- /.navbar -->
<!-- Main Sidebar Container -->
<?php require './views/layout/sidebar.php'?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý chi tiết danh mục</h1>
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
                            <h3 class="card-title">Sửa chi tiết danh mục</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST">
                            <div class="card-body">
                
                                <div class="form-group">
                                    <label">Mô tả</label>
                                        <textarea name="mo_ta" class="form-control" placeholder="Nhập mô tả"><?=$chi_tiet_danh_muc['mo_ta']?></textarea>
                                        <?php if (isset($error['mo_ta'])) { ?>
                                            <p class="text-danger"> <?= $error['mo_ta'] ?></p>
                                        <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label for="inputStatus">Danh mục</label>
                                    <select name="danh_muc" id="inputStatus" class="form-control custom-select">
                                        <option value=""></option>
                                        <?php foreach ($danh_mucs as $key => $danh_muc) {?>
                                            <option  <?= ($chi_tiet_danh_muc['id_danh_muc'] == $danh_muc['Id'] ? 'selected' : '') ?> value="<?=$danh_muc['Id']?>"><?=$danh_muc['Ten_danh_muc']?></option>
                                        <?php }?>
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
<?php require './views/layout/footer.php'?>
<!--End footer-->

</body>

</html>