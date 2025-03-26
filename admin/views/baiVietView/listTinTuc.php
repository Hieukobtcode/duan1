<?php require 'views/layout/header.php'; ?>
<?php require 'views/layout/navbar.php'; ?>
<?php require 'views/layout/sidebar.php'; ?>

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
            object-fit: cover;
        }

        /* Styling for search and button alignment */
        .card-header {
            display: flex;
            align-items: center;
        }

        .search-form {
            display: flex;
            align-items: center;
        }

        .search-form input {
            border-radius: 20px;
            padding: 10px;
            font-size: 14px;
            width: 250px;
            margin-right: 10px;
        }

        .search-form button {
            border-radius: 20px;
            font-size: 14px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
        }

        /* Table styling */
        table {
            width: 100%;
            text-align: center;
        }

        table th,
        table td {
            vertical-align: middle;
        }

        .btn-success,
        .btn-secondary {
            font-size: 14px;
            padding: 5px 10px;
        }
    </style>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="POST" class="search-form ms-auto">
                        <input type="text" name="search" placeholder="Tìm kiếm bài viết..." class="form-control" />
                    </form>
                    <div class="card">

                        <!-- Card header with add button and search form -->
                        <div class="card-header" style="display: flex;">
                            <!-- Nút thêm bài viết -->
                            <a href="?act=themTinTuc" class="btn btn-success">Thêm bài viết</a>

                            <!-- Form tìm kiếm căn sang góc phải -->
                        </div>

                        <!-- Card body with table -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
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
                                    <?php
                                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
                                        $searchTerm = $_POST['search'];
                                        $filteredCustomers = [];
                                        foreach ($tin_tuc as $tintuc) {
                                            $Tieude = $tintuc['Tieu_de'] ?? '';
                                            if (stripos($Tieude, $searchTerm) !== false) {
                                                $filteredCustomers[] = $tintuc;
                                            }
                                        }
                                    } else {
                                        $filteredCustomers = $tin_tuc;
                                    }
                                    ?>

                                    <?php if (empty($filteredCustomers)): ?>
                                        <tr>
                                            <td colspan="7" class="text-center">Không có kết quả tìm kiếm.</td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($filteredCustomers as $key => $value) { ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= $value['Tieu_de'] ?></td>
                                                <td>
                                                    <img src="./assets/img/<?= $value['img'] ?>" alt="Ảnh bài viết">
                                                </td>
                                                <td><?= $value['Thoi_gian_tao'] ?></td>
                                                <td><?= $value['Thoi_gian_cap_nhat'] ?></td>
                                                <td>
                                                    <?php if ($value['Trang_thai'] == 'Published') { ?>
                                                        <button type="button" class="btn btn-success"><?= $value['Trang_thai'] ?></button>
                                                    <?php } else { ?>
                                                        <button type="button" class="btn btn-secondary"><?= $value['Trang_thai'] ?></button>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <a href="?act=suaTinTuc&id=<?= $value['Id']; ?>" class="btn btn-warning">Sửa</a>
                                                    <a href="?act=xoaTinTuc&id=<?= $value['Id']; ?>" class="btn btn-danger"
                                                        onclick="return confirm('Bạn có chắc chắn muốn xóa tin tức này?');">Xóa</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php require './views/layout/footer.php'; ?>