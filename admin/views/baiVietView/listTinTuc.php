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
                    <h1>Quản lý bài viết</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <style>
        img {
            width: 100px;
            height: 70px;
        }
    </style>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <div class="card">
                        <div class="card-header">
                            <a href="?act=themTinTuc">
                                <button class="btn btn-success">Thêm bài viết</button>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tiêu đề</th>
                                        <th>Ảnh</th>
                                        <th>Thời gian tạo</th>
                                        <th>Thời gian cập nhật</th>
                                        <th>Trạng thái</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tin_tuc as $key => $value) { ?>
                                        <tr>
                                            <input type="text" name="id" value="<?= $value['Id'] ?>" hidden>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $value['Tieu_de'] ?></td>
                                            <td>
                                                <img src="./assets/img/<?= $value['img'] ?>" alt="">
                                            </td>
                                            <td><?= $value['Thoi_gian_tao'] ?></td>
                                            <td><?= $value['Thoi_gian_cap_nhat'] ?></td>
                                            <td>
                                                <?php if($value['Trang_thai']=='Published'){?>
                                                    <button type="button" class="btn btn-success"> <?= $value['Trang_thai'] ?></button>
                                                <?php } else{?>
                                                    <button type="button" class="btn btn-secondary"> <?= $value['Trang_thai'] ?></button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="?act=suaTinTuc&id=<?php echo $value['Id']; ?>" class="btn btn-warning">Sửa</a>
                                                <a href="?act=xoaTinTuc&id=<?php echo $value['Id']; ?>" class="btn btn-danger"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa tin tức này?');">
                                                    Xóa
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tiêu đề</th>
                                        <th>Ảnh</th>
                                        <th>Thời gian tạo</th>
                                        <th>Thời gian cập nhật</th>
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