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
                            <!-- Card Header, bạn có thể thêm các nội dung như nút thêm khách hàng ở đây -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
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
                                    <?php
                                    // Kiểm tra xem người dùng có gửi từ khóa tìm kiếm không
                                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
                                        $searchTerm = $_POST['search'];  // Lấy từ khóa tìm kiếm người dùng nhập vào
                                        $filteredCustomers = [];  // Mảng lưu trữ kết quả tìm kiếm
                                        // Lọc danh sách khách hàng
                                        foreach ($listKhachHang as $KhachHang) {
                                            // Kiểm tra và gán giá trị mặc định nếu trường là null
                                            $tenDangNhap = $KhachHang['Ten_dang_nhap'] ?? '';
                                            $email = $KhachHang['Email'] ?? '';
                                            $soDienThoai = $KhachHang['So_dien_thoai'] ?? '';

                                            // Kiểm tra tìm kiếm trong các trường "Tên đăng nhập", "Email" và "Số điện thoại"
                                            if (
                                                stripos($tenDangNhap, $searchTerm) !== false ||
                                                stripos($email, $searchTerm) !== false ||
                                                stripos($soDienThoai, $searchTerm) !== false
                                            ) {
                                                // Nếu tìm thấy, thêm khách hàng vào mảng kết quả
                                                $filteredCustomers[] = $KhachHang;
                                            }
                                        }
                                    } else {
                                        // Nếu không tìm kiếm, hiển thị tất cả khách hàng
                                        $filteredCustomers = $listKhachHang;
                                    }
                                    ?>

                                    <?php if (empty($filteredCustomers)): ?>
                                        <tr>
                                            <td colspan="7" class="text-center">Không có kết quả tìm kiếm.</td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($filteredCustomers as $key => $KhachHang): ?>
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
                                                        <button type="button" class="btn btn-success"><?= $KhachHang['Trang_thai'] ?></button>
                                                    <?php } else { ?>
                                                        <button type="button" class="btn btn-danger"><?= $KhachHang['Trang_thai'] ?></button>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <a href="?act=chiTietKhachHang&id=<?= $KhachHang['Id'] ?>" class="btn btn-primary">Chi tiết</a>
                                                    <a href="?act=suaKhachHang&id=<?= $KhachHang['Id'] ?>" class="btn btn-warning">Sửa</a>
                                                    <a onclick="return confirm('Bạn có chắc chắn muốn đặt lại mật khẩu?');"
                                                        href="?act=resetPass&id=<?= $KhachHang['Id'] ?>" class="btn btn-danger">Reset</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên đăng nhập</th>
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
    