<!--Header-->
<?php require './views/layout/header.php' ?>
<!-- Navbar -->
<?php require './views/layout/navbar.php'  ?>
<!-- /.navbar -->
<!-- Main Sidebar Container -->
<?php require './views/layout/sidebar.php' ?>
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thông tin khách hàng</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid"> 
            <div class="row">
                <div class="col-6">
                    <img src="assets/img/<?= $KhachHang['Anh_dai_dien'] ?>"
                        alt="User avatar"
                        onerror="this.onerror=null; this.src='https://icon-library.com/images/icon-user/icon-user-15.jpg'" width="70%">

                </div>
                <div class="col-6">
                    <div class="container">
                    <table class="table table-borderless">
                        <tbody style="font-size: large">      
                            <tr>
                                <th>Họ tên:</th>
                                <td><?= $KhachHang['Ho_ten'] ?></td>
                            </tr>
                            <tr>
                                <th>Giới tính:</th>
                                <td><?= $KhachHang['gioi_tinh'] ?></td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td><?= $KhachHang['Email'] ?></td>
                            </tr>
                            <tr>
                                <th>Số điện thoại:</th>
                                <td><?= $KhachHang['So_dien_thoai'] ?></td>
                            </tr>
                            <tr>
                                <th>Địa chỉ:</th>
                                <td><?= $KhachHang['Dia_chi'] ?></td>
                            </tr>
                            <tr>
                                <th>Ngày tháng năm sinh:</th>
                                <td><?= $KhachHang['Ngay_thang_nam_sinh'] ?></td>
                            </tr>
                            <tr>
                                <th>Trạng thái:</th>
                                <td><?= $KhachHang['Trang_thai'] ?></td>
                            </tr>
                            <tr>
                                <th>Thời gian tạo:</th>
                                <td><?= $KhachHang['Thoi_gian_tao'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="col-12">
                    
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!--footer-->
<?php require './views/layout/footer.php' ?>
<!--End footer-->

</body>

</html>