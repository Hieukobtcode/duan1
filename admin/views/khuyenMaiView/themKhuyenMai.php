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
                    <h1>Quản lý khuyến mãi</h1>
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
                            <h3 class="card-title">Thêm khuyến mãi</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="inputStatus">Tên khuyến mãi</label>
                                        <input type="text" class="form-control" name="tenKhuyenMai" placeholder="Nhập tên khuyến mãi">
                                        <?php if (isset($error['tenKhuyenMai'])) { ?>
                                            <p class="text-danger"> <?= $error['tenKhuyenMai'] ?></p>
                                        <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label for="inputStatus">Mã khuyến mãi</label>
                                        <input type="text" class="form-control" name="maKhuyenMai" placeholder="Nhập mã khuyến mãi">
                                        <?php if (isset($error['maKhuyenMai'])) { ?>
                                            <p class="text-danger"> <?= $error['maKhuyenMai'] ?></p>
                                        <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label for="inputStatus">Loại giảm giá</label>
                                    <select name="loaiGiamGia" id="inputStatus" class="form-control custom-select">
                                        <option value="percent">Phần trăm</option>
                                        <option value="amount">Giá tiền</option>
                                        <option value="freeShip">Miễn phí ship</option>
                                    </select>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="inputStatus">Giá trị giảm giá</label>
                                        <input type="text" class="form-control" name="giaTriGiamGia" placeholder="Nhập giá trị giảm giá">
                                        <?php if (isset($error['giaTriGiamGia'])) { ?>
                                            <p class="text-danger"> <?= $error['giaTriGiamGia'] ?></p>
                                        <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label for="inputStatus">Ngày bắt đầu</label>
                                        <input type="datetime-local" class="form-control" name="ngayBatDau" placeholder="Chọn ngày bắt đầu">
                                        <?php if (isset($error['ngayBatDau'])) { ?>
                                            <p class="text-danger"> <?= $error['ngayBatDau'] ?></p>
                                        <?php } ?>
                                </div>
                                            
                                <div class="form-group">
                                    <label for="inputStatus">Ngày kết thúc</label>
                                        <input type="datetime-local" class="form-control" name="ngayKetThuc" placeholder="Chọn ngày kết thúc">
                                        <?php if (isset($error['ngayKetThuc'])) { ?>
                                            <p class="text-danger"> <?= $error['ngayKetThuc'] ?></p>
                                        <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label for="inputStatus">Mô tả</label>
                                        <textarea name="moTa" class="form-control" placeholder="Nhập mô tả"></textarea>
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