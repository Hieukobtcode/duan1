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
                    <h1>Quản lý danh sách biến thể</h1>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* Styles for table and button improvements */
        .table img {
            width: 80px;
            height: auto;
            object-fit: cover;
            border-radius: 8px;
        }

        .table th,
        .table td {
            vertical-align: middle;
            text-align: center;
        }

        .btn {
            padding: 5px 10px;
            font-size: 12px;
        }

        .card-title {
            font-weight: bold;
            color: #333;
            margin: 0;
        }

        .content-header h1 {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
        }

        .card-header h3 {
            font-size: 18px;
            font-weight: bold;
            margin: 0;
        }
    </style>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h3 class="card-title">Các biến thể của sản phẩm: <?= $ten_san_pham['Ten_san_pham'] ?></h3>
                        </div>
                        
                        <!-- Tìm kiếm biến thể -->
                        <div class="container mt-4">
                            <form method="POST" class="search-form d-flex justify-content-center">
                                <input type="text" name="search" placeholder="Tìm kiếm biến thể..." class="form-control me-2" />
                            </form>
                            <?php
                            $tu_khoa = '';
                            if (isset($_POST['search'])) {
                                $tu_khoa = strtolower(trim($_POST['search']));
                            }
                            ?>
                        </div>

                        <!-- Card body with table -->
                        <div class="card-body">
                            <table class="table table-bordered table-hover table-lig">
                                <thead class="table-light">
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã SKU</th>
                                        <th>Ảnh</th>
                                        <th>Màu sắc</th>
                                        <th>Kích thước</th>
                                        <th>Giá nhập</th>
                                        <th>Giá bán</th>
                                        <th>Giá khuyến mãi</th>
                                        <th>Ngày nhập</th>
                                        <th>Số lượng tồn kho</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($bien_thes as $key => $bien_the) { ?>
                                        <?php
                                        if (
                                            $tu_khoa === '' ||
                                            strpos(strtolower($bien_the['ma_sku']), $tu_khoa) !== false ||
                                            strpos(strtolower($bien_the['ten_mau']), $tu_khoa) !== false ||
                                            strpos(strtolower($bien_the['ten_kich_thuoc']), $tu_khoa) !== false
                                        ) { ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= $bien_the['ma_sku'] ?></td>
                                                <td>
                                                    <img src="./assets/img/<?= $bien_the['anh_bien_the'] ?>" alt="Ảnh sản phẩm">
                                                </td>
                                                <td><?= $bien_the['ten_mau'] ?></td>
                                                <td><?= $bien_the['ten_kich_thuoc'] ?></td>
                                                <td><?= number_format($bien_the['gia_nhap']) ?> đ</td>
                                                <td><?= number_format($bien_the['gia_ban']) ?> đ</td>
                                                <td><?= number_format($bien_the['gia_khuyen_mai']) ?> đ</td>
                                                <td><?= date('d/m/Y', strtotime($bien_the['ngay_nhap'])) ?></td>
                                                <td><?= $bien_the['so_luong_ton_kho'] ?></td>
                                                <td>
                                                    <a href="?act=suaBienThe&id=<?= $bien_the['chi_tiet_id'] ?>" class="btn btn-warning btn-sm" title="Sửa biến thể">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a onclick="return confirm('Bạn chắc chắn muốn xóa biến thể này?')" href="?act=xoaBienThe&id=<?= $bien_the['chi_tiet_id'] ?>" class="btn btn-danger btn-sm" title="Xóa biến thể">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
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
    </section>
</div>
<?php require './views/layout/footer.php' ?>