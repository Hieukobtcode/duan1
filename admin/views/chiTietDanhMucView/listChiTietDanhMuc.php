<?php require 'views/layout/header.php'; ?>
<?php require 'views/layout/navbar.php'; ?>
<?php require 'views/layout/sidebar.php'; ?>

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
                    <!-- Form tìm kiếm -->
                    <form method="POST" class="search-form d-flex justify-content-center">
                        <input type="text" name="search" placeholder="Tìm kiếm..." class="form-control me-2" />
                    </form>
                    <?php
                    $tu_khoa = '';
                    if (isset($_POST['search'])) {
                        $tu_khoa = strtolower(trim($_POST['search']));
                    }
                    ?>

                    <div class="card mt-3">
                        <div class="card-header">
                            <a href="?act=themChiTietDanhMuc">
                                <button class="btn btn-success">Thêm chi tiết danh mục</button>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mô tả</th>
                                        <th>Danh mục</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $hien_thi = false;
                                    foreach ($list_chi_tiet_danh_muc as $key => $value) {
                                        if ($tu_khoa === '' || strpos(strtolower($value['mo_ta']), $tu_khoa) !== false || strpos(strtolower($value['Ten_danh_muc']), $tu_khoa) !== false) {
                                            $hien_thi = true;
                                    ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= htmlspecialchars($value['mo_ta']) ?></td>
                                                <td><?= htmlspecialchars($value['Ten_danh_muc']) ?></td>
                                                <td>
                                                    <a href="?act=suaChiTietDanhMuc&id=<?= $value['id']; ?>" class="btn btn-warning">
                                                        <i class="fas fa-pencil-alt"></i> Sửa
                                                    </a>
                                                    <a href="?act=xoaChiTietDanhMuc&id=<?= $value['id']; ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">
                                                        <i class="fas fa-trash-alt"></i> Xóa
                                                    </a>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    if (!$hien_thi) {
                                        echo '<tr><td colspan="4" class="text-center">Không có kết quả phù hợp</td></tr>';
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mô tả</th>
                                        <th>Danh mục</th>
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
<?php require './views/layout/footer.php'; ?>

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