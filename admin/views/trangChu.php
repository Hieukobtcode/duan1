<!-- Header -->
<?php require './views/layout/header.php' ?>
<!-- Navbar -->
<?php require './views/layout/navbar.php' ?>
<!-- Sidebar -->
<?php require './views/layout/sidebar.php' ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Page Header -->
    <div class="content-header bg-light py-3 shadow-sm">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h1 class="m-0 fw-bold text-primary">Thống kê</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right bg-transparent">
                      
                        <li class="breadcrumb-item active text-primary">Thống kê</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Statistic Cards -->
            <div class="row">
                <!-- Tổng doanh thu -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow bg-info ">
                        <div class="card-body">
                            <h5 class="card-title  fw-bold">Tổng doanh thu</h5>
                            <h3 class="card-text fw-bold">
                                <?= number_format($tongDoanhThu, 0, ',', '.') ?> VNĐ
                            </h3>
                        </div>
                    </div>
                </div>
                <!-- Đơn hàng đã thanh toán -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow  bg-success">
                        <div class="card-body">
                            <h5 class="card-title  fw-bold">Đơn hàng đã thanh toán</h5>
                            <h3 class="card-text fw-bold">
                                <?= $tongDonHang ?> Đơn Hàng
                            </h3>
                        </div>
                    </div>
                </div>
                <!-- Đơn hàng chưa thanh toán -->
                <div class="col-lg-4 col-md-6 mb-4 ">
                    <div class="card shadow bg-danger">
                        <div class="card-body">
                            <h5 class="card-title  fw-bold">Đơn hàng chưa thanh toán</h5>
                            <h3 class="card-text fw-bold">
                                <?= $tongDonHangChuaThanhToan ?> Đơn Hàng
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sales Chart -->
            <div class="row ">
                <div class="col-lg-8 ">
                    <div class="card shadow mb-4">
                        <div class="card-header bg-primary text-white">
                            <h6 class="m-0 fw-bold">Biểu đồ doanh thu</h6>
                        </div>
                        <div class="card-body">
                        
                            <canvas id="revenue-chart" height="289"></canvas>
                            <div class="text-center mt-3">
                                <h5>Tổng doanh thu: <span class="text-success">
                                        <?= number_format($tongDoanhThu, 0, ',', '.') ?> VNĐ
                                    </span></h5>
                            </div>
                        </div>
                    </div>

                    <script>
                        // Chuyển dữ liệu PHP sang JavaScript
                        const doanhThuLabels = <?= json_encode(array_column($doanhThuTheoNgay, 'ngay')); ?>;
                        const doanhThuData = <?= json_encode(array_column($doanhThuTheoNgay, 'doanh_thu')); ?>;
                        const tongDoanhThu = <?= $tongDoanhThu; ?>;

                        // Vẽ biểu đồ với Chart.js
                        const ctx = document.getElementById('revenue-chart').getContext('2d');
                        const revenueChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: doanhThuLabels, // Các ngày
                                datasets: [{
                                    label: 'Doanh thu theo ngày (VNĐ)',
                                    data: doanhThuData, // Doanh thu
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 2
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'top',
                                    },
                                    title: {
                                        display: true,
                                        text: 'Biểu đồ doanh thu theo ngày'
                                    }
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>
                </div>

                <!-- Order Status -->
                <div class="col-lg-4">
                    <div class="card shadow mb-4">
                        <div class="card-header bg-secondary text-white">
                            <h6 class="m-0 fw-bold">Trạng thái đơn hàng</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-success table-striped">
                                <thead>
                                    <tr>
                                        <th>Trạng thái</th>
                                        <th>Số lượng</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    <?php
                                        $trangThai = [
                                            1 => "Chờ xác nhận",
                                            2 => "Đang xác nhận",
                                            3 => "Đã xác nhận",
                                            4 => "Đang giao",
                                            5 => "Đã giao",
                                            6 => "Giao hàng thành công",
                                            7 => "Giao hàng thất bại",
                                            8 => "Đã hủy"
                                        ];

                                        foreach ($trangThai as $id => $tenTrangThai):
                                            $soLuong = isset($trangThaiDonHang[$id]) ? $trangThaiDonHang[$id] : 0;
                                        ?>
                                    <tr>
                                        <td>
                                            <?= $tenTrangThai ?>
                                        </td>
                                        <td>
                                            <?= $soLuong ?> ĐƠN HÀNG
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>
<style>
    .col-lg-8  {
        width: 500px;
    }
</style>
<!-- Footer -->
<?php require './views/layout/footer.php' ?>