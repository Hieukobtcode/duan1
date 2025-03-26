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
                    <h1>Quản lý kích thước</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <a href="?act=themKichThuoc">
                                <button class="btn btn-success">Thêm kích thước</button>
                            </a>
                        </div>

                        <!-- Tìm kiếm kích thước -->
                        <div class="container mt-4">
                            <form method="POST" class="search-form d-flex justify-content-center">
                                <input type="text" name="search" placeholder="Tìm kiếm kích thước..." class="form-control me-2" />
                            </form>
                            <?php
                            $tu_khoa = '';
                            if (isset($_POST['search'])) {
                                $tu_khoa = strtolower(trim($_POST['search']));
                            }
                            ?>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên kích thước</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($kich_thuoc as $key => $value) { ?>
                                        <?php 
                                        // Kiểm tra từ khóa tìm kiếm có tồn tại trong tên kích thước
                                        if ($tu_khoa === '' || strpos(strtolower($value['ten_kich_thuoc']), $tu_khoa) !== false) { ?>
                                            <tr>
                                                <input type="text" value="<?= $value['id'] ?>" hidden>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= $value['ten_kich_thuoc'] ?></td>
                                                <td>
                                                    <a href="?act=suaKichThuoc&id=<?php echo $value['id']; ?>" class="btn btn-warning">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a href="?act=xoaKichThuoc&id=<?php echo $value['id']; ?>" class="btn btn-danger"
                                                        onclick="return confirm('Bạn có chắc chắn muốn xóa kích thước?');">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên kích thước</th>
                                        <th>Chức năng</th>
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
