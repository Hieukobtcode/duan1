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
                    <h1>Quản lý đơn hàng</h1>
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

                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Tên người nhận</th>
                                        <th>Số điện thoại</th>
                                        <th>Ngày đặt</th>
                                        <th>Tổng tiền</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
                                        $searchTerm = $_POST['search']; 
                                        $filteredDM = [];  

                                        foreach ($don_hang as $key => $value) {
                                            if ((isset($value['ma_don_hang']) && stripos($value['ma_don_hang'], $searchTerm) !== false) ||
                                                (isset($value['ngay_dat']) && stripos($value['ngay_dat'], $searchTerm) !== false)
                                            ) {
                                                $filteredDM[] = $value;
                                            }
                                        }
                                    } else {
                                        $filteredDM = $don_hang;
                                    }
                                    ?>
                                    <?php if (empty($filteredDM)): ?>
                                        <tr>
                                            <td colspan="6" class="text-center">Không có kết quả tìm kiếm.</td>
                                        </tr>
                                    <?php else: ?>
                                        
                                        <?php foreach ($filteredDM as $key => $value) { ?>
                                            <tr>
                                                <input type="text" value="<?= $value['donHangId'] ?>" hidden >
                                                <td><?= $key + 1 ?></td>
                                                <td><?= $value['ma_don_hang'] ?></td>
                                                <td><?= $value['ten_nguoi_nhan'] ?></td>
                                                <td><?= $value['so_dien_thoai_nguoi_nhan'] ?></td>
                                                <td><?= $value['ngay_dat'] ?></td>
                                                <td><?= number_format($value['tong_tien'], 0, ',', '.') ?> ₫</td>
                                                <td>
                                                    <?= $value['Ten_trang_thai'] ?>
                                                </td>
                                                <td>
                                                   
                                                    <a href="?act=chiTietDonHang&id=<?= $value['donHangId'] ?>" class="btn btn-danger">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php endif; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Tên người nhận</th>
                                        <th>Số điện thoại</th>
                                        <th>Ngày đặt</th>
                                        <th>Tổng tiền</th>
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