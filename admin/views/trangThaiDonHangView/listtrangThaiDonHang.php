<?php require 'views/layout/header.php' ?>
<?php require 'views/layout/navbar.php' ?>
<?php require 'views/layout/sidebar.php' ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) with Search Form on Top -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý trạng thái đơn hàng</h1>
                </div>
                <div class="col-sm-6 d-flex justify-content-end">

                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <a href="?act=themtrangThaiDonHang">
                                <button class="btn btn-success">Thêm trạng thái đơn hàng</button>
                            </a>
                            <form method="POST" class="d-flex align-items-center" style="margin-left: auto;">
                                <input type="text" name="search" placeholder="Tìm kiếm trạng thái đơn hàng..."
                                    style="height: calc(1.5em + 0.75rem + 2px); font-size: 1rem; border-radius: 0.25rem; margin-right: 0.5rem; padding: 0.375rem 0.75rem;" />
                                <button type="submit" class="btn btn-primary" style="font-size: 1rem; padding: 0.5rem 1rem; border-radius: 0.25rem;">Tìm kiếm</button>
                            </form>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên trạng thái đơn hàng</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Handle search functionality
                                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
                                        $searchTerm = $_POST['search'];
                                        $filteredCustomers = [];
                                        foreach ($trang_thai_don_hang as $trangthaidonhang) {
                                            $trangthai = $trangthaidonhang['Ten_trang_thai'] ?? '';
                                            if (stripos($trangthai, $searchTerm) !== false) {
                                                $filteredCustomers[] = $trangthaidonhang;
                                            }
                                        }
                                    } else {
                                        $filteredCustomers = $trang_thai_don_hang;
                                    }
                                    ?>

                                    <?php if (empty($filteredCustomers)): ?>
                                        <tr>
                                            <td colspan="3" class="text-center">Không có kết quả tìm kiếm.</td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($filteredCustomers as $key => $value) { ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= $value['Ten_trang_thai'] ?></td>
                                                <td>
                                                    <a href="?act=suatrangThaiDonHang&id=<?= $value['Id']; ?>" class="btn btn-warning">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a href="?act=xoatrangThaiDonHang&id=<?= $value['Id']; ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php endif; ?>
                                </tbody>
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
<?php require 'views/layout/footer.php' ?>

<!-- Page specific script -->
<script>
   