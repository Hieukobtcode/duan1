<?php require 'views/layout/header.php' ?>;
<?php require 'views/layout/navbar.php' ?>;
<?php require 'views/layout/sidebar.php' ?>;



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <div class="card">
                        <div class="card-header text-center bg-primary text-white">
                            <h3>Chi tiết khuyến mãi</h3>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label">Tên khuyến mãi</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="" class="form-control" value="<?= $khuyen_mai['ten_khuyen_mai'] ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label">Mã khuyến mãi</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="" class="form-control" value="<?= $khuyen_mai['Ma_khuyen_mai'] ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label">Loại giảm giá</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="" class="form-control" value="<?= $khuyen_mai['Loai_giam_gia'] ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label">Giá trị giảm giá</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="" class="form-control" value="<?= $khuyen_mai['Gia_tri_giam_gia'] ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label">Ngày bắt đầu</label>
                                    <div class="col-sm-8">
                                        <input type="datetime-local" id="" class="form-control" value="<?= $khuyen_mai['Ngay_bat_dau'] ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label">Ngày kết thúc</label>
                                    <div class="col-sm-8">
                                        <input type="datetime-local" id="" class="form-control" value="<?= $khuyen_mai['Ngay_ket_thuc'] ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label">Mô tả</label>
                                    <div class="col-sm-8">
                                        <textarea id="description" class="form-control" rows="3" readonly><?= $khuyen_mai['mo_ta'] ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label">Trạng thái</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="" class="form-control" value="<?= $khuyen_mai['Trang_thai'] ?>" readonly>
                                    </div>
                                </div>

                                <div class="text-center mt-4">
                                    <a href="?act=suaKhuyenMai&id=<?php echo $khuyen_mai['Id']; ?>" class="btn btn-warning">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="?act=xoaKhuyenMai&id=<?php echo $khuyen_mai['Id']; ?>" class="btn btn-danger"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa khuyến mãi này?');">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            </form>

                        </div>
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