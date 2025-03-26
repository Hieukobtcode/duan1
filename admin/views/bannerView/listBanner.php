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
                    <h1>Quản lý banner</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Form tìm kiếm -->

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <form method="POST" class="search-form d-flex justify-content-center">
                <input type="text" name="search" placeholder="Tìm kiếm banner..." class="form-control me-2" />
            </form>
            <div class="row">
                <div class="col-12">


                    <div class="card">
                        <div class="card-header">
                            <a href="?act=themBanner">
                                <button class="btn btn-success">Thêm banner</button>
                            </a>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tiêu đề</th>
                                        <th>Ảnh</th>
                                        <th>Trạng thái</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Kiểm tra xem người dùng có gửi từ khóa tìm kiếm không
                                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
                                        $searchTerm = $_POST['search'];  // Lấy từ khóa tìm kiếm người dùng nhập vào
                                        $filteredBanner = [];  // Mảng lưu trữ kết quả tìm kiếm

                                        // Lọc danh sách quản trị viên
                                        foreach ($banner as $key => $value) {
                                            // Kiểm tra tìm kiếm trong các trường "Tên đăng nhập", "Email", và "Số điện thoại"
                                            if ((isset($value['Tieu_de']) && stripos($value['Tieu_de'], $searchTerm) !== false)) {
                                                // Nếu tìm thấy, thêm quản trị viên vào mảng kết quả
                                                $filteredBanner[] = $value;
                                            }
                                        }
                                    } else {
                                        // Nếu không tìm kiếm, hiển thị tất cả quản trị viên
                                        $filteredBanner = $banner;
                                    }
                                    ?>
                                    <?php if (empty($filteredBanner)): ?>
                                        <tr>
                                            <td colspan="6" class="text-center">Không có kết quả tìm kiếm.</td>
                                        </tr>
                                    <?php else: ?>

                                        <?php foreach ($filteredBanner as $key => $value) { ?>
                                            <tr>
                                                <input type="text" value="<?= $value['Id'] ?>" hidden>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= $value['Tieu_de'] ?></td>
                                                <td>
                                                    <img src="./assets/img/<?= $value['Duong_dan_anh'] ?>" alt="" width="400px">
                                                </td>
                                                <td>
                                                    <?php if ($value['trang_thai'] == 'Active') { ?>
                                                        <button type="button" class="btn btn-success"> <?= $value['trang_thai'] ?></button>
                                                    <?php } else { ?>
                                                        <button type="button" class="btn btn-danger"> <?= $value['trang_thai'] ?></button>
                                                    <?php } ?>

                                                </td>
                                                <td>
                                                    <i class="fa-solid fa-pencil"></i>
                                                    <a href="?act=suaBanner&id=<?php echo $value['Id']; ?>" class="btn btn-warning">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a href="?act=xoaBanner&id=<?php echo $value['Id']; ?>" class="btn btn-danger"
                                                        onclick="return confirm('Bạn có chắc chắn muốn xóa banner này?');">
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
                                        <th>Tiêu đề</th>
                                        <th>Ảnh</th>
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