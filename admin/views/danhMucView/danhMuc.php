<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/danhMuc.css">
</head>

<body>

    <?php require_once 'views/components/navBar.html' ?>
    <div class="list">
            <div class="title">
                <h3>Danh mục sản phẩm</h3>
            </div>
            <button class="btn"><a href="?act=themDanhMuc">Thêm danh mục</a></button>
        <table border="1">
            <thead>
                <tr>
                    <th>Tên danh mục</th>
                    <th>Hình ảnh</th>
                    <th>Ngày tạo</th>
                    <th>Ngày cập nhật</th>
                    <th>Mô tả</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($danh_muc as $key => $value) { ?>
                    <tr>
                        <td><?php echo $value['Ten_danh_muc'] ?></td>
                        <td>
                            <img src="assets/img/<?php echo $value['Hinh_anh'] ?>" alt="">
                        </td>
                        <td><?php echo $value['Ngay_tao'] ?></td>
                        <td><?php echo $value['Ngay_cap_nhat'] ?></td>
                        <td><?php echo $value['Mo_ta'] ?></td>
                        <td>
                            <button class="btn_sua"><a href="?act=suaDanhMuc&id=<?php echo $value['Id'] ?>">Sửa</a></button>
                            <button class="btn_xoa"><a onclick="return confirm('Xác nhận xóa danh mục')" href="?act=xoaDanhMuc&id=<?php echo $value['Id'] ?>">Xóa</a></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>