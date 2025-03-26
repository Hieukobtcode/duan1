<?php require 'views/layout/header.php' ?>;
<?php require 'views/layout/navbar.php' ?>;
<?php require 'views/layout/sidebar.php' ?>;


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span id="modalMessage"></span> <!-- Thông báo sẽ hiển thị ở đây -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý liên hệ</h1>
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
                        <input type="text" name="search" placeholder="Tìm kiếm liên hệ..." class="form-control me-2" />
                    </form>

                    <div class="card">
                        <div class="card-header">
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table  class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Email</th>
                                        <th>Nội dung</th>
                                        <th>Thời gian</th>
                                        <th>Trạng thái</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                    // Kiểm tra xem người dùng có gửi từ khóa tìm kiếm không
                                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
                                        $searchTerm = $_POST['search'];  // Lấy từ khóa tìm kiếm người dùng nhập vào
                                        $filteredLH = [];  // Mảng lưu trữ kết quả tìm kiếm

                                        // Lọc danh sách quản trị viên
                                        foreach ($lien_he as $key => $value) {
                                            // Kiểm tra tìm kiếm trong các trường "Tên đăng nhập", "Email", và "Số điện thoại"
                                            if ((isset($value['Email']) && stripos($value['Email'], $searchTerm) !== false)) {
                                                // Nếu tìm thấy, thêm quản trị viên vào mảng kết quả
                                                $filteredLH[] = $value;
                                            }
                                        }
                                    } else {
                                        // Nếu không tìm kiếm, hiển thị tất cả quản trị viên
                                        $filteredLH = $lien_he;
                                    }
                                    ?>
                                    <?php if (empty($filteredLH)): ?>
                                        <tr>
                                            <td colspan="6" class="text-center">Không có kết quả tìm kiếm.</td>
                                        </tr>
                                    <?php else: ?>

                                    <?php foreach ($filteredLH as $key => $value) { ?>
                                        <tr>
                                            <input type="text" value="<?= $value['Id'] ?>" hidden>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $value['Email'] ?></td>
                                            <td><?= $value['Noi_dung'] ?></td>
                                            <td><?= $value['Thoi_gian_gui_lien_he'] ?></td>
                                            <td>
                                                <?php if ($value['Trang_thai'] == 'Processed') { ?>
                                                    <button type="button" class="btn btn-secondary"> <?= $value['Trang_thai'] ?></button>
                                                <?php } else { ?>
                                                    <button type="button" class="btn btn-primary"> <?= $value['Trang_thai'] ?></button>
                                                <?php } ?>
                                            </td>

                                            <td>
                                                <!-- Nút thay đổi trạng thái -->
                                                <?php if ($value['Trang_thai'] == 'New') { ?>
                                                    <a onclick="return confirm('Đặt lại trạng thái liên hệ')" href="?act=capnhatTrangThai&id=<?php echo $value['Id']; ?>" class="btn btn-warning">
                                                        <i class="fas fa-wrench"></i>
                                                    </a>
                                                <?php } ?>

                                                <a href="?act=xoaLienHe&id=<?php echo $value['Id']; ?>" class="btn btn-danger"
                                                    onclick="return confirm('Hãy xử lý liên hệ trước khi xóa?');">
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
                                        <th>Email</th>
                                        <th>Nội dung</th>
                                        <th>Thời gian</th>
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
<!-- Thêm mã JavaScript để hiển thị modal nếu có thông báo -->
<script>
    // Kiểm tra xem có thông báo từ session không
    <?php if (isset($_SESSION['modal_message'])): ?>
        // Hiển thị modal và thông báo
        $('#exampleModal').modal('show');
        $('#modalMessage').text("<?php echo $_SESSION['modal_message']; ?>");
        <?php unset($_SESSION['modal_message']); ?> // Xóa thông báo sau khi hiển thị
    <?php endif; ?>
</script>
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