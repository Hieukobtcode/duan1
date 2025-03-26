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
                    <h1>Quản lý danh sách sản phẩm</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="?act=themSanPham">
                                <button class="btn btn-outline-success">Thêm sản phẩm</button>
                            </a>
                            <a href="?act=listMauSac">
                                <button class="btn btn-outline-danger">Màu sắc</button>
                            </a>
                            <a href="?act=listKichThuoc">
                                <button class="btn btn-outline-info">Kích thước</button>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="container mt-4">
                            <!-- Form tìm kiếm -->
                            <form method="POST" class="search-form d-flex justify-content-center">
                                <input type="text" name="search" placeholder="Tìm kiếm..." class="form-control me-2" />
                            </form>
                            <?php
                            $tu_khoa = '';
                            if (isset($_POST['search'])) {
                                $tu_khoa = strtolower(trim($_POST['search']));
                            }
                            ?>

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Stt</th>
                                        <th>Mã sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Mô tả</th>
                                        <th>Lượt xem</th>
                                        <th>Danh mục</th>
                                        <th>Khuyến mãi</th>
                                        <th>Trạng thái</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($san_phams as $key => $san_pham) { ?>
                                        <?php if ($tu_khoa === '' || strpos(strtolower($san_pham['Mo_ta']), $tu_khoa) !== false || strpos(strtolower($san_pham['Ten_san_pham']), $tu_khoa) !== false || strpos(strtolower($san_pham['Ma_san_pham']), $tu_khoa) !== false) { ?>
                                            <tr>
                                                <input type="text" name="san_pham_id" value="<?= $san_pham['Id'] ?>" hidden>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= $san_pham['Ma_san_pham'] ?></td>
                                                <td><?= $san_pham['Ten_san_pham'] ?></td>
                                                <td><?= $san_pham['Mo_ta'] ?></td>
                                                <td><?= $san_pham['luot_xem'] ?></td>
                                                <td>
                                                    <?php foreach ($danh_mucs as $danh_muc) {
                                                        if ($san_pham['chi_tiet_danh_muc_id'] == $danh_muc['id']) {
                                                            echo $danh_muc['mo_ta'];
                                                        }
                                                    } ?>
                                                </td>
                                                <td>
                                                    <?php foreach ($khuyen_mais as $khuyen_mai) {
                                                        if ($khuyen_mai['Id'] == $san_pham['khuyen_mai_id']) {
                                                            echo $khuyen_mai['ten_khuyen_mai'];
                                                        }
                                                    } ?>
                                                </td>
                                                <td>
                                                    <?php if ($san_pham['Trang_thai'] == 'Active') { ?>
                                                        <button type="button" class="btn btn-success btn-sm">Active</button>
                                                    <?php } else { ?>
                                                        <button type="button" class="btn btn-danger btn-sm">Inactive</button>
                                                    <?php } ?>
                                                </td>

                                                <td class="text-center">
                                                    <a href="?act=themBienThe&id=<?= $san_pham['Id'] ?>" class="btn btn-info btn-sm">
                                                        <i class="fas fa-plus"></i>
                                                    </a>

                                                    <a href="?act=chiTietSanPham&id=<?= $san_pham['Id'] ?>" class="btn btn-info btn-sm">
                                                        <i class="fas fa-info"></i> </a>

                                                    <a href="?act=suaSanPham&id=<?= $san_pham['Id'] ?>" class="btn btn-warning btn-sm">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>

                                                    <a onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này?')" href="?act=xoaSanPham&id=<?= $san_pham['Id'] ?>" class="btn btn-danger btn-sm">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php require './views/layout/footer.php' ?>