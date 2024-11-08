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


                    <div class="card">
                        <div class="card-header">
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
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
                                    <?php foreach ($lien_he as $key => $value) { ?>
                                        <tr>
                                            <input type="text" value="<?= $value['Id'] ?>" hidden>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $value['Email'] ?></td>
                                            <td><?= $value['Noi_dung'] ?></td>
                                            <td><?= $value['Thoi_gian_gui_lien_he'] ?></td>
                                            <td>
                                                <?php if ($value['Trang_thai'] == 'Processed') { ?>
                                                    <button type="button" class="btn btn-success"> <?= $value['Trang_thai'] ?></button>
                                                <?php } else { ?>
                                                    <button type="button" class="btn btn-primary"> <?= $value['Trang_thai'] ?></button>
                                                <?php } ?>
                                            </td>
                                            <td><i class="fa-solid fa-pencil"></i>
                                                <a href="?act=xoaLienHe&id=<?php echo $value['Id']; ?>" class="btn btn-danger"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa liên hệ này?');">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>

                                                <a href="?act=phanHoi&id=<?php echo $value['Id']; ?>" class="btn btn-info">
                                                    <i class="fas fa-reply"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
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