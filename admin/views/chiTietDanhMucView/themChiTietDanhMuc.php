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
                            <h3 class="card-title">Thêm chi tiết danh mục</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST">
                            <div class="card-body">
                                
                                <div class="form-group">
                                    <label">Mô tả</label>
                                    <textarea name="mo_ta" class="form-control" placeholder="Nhập chi tiết danh mục"></textarea>
                                    <?php if(isset($error['mo_ta'])){ ?>
                                        <p class="text-danger"> <?= $error['mo_ta'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label for="inputStatus">Danh mục</label>
                                    <select name="danh_muc" id="inputStatus" class="form-control custom-select">
                                        <?php foreach ($danh_muc as $key => $value) {?>
                                            <option value="<?= $value['Id'] ?>"><?=$value['Ten_danh_muc']?></option>
                                        <?php }?>
                                    </select>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" name="btn_them" class="btn btn-primary">Thêm</button>
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