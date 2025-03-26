<?php require 'views/layout/header.php' ?>
<?php require 'views/layout/navbar.php' ?>
<?php require 'views/layout/sidebar.php' ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý khuyến mại</h1>
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
                        <div class="card-header">
                            <!-- Flex container for button and search form -->
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- "Thêm khuyến mại" Button on the left -->
                                <a href="?act=themKhuyenMai">
                                    <button class="btn btn-success">Thêm khuyến mại</button>
                                </a>

                                <!-- Search form on the right -->
                                <form method="POST" style="max-width: 400px; width: 100%;">
                                    <input type="text" name="search" placeholder="Tìm kiếm ..." />
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table  class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên khuyến mại</th>
                                        <th>Mã khuyến mại</th>
                                        <th>Loại giảm giá</th>
                                        <th>Giá trị giảm giá</th>
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

                                        // Lọc danh sách khuyến mãi
                                        foreach ($khuyen_mai as $key => $value) {
                                            // Kiểm tra tìm kiếm trong các trường "Tên khuyến mại" và "Mã khuyến mại"
                                            if ((isset($value['Ma_khuyen_mai']) && stripos($value['Ma_khuyen_mai'], $searchTerm) !== false) || 
                                                (isset($value['ten_khuyen_mai']) && stripos($value['ten_khuyen_mai'], $searchTerm) !== false)) {
                                                // Nếu tìm thấy, thêm khuyến mãi vào mảng kết quả
                                                $filteredDM[] = $value;
                                            }
                                        }
                                    } else {
                                        // Nếu không tìm kiếm, hiển thị tất cả khuyến mãi
                                        $filteredDM = $khuyen_mai;
                                    }
                                    ?>
                                    <?php if (empty($filteredDM)): ?>
                                        <tr>
                                            <td colspan="7" class="text-center">Không có kết quả tìm kiếm.</td>
                                        </tr>
                                    <?php else: ?>
                                    <?php foreach ($filteredDM as $key => $value) { ?>
                                        <tr>
                                            <input type="text" value="<?= $value['Id'] ?>" hidden>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $value['ten_khuyen_mai'] ?></td>
                                            <td><?= $value['Ma_khuyen_mai'] ?></td>
                                            <td><?= $value['Loai_giam_gia'] ?></td>
                                            <td><?= $value['Gia_tri_giam_gia'] ?></td>
                                            <td>
                                                <?php if ($value['Trang_thai'] == 'Active') { ?>
                                                    <button type="button" class="btn btn-success"> <?= $value['Trang_thai'] ?></button>
                                                <?php } else { ?>
                                                    <button type="button" class="btn btn-danger"> <?= $value['Trang_thai'] ?></button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="?act=chiTietKhuyenMai&id=<?php echo $value['Id']; ?>" class="btn btn-info">
                                                    <i class="fas fa-info"></i>
                                                </a>
                                                <a href="?act=suaKhuyenMai&id=<?php echo $value['Id']; ?>" class="btn btn-warning">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a href="?act=xoaKhuyenMai&id=<?php echo $value['Id']; ?>" class="btn btn-danger"
                                                   onclick="return confirm('Bạn có chắc chắn muốn xóa khuyến mãi này?');">
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
                                        <th>Tên khuyến mại</th>
                                        <th>Mã khuyến mại</th>
                                        <th>Loại giảm giá</th>
                                        <th>Giá trị giảm giá</th>
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
