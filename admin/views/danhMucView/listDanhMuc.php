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
                    <h1>Quản lý danh mục</h1>
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
                            <input type="text" name="search" placeholder="Tìm kiếm danh mục..." class="form-control me-2" />
                        </form>

                    <div class="card">
                        <div class="card-header">
                            <a href="?act=themDanhMuc">
                                <button class="btn btn-success">Thêm danh mục</button>
                            </a> 
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên danh mục</th>
                                        <th>Mô tả</th>
                                        <th>Ngày tạo</th>
                                        <th>Ngày cập nhật</th>
                                        <th>Trạng thái</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                    // Kiểm tra xem người dùng có gửi từ khóa tìm kiếm không
                                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
                                        $searchTerm = $_POST['search'];  // Lấy từ khóa tìm kiếm người dùng nhập vào
                                        $filteredDM = [];  // Mảng lưu trữ kết quả tìm kiếm

                                        // Lọc danh sách quản trị viên
                                        foreach ($danh_muc as $key => $value) {
                                            // Kiểm tra tìm kiếm trong các trường "Tên đăng nhập", "Email", và "Số điện thoại"
                                            if ((isset($value['Ten_danh_muc']) && stripos($value['Ten_danh_muc'], $searchTerm) !== false) || 
                                                (isset($value['Mo_ta']) && stripos($value['Mo_ta'], $searchTerm) !== false)) {
                                                // Nếu tìm thấy, thêm quản trị viên vào mảng kết quả
                                                $filteredDM[] = $value;
                                            }
                                        }
                                    } else {
                                        // Nếu không tìm kiếm, hiển thị tất cả quản trị viên
                                        $filteredDM = $danh_muc;
                                    }
                                    ?>
                                    <?php if (empty($filteredDM)): ?>
                                        <tr>
                                            <td colspan="6" class="text-center">Không có kết quả tìm kiếm.</td>
                                        </tr>
                                    <?php else: ?>

                                    <?php foreach ($filteredDM as $key => $value) { ?>
                                        <tr>
                                            <input type="text" value="<?= $value['Id'] ?>" hidden>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $value['Ten_danh_muc'] ?></td>
                                            <td><?= $value['Mo_ta'] ?></td>
                                            <td><?= $value['Ngay_tao'] ?></td>
                                            <td><?= $value['Ngay_cap_nhat'] ?></td>
                                            <td>
                                                <?php if ($value['trang_thai'] == 'Active') { ?>
                                                    <button type="button" class="btn btn-success"> <?= $value['trang_thai'] ?></button>
                                                <?php } else { ?>
                                                    <button type="button" class="btn btn-danger"> <?= $value['trang_thai'] ?></button>
                                                <?php } ?>

                                            </td>
                                            <td>
                                                <i class="fa-solid fa-pencil"></i>
                                                <a href="?act=suaDanhMuc&id=<?php echo $value['Id']; ?>" class="btn btn-warning">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a href="?act=xoaDanhMuc&id=<?php echo $value['Id']; ?>" class="btn btn-danger"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php endif; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên danh mục</th>
                                        <th>Mô tả</th>
                                        <th>Ngày tạo</th>
                                        <th>Ngày cập nhật</th>
                                        <th>Trạng thái</th>
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