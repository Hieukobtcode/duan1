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
                    <h1>Quản lý tài khoản quản trị viên</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
<style>
    .search-form button {
            border-radius: 20px;
            padding: 10px 20px;
        }
        .search-form input {
            width: 100%;
            font-size: 14px;
            margin-left: 10px;
        }
        .search-form button {
            border-radius: 50px; /* Bo góc cho nút */
            padding: 5px 10px;
            font-size: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            
            width: 20%;
        }
</style>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Form tìm kiếm -->
                    <form method="POST" class="search-form d-flex justify-content-center">
                        <input type="text" name="search" placeholder="Tìm kiếm..." class="form-control me-2" />
                    </form>
                    <div class="card">
                        <div class="card-header">
                            <a href="?act=themQuanTri">
                                <button class="btn btn-success">Thêm tài khoản</button>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên đăng nhập</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    // Kiểm tra xem người dùng có gửi từ khóa tìm kiếm không
                                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
                                        $searchTerm = $_POST['search'];  // Lấy từ khóa tìm kiếm người dùng nhập vào
                                        $filteredAdmins = [];  // Mảng lưu trữ kết quả tìm kiếm

                                        // Lọc danh sách quản trị viên
                                        foreach ($quan_tri as $key => $value) {
                                            // Kiểm tra tìm kiếm trong các trường "Tên đăng nhập", "Email", và "Số điện thoại"
                                            if ((isset($value['Ten_dang_nhap']) && stripos($value['Ten_dang_nhap'], $searchTerm) !== false) || 
                                                (isset($value['Email']) && stripos($value['Email'], $searchTerm) !== false) || 
                                                (isset($value['So_dien_thoai']) && stripos($value['So_dien_thoai'], $searchTerm) !== false)) {
                                                // Nếu tìm thấy, thêm quản trị viên vào mảng kết quả
                                                $filteredAdmins[] = $value;
                                            }
                                        }
                                    } else {
                                        // Nếu không tìm kiếm, hiển thị tất cả quản trị viên
                                        $filteredAdmins = $quan_tri;
                                    }
                                    ?>
                                    <?php if (empty($filteredAdmins)): ?>
                                        <tr>
                                            <td colspan="6" class="text-center">Không có kết quả tìm kiếm.</td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($filteredAdmins as $key => $value) { ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= $value['Ten_dang_nhap'] ?></td>
                                                <td><?= $value['Email'] ?></td>
                                                <td><?= $value['So_dien_thoai'] ?></td>
                                                <td>
                                                    <?php if($value['Trang_thai']=='Active'){?>
                                                        <button type="button" class="btn btn-success"><?= $value['Trang_thai'] ?></button>
                                                    <?php } else { ?>
                                                        <button type="button" class="btn btn-danger"><?= $value['Trang_thai'] ?></button>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <a href="?act=suaQuanTri&id=<?= $value['Id']; ?>" class="btn btn-warning">Sửa</a>
                                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa mật khẩu?');"
                                                       href="?act=resetPass&id=<?= $value['Id']; ?>" class="btn btn-danger">Reset</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php endif; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên đăng nhập</th>
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
