<?php require 'views/layout/header.php' ?>;
<?php require 'views/layout/navbar.php' ?>;
<?php require 'views/layout/sidebar.php' ?>;



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý tài khoản khách hàng</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <style>
        img {
            width: 100px;
            height: 70px;
        }
    </style>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <div class="card">
                        <div class="card-header">
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên đăng nhập</th>
                                        <th>Ảnh đại diện</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listKhachHang as $key => $KhachHang) { ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $KhachHang['Ten_dang_nhap'] ?></td>
                                            <td>
                                                <img src="assets/img/<?= $KhachHang['Anh_dai_dien'] ?>"
                                                    alt="User avatar"
                                                    onerror="this.onerror=null; this.src='https://icon-library.com/images/icon-user/icon-user-15.jpg'" width="70%">

                                            </td>
                                            <td><?= $KhachHang['Email'] ?></td>
                                            <td><?= $KhachHang['So_dien_thoai'] ?></td>
                                            <td>
                                                <?php if ($KhachHang['Trang_thai'] == 'Active') { ?>
                                                    <button type="button" class="btn btn-success"> <?= $KhachHang['Trang_thai'] ?></button>
                                                <?php } else { ?>
                                                    <button type="button" class="btn btn-danger"> <?= $KhachHang['Trang_thai'] ?>  </button>
                                                <?php } ?>
                                            </td>
                                            <td>

                                                <a href="?act=chiTietKhachHang&id=<?php echo $KhachHang['Id']; ?>" class="btn btn-primary">Chi tiết</a>
                                                <a href="?act=suaKhachHang&id=<?php echo $KhachHang['Id']; ?>" class="btn btn-warning">Sửa</a>
                                                <a
                                                    onclick="return confirm('Bạn có chắc chắn muốn đặt lại mật khẩu?');"
                                                    href="?act=resetPass&id=<?php echo $value['Id']; ?>" class="btn btn-danger">
                                                    Reset
                                                </a>

                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Họ tên</th>
                                        <th>Ảnh đại diện</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require './views/layout/footer.php' ?>

<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
</body>

</html>