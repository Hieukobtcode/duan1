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
                    <h1>Quản lý danh mục sản phẩm</h1>
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
                            <h3 class="card-title">Thêm danh mục</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label">Tên danh mục</label>
                                    <input type="text" class="form-control" name="ten_danh_muc" placeholder="Nhập tên danh mục">
                                    <?php if(isset($error['ten_danh_muc'])){ ?>
                                        <p class="text-danger"> <?= $error['ten_danh_muc'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label">Mô tả</label>
                                    <textarea name="mo_ta" class="form-control" placeholder="Nhập mô tả"></textarea>
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
<?php require './views/layout/footer.php' ?>
<!--End footer-->

</body>

</html>