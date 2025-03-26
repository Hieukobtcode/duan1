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
                    <h1>Quản lý hình ảnh sản phẩm</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <style>
        img {
            width: 100px;
            height: 70px;
        }

        /* Container holding the button and search bar */
        .action-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Style for search input and button */
        .action-container input {
            height: calc(1.5em + 0.75rem + 2px);
            font-size: 1rem;
            border-radius: 0.25rem;
            padding: 0.375rem 0.75rem;
        }

        .action-container button {
            font-size: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
        }
    </style>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <div class="action-container">
                                <!-- "Thêm hình ảnh sản phẩm" Button on the left -->
                                <a href="?act=themHinhAnhSP">
                                    <button class="btn btn-success">Thêm hình ảnh sản phẩm</button>
                                </a>

                                <!-- Search form on the right -->
                                <form method="POST" style="max-width: 400px; width: 100%;">
                                    <input type="text" name="search" placeholder="Tìm kiếm mô tả hình ảnh..." />
                                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mô tả</th>
                                        <th>Hình ảnh sản phẩm</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
                                        $searchTerm = $_POST['search'];
                                        $filteredImages = [];
                                        foreach ($hinh_anh as $image) {
                                            if (stripos($image['mo_ta'], $searchTerm) !== false) {
                                                $filteredImages[] = $image;
                                            }
                                        }
                                    } else {
                                        $filteredImages = $hinh_anh;
                                    }
                                    ?>

                                    <?php if (empty($filteredImages)): ?>
                                        <tr>
                                            <td colspan="4" class="text-center">Không có kết quả tìm kiếm.</td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($filteredImages as $key => $value): ?>
                                            <tr>
                                                <input type="text" name="id" value="<?= $value['id'] ?>" hidden>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= $value['mo_ta'] ?></td>
                                                <td>
                                                    <img src="./assets/img/<?= $value['img'] ?>" alt="">
                                                </td>
                                                <td>
                                                    <a href="?act=suaHinhAnhSP&id=<?= $value['id']; ?>" class="btn btn-warning">Sửa</a>
                                                    <a href="?act=xoaHinhAnhSP&id=<?= $value['id']; ?>" class="btn btn-danger"
                                                       onclick="return confirm('Bạn có chắc chắn muốn xóa hình ảnh này?');">
                                                       Xóa
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mô tả</th>
                                        <th>Hình ảnh sản phẩm</th>
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
