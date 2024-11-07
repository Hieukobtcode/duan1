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
            <h3>Sửa danh mục</h3>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            <table border="1">
                <thead>
                    <tr>
                        <th>Tên danh mục</th>
                        <th>Hình ảnh</th>
                        <th>Mô tả</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($danh_muc as $key => $value) { ?>
                        <tr>
                            <input type="text" name="id" value="<?php echo $value['Id'] ?>" hidden>
                            <td>
                                <input type="text" name="ten_danh_muc" value="<?php echo $value['Ten_danh_muc'] ?>">
                            </td>
                            <td>
                                <img src="assets/img/<?php echo $value['Hinh_anh'] ?>" alt="">
                                <input type="file" name="hinh_anh">
                            </td>
                            <td>
                                <input type="text" name="mo_ta" value="<?php echo $value['Mo_ta'] ?>">
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td><button class="btn" type="submit" name="btn_sua">Sửa danh mục</button></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

</body>

</html>